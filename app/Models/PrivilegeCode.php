<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrivilegeCode extends Model
{
    protected $fillable = [
        'parent',
        'name',
        'route_name', 
        'description',
        'icon',
        'order',
    ];
}
