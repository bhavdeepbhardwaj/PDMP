<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CruiseTourism extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_month',
        'select_year',
        'port_type',
        'port_id',
        'state_board',
        'no_of_cruise_terminals',
        'total_cruise_calls',
        'no_of_cruise_passengers',
        'cruise_berth_charges',
        'created_by',
        'updated_by',
    ];
}
