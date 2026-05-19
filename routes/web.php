<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', function () {
    return view('homepage/index');
});

$user = Auth::user();

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard/index');
    });
    Route::get('/dashboard/files', function () {
        return view('dashboard/filemanager/index');
    });
});

Route::view('/signup', 'auth.signup')
    ->middleware('guest')
    ->name('register');

Route::post('/signup', Register::class)
    ->middleware('guest');

Route::view('/signin', 'auth.signin')
    ->middleware('guest')
    ->name('login');

Route::post('/signin', Login::class)
    ->middleware('guest');

// Logout route
Route::post('/signout', Logout::class)
    ->middleware('auth')
    ->name('logout');