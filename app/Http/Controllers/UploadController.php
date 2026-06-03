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
        // Validate file
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);
        $uploadedFile = $request->file('file');
        // Store the file
        $path = $request->file('file')->store('uploads', 's3');
         // store in database
        Files::createFileEntry($request->user(), $uploadedFile, $path);

        // Return success message
        return back()
            ->with('success', 'File uploaded successfully!')
            ->with('file', $path);
    }
}