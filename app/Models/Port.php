<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Port extends Model
{
    use HasFactory;

    protected $fillable = [
        'port_type',
        'port_name',
        'port_code',
        'port_data_code',
        'updated_by',
        'created_by',
    ];
}
