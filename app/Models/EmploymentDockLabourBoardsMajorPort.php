<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDockLabourBoardsMajorPort extends Model
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
        'total',
        'registered',
        'listed',
        'others',
        'dwtotal',
        'grandTotal',
        'created_by',
        'updated_by',
    ];
}
