<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'category_name','category_slug','icon_class','description'
    ];

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product_table', 'category_id', 'product_id');
    }
}
