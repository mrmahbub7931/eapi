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
}
