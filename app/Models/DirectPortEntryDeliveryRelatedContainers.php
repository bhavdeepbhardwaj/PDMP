<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectPortEntryDeliveryRelatedContainers extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_month',
        'select_year',
        'port_type',
        'port_id',
        'state_board',
        'containers',
        'direct_port_entry_of_teu',
        'direct_port_delivery',
        'status',
        'created_by',
        'updated_by',
    ];
}
