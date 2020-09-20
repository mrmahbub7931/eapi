<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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
    public function store(Request $request)
    {

        // return response()->json($request->all());

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'email'     => 'required', 
            'number'    => 'required', 
            'password'  => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' =>  true,
                'message'   =>  'Validation Error',
                'data'  =>  $validator->errors()
            ]);
        }

        $data = $request->all();
        try {
            $user = User::create($data);
            
            $response = [
                'error' =>  false,
                'message'   =>  'Successfully inserted',
                'data'  =>  $user,
            ];
        } catch (Exception $e) {
            $response = [
                'error' =>  true,
                'message'   =>  'Insertion failed!',
                'data'  =>  NULL,
            ];
        }

        return response()->json($response);
    }

    public function login(Request $request)
    {
        // return response()->json($request->all());

        $validator = Validator::make($request->all(), [
            'email'     => 'required',
            'password'  => 'required', 
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' =>  true,
                'message'   =>  'Validation Error',
                'data'  =>  $validator->errors()
            ]);
        }

        $user = User::where('email',$request->email)->first();

        if (!$user) {
            return response()->json([
                'error' =>  true,
                'message'   =>  'User data not found!',
                'data'  =>  NULL
            ]);
        }

        if (Hash::check($request->password,$user->password)) {
            return response()->json([
                'error' =>  false,
                'message'   =>  'User found!',
                'data'  =>  $user
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
