<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderPosition;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class AdminOrdersController extends Controller
{

    use ApiResponses, ApiPrepare;

    /**
     * Список заказов
     */
    public function list(Request $request) : array
    {

        $data = $request->validate([
            'page' => ['required', 'integer', 'min:1', 'max:99999']
        ]);

        $orders = Order::query()
            ->orderBy('id', 'asc')
            ->paginate(30, ['*'], 'page', $data['page']);

        return $this->paginateToJson($orders, 'orders', function(Order $order){
            return $this->prepareOrder($order);
        });

    }

    /**
     * Информация по заказу
     */
    public function get(Request $request, Order $order) : array
    {

        $orderPositions = $order->orderPositions()
            ->with(['item' => function($query){ return $query->withTrashed(); }])
            ->with(['item.itemVariants' => function($query){ return $query->withTrashed(); }])
            ->get();

        return [
            'order' => $this->prepareOrder($order),
            'positions' => $orderPositions->map(function(OrderPosition $orderPosition){

                return $this->prepareOrderPosition($orderPosition) + [
                        'item' => $this->prepareItem($orderPosition->item),
                        'item_variant' => $this->prepareItemVariant($orderPosition->itemVariant)
                    ];

            })
        ];

    }

    /**
     * Отменить заказ
     */
    public function cancel(Request $request, Order $order) : string
    {

        $order->status = Order::STATUS_CANCELED;
        $order->status_courier = Order::COURIER_STATUS_CANCELED;
        $order->save();

        return 'OK';

    }

    /**
     * Завершить заказ
     */
    public function complete(Request $request, Order $order) : string
    {

        $order->status = Order::STATUS_COMPLETE;
        $order->status_courier = Order::COURIER_STATUS_DELIVERED;
        $order->save();

        return 'OK';

    }

    /**
     * Принять заказ в работу
     */
    public function accept(Request $request, Order $order) : string
    {

        if($order->status !== Order::STATUS_CREATED){
            throw new ApiError('Данный заказ невозможно начать');
        }

        $order->status = Order::STATUS_COOKING;
        $order->save();

        return 'OK';

    }

    /**
     * Отправить заказ на доставку
     */
    public function outOfDelivery(Request $request, Order $order) : string
    {

        if($order->status !== Order::STATUS_COOKING && $order->status !== Order::STATUS_CREATED){
            throw new ApiError('Данный заказ нельзя передать в доставку');
        }

        $order->status = Order::STATUS_DELIVERING;
        $order->status_courier = Order::COURIER_STATUS_SEARCH;
        $order->save();

        return 'OK';

    }

    /**
     * Изменить курьера
     */
    public function changeCourier(Request $request, Order $order) : string
    {

        if($order->status !== Order::STATUS_DELIVERING){
            throw new ApiError('У данного заказа нельзя назначить курьера');
        }

        $data = $request->validate([
            'courier_id' => ['nullable', 'integer', 'exists:couriers,id']
        ], [
            'courier_id.exists' => 'Курьер не найден'
        ]);

        $courier_id = Arr::get($data, 'courier_id');

        if($courier_id){

            if($order->courier_id === $courier_id){
                throw new ApiError('На данный заказ уже назначен этот курьер', 500);
            }

            $order->status_courier = Order::COURIER_STATUS_ACCEPTED;
            $order->courier_id = $data['courier_id'];
            $order->save();

        }else{

            $order->status_courier = Order::COURIER_STATUS_SEARCH;
            $order->courier_id = null;
            $order->save();

        }

        return 'OK';

    }

}
