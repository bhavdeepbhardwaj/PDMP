<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerthRelatedInformation extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'select_year',
        'select_month',
        'port_type',
        'state_board',
        'port_id',
        'type_of_berth',
        'no_of_berth',
        'public',
        'ppp',
        'designed_depth',
        'permissible_draft',
        'avg_total_draft',
        'created_by',
        'updated_by'
    ];
}
