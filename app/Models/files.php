<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Files extends Model
{
    use HasFactory;
    protected $table = "files";
    protected $fillable = ['name', 'user_id', 'path', 'expire_at', 'url_id'];

    // Creates a new entry in file in files table
    public static function CreateFileEntry($user, $file, $path)
{
    return self::create([
        'name' => $file->getClientOriginalName(),
        'user_id' => $user->id,
        'path' => $path,
        'expire_at' => self::FileExpiry($user),
        'url_id' => Str::random(16),
    ]);
}
protected static function FileExpiry($user)
{

    return now()->addDays(30);
}
}
