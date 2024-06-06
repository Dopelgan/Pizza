<?php

namespace Database\Factories;

use App\Helpers\SessionBasket\SessionBasketCompiledItem;
use App\Models\Item;
use App\Models\ItemVariant;
use App\Models\OrderPosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderPositionFactory extends Factory
{

    protected $model = OrderPosition::class;

    public function definition() : array
    {
        return [];
    }

    public function byBasketItem(SessionBasketCompiledItem $basketItem) : self
    {
        return $this
            ->for($basketItem->itemVariant)
            ->for($basketItem->item)
            ->state([
                'price' => $basketItem->itemVariant->price,
                'quantity' => $basketItem->quantity
            ]);
    }

}
