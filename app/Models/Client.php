<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
    ];


    protected $casts = [
    ];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    static public function findByPhone(string $phone) : ?self
    {
        return self::where('phone', $phone)->first();
    }

    public function getProducts()
    {

    }

}
