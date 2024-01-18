<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug',
        'updated_by',
        'created_by',
    ];
}
