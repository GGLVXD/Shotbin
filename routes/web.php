<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage/index');
});
Route::get('/signup', function () {
    return view('auth/signup');
});

Route::get('/signin', function () {
    return view('auth/signin');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
});

Route::get('/dashboard/files', function () {
    return view('dashboard/filemanager/index');
});