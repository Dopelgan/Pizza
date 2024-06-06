<?php

namespace App\Helpers\Api;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Client;
use App\Models\Courier;
use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\Order;
use App\Models\OrderPosition;

trait ApiPrepare
{

    protected function prepareAdmin(Admin $admin) : array
    {
        return $admin->only(['id', 'login']);
    }

    protected function prepareClient(Client $client) : array
    {
        return $client->only(['id', 'phone']);
    }

    protected function prepareCourier(Courier $courier) : array
    {
        return $courier->only(['first_name', 'second_name', 'id', 'login']);
    }

    protected function prepareCategory(Category $category) : array
    {
        return $category->only([
            'id',
            'name'
        ]);
    }

    protected function prepareOrder(Order $order) : array
    {
        return $order->only([
            'id',
            'amount',
            'status',
            'code',
            'hash',
            'ready_at',
            'phone',
            'street',
            'floor',
            'entrance',
            'house',
            'apartment',
            'comment'
        ]);
    }

    protected function prepareOrderPosition(OrderPosition $orderPosition) : array
    {
        return $orderPosition->only([
            'id' => $orderPosition->id,
            'quantity' => $orderPosition->quantity,
            'price' => $orderPosition->price
        ]);
    }

    protected function prepareItem(Item $item) : array
    {
        return $item->only([
            'id',
            'name',
            'picture',
            'description',
            'is_available'
        ]);
    }

    protected function prepareItemVariant(ItemVariant $itemVariant) : array
    {

        return $itemVariant->only([
            'id',
            'name',
            'price'
        ]);

    }

}
