<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;




class Files extends Model
{
    use HasFactory;
    protected $table = "files";
    protected $fillable = ['name', 'user_id', 'path', 'expire_at', 'url_id', 'size'];

    // Creates a new entry in file in files table
    public static function createFileEntry(?int $userId, $file, $path, $fileSize){
        return self::create([
            'name' => $file->getClientOriginalName(),
            'user_id' => $userId,
            'path' => $path,
            'expire_at' => null, //self::FileExpiry()
            'url_id' => Str::random(16),
            'size' => $fileSize,
        ]);
    }
    // format file sizes for non byte readers
    public static function formatFileSize($file){
        $fileSize = $file->size;

        if ($fileSize >= 1000000000) {
            return round($fileSize / 1000000000, 2) . 'GB';
        } elseif ($fileSize >= 1000000) {
            return round($fileSize / 1000000, 2) . 'MB';
        } elseif ($fileSize >= 1000) {
            return round($fileSize / 1000, 2) . 'KB';
        }

        return $fileSize.'B';
    }
    // delete the file
    public static function deleteFileEntry($id, $user){
        $file = self::find($id);

        
        // check if file exists in database
        if(!$file){
            return false;
        }

        // check file ownership
        if($file->user_id != $user->id){
            return false;
        }
        
        $deletedFromStorage = Storage::disk('s3')->delete($file->path);
        // check if file deleted on s3 then delete in database
        if ($deletedFromStorage) {
            self::where('id', $id)->delete(); // delete in database
            return true;
        }
        return false;
    }
    // expiry of the files
    protected static function FileExpiry(){

        return now()->addDays(30);
    }
    // get total count of files for user
    public static function countTotal($user_id){
        return self::where('user_id', $user_id)->count();
    }
    // checks if file doenst go over the quota limit
    public static function FileQuota(?int $userId, $requestFileSize){
        $totalFileSize = self::where('user_id', $userId)->sum('size');
        $fileQuota = 607876;
        $newQuotaUsage = $totalFileSize + $requestFileSize;
        // checks if user is a guest or not
        if($userId){ 
            // check if doesnt go over 5gb quota
            if ($fileQuota > $newQuotaUsage) {
                return [
                true, 
                'signedin' => true,
                'newquotausage' => $newQuotaUsage,
                'quotausedbefore' => (int)$totalFileSize, // for some reason it was a string
                'requestfilesize' => $requestFileSize,
                'totalquota' => $fileQuota
                ];
            } else {
                return [
                false, 
                'signedin' => true,
                'newquotausage' => $newQuotaUsage,
                'quotausedbefore' => (int)$totalFileSize,
                'requestfilesize' => $requestFileSize,
                'totalquota' => $fileQuota
                ];
            }
        } else {
            return [
            true, 
            'signedin' => true,
            'newquotausage' => $newQuotaUsage,
            'quotausedbefore' => (int)$totalFileSize, 
            'requestfilesize' => $requestFileSize,
            'totalquota' => $fileQuota
            ];
        }
    }
}