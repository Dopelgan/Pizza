<?php

namespace App\Helpers\Auth;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;

trait ClientAuth
{

    public function client() : ?Client
    {
        return $this->clientGuard()->user();
    }

    public function clientGuard()
    {
        return Auth::guard('client');
    }

}
