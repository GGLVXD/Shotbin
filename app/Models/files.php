<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $table = "files";
    protected $fillable = ['name', 'author', 'path', 'expire_at', 'url_id'];
}
