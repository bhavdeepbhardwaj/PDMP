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
        'total_seafarers',
        'woman_seafarer',
        'created_by',
        'updated_by'
    ];
}
