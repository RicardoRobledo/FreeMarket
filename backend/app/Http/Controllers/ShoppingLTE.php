<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;
use App\Models\Product;
use App\Models\Us;


class ShoppingLTE extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $us = Us::all();
        $product = Product::all();
        $shopping = Shopping::with('us', 'product')->get();
        return view('shopping',['us'=>$us,'product'=>$product] ,compact('shopping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $us = Us::all();
        $product = Product::all();

        return view('shoppingcreate', ['us'=>$us,'product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        try{
            $shopping = new Shopping;
            $shopping->user_id = $body['user_id'];
            $shopping->product_id = $body['product_id'];
            $shopping->save();
            return redirect('/admin/shopping')->with('success', 'Succesful!');
        }catch(\Throwable $th) {
            return redirect('/admin/shopping')->with('error', 'Incorrect insert');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shopping = Shopping::where('id', $id)->first();
        $us = Us::all();
        $product = Product::all();
        $shopping = Shopping::where('id', $id)->first();

        return view('shoppingedit',['us'=>$us,'product'=>$product] ,compact('shopping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body = $request->all();

        try{
            Shopping::where('id', $id)->update([
                'user_id' => $body['user_id'],
                'product_id' => $body['product_id']
            ]);
            return redirect('/admin/shopping')->with('edited', 'Data modified');
        }catch(\Throwable $th) {
            return redirect('/admin/shopping')->with('error', 'Incorrect insert');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shopping::where('id', $id)->delete();
        return redirect('/admin/shopping')->with('destroy', 'Data deleted');
    }
}
