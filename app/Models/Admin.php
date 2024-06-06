<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'login',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    static public function findByLogin(string $login) : ?self
    {
        return self::where('login', $login)->first();
    }

}
