<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\ClientAuth;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientAuthController extends Controller
{

    use ClientAuth, ApiResponses;

    /**
     * Регистрация нового клиента
     */
    public function register(Request $request) : string
    {

        $data = $request->validate([
            'phone' => ['required', 'string', 'regex:/^7[0-9]{10}$/', 'unique:clients,phone'],
            'password' => ['required', 'string', 'max:255']
        ], [
            'phone.regex' => 'Некорректный номер телефона',
            'phone.unique' => 'Данный номер телефона уже зарегистрирован'
        ]);

        $client = Client::create([
            'phone' => $data['phone'],
            'password' => Hash::make($data['password'])
        ]);

        $this->clientGuard()->login($client);

        return "OK";

    }

    /**
     * Авторизация клиента
     */
    public function login(Request $request) : string
    {

        $data = $request->validate([
            'phone' => ['required', 'string', 'regex:/^7[0-9]{10}$/'],
            'password' => ['required', 'string', 'max:255']
        ], [
            'phone.regex' => 'Некорректный номер телефона'
        ]);

        $client = Client::findByPhone($data['phone']);

        if(!$client || !Hash::check($data['password'], $client->password)){
            throw new ApiError('Неверный логин или пароль', 422);
        }

        $this->clientGuard()->login($client);

        return "OK";

    }

}
