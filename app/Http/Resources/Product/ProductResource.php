<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'  =>  $this->id,
            'type'  =>  $this->type,
            'product_name'  =>  $this->name,
            'slug'  =>  $this->slug,
            'regular_price' =>  $this->price,
            'unity' =>  $this->unity ? $this->unity : '',
            'stock' =>  $this->stock === 0 ? 'Out of stock' : $this->stock,
            'discount'  =>  $this->discount,
            'sales_price'  =>  round((1 - ($this->discount/100)) * $this->price),
            'sku'   =>  $this->sku,
            'size'  =>  $this->size,
            'color' =>  $this->color, 
            'short_description' =>  $this->short_desc,
            'long_description' =>  $this->long_desc,
            'specification' =>  $this->specs,
            'featured_image'    =>  $this->featured_image,
            'gallery_image' =>  $this->gallery_image,
            'status'    =>  $this->status,
            'meta_title'    =>  $this->meta_title,
            'meta_description'    =>  $this->meta_desc,
            'categories'    =>  $this->categories,
            'rating'    =>  $this->reviews->count() > 0 ? round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet!',
            'href'  =>  [
                'reviews'   =>  route('reviews.index',$this->id) 
            ]
        ];
    }
}
