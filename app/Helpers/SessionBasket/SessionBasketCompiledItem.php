<?php

namespace App\Helpers\SessionBasket;

use App\Models\ItemVariant;

class SessionBasketCompiledItem
{

    public $item;
    public $category;
    public $itemVariant;
    public $quantity;

    public function __construct(ItemVariant $itemVariant, int $quantity)
    {
        $this->itemVariant = $itemVariant;
        $this->item = $itemVariant->item;
        $this->category = $itemVariant->item->category;
        $this->quantity = $quantity;
    }

}
