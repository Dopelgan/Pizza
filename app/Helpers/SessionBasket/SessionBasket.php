<?php

namespace App\Helpers\SessionBasket;

use App\Models\ItemVariant;
use Illuminate\Session\Store;

class SessionBasket
{

    protected $session;
    protected $basket;

    public function __construct(Store $session){
        $this->session = $session;
        $this->basket = $session->get('basket') ?: [];
    }

    public function countAt(ItemVariant $itemVariant) : int
    {

        return $this->exists($itemVariant)
            ? $this->basket[$itemVariant->id]
            : 0;

    }

    public function countAll(bool $unique = false) : int
    {
        return $unique
            ? count($this->basket)
            : array_sum($this->basket);
    }

    public function save() : self
    {

        $this->session->put('basket', $this->basket);

        return $this;

    }

    public function exists(ItemVariant $itemVariant) : bool
    {
        return array_key_exists($itemVariant->id, $this->basket);
    }

    public function set(ItemVariant $itemVariant, int $quantity) : self
    {

        $this->basket[$itemVariant->id] = $quantity;

        return $this->save();

    }

    public function add(ItemVariant $itemVariant, int $quantity = 1) : self
    {

        if($this->exists($itemVariant)){
            $this->basket[$itemVariant->id] += $quantity;
        }else{
            $this->basket[$itemVariant->id] = $quantity;
        }

        return $this->save();

    }

    public function remove(ItemVariant $itemVariant) : self
    {

        if($this->exists($itemVariant)){
            unset($this->basket[$itemVariant->id]);
        }

        return $this->save();

    }

    public function clear() : self
    {

        $this->basket = [];

        return $this->save();

    }

    public function get() : SessionBasketCompiledCollection
    {

        $itemVariants = ItemVariant::whereIn('id', array_keys($this->basket))
            ->with('item')
            ->with('item.category')
            ->get();

        return new SessionBasketCompiledCollection(
            $itemVariants->map(function($itemVariant){
                return new SessionBasketCompiledItem($itemVariant, $this->basket[$itemVariant->id]);
            })
        );

    }

}
