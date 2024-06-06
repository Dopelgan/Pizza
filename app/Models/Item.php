<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'name',
        'picture',
        'description',
        'is_available'
    ];

    protected $attributes = [
        'description' => '',
        'is_available' => true
    ];

    protected $casts = [
        'is_available' => 'boolean'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function itemVariants(){
        return $this->hasMany(ItemVariant::class);
    }

}
