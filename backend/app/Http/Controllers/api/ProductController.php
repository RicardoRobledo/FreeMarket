<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
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
        $products = Product::where('name', $data_gotten['name']);
        $data = null;
        $status = null;

        if($products->exists())
        {
            $data = json_encode([
                'message' => 'success',
                'product' => $products->first()
            ]);

            $status = 200;
            
            return response($data, $status);
        }

        $data = json_encode([
            'message' => 'product not found',
        ]);

        $status = 404;

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
    public function destroy(Request $request)
    {
        //
    }
}
