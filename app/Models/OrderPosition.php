<?php

namespace App\Models;

use Database\Factories\OrderPositionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_id',
        'item_variant_id',
        'quantity',
        'price'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function itemVariant(){
        return $this->belongsTo(ItemVariant::class);
    }

    static public function factory(...$parameters) : OrderPositionFactory
    {
        return OrderPositionFactory::new(...$parameters);
    }

}
