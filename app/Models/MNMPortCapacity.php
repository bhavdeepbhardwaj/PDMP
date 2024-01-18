<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MNMPortCapacity extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'port_type',
        'state_board',
        'select_year',
        'port_name',
        'capacity',
        // 'nonOperational',
        'operational',
        'select_month',
        'created_by',
        'updated_by'
    ];
}
