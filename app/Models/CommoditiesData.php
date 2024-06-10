<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommoditiesData extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_year',
        'select_month',
        'state_id',
        'port_type',
        'state_board',
        'port_id',
        'commodity_id',
        'ov_ul_if',
        'ov_ul_ff',
        'ov_l_if',
        'ov_l_ff',
        'ov_total',
        'co_ul_if',
        'co_ul_ff',
        'co_l_if',
        'co_l_ff',
        'co_total',
        'grand_total',
        'status',
        'comm_remarks',
        'created_by',
        'updated_by',
    ];
}
