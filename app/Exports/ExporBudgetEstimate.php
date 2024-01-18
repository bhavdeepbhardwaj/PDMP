<?php

namespace App\Exports;

use App\Models\BudgetEstimate;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExporBudgetEstimate implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return BudgetEstimate::all();
    }
}
