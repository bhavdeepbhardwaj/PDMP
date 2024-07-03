<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
   /**
     * Display a list of City.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function cityList()
    {
        try {
            // Fetch State that are not deleted
            $stateData = City::where('is_deleted', 0)->get()->toArray();

            // Return the view with State data
            dd($stateData);
            // return view('backend.portCategoryList', ['portCatData' => $portCatData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
