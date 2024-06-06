<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Api\ApiBasket;
use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\ClientAuth;
use App\Helpers\SessionBasket\SessionBasketCompiledCollection;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ClientOrdersController extends Controller
{

    use ClientAuth, ApiResponses, ApiPrepare, ApiBasket;

    protected function getCompiledBasket(Request $request) : SessionBasketCompiledCollection
    {
        return $this->basket()->get();
    }


    /**
     * Оформить заказ
     */
    public function create(Request $request) : array
    {

        $data = $request->validate([
            'phone' => ['required', 'string', 'max:255', 'regex:/^7[0-9]{10}$/'],
            'street' => ['required', 'string', 'max:255'],
            'floor' => ['required', 'string', 'max:255'],
            'entrance' => ['required', 'string', 'max:255'],
            'house' => ['required', 'string', 'max:255'],
            'apartment' => ['required', 'string', 'max:255'],
            'comment' => ['nullable', 'string', 'max:4096']
        ], [
            'phone.regex' => 'Вы ввели некорректный номер телефона'
        ]);

        $basket = $this->getCompiledBasket($request);

        if(!count($basket)){
            throw new ApiError('Ваша корзина пуста');
        }

        foreach ($basket as $basketItem) {

            if (!$basketItem->item->is_available) {
                throw new ApiError('Товар недоступен для покупки');
            }

        }

        $order = DB::transaction(function () use ($basket, $data) {

            $order = Order::factory()
                ->generateCode()
                ->generateHash()
                ->setPhone($data['phone'])
                ->setStreet($data['street'])
                ->setFloor($data['floor'])
                ->setEntrance($data['entrance'])
                ->setHouse($data['house'])
                ->setApartment($data['apartment'])
                ->setComment(Arr::get($data, 'comment', ''))
                ->setReadyTime(50)
                ->setAmount($basket->basketSum());

            if($this->clientGuard()->check()){
                $order = $order->for($this->client());
            }

            $order = $order->create();

            foreach ($basket as $basketItem) {

                OrderPosition::factory()
                    ->byBasketItem($basketItem)
                    ->for($order)
                    ->create();

            }

            return $order;

        });

        return $this->prepareOrder($order);

    }

    /**
     * Получить информацию о заказе
     */
    public function get(Request $request, string $code, string $hash) : array
    {


        $order = Order::findByCode($code);

        if(!$order || $order->hash !== $hash){
            throw new ApiError('Заказ не найден', 404);
        }

        $orderPositions = $order
            ->orderPositions()
            ->with(['item' => function($query){ return $query->withTrashed(); }])
            ->with(['itemVariant' => function($query){ return $query->withTrashed(); }])
            ->get();

        return [
            'order' => $this->prepareOrder($order),
            'positions' => $orderPositions->map(function(OrderPosition $orderPosition){

                $additional = [
                    'item' => $this->prepareItem($orderPosition->item),
                    'item_variant' => $this->prepareItemVariant($orderPosition->itemVariant)
                ];

                return $this->prepareOrderPosition($orderPosition) + $additional;

            })
        ];


    }

    /**
     * Получить список своих заказов
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:9999999']
        ]);

        $orders = $this->client()
            ->orders()
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($orders, 'orders', function(Order $order){
            return $this->prepareOrder($order);
        });


    }

}
