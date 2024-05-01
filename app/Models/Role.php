<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'role_slug',
        'level',
        'employee_role',
        'updated_by',
        'created_by',
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
}
