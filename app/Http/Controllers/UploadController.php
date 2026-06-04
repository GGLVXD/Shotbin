<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;


class UploadController extends Controller
{
    public function index()
    {
        return view('upload.index');
    }

public function store(Request $request)
{
    $request->validate([
        'files' => 'required|array|min:1',
    ]);

    $uploadedFiles = [];

    foreach ($request->file('files') as $uploadedFile) {
        // file size
        $fileSize = $uploadedFile->getSize();

        // upload to s3
        $path = $uploadedFile->store('uploads', 's3');

        // create a file entry in database
        $fileModel = Files::createFileEntry($request->user(), $uploadedFile, $path, $fileSize);

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