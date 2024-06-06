<?php

namespace App\Helpers\Auth;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

trait AdminAuth
{

    public function admin() : ?Admin
    {
        return $this->adminGuard()->user();
    }

    public function adminGuard()
    {
        return Auth::guard('admin');
    }

}
