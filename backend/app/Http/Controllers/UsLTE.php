<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Us;
use Illuminate\Support\Facades\Hash;

class UsLTE extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Us::all();
        return view('users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('userscreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try{
            $body = $request->all();
            $user = new Us;
            $user->name = $body['name'];
            $user->middle_name = $body['middle_name'];
            $user->last_name = $body['last_name'];
            $user->country = $body['country'];
            $user->username = $body['username'];
            $user->city = $body['city'];
            $user->state = $body['state'];
            $user->street = $body['street'];
            $user->number = $body['number'];
            $user->password = Hash::make($body['password']);
            $user->email = $body['email'];
            $user->email_verified_at = now();
            $user->postal_code = $body['postal_code'];
            $user->neighborhood = $body['neighborhood'];
            $user->save();
            return redirect('/admin/users')->with('success', 'Succesful!');
        }catch(\Throwable $th) {
            return redirect('/admin/users')->with('error', 'Incorrect insert');
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
        $user = Us::where('id', $id)->first();
        return view('usersedit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $body = $request->all();

        try{
            Us::where('id', $id)->update([
                'name' => $body['name'],
                'middle_name' => $body['middle_name'],
                'last_name' => $body['last_name'],
                'username' => $body['username'],
                'password' => Hash::make($body['password']),
                'email' => $body['email'],
                'country' => $body['country'],
                'city' => $body['city'],
                'state' => $body['state'],
                'street' => $body['street'],
                'neighborhood' => $body['neighborhood'],
                'number' => $body['number'],
                'postal_code' => $body['postal_code']
            ]); 
            return redirect('/admin/users')->with('edited', 'Data modified');
        }catch(\Throwable $th) {
            return redirect('/admin/users')->with('error', 'Incorrect insert');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Us::where('id', $id)->delete();
        return redirect('/admin/users')->with('destroy', 'Data deleted');
    }
}
