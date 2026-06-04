<?php

namespace App\Http\Controllers;
use App\Models\Files;

use Illuminate\Http\Request;

class DownloadFile extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // downloads file 
    public function show(string $url_id)
    {
        $file = Files::where("url_id", $url_id)->firstOrFail();


        // redirect to s3 bucket url with auto download
        return redirect()->away(config('filesystems.disks.s3.url').'/'.$file->path.'?response-content-disposition=attachment');
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
