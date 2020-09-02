<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = [
        'product_id','customer','review','star'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
