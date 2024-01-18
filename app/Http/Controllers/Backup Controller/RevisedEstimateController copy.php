<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Port;
use App\Models\PortCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RevisedEstimate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RevisedEstimateController extends Controller
{
    // Form Page for the Revised Budget Estimate

    public function addRevisedBudgetEstimateList()
    {
        // $portsArrs = [];
        // $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
        // // dd($catName);
        // foreach ($catName as $key => $catval) {
        //     $portsArrs[$key]['category_name'] = $catval['category_name'];
        //     $portsdata = Port::where('port_type', $catval['id'])->get()->toArray();
        //     // dd($catName);
        //     $portsArrs[$key]['slug'] = $portsdata;
        // }
        $year = RevisedEstimate::select('select_year')->distinct()->first();
        // dd($year);

        $portsArrs = [];
        if (Auth::user()->role_id == 1) {
            $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
            foreach ($catName as $key => $catval) {
                $portsArrs[$key]['category_name'] = $catval['category_name'];
                $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])->get()->toArray();
            }
        } else {
            $expPortId = explode(',', Auth::user()->port_id);
            $catName = PortCategory::where('is_deleted', 0)
                ->where('id', Auth::user()->port_type)
                ->get()
                ->toArray();

            foreach ($catName as $key => $catval) {
                $portsArrs[$key]['category_name'] = $catval['category_name'];
                $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])
                    ->whereIn('id', $expPortId)
                    ->get()
                    ->toArray();
            }
        }
        return view('backend.addRevisedBudgetEstimateList')->with([
            'portsArrs' => $portsArrs,
            'year' => $year,
        ]);;
    }

    // Create for the Revised Budget Estimate List

    public function reCreate(Request $request)
    {
        try {
            // dd($request->all());
            // $rules = [
            //     'GBS' => 'required|array',
            //     'IEBR' => 'required|array',
            //     'GBS.*' => 'required|numeric',
            //     'IEBR.*' => 'required|numeric',
            //     'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
            //     'select_month' => 'required|integer',
            // ];

            // $customMessages = [
            //     'GBS.required' => 'The GBS field is required.',
            //     'GBS.array' => 'The GBS field is required.',
            //     'GBS.numeric' => 'The GBS field is required.',

            //     'IEBR.required' => 'The IEBR field is required.',
            //     'IEBR.array' => 'The IEBR field is required.',
            //     'IEBR.numeric' => 'The IEBR field is required.',

            // ];

            // $validator = Validator::make($request->all(), $rules, $customMessages);

            // // if ($validator->fails()) {
            // //     return redirect()->back()->with('error', $validator->errors()->first());
            // // }

            // if ($validator->fails()) {
            //     return redirect()->back()->withInput()->withErrors($validator);
            // }

            $validator = Validator::make($request->all(), [
                'GBS' => 'required|array',
                'IEBR' => 'required|array',
                'GBS.*' => 'required|numeric',
                'IEBR.*' => 'required|numeric',
                'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
                'port_id' => 'required',
                'port_type' => 'required',
            ]);

            // if ($validator->fails()) {
            //     return response()->json([
            //         'error' => $validator->errors()->first()
            //     ]);
            // }
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator) // Flash the validation errors to the session
                    ->withInput(); // Flash the input data to the session
            }

            foreach ($request['total'] as $totalkey => $totalvalue) {
                $revisedEstimate = new RevisedEstimate;
                $revisedEstimate->GBS = $request['GBS'][$totalkey];
                $revisedEstimate->IEBR = $request['IEBR'][$totalkey];
                $revisedEstimate->created_by = $request['created_by'];
                $revisedEstimate->port_id = $request['port_id'][$totalkey];
                $revisedEstimate->port_type = $request['port_type'][$totalkey];
                $revisedEstimate->total = $totalvalue;
                $revisedEstimate->select_year = $request['select_year'];
                $revisedEstimate->save();
            }

            // If the operation was successful
            return Redirect::back()->with('success', 'Revised Estimate created successfully.');
        } catch (\Exception $e) {
            // If an error occurred
            return Redirect::back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // View for the Revised Budget Estimate Page

    public function viewRevisedBudgetEstimateList()
    {
        return view('backend.viewRevisedBudgetEstimateList');
    }

    // Revised Budget Estimate Exp filter

    public function refilter(Request $request)
    {
        dd($request->all());
    }

    // Revised Budget Estimate Monthly Exp Add Form Page

    public function reMonthlyExpAdd()
    {
        return view('backend.reMonthlyExpAdd');
    }

    // View Revised Budget Estimate Monthly Exp Page

    public function viewReMonthlyExpList()
    {
        return view('backend.viewReMonthlyExpList');
    }

     // View Revised Budget Estimate Report

     public function reReportList()
     {
         return view('backend.reReportList');
     }
}
