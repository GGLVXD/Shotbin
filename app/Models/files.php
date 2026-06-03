<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class Files extends Model
{
    use HasFactory;
    protected $table = "files";
    protected $fillable = ['name', 'user_id', 'path', 'expire_at', 'url_id'];

    // Creates a new entry in file in files table
    public static function createFileEntry($user, $file, $path){
        return self::create([
            'name' => $file->getClientOriginalName(),
            'user_id' => $user->id,
            'path' => $path,
            'expire_at' => self::FileExpiry($user),
            'url_id' => Str::random(16),
        ]);
    }
    // delete the file
    public static function deleteFileEntry($id, $user){
        $file = self::find($id);

        if(!$file){
            return false;
        }
        // check file ownership
        if($file->file_id != $user->id){
            return false;
        }

        $deletedFromStorage = Storage::disk('s3')->delete($file->path);
        // check if file deleted on s3
        if ($deletedFromStorage) {
            self::where('id', $id)->delete(); // delete on database
            return true;
        }
        return false;
    }
    protected static function FileExpiry($user){

        return now()->addDays(30);
    }
}
