<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsLTE;
use App\Http\Controllers\ProductLTE;
use App\Http\Controllers\ShoppingLTE;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    
    $user = User::where('email', $credentials['email'])->first();
    if (!$user) {
        return redirect()->route('login')->withErrors(['email' => 'Nonexistent user']);
    }

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/home');
    } else {
        return redirect()->route('login')->withErrors(['password' => 'Password does not match']);
    }
})->name('login-user');

use Illuminate\Validation\Rule;

Route::post('/register', function (Request $request) {
    $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
        'password' => ['required', 'string', 'confirmed'],
    ]);

    $existingUser = User::where('email', $validatedData['email'])->first();
    if ($existingUser) {
        return redirect()->back()->withErrors(['email' => 'Email already registered']);
    }
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    Auth::login($user);
    return redirect('/');
})->name('register-user');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/logout', function () {
    Auth::logout();
    // Redirigir a la página de inicio de sesión
    return redirect()->route('login');
})->name('logout');

Route::resource('/admin/users', UsLTE::class);
Route::resource('/admin/products', ProductLTE::class);
Route::resource('/admin/shopping', ShoppingLTE::class);