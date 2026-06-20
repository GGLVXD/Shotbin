<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;


class AdminFilesController extends Controller
{
    public function index(){
        // filter files BY user and get them
        $files = Files::with('user')->get();
        return view('dashboard.admin.filelist', compact('files'));
    }
}
