<?php

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\UploadController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', function () {
    return view('homepage.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
    Route::get('/dashboard/files', [FilesController::class, 'index']);
    Route::delete('/dashboard/files/{id}', [FilesController::class, 'destroy']);
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

Route::get('/upload', function () {
    return view('upload.index');
});

Route::post('/upload', [UploadController::class, 'store'])->name('file.upload');

Route::get('/view/{urlId}', [ViewController::class, 'index']);
Route::get('/view/{urlId}/download', [ViewController::class, 'download']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});