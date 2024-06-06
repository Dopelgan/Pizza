<?php

namespace App\Http\Controllers\Courier;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\CourierAuth;
use App\Http\Controllers\Controller;
use App\Models\Courier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CourierAuthController extends Controller
{
    use CourierAuth, ApiResponses;

    /**
     * Авторизация
     */
    public function login(Request $request) : string
    {

        $data = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255']
        ]);

        $courier = Courier::findByLogin($data['login']);

        if(!$courier || !Hash::check($data['password'], $courier->password)){
            throw new ApiError('Неверный логин или пароль', 422);
        }

        $this->courierGuard()->login($courier);

        return "OK";

    }
}
