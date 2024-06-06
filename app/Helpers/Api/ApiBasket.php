<?php

namespace App\Helpers\Api;

use App\Helpers\SessionBasket\SessionBasket;

trait ApiBasket
{

    public function basket() : SessionBasket
    {
        return new SessionBasket(request()->session());
    }

}
