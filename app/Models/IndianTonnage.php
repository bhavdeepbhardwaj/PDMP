<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndianTonnage extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_month',
        'select_year',
        'port_type',
        'port_id',
        'state_board',
        'trade',
        'no_of_ships',
        'gross_tonnage',
        'dead_weight_tonnage',
        'created_by',
        'updated_by',
    ];
}
