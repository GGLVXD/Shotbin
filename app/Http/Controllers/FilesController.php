<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;


class FilesController extends Controller
{
    public function index(){
        // filter files BY user and get them
        $files = Files::getFiles();
        return view('dashboard.filemanager.index', compact('files'));
    }

    public function destroy($id){

        $file = Files::find($id);

        // check if file exists
        if (!$file) {
            abort(404);
        }

        // check the ownership of file
        if($file->user_id != Auth::id()){
            return response()->json(false, 403);
        }


        // delete the file
        $deleteFile = Files::deleteFileEntry($id, Auth::user());

        // sanity check
        if ($deleteFile == false) {
            return response()->json(false, 500);
        }

        return response()->json(true, 204);
    }
}

