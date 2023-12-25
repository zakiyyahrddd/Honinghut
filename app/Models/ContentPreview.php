<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPreview extends Model
{

    protected $fillable = [
        'client_id', 'title'
    ];

    use HasFactory;
}
