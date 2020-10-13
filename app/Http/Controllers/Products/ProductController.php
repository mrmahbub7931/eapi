<?php

namespace App\Http\Controllers\Products;

use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','scopes:view-products,create-products,update-products,delete-products'])->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        
        $featured_image = $request->file('featured_image');
        $featured_image_ext =  $request->featured_image->getClientOriginalExtension();
        // return response()->json(env('APP_URL'));
        try {
            $product = new Product();
            $product_name = response()->json($request->product_name);
            if ($featured_image) {
                $currentDate = Carbon::now()->toDateString();
                $fImage = $request->slug.'-'.$currentDate.uniqid().'.'.$featured_image_ext;
                if (!Storage::disk('public')->exists('products')) {
                    Storage::disk('public')->makeDirectory('products');
                }
                $image = Image::make($featured_image)->resize(1024, 1024)->save($fImage,80);
                Storage::disk('public')->put('products/'.$fImage,$image);
            }
            $product->type = $request->type;
            $product->name = $request->product_name;
            $product->slug = $request->slug;
            $product->stock = $request->stock;
            $product->sku = $request->sku;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->unity = $request->unity;
            $product->status = $request->status;
            $product->short_desc = $request->short_description;
            $product->long_desc = $request->long_description;
            $product->featured_image = env('APP_URL') . '/storage/products/'.$fImage;
            $product->save();
            $product->categories()->attach($request->category_id);
            return response()->json([
                'error' => false,
                'message'   =>  'Successfully Data inserted',
                'data'  =>  $product
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => true,
                'message'   =>  'Failed',
                'data'  =>  NULL
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
        // return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return response()->json([
                'error' =>  false,
                'message'   =>  'Product Deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' =>  true,
                'message'   =>  'Product Deletation Failed!',
            ]);
        }
    }
}
