<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Us;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $user = Us::where('username', $data_gotten['username']);
        $data = null;

        if(!($user->exists()))
        {
            $data = json_encode([
                'detail' => 'Us does not exist',
                'message' => 'error'
            ]);

            return response($data, 404);
        }

        $data = json_encode([
            'user' => $user->first(),
            'message' => 'success'
        ]);

        return response($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data_gotten = $request->query();
        $user = Us::where('username', $data_gotten['username']);
        
        $body = $request->all();

        if(!($user->exists()))
        {
            $data = json_encode([
                'detail' => 'Us does not exist',
                'message' => 'error'
            ]);

            return response($data, 404);
        }

        $new_user = $user->update([
            'name' => $body['name'],
            'middle_name' => $body['middle_name'],
            'last_name' => $body['last_name'],
            'country' => $body['country'],
            'username' => $body['username'],
            'city' => $body['city'],
            'state' => $body['state'],
            'street' => $body['street'],
            'number' => $body['number'],
            'email' => $body['email'],
            'email_verified_at' => now(),
            'postal_code' => $body['postal_code'],
            'neighborhood' => $body['neighborhood']
        ]);

        $data = json_encode([
            'message' => $body['username']
        ]);

        return response($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
