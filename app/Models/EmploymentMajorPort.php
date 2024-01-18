<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentMajorPort extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_year',
        'select_month',
        'port_type',
        'state_board',
        'port_id',
        'class_1',
        'class_2',
        'class_3',
        'class_4',
        'class_5',
        'class_6',
        'class_7',
        'shore_wrk',
        'casual_work',
        'total',
        'created_by',
        'updated_by',
    ];
}
