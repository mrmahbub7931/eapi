<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'product_name',
        'product_code',
        'product_color',
        'product_size',
        'price',
        'quantity',
        'user_number',
        'session_id',
    ];
}
