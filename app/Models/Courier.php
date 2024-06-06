<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Courier extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'second_name',
        'login',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function getActiveOrder() : ?Order
    {
        return $this->orders()->where('status_courier', Order::STATUS_DELIVERING)->first();
    }

    static public function findByLogin(string $login) : ?self
    {
        return self::where('login', $login)->first();
    }

}
