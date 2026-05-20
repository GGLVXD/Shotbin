<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // Store file inside storage/app/public/uploads
        $path = $request->file('file')->store('uploads', 'public');

        // Return success message
        return back()
            ->with('success', 'File uploaded successfully!')
            ->with('file', $path);
    }
}