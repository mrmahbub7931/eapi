<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'featured_image'    =>  $this->featured_image,
            'productType'  =>  $this->type,
            'productName'  =>  $this->name,
            'product_slug'  =>  $this->slug,
            'stock' =>  $this->stock === 0 ? 'Out of stock' : $this->stock,
            'regular_price'  =>  $this->price,
            'sales_price'  =>  round((1 - ($this->discount/100)) * $this->price),
            'discount'  =>  $this->discount,
            'short_description'  =>  $this->short_desc,
            'unity'  =>  $this->unity,
            'href'  =>  [
                'link'  =>  route('products.show',$this->slug)
            ],
        ];
    }
}
