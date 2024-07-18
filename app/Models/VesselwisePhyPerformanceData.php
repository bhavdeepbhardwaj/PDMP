<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselwisePhyPerformanceData extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'vessel_item_id',
        'month_select',
        'year_select',
        'state_board_id',
        'port_id',
        'dry_mech',
        'dry_conv',
        'liquid_bulk',
        'break_bulk',
        'container',
        'container',
        'all',
        'status',
        'created_by',
        'updated_by',
    ];
}
