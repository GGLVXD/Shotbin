<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;


class FilesController extends Controller
{
    public function index(){
        // filter files BY user and get them
        $files = Files::where('user_id', Auth::id())->get();
        return view('dashboard.filemanager.index', compact('files'));
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

