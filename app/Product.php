<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'type',
        'name',
        'slug',
        'price',
        'stock',
        'discount',
        'sku',
        'size',
        'color',
        'short_desc',
        'long_desc',
        'featured_image',
        'gallery_image',
        'status',
        'meta_title',
        'meta_desc',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_product', 'product_id', 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
