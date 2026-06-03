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
        // Store file inside storage/app/public/uploads
        $path = $request->file('file')->store('uploads', 'public');
        // store in database
        Files::CreateFileEntry($request->user(), $uploadedFile, $path);

        // Return success message
        return back()
            ->with('success', 'File uploaded successfully!')
            ->with('file', $path);
    }
}