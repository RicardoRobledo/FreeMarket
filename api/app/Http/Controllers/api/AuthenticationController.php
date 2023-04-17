<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $body = $request->all();

        $user = new User;
        $user->name = $body['name'];
        $user->middle_name = $body['middle_name'];
        $user->last_name = $body['last_name'];
        $user->country = $body['country'];
        $user->username = $body['username'];
        $user->city = $body['city'];
        $user->state = $body['state'];
        $user->street = $body['street'];
        $user->number = $body['number'];
        $user->password = $body['password'];
        $user->email = $body['email'];
        $user->email_verified_at = now();
        $user->postal_code = $body['postal_code'];
        $user->neighborhood = $body['neighborhood'];
        $user->save();

        return json_encode([
            'message' => 'success'
        ]);
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
        $data = $request->query();
        $user = User::where('username', $data['username'])->
            where('password', $data['password']);
        
        $exists = $user->exists();

        if($exists){
            $response = json_encode([
                'username' => $data['username'], 
                'token' => $user->first()->
                    createToken(env('API_KEY'))->plainTextToken,
                'message' => 'success'
            ]);

            return $response;
        }else{
            return $exists;
        }
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
        $data = $request->query();
        
        $user = User::where('username', $data['username'])->first();
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user->tokens()->where('id', $token->id)->delete();
        
        return 'logout';
    }
}
