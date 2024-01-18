<?php

namespace App\Http\Controllers\Backend;

use App\Models\Port;
use App\Models\PortCategory;
use App\Models\REMonthlyAdd;
use Illuminate\Http\Request;
use App\Models\RevisedEstimate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

// provides professional formatting, comments, and validation

class RevisedEstimateController extends Controller
{
    // Form Page for the Revised Estimate

    public function addRevisedBudgetEstimateList()
    {
        try {
            // Initialize an empty array to store port information
            $portsArrs = [];

            // Check the user's role and fetch port data accordingly
            if (Auth::user()->role_id == 1) {
                // Admin user
                $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
                foreach ($catName as $key => $catval) {
                    $portsArrs[$key]['category_name'] = $catval['category_name'];
                    $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])->get()->toArray();
                }
            } else {
                // Non-admin user
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

            // Return the view with port information and the select_year
            return view('backend.addRevisedBudgetEstimateList')->with([
                'portsArrs' => $portsArrs,
            ]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    // Create for the Revised Estimate List

    public function reCreate(Request $request)
    {
        try {
            // Validate the incoming request data
            $validator = Validator::make($request->all(), [
                'GBS' => 'required|array',
                'IEBR' => 'required|array',
                'GBS.*' => 'required|numeric',
                'IEBR.*' => 'required|numeric',
                'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
                'port_id' => 'required',
                'port_type' => 'required',
            ], [
                'GBS.required' => 'The GBS field is required.',
                'GBS.array' => 'The GBS field must be an array.',
                'GBS.*.required' => 'The GBS field is required.',
                'GBS.*.numeric' => 'The GBS field must be a number.',

                'IEBR.required' => 'The IEBR field is required.',
                'IEBR.array' => 'The IEBR field must be an array.',
                'IEBR.*.required' => 'The IEBR field is required.',
                'IEBR.*.numeric' => 'The IEBR field must be a number.',

                'select_year.required' => 'The select year field is required.',
                'select_year.regex' => 'The select year must be in the format YYYY-MM.',
                'port_id.required' => 'The port field is required.',
                'port_type.required' => 'The port type field is required.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Check if a record with the specified year already exists
            $recordExists = RevisedEstimate::where('select_year', $request->input('select_year'))->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                return redirect()->back()->with('warning', 'A record with the selected year ' . $request->input('select_year') . ' already exists.');
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
            return redirect()->back()->with('success', 'Revised Estimate created successfully.');
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // View for the Revised Estimate Page

    public function viewRevisedBudgetEstimateList(Request $request)
    {
        try {
            // Initialize an empty array to store the data
            $portsArrs = [];

            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'select_year' => 'nullable|regex:/^\d{4}-\d{2}$/',
            ]);

            // If validation fails, redirect back with errors
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Get the selected year from the request or use the current year if not provided
            $selectedYear = $request->input('select_year', date('Y') . '-' . (date('y') + 1));

            // Check the user's role
            if (Auth::user()->role_id == 1) {
                // Admin logic

                // Get distinct port types
                $distinctPortType = RevisedEstimate::select('port_type')->distinct()->get()->toArray();

                foreach ($distinctPortType as $key => $val) {
                    // Loop through each port type

                    // Get Revised estimates for the port type
                    $beData = RevisedEstimate::where('port_type', $val['port_type'])->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each Revised estimate

                        // Get category name for the port type
                        $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                        $portsArrs[$key]['category_name'] = $catName['category_name'];

                        // Get port data for the selected year
                        $portsdata = Port::when($selectedYear, function ($query) use ($selectedYear) {
                            $query->where('select_year', $selectedYear);
                        })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                            ->select(
                                'ports.*',
                                'revised_estimates.select_year',
                                'revised_estimates.GBS',
                                'revised_estimates.IEBR',
                                'revised_estimates.total'
                            )
                            ->get()
                            ->toArray();

                        // Store the data in the array
                        $portsArrs[$key]['slug'] = $portsdata;
                    }
                }
            } else {
                // Non-admin logic

                // Get distinct port types for the user
                $distinctPortTypes = RevisedEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get();

                // Get the port IDs for the user
                $expPortId = explode(',', Auth::user()->port_id);

                foreach ($distinctPortTypes as $key => $val) {
                    // Loop through each port type

                    // Get the port type
                    $portType = $val['port_type'];

                    // Get Revised estimates for the port type
                    $beData = RevisedEstimate::where('port_type', $portType)->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each Revised estimate

                        // Get category name for the port type
                        $catName = PortCategory::find($beval['port_type']);
                        $portsArrs[$key]['category_name'] = $catName->category_name;

                        // Get port data for the selected year
                        $portsdata = Port::whereIn('ports.id', $expPortId)
                            ->when($selectedYear, function ($query) use ($selectedYear) {
                                $query->where('select_year', $selectedYear);
                            })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                            ->select(
                                'ports.*',
                                'revised_estimates.select_year',
                                'revised_estimates.GBS',
                                'revised_estimates.IEBR',
                                'revised_estimates.total'
                            )
                            ->get()
                            ->toArray();

                        // Store the data in the array
                        $portsArrs[$key]['slug'] = $portsdata;
                    }
                }
            }

            // Return the view with the data
            return view('backend.viewRevisedBudgetEstimateList')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // Revised Estimate Monthly Exp Add Form Page

    public function reMonthlyExpAdd(Request $request)
    {
        try {
            // Get selected year and month from the request
            $selectedYear = $request->input('select_year', '');
            $selectedMonth = $request->input('select_month', '');

            // Check if the selected year or month is empty
            if (empty($selectedYear) || empty($selectedMonth)) {
                // If empty, set default values or handle as needed

                // Get the latest Revised Estimate
                $latestBudget = RevisedEstimate::where('is_deleted', 0)
                    ->orderBy('id', 'desc')
                    ->latest()
                    ->first();

                // Get the latest REMonthlyAdd
                $latestREMonthlyAdd = REMonthlyAdd::where('is_deleted', 0)
                    ->orderBy('id', 'desc')
                    ->latest()
                    ->first();

                // Set default values for year and month
                $selectedYear = $request->input('select_year', date('Y') . '-' . (date('y') + 1));
                $selectedMonth = $latestREMonthlyAdd ? $latestREMonthlyAdd->select_month : date('m');
            } else {
                // Perform additional validation if needed
                $validator = Validator::make($request->all(), [
                    'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
                    'select_month' => 'required|numeric|between:1,12',
                ]);

                // If validation fails, log errors and redirect back
                if ($validator->fails()) {
                    // \Log::error($validator->errors()->first());
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }

            // Initialize an empty array to store the data
            $portsArrs = [];

            if (isset($request->select_year) && $request->select_year) {
                if (Auth::User()->role_id == 1) {
                    // Admin logic

                    // Get distinct port types
                    $distinctPortType = RevisedEstimate::select('port_type')->distinct()->get()->toArray();

                    foreach ($distinctPortType as $key => $val) {
                        // Loop through each port type

                        // Get Revised Estimate for the port type
                        $beData = RevisedEstimate::where('port_type', $val['port_type'])->get();

                        foreach ($beData as $bekey => $beval) {
                            // Loop through each Revised Estimate

                            // Get category name for the port type
                            $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                            $portsArrs[$key]['category_name'] = $catName['category_name'];

                            // Get port data for the selected year and month
                            $portsdata = Port::where('select_year', $selectedYear)
                                ->where('ports.port_type', $beval['port_type'])
                                ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                                ->select('ports.*', 'revised_estimates.select_year', 'revised_estimates.GBS', 'revised_estimates.IEBR', 'revised_estimates.total')
                                ->get()
                                ->toArray();

                            // Store the data in the array
                            $portsArrs[$key]['slug'] = $portsdata;
                        }
                    }
                } else {
                    // Non-admin logic

                    // Get the port IDs for the user
                    $expPortId = explode(',', Auth::user()->port_id);

                    // Get distinct port types for the user
                    $distinctPortType = RevisedEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get()->toArray();

                    foreach ($distinctPortType as $key => $val) {
                        // Loop through each port type

                        // Get the port type
                        $portType = $val['port_type'];

                        // Get Revised Estimate for the port type
                        $beData = RevisedEstimate::where('port_type', $portType)->get();

                        foreach ($beData as $bekey => $beval) {
                            // Loop through each Revised Estimate

                            // Get category name for the port type
                            $catName = PortCategory::find($beval['port_type']);
                            $portsArrs[$key]['category_name'] = $catName->category_name;

                            // Get port data for the selected year and month
                            $portsdata = Port::whereIn('ports.id', $expPortId)
                                ->where('select_year', $selectedYear)
                                ->where('ports.port_type', $beval['port_type'])
                                ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                                ->select('ports.*', 'revised_estimates.select_year', 'revised_estimates.GBS', 'revised_estimates.IEBR', 'revised_estimates.total')
                                ->get()
                                ->toArray();

                            // Store the data in the array
                            $portsArrs[$key]['slug'] = $portsdata;
                        }
                    }
                }
            }

            // Return the view with the data
            return view('backend.reMonthlyExpAdd')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
                'selectedMonth' => $selectedMonth,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // Revised Estimate Monthly Exp From Page

    public function reMonthlyExpCreate(Request $request)
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'GBS' => 'required|array',
                'IEBR' => 'required|array',
                'PPP' => 'required|array',
                'GBS.*' => 'required|numeric',
                'IEBR.*' => 'required|numeric',
                'PPP.*' => 'required|numeric',
                'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
                'select_month' => 'required|numeric|between:1,12',
                'port_id' => 'required',
                'port_type' => 'required',
            ], [
                'GBS.required' => 'The GBS field is required for all ports.',
                'GBS.array' => 'The GBS field must be an array.',
                'GBS.*.required' => 'The GBS field for each port is required.',
                'GBS.*.numeric' => 'The GBS field for each port must be a numeric value.',

                'IEBR.required' => 'The IEBR field is required for all ports.',
                'IEBR.array' => 'The IEBR field must be an array.',
                'IEBR.*.required' => 'The IEBR field for each port is required.',
                'IEBR.*.numeric' => 'The IEBR field for each port must be a numeric value.',

                'PPP.required' => 'The PPP field is required for all ports.',
                'PPP.array' => 'The PPP field must be an array.',
                'PPP.*.required' => 'The PPP field for each port is required.',
                'PPP.*.numeric' => 'The PPP field for each port must be a numeric value.',

                'select_year.required' => 'The Select Year field is required.',
                'select_year.regex' => 'The Select Year field must match the format YYYY-MM.',

                'select_month.required' => 'The Select Month field is required.',
                'select_month.numeric' => 'The Select Month field must be a numeric value.',
                'select_month.between' => 'The Select Month field must be between 1 and 12.',

                'port_id.required' => 'The Port ID field is required.',
                'port_type.required' => 'The Port Type field is required.',
            ]);

            // If validation fails, redirect back with errors
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Get month name from the month number
            $monthName = date('F', mktime(0, 0, 0, $request['select_month'], 1));

            // Check if the year and month already exist in the database
            $existingRecord = REMonthlyAdd::where('select_year', $request['select_year'])
                ->where('select_month', $request['select_month'])
                ->where('port_id', $request['port_id'])
                ->first();

            if ($existingRecord) {
                // If the record already exists, handle accordingly (e.g., redirect back with an error message)
                return Redirect::back()->with('error', "Monthly expenses for the selected year {$request['select_year']} and month {$monthName} already exist.");
            }

            // Loop through the request data to create REMonthlyAdd records
            foreach ($request['total'] as $totalkey => $totalvalue) {
                $brResponse = new REMonthlyAdd();
                $brResponse->GBS = $request['GBS'][$totalkey];
                $brResponse->IEBR = $request['IEBR'][$totalkey];
                $brResponse->PPP = $request['PPP'][$totalkey];
                $brResponse->created_by = $request['created_by'];
                $brResponse->port_id = $request['port_id'][$totalkey];
                $brResponse->port_type = $request['port_type'][$totalkey];
                $brResponse->total = $totalvalue;
                $brResponse->select_year = $request['select_year'];
                $brResponse->select_month = $request['select_month'];
                $brResponse->status = $request['status'];
                $brResponse->save();
            }

            // If the operation was successful, redirect back with a success message
            return Redirect::back()->with('success', "{$monthName} Revised Estimate Monthly Expenses created successfully.");
        } catch (\Exception $e) {
            // If an error occurred, redirect back with an error message
            return Redirect::back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // View Revised Estimate Monthly Exp Page

    public function viewReMonthlyExpList(Request $request)
    {
        try {
            $userRoleID = Auth::user()->role_id;
            // Initialize an empty array to store the data
            $portsArrs = [];

            // Get selected year and month from the request
            $selectedYear = $request->input('select_year', '');
            $selectedMonth = $request->input('select_month', '');

            // Check if the selected year or month is empty
            if (empty($selectedYear) || empty($selectedMonth)) {
                // If empty, set default values or handle as needed
                // Set default values for year and month
                // $selectedYear = $latestBudget->select_year;
                $selectedYear = $request->input('select_year', date('Y') . '-' . (date('y') + 1));
                $selectedMonth = $selectedMonth ? $selectedMonth->select_month : date('m');
            } else {
                // Perform additional validation if needed
                // For example, check if the selected year and month are valid according to your business rules
                // You can use Laravel validation for this purpose
                $validator = Validator::make($request->all(), [
                    'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
                    'select_month' => 'required|numeric|between:1,12',
                ]);

                // If validation fails, redirect back with error messages
                if ($validator->fails()) {
                    // Log validation errors for debugging
                    // \Log::error($validator->errors()->first());
                    // Add these statements for debugging
                    // dd($request->all(), $validator->errors()->all());
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            }

            // Check user role
            if (Auth::user()->role_id == 1) {
                // Admin logic

                // Get distinct port types
                $distinctPortType = RevisedEstimate::select('port_type')->distinct()->get()->toArray();

                foreach ($distinctPortType as $key => $val) {
                    // Loop through each port type

                    // Get Revised estimates for the port type
                    $beData = RevisedEstimate::where('port_type', $val['port_type'])->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each Revised estimate

                        // Get category name for the port type
                        $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                        $portsArrs[$key]['category_name'] = $catName['category_name'];

                        // Initialize the "slug" key as an empty array
                        $portsArrs[$key]['slug'] = [];

                        // Get port data for the selected year and month
                        $portsdata = Port::where('revised_estimates.select_year', $selectedYear)
                            ->where('r_e_monthly_adds.select_month', $selectedMonth)
                            ->where('r_e_monthly_adds.status', 1)
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                            ->leftJoin('r_e_monthly_adds', function ($join) {
                                $join->on('r_e_monthly_adds.port_id', '=', 'ports.id')
                                    ->on('r_e_monthly_adds.select_year', '=', 'revised_estimates.select_year');
                            })
                            ->select(
                                'ports.*',
                                'revised_estimates.select_year as re_select_year',
                                'revised_estimates.GBS as re_GBS',
                                'revised_estimates.IEBR as re_IEBR',
                                'revised_estimates.total as re_total',
                                'r_e_monthly_adds.select_month as rem_select_month',
                                'r_e_monthly_adds.GBS as rem_GBS',
                                'r_e_monthly_adds.IEBR as rem_IEBR',
                                'r_e_monthly_adds.PPP as rem_PPP',
                                'r_e_monthly_adds.total as rem_total',
                                'r_e_monthly_adds.status as rem_status',
                                'r_e_monthly_adds.id as rem_id',
                            )
                            ->get()
                            ->toArray();

                        // Check if the result set is empty
                        if (!empty($portsdata)) {
                            // Store the data in the "slug" array
                            $portsArrs[$key]['slug'] = $portsdata;
                        }
                    }
                }
                // dd($portsArrs);
            } else {
                // Non-admin logic

                // Get distinct port types for the user
                $distinctPortTypes = RevisedEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get();

                // Get the port IDs for the user
                $expPortId = explode(',', Auth::user()->port_id);

                foreach ($distinctPortTypes as $key => $val) {
                    // Loop through each port type

                    // Get the port type
                    $portType = $val['port_type'];

                    // Get Revised estimates for the port type
                    $beData = RevisedEstimate::where('port_type', $portType)->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each Revised estimate

                        // Get category name for the port type
                        $catName = PortCategory::find($beval['port_type']);
                        $portsArrs[$key]['category_name'] = $catName->category_name;

                        // Initialize the "slug" key as an empty array
                        $portsArrs[$key]['slug'] = [];

                        // Get port data for the selected year and month
                        $portsdata = Port::whereIn('ports.id', $expPortId)
                            ->where('revised_estimates.select_year', $selectedYear)
                            ->where('r_e_monthly_adds.select_year', $selectedYear)
                            ->where('r_e_monthly_adds.select_month', $selectedMonth)
                            // ->where('r_e_monthly_adds.status', 1)
                            ->where(function ($query) use ($userRoleID) {
                                if ($userRoleID == 2) {
                                    $query->whereIn('status', [3,2,1]);
                                } else {
                                    $query->where('status', 1);
                                }
                            })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('revised_estimates', 'revised_estimates.port_id', '=', 'ports.id')
                            ->leftJoin('r_e_monthly_adds', function ($join) {
                                $join->on('r_e_monthly_adds.port_id', '=', 'ports.id')
                                    ->on('r_e_monthly_adds.select_year', '=', 'revised_estimates.select_year');
                            })
                            ->select(
                                'ports.*',
                                'revised_estimates.select_year as re_select_year',
                                'revised_estimates.GBS as re_GBS',
                                'revised_estimates.IEBR as re_IEBR',
                                'revised_estimates.total as re_total',
                                'r_e_monthly_adds.select_month as rem_select_month',
                                'r_e_monthly_adds.GBS as rem_GBS',
                                'r_e_monthly_adds.IEBR as rem_IEBR',
                                'r_e_monthly_adds.PPP as rem_PPP',
                                'r_e_monthly_adds.total as rem_total',
                                'r_e_monthly_adds.status as rem_status',
                                'r_e_monthly_adds.created_by as rem_createdByID',
                                'r_e_monthly_adds.id as rem_id',
                            )
                            ->get()
                            ->toArray();

                        // Check if the result set is empty
                        if (!empty($portsdata)) {
                            // Store the data in the "slug" array
                            $portsArrs[$key]['slug'] = $portsdata;
                        }
                    }
                }
                // dd($portsArrs);
            }

            // Return the view with the data
            return view('backend.viewReMonthlyExpList')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
                'selectedMonth' => $selectedMonth,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // Revised Estimate Monthly status

    public function reUpdateStatus(Request $request)
    {
        try {
            // Get the authenticated user's ID
            $userRoleID = Auth::user()->id;

            // Validate the incoming request
            $request->validate([
                'user_ID' => 'required|numeric',
                'select_month' => 'required',
                'rowid' => 'required|numeric',
                'status' => 'required|in:1,2,3',
            ]);

            // Find REMonthlyAdd records based on the specified conditions
            $getData = REMonthlyAdd::where('id', $request->rowid)
                ->where('created_by', $request->user_ID)
                ->where('select_month', $request->select_month)
                ->get()->toArray();

            // Debugging: Dump the conditions and the result of the query
            // dd($getData);

            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = REMonthlyAdd::find($data['id']);
                    $portData->status = $request->status;
                    $portData->updated_by = $userRoleID;
                    $portData->save();
                }
                // Set success message in the session

                // if ($request->status == 1) {
                //     session()->flash('success', 'Approve data successfully');
                // } else {
                //     session()->flash('warning', 'Reject data successfully');
                // }

                // // Return a success response
                // return response()->json(['status' => 'success']);

                // Set success message in the session
                session()->flash('success', 'Status updated successfully');

                // Return a success response
                return response()->json(['status' => 'success']);
            } else {
                // Return a response indicating that no matching records were found
                return response()->json(['error' => 'No records found matching the criteria.']);
            }
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Get the data of a Revised Estimate Monthly Exp for editing.
     *
     * @param  int  $id  The ID of the Revised Estimate Monthly Exp.
     * @return \Illuminate\Http\JsonResponse
     */
    public function reMonthlyExpCreateEdit($id)
    {
        try {
            // Find the Revised Estimate Monthly Exp by ID
            $getData = REMonthlyAdd::findOrFail($id);

            // Return the data as a JSON response
            return response()->json($getData);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Log the error for further investigation
            Log::error('Error retrieving Revised Estimate Monthly Exp data: ' . $e->getMessage());

            // Return an error response with details
            return response()->json(['error' => 'Data not found', 'details' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            // Log other exceptions
            Log::error('Error: ' . $e->getMessage());

            // Return a generic error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    /**
     * Update monthly data for a specific record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reEditUpdatedMonthly(Request $request)
    {
        try {
            // dd($request->input('monthyear'));
            // Validate the incoming request data
            $request->validate([
                'id' => 'required|numeric', // Assuming 'id' is required and should be numeric
                'GBS' => 'required|numeric',
                'IEBR' => 'required|numeric',
                'PPP' => 'required|numeric',
                'total' => 'required|numeric',
            ]);

            // Update the record with the provided data
            $editData = REMonthlyAdd::where('id', $request->input('id'))->update([
                'GBS' => $request->input('GBS'),
                'IEBR' => $request->input('IEBR'),
                'PPP' => $request->input('PPP'),
                'total' => $request->input('total'),
                'modify_id' => $request->input('uid'),
            ]);

            // Check if the update was successful
            if ($editData) {
                // Flash a success message to the session
                session()->flash('success', "Monthly data updated successfully");
                return response()->json(['success' => true]);
            } else {
                // Flash an error message to the session
                session()->flash('error', 'Failed to update monthly data');
                return response()->json(['success' => false]);
            }
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error updating monthly data: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'An error occurred while updating monthly data.']);
        }
    }

    // View Revised Estimate Report

    public function reReportList()
    {
        return view('backend.reReportList');
    }
}
