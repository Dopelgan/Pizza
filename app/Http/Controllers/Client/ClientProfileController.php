<?php

namespace App\Http\Controllers\Client;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\ClientAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientProfileController extends Controller
{

    use ClientAuth, ApiResponses, ApiPrepare;

    /**
     * Информация о текущем пользователе
     */
    public function me() : array
    {
        return $this->prepareClient(
            $this->client()
        );
    }

    /**
     * Сменить пароль
     */
    public function changePassword(Request $request) : string{

        $data = $request->validate([
            'password' => ['required', 'string', 'max:255']
        ]);

        $client = $this->client();

        $client->password = Hash::make($data['password']);
        $client->save();

        return 'OK';

    }

    /**
     * Выйти
     */
    public function logout() : string
    {

        $this->clientGuard()->logout();

        return "OK";

    }

}
