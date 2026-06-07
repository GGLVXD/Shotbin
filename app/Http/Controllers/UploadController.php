<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Auth;



class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

public function store(Request $request){
    $totalUploadSize = collect($request->file('files'))->sum(fn($file) => $file->getSize());
    $lol = Files::FileQuota(Auth::id(), $totalUploadSize);
    dd($lol);
    $request->validate([
        'files' => 'required|array|min:1',
        'files.*' => 'required|file|max:102400',
    ]);

    $uploadedFiles = [];

    foreach ($request->file('files') as $uploadedFile) {
        // file size
        $fileSize = $uploadedFile->getSize();

        // upload to s3
        $path = $uploadedFile->store('uploads', 's3');

        // create a file entry in database
        $fileModel = Files::createFileEntry($request->user()?->id, $uploadedFile, $path, $fileSize);

        $uploadedFiles[] = [
            'url_id' => $fileModel->url_id,
            'path' => $path,
            'name' => $uploadedFile->getClientOriginalName(),
        ];
    }

    return response()->json([
        'success' => true,
        'files' => $uploadedFiles,
    ]);
}
}