<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExternalApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'link', 'title', 'logo'
    ];

    protected static function boot() {
        parent::boot();

        static::deleting(function($app) {
            removeFile($app->logo);
        });
    }
}
