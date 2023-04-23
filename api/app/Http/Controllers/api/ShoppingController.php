<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Models\Product;

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
    public function create()
    {
        //
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
        $data_gotten = $request->query();
        $shopping = Shopping::where('user_id', $data_gotten['user_id'])->get();
        $status = null;
        $data = null;
        $user_shopping = array();

        foreach($shopping as $e){
            array_push($user_shopping, Product::where('id', $e->product_id)->first());
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
    public function destroy(string $id)
    {
        //
    }
}
