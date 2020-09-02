<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = [
        'category_id','subcategory_name','subcategory_slug','icon_class','description'
    ];

    public function category(Type $var = null)
    {
        return $this->belongsTo('App\Category');
    }
}
