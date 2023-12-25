<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id', 'title', 'file'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function($file) {
            removeFile($file->file);
        });
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
