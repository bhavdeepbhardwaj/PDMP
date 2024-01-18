<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateBoard extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'state_id',
        'name',
        'created_by',
        'updated_by',
    ];
}
