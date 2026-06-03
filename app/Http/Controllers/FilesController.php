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

    public function destroy(){

        $file = Files::find(request("id"));
        if (!$file) {
            abort(404);
        }

        $file->delete();

        return response()->json(null, 204);
    }
}

