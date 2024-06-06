<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Api\ApiBasket;
use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\SessionBasket\SessionBasketCompiledItem;
use App\Http\Controllers\Controller;
use App\Models\ItemVariant;
use Illuminate\Http\Request;

class ClientBasketController extends Controller
{

    use ApiResponses, ApiPrepare, ApiBasket;

    const MAX_BASKET_ITEM_COUNT = 99;
    const COUNT_RESPONSE_UNIQUE = false;

    /**
     * Получить список товаров
     */
    public function get(Request $request)
    {

        return $this->basket()
            ->get()
            ->map(function(SessionBasketCompiledItem $basketItem){
                return [
                    'item'          => $this->prepareItem($basketItem->item),
                    'item_variant'  => $this->prepareItemVariant($basketItem->itemVariant),
                    'category'      => $this->prepareCategory($basketItem->item->category),
                    'quantity' => $basketItem->quantity
                ];
            });

    }

    /**
     * Изменить количество товара
     */
    public function changeQuantity(Request $request, ItemVariant $itemVariant) : int
    {


        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . self::MAX_BASKET_ITEM_COUNT]
        ], [
            'quantity.min' => 'Нельзя добавить меньше 1 товара',
            'quantity.max' => 'Нельзя добавить больше 99 товаров'
        ]);

        if(!$itemVariant->item->is_available) {
            throw new ApiError('Товар временно недоступен');
        }

        $basket = $this->basket();

        if(!$basket->exists($itemVariant)){
            throw new ApiError('Товар отсутствует у вас в корзине');
        }

        $basket->set($itemVariant, $data['quantity']);

        return $basket->countAll(self::COUNT_RESPONSE_UNIQUE);

    }

    /**
     * Добавление товара в корзину
     */
    public function add(Request $request, ItemVariant $itemVariant) : int
    {


        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . self::MAX_BASKET_ITEM_COUNT]
        ], [
            'quantity.min' => 'Нельзя добавить меньше 1 товара',
            'quantity.max' => 'Нельзя добавить больше 99 товаров'
        ]);


        if(!$itemVariant->item->is_available) {
            throw new ApiError('Товар временно недоступен');
        }

        $basket = $this->basket();

        $basket->add($itemVariant, $data['quantity']);

        if($basket->countAt($itemVariant) > self::MAX_BASKET_ITEM_COUNT){
            $basket->set($itemVariant, self::MAX_BASKET_ITEM_COUNT);
        }

        return $basket->countAll(self::COUNT_RESPONSE_UNIQUE);


    }

    /**
     * Удалить товар из корзины
     */
    public function remove(Request $request, ItemVariant $itemVariant) : int
    {

        $basket = $this->basket();

        $basket->remove($itemVariant);

        return $basket->countAll(self::COUNT_RESPONSE_UNIQUE);

    }

    /**
     * Очистить корзину
     */
    public function clear(Request $request) : string
    {

        $this->basket()->clear();

        return "OK";

    }

}
