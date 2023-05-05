<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;

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

        if(User::where('username', $body['username'])->exists()){
            $data = json_encode([
                'message' => 'username in use'
            ]);
    
            return response($data, 404);
        }
        
        if(User::where('email', $body['email'])->exists()){
            $data = json_encode([
                'message' => 'email in use'
            ]);
    
            return response($data, 404);
        }

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
        $user->password = Hash::make($body['password']);
        $user->email = $body['email'];
        $user->email_verified_at = now();
        $user->postal_code = $body['postal_code'];
        $user->neighborhood = $body['neighborhood'];
        $user->save();

        $data = json_encode([
            'message' => 'success'
        ]);

        return response($data, 200);
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
        $user = User::where('username', $data_gotten['username']);
        $data = null;

        if(!($user->exists()))
        {
            $data = json_encode([
                'detail' => 'User does not exist',
                'message' => 'error'
            ]);

            return response($data, 404);
        }

        $is_password_hashed = Hash::check($data_gotten['password'], $user->first()->password);
        
        if(!$is_password_hashed)
        {
            $data = json_encode([
                'detail' => 'Password does not exist',
                'message' => 'error'
            ]);

            return response($data, 404);
        }

        session()->put('authentication', true);

        $data = json_encode([
            'username' => $data_gotten['username'], 
            'token' => $user->first()->createToken(env('API_KEY'))->plainTextToken,
            'session' => session()->get('authentication'),
            'message' => 'success'
        ]);

        return response($data, 200);
    }

    public function show_token(Request $request)
    {
        $data = json_encode(['csrf_token'=>csrf_token()]);
        return response($data, 200);
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
        $status = null;
        
        $user = User::where('username', $data['username'])->first();
        $token = PersonalAccessToken::findToken($request->bearerToken());

        if($token)
        {
            $user->tokens()->where('id', $token->id)->delete();
            
            session()->forget('authentication');

            $data = json_encode([
                'message' => 'success',
                'session' => session()->get('authentication')
            ]);

            $status = 200;
        }else
        {
            $data = json_encode([
                'message' => 'nonexistent token',
            ]);

            $status = 404;
        }

        return response($data, $status);
    }
}
