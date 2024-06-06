<?php

namespace App\Http\Controllers\Courier;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\CourierAuth;
use App\Http\Controllers\Controller;

class CourierProfileController extends Controller
{

    use CourierAuth, ApiResponses, ApiPrepare;

    /**
     * Получить информацию о текущем пользователе
     */
    public function me() : array
    {

        return $this->prepareCourier(
            $this->courier()
        );

    }

    /**
     * Выйти
     */
    public function logout() : string
    {

        $this->courierGuard()->logout();

        return "OK";

    }

}
