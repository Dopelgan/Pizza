<?php

namespace App\Helpers\SessionBasket;

use Illuminate\Support\Collection;

class SessionBasketCompiledCollection extends Collection
{

    public function basketSum() : int
    {

        return $this->sum(function(SessionBasketCompiledItem $item){
            return $item->quantity * $item->itemVariant->price;
        });

    }

}
