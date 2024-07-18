<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VesselwiseItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'port_id',
        'name',
        'parent_id',
        'type',
        'status',
        'created_by',
        'updated_by',
    ];
}
