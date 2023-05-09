<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping;


class ShoppingLTE extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shopping = Shopping::with('us', 'product')->get();
        return view('shopping', compact('shopping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('shoppingcreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        $shopping = new Shopping;
        $shopping->user_id = $body['user_id'];
        $shopping->product_id = $body['product_id'];
        $shopping->save();

        return redirect('/admin/shopping');
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

        return view('shoppingedit', compact('shopping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body = $request->all();

        Shopping::where('id', $id)->update([
            'user_id' => $body['user_id'],
            'product_id' => $body['product_id']
        ]);

        return redirect('/admin/shopping');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Shopping::where('id', $id)->delete();
        return redirect('/admin/shopping');
    }
}
