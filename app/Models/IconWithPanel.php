<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconWithPanel extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'module',
        'module_name',
        'mod_list_name',
        'icon',
        'url',
        'is_deleted',
    ];
}
