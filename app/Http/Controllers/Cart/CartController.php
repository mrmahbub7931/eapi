<?php

namespace App\Http\Controllers\Cart;

use App\Cart;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // public function index(Request $request)
    // {
    //     // $session_id =  $request->session()->get('session_id');
    //     $session_id = Session::get('session_id');
    //     return response()->json($session_id);
    //     $cart = Cart::where('session_id',$session_id)->get(); 
    //     return \response()->json([
    //         'data' => $cart
    //     ]);
    // }
    public function store(Request $request)
    {
        $data = $request->all();

        $session_id = $request->session()->get('session_id');
        // $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $random_str = Str::random(40);
            // Session::put('session_id',$random_str);
            $request->session()->put('session_id',$random_str);
        }

        $data['session_id'] = $session_id;
        return response()->json($data);
        // return redirect()->route('cart.index');
        // if (empty($session_id)) {
        //     return response()->json($session_id);
        // }else {
        //     return response()->json($data);
        // }

        try {
            $cart = Cart::create($data);
            // $cart = new Cart();
            // $cart->product_id = $data['product_id'];
            // $cart->product_name = $data['product_name'];
            // $cart->product_code = $data['product_code'];
            // $cart->price = $data['price'];
            // $cart->quantity = $data['quantity'];
            // $cart->product_size = $data['product_size'];
            // $cart->product_color = $data['product_color'];
            // $cart->session_id = $session_id;
            // $cart->save();
            return response()->json([
                'error' =>  false,
                'message'   =>  'Product inserted to cart successfully!',
                'data'  =>  $cart
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' =>  true,
                'message'   =>  'Product inserted to cart Failed!',
                'data'  =>  NULL
            ]);
        }
    }
}
