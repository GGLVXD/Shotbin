<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;


class ViewController extends Controller
{
    public function index($urlId){
        // filter files BY user and get them
        $file = Files::where('url_id', $urlId)->firstOrFail();

        // checks if file is expired
        if($file->expire_at < now()){
            return abort(404);
        }
        return view('view.index', [
            'file' => $file
        ]);
    }
    public function download($urlId){
        // finds the file by url_id
        $file = Files::where('url_id', $urlId)->firstOrFail();
        // checks if file is expired
        if($file->expire_at < now()){
            return abort(404);
        }
        // download file
        return Storage::disk('s3')->download($file->path);
    }
}
