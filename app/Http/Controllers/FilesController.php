<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class FilesController extends Controller
{
    public function index(){
        $files = Files::all();
        return response()->json($files);
    }
}
