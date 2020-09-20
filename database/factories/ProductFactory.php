<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'type'          =>  'single',
        'name'          =>  $faker->word,
        'slug'          =>  Str::slug($faker->name,'-'),
        'price'         =>  $faker->numberBetween(100,1000),
        'stock'         =>  $faker->randomDigit(100,1000),
        'discount'      =>  $faker->numberBetween(10,30),
        'sku'   =>  $faker->numberBetween(100,2000),
        'short_desc'    =>  $faker->paragraph,
        'long_desc'    =>  $faker->paragraph,
        'status'        =>  $faker->numberBetween(0,1),
        'featured_image'    =>  $faker->imageUrl(640,480),
    ];
});
