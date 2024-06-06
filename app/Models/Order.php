<?php

namespace App\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    const STATUS_CREATED = 'created'; //Создан
    const STATUS_COOKING = 'cocking'; //Готовится
    const STATUS_DELIVERING = 'delivering'; //На доставке
    const STATUS_COMPLETE = 'complete'; //Завершен
    const STATUS_CANCELED = 'canceled'; //Отменен

    const COURIER_STATUS_NONE = 'none'; //Курьер не требуется
    const COURIER_STATUS_SEARCH = 'search'; //Поиск курьера
    const COURIER_STATUS_ACCEPTED = 'accepted'; //Курьер принял и забирает заказ
    const COURIER_STATUS_ON_WAY = 'on-way'; //Курьер везет заказ
    const COURIER_STATUS_DELIVERED = 'delivered'; //Заказ доставлен
    const COURIER_STATUS_CANCELED = 'canceled'; //Заказ отменен

    use HasFactory;

    protected $fillable = [
        'amount',
        'status',
        'code',
        'hash',
        'ready_at',
        'phone',
        'street',
        'floor',
        'entrance',
        'house',
        'apartment',
        'comment',
        'status_courier',
        'client_id'
    ];

    protected $attributes = [
        'status' => self::STATUS_CREATED,
        'status_courier' => self::COURIER_STATUS_NONE,
        'comment' => '',
    ];

    protected $casts = [
        'ready_at' => 'datetime'
    ];

    protected $hidden = [
        'hash'
    ];

    public function orderPositions(){
        return $this->hasMany(OrderPosition::class);
    }

    public function courier(){
        return $this->belongsTo(Courier::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    static public function factory(...$parameters) : OrderFactory
    {
        return OrderFactory::new(...$parameters);
    }

    static public function findByCode(string $code) : ?self
    {
        return self::where('code', $code)->first();
    }

}
