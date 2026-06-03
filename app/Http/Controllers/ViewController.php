<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class ViewController extends Controller
{
    public function index($urlId){
        // filter files BY user and get them
        $findFile = Files::where('url_id', $urlId)->firstOrFail();
        return view('view.index', [
            'file' => $findFile
        ]);
    }
}
