<?php

namespace App\Helpers\Auth;

use App\Models\Courier;
use Illuminate\Support\Facades\Auth;

trait CourierAuth
{

    public function courier() : ?Courier
    {
        return $this->courierGuard()->user();
    }

    public function courierGuard()
    {
        return Auth::guard('courier');
    }

}
