<?php

namespace App\Http\Controllers\Courier;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\CourierAuth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderPosition;
use Illuminate\Http\Request;

class CourierOrdersController extends Controller
{

    use CourierAuth, ApiResponses, ApiPrepare;

    /**
     * Получить список доступных заказов
     */
    public function getAvailable(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $orders = Order::query()
            ->where('status_courier', Order::COURIER_STATUS_SEARCH)
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($orders, 'orders', function(Order $order){
            return $this->prepareOrder($order);
        });



    }

    /**
     * Получить свой активный заказ
     */
    public function getActive() : ?array
    {

        $order = $this->courier()->getActiveOrder();

        if(!$order){
            return null;
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
     * Взять заказ на выполнение
     */
    public function accept(Request $request, Order $order) : string
    {

        $courier = $this->courier();

        if($courier->getActiveOrder()){
            throw new ApiError('Вы уже имеете активный заказ');
        }

        if ($order->status_courier === Order::COURIER_STATUS_SEARCH) {

            $order->status_courier = Order::COURIER_STATUS_ACCEPTED;
            $order->courier_id = $courier->id;
            $order->save();

            return "OK";

        }

        throw new ApiError('Данный заказ нельзя взять в работу', 500);


    }

    /**
     * Установить статус заказа "В пути"
     */
    public function setStatusOnWay(Request $request, Order $order) : string
    {


        $courier = $this->courier();

        if($order->courier_id !== $courier->id){
            throw new ApiError('У вас нет доступа к данному заказу', 403);
        }

        if($order->courier_status !== Order::COURIER_STATUS_ACCEPTED){
            throw new ApiError('Невозможно установить данный статус');
        }

        $order->status_courier = Order::COURIER_STATUS_ON_WAY;
        $order->save();

        return "OK";


    }

    /**
     * Установить статус заказа "Доставлен"
     */
    public function setStatusDelivered(Request $request, Order $order) : string
    {

        $courier = $this->courier();

        if($order->courier_id !== $courier->id){
            throw new ApiError('У вас нет доступа к данному заказу', 403);
        }

        if($order->courier_status !== Order::COURIER_STATUS_ON_WAY){
            throw new ApiError('Невозможно установить данный статус');
        }

        $order->status_courier = Order::COURIER_STATUS_DELIVERED;
        $order->status = Order::STATUS_COMPLETE;
        $order->save();

        return "OK";


    }

}
