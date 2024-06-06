<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Api\ApiError;
use App\Helpers\Api\ApiResponses;
use App\Helpers\Auth\AdminAuth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    use ApiResponses, AdminAuth;

    /**
     * Авторизация
     */
    public function login(Request $request) : string
    {

        $data = $request->validate([
            'login' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255']
        ]);

        $admin = Admin::findByLogin($data['login']);

        if(!$admin || !Hash::check($data['password'], $admin->password)){
            throw new ApiError('Неверный логин или пароль', 422);
        }

        $this->adminGuard()->login($admin);

        return "OK";

    }
}
