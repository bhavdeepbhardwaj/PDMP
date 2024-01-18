<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalWaterwaysInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_month',
        'select_year',
        'port_type',
        'port_id',
        'state_board',
        'national_waterway_no',
        'length_km',
        'details_of_waterways',
        'cargo_moved',
        'created_by',
        'updated_by'
    ];
}
