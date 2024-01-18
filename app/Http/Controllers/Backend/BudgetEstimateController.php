<?php

namespace App\Http\Controllers\Backend;

use App\Models\Port;
use App\Models\User;
use App\Models\BEMonthlyAdd;
use App\Models\PortCategory;
use Illuminate\Http\Request;
use App\Models\BudgetEstimate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Exports\ExporBudgetEstimate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BudgetEstimateController extends Controller
{
    // Form Page for the Budget Estimate

    public function addBudgetEstimateList()
    {
        try {
            // Initialize an empty array to store port data
            $portsArrs = [];

            // Check the user's role
            if (Auth::user()->role_id == 1) {
                // Admin logic

                // Get all port categories
                $catName = PortCategory::where('is_deleted', 0)->get()->toArray();

                // Loop through each category
                foreach ($catName as $key => $catval) {
                    $portsArrs[$key]['category_name'] = $catval['category_name'];
                    $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])->get()->toArray();
                }
            } else {
                // Non-admin logic

                // Get the port IDs for the user
                $expPortId = explode(',', Auth::user()->port_id);

                // Get the port category for the user
                $catName = PortCategory::where('is_deleted', 0)
                    ->where('id', Auth::user()->port_type)
                    ->get()
                    ->toArray();

                // Loop through each category
                foreach ($catName as $key => $catval) {
                    $portsArrs[$key]['category_name'] = $catval['category_name'];
                    $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])
                        ->whereIn('id', $expPortId)
                        ->get()
                        ->toArray();
                }
            }

            // Return the view with the port data and year
            return view('backend.addBudgetEstimateList',)->with([
                'portsArrs' => $portsArrs,
            ]);
        } catch (\Exception $e) {
            // If an error occurred, handle it here
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    // Create for the Budget Estimate List

    public function beCreate(Request $request)
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
                'GBS.*.required' => 'The GBS field is required for all entries.',
                'GBS.*.numeric' => 'The GBS field must be a number for all entries.',

                'IEBR.*.required' => 'The IEBR field is required for all entries.',
                'IEBR.*.numeric' => 'The IEBR field must be a number for all entries.',

                'select_year.required' => 'The select year field is required.',
                'select_year.regex' => 'The select year must be in the format YYYY-MM.',
                'port_id.required' => 'The port field is required.',
                'port_type.required' => 'The port type field is required.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Check if a record with the specified year already exists
            $recordExists = BudgetEstimate::where('select_year', $request->input('select_year'))->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                return redirect()->back()->with('warning', 'A record with the selected year ' . $request->input('select_year') . ' already exists.');
            }

            // Iterate through the request data and save BudgetEstimate records
            foreach ($request->input('total') as $totalkey => $totalvalue) {
                $budgetEstimate = new BudgetEstimate;
                $budgetEstimate->GBS = $request->input('GBS')[$totalkey];
                $budgetEstimate->IEBR = $request->input('IEBR')[$totalkey];
                $budgetEstimate->created_by = $request->input('created_by');
                $budgetEstimate->port_id = $request->input('port_id')[$totalkey];
                $budgetEstimate->port_type = $request->input('port_type')[$totalkey];
                $budgetEstimate->total = $totalvalue;
                $budgetEstimate->select_year = $request->input('select_year');
                $budgetEstimate->save();
            }

            // If the operation was successful, redirect back with success message
            return redirect()->back()->with('success', 'Budget Estimate created successfully.');
        } catch (\Exception $e) {
            // If an error occurred, redirect back with error message
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // View for the Budget Estimate Page

    public function viewBudgetEstimateList(Request $request)
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
                $distinctPortType = BudgetEstimate::select('port_type')->distinct()->get()->toArray();

                foreach ($distinctPortType as $key => $val) {
                    // Loop through each port type

                    // Get budget estimates for the port type
                    $beData = BudgetEstimate::where('port_type', $val['port_type'])->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each budget estimate

                        // Get category name for the port type
                        $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                        $portsArrs[$key]['category_name'] = $catName['category_name'];

                        // Get port data for the selected year
                        $portsdata = Port::when($selectedYear, function ($query) use ($selectedYear) {
                            $query->where('select_year', $selectedYear);
                        })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                            ->select(
                                'ports.*',
                                'budget_estimates.select_year',
                                'budget_estimates.GBS',
                                'budget_estimates.IEBR',
                                'budget_estimates.total'
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
                $distinctPortTypes = BudgetEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get();

                // Get the port IDs for the user
                $expPortId = explode(',', Auth::user()->port_id);

                foreach ($distinctPortTypes as $key => $val) {
                    // Loop through each port type

                    // Get the port type
                    $portType = $val['port_type'];

                    // Get budget estimates for the port type
                    $beData = BudgetEstimate::where('port_type', $portType)->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each budget estimate

                        // Get category name for the port type
                        $catName = PortCategory::find($beval['port_type']);
                        $portsArrs[$key]['category_name'] = $catName->category_name;

                        // Get port data for the selected year
                        $portsdata = Port::whereIn('ports.id', $expPortId)
                            ->when($selectedYear, function ($query) use ($selectedYear) {
                                $query->where('select_year', $selectedYear);
                            })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                            ->select(
                                'ports.*',
                                'budget_estimates.select_year',
                                'budget_estimates.GBS',
                                'budget_estimates.IEBR',
                                'budget_estimates.total'
                            )
                            ->get()
                            ->toArray();

                        // Store the data in the array
                        $portsArrs[$key]['slug'] = $portsdata;
                    }
                }
            }

            // Return the view with the data
            return view('backend.viewBudgetEstimateList')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // Budget Estimate Monthly Exp Add Form Page

    public function beMonthlyExpAdd(Request $request)
    {
        try {
            // Get selected year and month from the request
            $selectedYear = $request->input('select_year', '');
            $selectedMonth = $request->input('select_month', '');

            // Check if the selected year or month is empty
            if (empty($selectedYear) || empty($selectedMonth)) {
                // If empty, set default values or handle as needed

                // Get the latest budget estimate
                $latestBudget = BudgetEstimate::where('is_deleted', 0)
                    ->orderBy('id', 'desc')
                    ->latest()
                    ->first();

                // Get the latest BEMonthlyAdd
                $latestBEMonthlyAdd = BEMonthlyAdd::where('is_deleted', 0)
                    ->orderBy('id', 'desc')
                    ->latest()
                    ->first();

                // Set default values for year and month
                $selectedYear = $request->input('select_year', date('Y') . '-' . (date('y') + 1));
                $selectedMonth = $latestBEMonthlyAdd ? $latestBEMonthlyAdd->select_month : date('m');
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
                    $distinctPortType = BudgetEstimate::select('port_type')->distinct()->get()->toArray();

                    foreach ($distinctPortType as $key => $val) {
                        // Loop through each port type

                        // Get budget estimates for the port type
                        $beData = BudgetEstimate::where('port_type', $val['port_type'])->get();

                        foreach ($beData as $bekey => $beval) {
                            // Loop through each budget estimate

                            // Get category name for the port type
                            $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                            $portsArrs[$key]['category_name'] = $catName['category_name'];

                            // Get port data for the selected year and month
                            $portsdata = Port::where('select_year', $selectedYear)
                                ->where('ports.port_type', $beval['port_type'])
                                ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                                ->select('ports.*', 'budget_estimates.select_year', 'budget_estimates.GBS', 'budget_estimates.IEBR', 'budget_estimates.total')
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
                    $distinctPortType = BudgetEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get()->toArray();

                    foreach ($distinctPortType as $key => $val) {
                        // Loop through each port type

                        // Get the port type
                        $portType = $val['port_type'];

                        // Get budget estimates for the port type
                        $beData = BudgetEstimate::where('port_type', $portType)->get();

                        foreach ($beData as $bekey => $beval) {
                            // Loop through each budget estimate

                            // Get category name for the port type
                            $catName = PortCategory::find($beval['port_type']);
                            $portsArrs[$key]['category_name'] = $catName->category_name;

                            // Get port data for the selected year and month
                            $portsdata = Port::whereIn('ports.id', $expPortId)
                                ->where('select_year', $selectedYear)
                                ->where('ports.port_type', $beval['port_type'])
                                ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                                ->select('ports.*', 'budget_estimates.select_year', 'budget_estimates.GBS', 'budget_estimates.IEBR', 'budget_estimates.total')
                                ->get()
                                ->toArray();

                            // Store the data in the array
                            $portsArrs[$key]['slug'] = $portsdata;
                        }
                    }
                }
            }

            // Return the view with the data
            return view('backend.beMonthlyExpAdd')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
                'selectedMonth' => $selectedMonth,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // Budget Estimate Monthly Exp From Page

    public function beMonthlyExpCreate(Request $request)
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
            $existingRecord = BEMonthlyAdd::where('select_year', $request['select_year'])
                ->where('select_month', $request['select_month'])
                ->where('port_id', $request['port_id'])
                ->first();

            if ($existingRecord) {
                // If the record already exists, handle accordingly (e.g., redirect back with an error message)
                return Redirect::back()->with('error', "Monthly expenses for the selected year {$request['select_year']} and month {$monthName} already exist.");
            }

            // Loop through the request data to create BEMonthlyAdd records
            foreach ($request['total'] as $totalkey => $totalvalue) {
                $brResponse = new BEMonthlyAdd();
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
            return Redirect::back()->with('success', "{$monthName} Budget Estimate Monthly Expenses created successfully.");
        } catch (\Exception $e) {
            // If an error occurred, redirect back with an error message
            return Redirect::back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    // View Budget Estimate Monthly Exp Page

    public function viewBeMonthlyExpList(Request $request)
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
                $distinctPortType = BudgetEstimate::select('port_type')->distinct()->get()->toArray();

                foreach ($distinctPortType as $key => $val) {
                    // Loop through each port type

                    // Get budget estimates for the port type
                    $beData = BudgetEstimate::where('port_type', $val['port_type'])->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each budget estimate

                        // Get category name for the port type
                        $catName = PortCategory::where('id', $beval['port_type'])->first()->toArray();
                        $portsArrs[$key]['category_name'] = $catName['category_name'];

                        // Initialize the "slug" key as an empty array
                        $portsArrs[$key]['slug'] = [];

                        // Get port data for the selected year and month
                        $portsdata = Port::where('budget_estimates.select_year', $selectedYear)
                            ->where('b_e_monthly_adds.select_month', $selectedMonth)
                            ->where('b_e_monthly_adds.status', 1)
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                            ->leftJoin('b_e_monthly_adds', function ($join) {
                                $join->on('b_e_monthly_adds.port_id', '=', 'ports.id')
                                    ->on('b_e_monthly_adds.select_year', '=', 'budget_estimates.select_year');
                            })
                            ->select(
                                'ports.*',
                                'budget_estimates.select_year as be_select_year',
                                'budget_estimates.GBS as be_GBS',
                                'budget_estimates.IEBR as be_IEBR',
                                'budget_estimates.total as be_total',
                                'b_e_monthly_adds.select_month as bem_select_month',
                                'b_e_monthly_adds.GBS as bem_GBS',
                                'b_e_monthly_adds.IEBR as bem_IEBR',
                                'b_e_monthly_adds.PPP as bem_PPP',
                                'b_e_monthly_adds.total as bem_total',
                                'b_e_monthly_adds.status as bem_status',
                                'b_e_monthly_adds.id as bem_id',
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
                $distinctPortTypes = BudgetEstimate::select('port_type')->where('port_type', Auth::user()->port_type)->distinct()->get();

                // Get the port IDs for the user
                $expPortId = explode(',', Auth::user()->port_id);

                foreach ($distinctPortTypes as $key => $val) {
                    // Loop through each port type

                    // Get the port type
                    $portType = $val['port_type'];

                    // Get budget estimates for the port type
                    $beData = BudgetEstimate::where('port_type', $portType)->get();

                    foreach ($beData as $bekey => $beval) {
                        // Loop through each budget estimate

                        // Get category name for the port type
                        $catName = PortCategory::find($beval['port_type']);
                        $portsArrs[$key]['category_name'] = $catName->category_name;

                        // Initialize the "slug" key as an empty array
                        $portsArrs[$key]['slug'] = [];

                        // Get port data for the selected year and month
                        $portsdata = Port::whereIn('ports.id', $expPortId)
                            ->where('budget_estimates.select_year', $selectedYear)
                            ->where('b_e_monthly_adds.select_year', $selectedYear)
                            ->where('b_e_monthly_adds.select_month', $selectedMonth)
                            // ->where('b_e_monthly_adds.status', 1)
                            ->where(function ($query) use ($userRoleID) {
                                if ($userRoleID == 2) {
                                    $query->whereIn('status', [3, 2, 1]);
                                } else {
                                    $query->where('status', 1);
                                }
                            })
                            ->where('ports.port_type', $beval['port_type'])
                            ->leftJoin('budget_estimates', 'budget_estimates.port_id', '=', 'ports.id')
                            ->leftJoin('b_e_monthly_adds', function ($join) {
                                $join->on('b_e_monthly_adds.port_id', '=', 'ports.id')
                                    ->on('b_e_monthly_adds.select_year', '=', 'budget_estimates.select_year');
                            })
                            ->select(
                                'ports.*',
                                'budget_estimates.select_year as be_select_year',
                                'budget_estimates.GBS as be_GBS',
                                'budget_estimates.IEBR as be_IEBR',
                                'budget_estimates.total as be_total',
                                'b_e_monthly_adds.select_month as bem_select_month',
                                'b_e_monthly_adds.GBS as bem_GBS',
                                'b_e_monthly_adds.IEBR as bem_IEBR',
                                'b_e_monthly_adds.PPP as bem_PPP',
                                'b_e_monthly_adds.total as bem_total',
                                'b_e_monthly_adds.status as bem_status',
                                'b_e_monthly_adds.created_by as bem_createdByID',
                                'b_e_monthly_adds.id as bem_id',
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
            return view('backend.viewBeMonthlyExpList')->with([
                'portsArrs' => $portsArrs,
                'selectedYear' => $selectedYear,
                'selectedMonth' => $selectedMonth,
            ]);
        } catch (\Exception $e) {
            // If an error occurred
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Update the status of BEMonthlyAdd records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
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

            // Find BEMonthlyAdd records based on the specified conditions
            $getData = BEMonthlyAdd::where('id', $request->rowid)
                ->where('created_by', $request->user_ID)
                ->where('select_month', $request->select_month)
                ->get()->toArray();

            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = BEMonthlyAdd::find($data['id']);
                    $portData->status = $request->status;
                    $portData->updated_by = $userRoleID;
                    $portData->save();
                }

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

    public function beMonthlyExpCreateEdit($id)
    {
        try {
            // Find the Revised Estimate Monthly Exp by ID
            $getData = BEMonthlyAdd::findOrFail($id);

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

    public function beEditUpdatedMonthly(Request $request)
    {
        try {
            // dd($request->all());
            // Validate the incoming request data
            $request->validate([
                'id' => 'required|numeric', // Assuming 'id' is required and should be numeric
                'GBS' => 'required|numeric',
                'IEBR' => 'required|numeric',
                'PPP' => 'required|numeric',
                'total' => 'required|numeric',
            ]);

            // Update the record with the provided data
            $editData = BEMonthlyAdd::where('id', $request->input('id'))->update([
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

    // export
    public function beExport(Request $request)
    {
        dd($request->all());
        return Excel::download(new ExporBudgetEstimate, 'users.xlsx');
    }

    // View Budget Estimate Report

    public function beReportList()
    {
        return view('backend.beReportList');
    }
}
