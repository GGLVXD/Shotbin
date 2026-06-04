<?php
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\DownloadFile;


// file download, just a redirect to s3 url
Route::apiResource('downloadfile', DownloadFile::class);