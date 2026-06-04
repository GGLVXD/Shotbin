<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;


class ViewController extends Controller
{
    public function index($urlId){
        // filter files BY user and get them
        $findFile = Files::where('url_id', $urlId)->firstOrFail();
        return view('view.index', [
            'file' => $findFile
        ]);
    }
    public function download($urlId){
        // finds the file by url_id
        $findFile = Files::where('url_id', $urlId)->firstOrFail();
        // download file
        return Storage::disk('s3')->download($findFile->path);
    }
}
