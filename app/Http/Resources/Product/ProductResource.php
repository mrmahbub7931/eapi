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
            'product_type'  =>  $this->type,
            'name'  =>  $this->name,
            'slug'  =>  $this->slug,
            'price' =>  $this->price,
            'stock' =>  $this->stock,
            'discount'  =>  $this->discount,
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
        ];
    }
}
