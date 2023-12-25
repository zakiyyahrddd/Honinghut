<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'role_id', 'privilege_code_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function privilegecode()
    {
        return $this->belongsTo(PrivilegeCode::class, 'privilege_code_id');
    }
}
