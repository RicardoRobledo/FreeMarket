<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Models\Product;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Carbon\Carbon;


class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Shopping::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $body = $request->all();
        $bearer_token = $request->bearerToken();

        if(!$bearer_token){
            $data = json_encode([
                'message' => 'token not given'
            ]);

            return response($data, 404);
        }
        
        $token = PersonalAccessToken::findToken($bearer_token);

        // use Illuminate\Support\Facades\Session;
        // return session()->get('authentication');

        if($token->exists())
        {
            $user = User::where('username', $body['username']);

            if(!($user->exists())){
                $data = json_encode([
                    'message' => 'user not found'
                ]);
    
                return response($data, 404);
            }

            $shopping = new Shopping;
            $shopping->user_id = $user->first()->id;
            $shopping->product_id = $body['product_id'];
            $shopping->created_at = Carbon::now()->toDateTimeString();
            $shopping->updated_at = Carbon::now()->toDateTimeString();
            $shopping->save();

            $data = json_encode([
                'message' => 'success'
            ]);

            return response($data, 200);
        }else{

            $data = json_encode([
                'message' => 'user not authenticated',
            ]);

            return response($data, 404);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $token = $request->bearerToken();

        if(!$token)
        {
            $status = 404;
            $data = json_encode([
                'message' => 'token not given'
            ]);

            return response($data, $status);
        }

        $token = PersonalAccessToken::findToken($token);

        if(!($token->exists())){
            $status = 404;
            $data = json_encode([
                'message' => 'user not authenticated'
            ]);

            return response($data, $status);
        }

        $user = User::where('username', $request->get('username'));
        
        if(!($user->exists())){
            $status = 404;
            $data = json_encode([
                'message' => 'user not found'
            ]);

            return response($data, $status);
        }

        $data_gotten = $request->query();
        $shopping = Shopping::where('user_id', $user->first()->id)->get();
        $status = null;
        $data = null;
        $user_shopping = array();

        foreach($shopping as $e){
            array_push($user_shopping, [$e->id, Product::where('id', $e->product_id)->first()]);
        }
 
        $status = 200;
        $data = json_encode([
            'message' => 'success',
            'shopping' => $user_shopping
        ]);

        return response($data, $status);
    }

    public function show2(Request $request)
    {
        $data_gotten = $request->query();
        $single_shopping = null;
        $status = null;
        $data = null;

        $token = $request->bearerToken();

        if(!$token)
        {
            $data = json_encode([
                'message' => 'user not authenticated'
            ]);
            $status = 404;

            return response($data, $status);
        }else{
            $token = PersonalAccessToken::findToken($token);
        
            if(!($token->exists())){

                $data = json_encode([
                    'message' => 'token not found',
                ]);
                $status = 404;

                return response($data, $status);
            }
        }

        $single_shopping = Shopping::where('id', $data_gotten['id'])->get();

        $data = json_encode([
            'message' => 'success',
            'shopping' => $single_shopping,
        ]);
        $status = 200;

        return response($data, $status);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $token = $request->bearerToken();

        if(!$token)
        {
            $data = json_encode([
                'message' => 'user not authenticated',
            ]);
            $status = 404;

            return response($data, $status);
        }else{
            $token = PersonalAccessToken::findToken($token);
        
            if(!($token->exists())){

                $data = json_encode([
                    'message' => 'token not found',
                ]);
                $status = 404;

                return response($data, $status);
            }
        }

        $shopping = Shopping::where('id', $id);

        if(!($shopping->exists()))
        {
            $data = json_encode([
                'message' => 'shopping not found'
            ]);

            $status = 404;

            return response($data, $status);
        }

        $data = json_encode([
            'message' => 'success',
            'shopping' => $shopping->first()->delete()
        ]);

        $status = 200;

        return response($data, $status);

    }
}
