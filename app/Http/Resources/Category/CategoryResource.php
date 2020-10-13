<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'category_name' =>  $this->category_name,
            'category_slug' =>  $this->category_slug,
            'icon_class'    =>  $this->icon_class,
            'description'   =>  $this->description,
            'parent_id'     =>  $this->parent_id ? $this->parent_id : 0,
            'parent_category'    =>  $this->parent
        ];
    }
}