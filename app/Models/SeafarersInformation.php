<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeafarersInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_month',
        'select_year',
        'port_type',
        'port_id',
        'state_board',
        'total_seafarers',
        'woman_seafarer',
        'created_by',
        'updated_by'
    ];
}
