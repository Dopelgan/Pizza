<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiPrepare;
use App\Helpers\Auth\AdminAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    use AdminAuth, ApiPrepare;

    /**
     * Информация о текущем пользователе
     */
    public function me(Request $request)
    {
        return $this->prepareAdmin(
            $this->admin()
        );
    }

    /**
     * Изменение пароля
     */
    public function changePassword(Request $request) : string{

        $data = $request->validate([
            'password' => ['required', 'string', 'max:255']
        ]);

        $admin = $this->admin();

        $admin->password = Hash::make($data['password']);
        $admin->save();

        return 'OK';

    }

    /**
     * Выйти
     */
    public function logout() : string
    {

        $this->adminGuard()->logout();

        return "OK";

    }

}
