<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;


class AdminFilesController extends Controller
{
    public function index(){
        // gets all files
        $files = Files::with('user')->get();
        return view('dashboard.admin.filemanager.index', compact('files'));
    }
}
