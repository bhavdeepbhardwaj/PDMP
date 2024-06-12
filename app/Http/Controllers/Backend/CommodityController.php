<?php

namespace App\Http\Controllers\Backend;

use App\Models\Commodities;
use App\Models\CommoditiesData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;


class CommodityController extends Controller
{
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Commodities
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewCommodities()
    {
        try {
            // Fetch Commodities that are not deleted
            // $getData = SeafarersInformation::where('is_deleted', 0)->get()->toArray();
            // $getData = Commodities::where('is_deleted', 0)->get()->toArray();
            // dd($getData);
            // Return the view with data
            $commodityArr = [];

            $commodityParents = Commodities::where('parent_id', 0)->get()->toArray();

            foreach ($commodityParents as $parent) {
                $commodityItem = [
                    'parent' => $parent,
                    'sub' => [], // Initialize an empty array for sub-commodities
                ];

                $subCommodities = Commodities::where('parent_id', $parent['id'])->get()->toArray();

                foreach ($subCommodities as $subCommodity) {
                    $subCommodityItem = [
                        'sub' => $subCommodity,
                        'innersub' => [], // Initialize an empty array for inner sub-commodities
                    ];

                    $innerSubCommodities = Commodities::where('parent_id', $subCommodity['id'])->get()->toArray();

                    foreach ($innerSubCommodities as $innerSubCommodity) {
                        $innerSubCommodityItem = [
                            'innersub' => $innerSubCommodity,
                            'innermostsub' => [], // Initialize an empty array for innermost sub-commodities
                        ];

                        $innerMostSubCommodities = Commodities::where('parent_id', $innerSubCommodity['id'])->get()->toArray();

                        foreach ($innerMostSubCommodities as $innerMostSubCommodity) {
                            $innerSubCommodityItem['innermostsub'][] = $innerMostSubCommodity;
                        }

                        $subCommodityItem['innersub'][] = $innerSubCommodityItem;
                    }

                    $commodityItem['sub'][] = $subCommodityItem;
                }

                $commodityArr[] = $commodityItem;
            }

            // Now $commodityArr contains the desired structure


            $userData = User::where('id', Auth::User()->id)->first();

            // dd($userData);


            // dd($commodityArr);
            return view('backend.viewCommodities', [
                'commodityArr' => $commodityArr,
                'userData' => $userData
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewCommodities method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Add Commodities Form Major Port details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCommoditiesForm(Request $request)
    {
        try {
            // Your logic goes here..
            $userData = User::where('id', Auth::User()->id)->first();
            $port_id = $userData->port_id ?? '';
            // Return the view with data
            $commodityArr = [];

            $commodityParents = Commodities::where('parent_id', 0)->get()->toArray();

            foreach ($commodityParents as $parent) {
                $commodityItem = [
                    'parent' => $parent,
                    'sub' => [], // Initialize an empty array for sub-commodities
                ];

                $subCommodities = Commodities::where('parent_id', $parent['id'])->get()->toArray();

                foreach ($subCommodities as $subCommodity) {
                    $subCommodityItem = [
                        'sub' => $subCommodity,
                        'innersub' => [], // Initialize an empty array for inner sub-commodities
                    ];

                    $innerSubCommodities = Commodities::where('parent_id', $subCommodity['id'])->get()->toArray();

                    foreach ($innerSubCommodities as $innerSubCommodity) {
                        $innerSubCommodityItem = [
                            'innersub' => $innerSubCommodity,
                            'innermostsub' => [], // Initialize an empty array for innermost sub-commodities
                        ];

                        $innerMostSubCommodities = Commodities::where('parent_id', $innerSubCommodity['id'])->get()->toArray();

                        foreach ($innerMostSubCommodities as $innerMostSubCommodity) {
                            $innerSubCommodityItem['innermostsub'][] = $innerMostSubCommodity;
                        }

                        $subCommodityItem['innersub'][] = $innerSubCommodityItem;
                    }

                    $commodityItem['sub'][] = $subCommodityItem;
                }

                $commodityArr[] = $commodityItem;
            }

            // Now $commodityArr contains the desired structure
            // dd($commodityArr);

            // dd("ADD Form");
            // Return the view with Commodities Form Major Port details
            return view('backend.addCommoditiesForm', [
                "userData" => $userData,
                "commodityArr" => $commodityArr,
                'port_id' => $port_id
            ]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    // Store Data in Commodity Table

    public function storeCommodity(Request $request)
    {
        try {
            // dd($request->all());

            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'state_id' => 'required',
                'port_type' => 'required',
                'state_board' => 'required',
                'port_id' => 'required',
                'commodity_id' => 'required',

                'ov_ul_if' => 'required|array',
                'ov_ul_ff' => 'required|array',
                'ov_l_if' => 'required|array',
                'ov_l_ff' => 'required|array',
                'ov_total' => 'required|array',
                'co_ul_if' => 'required|array',
                'co_ul_ff' => 'required|array',
                'co_l_if' => 'required|array',
                'co_l_ff' => 'required|array',
                'co_total' => 'required|array',
                'grand_total' => 'required|array',

                // 'comm_remarks' => 'required',
                'created_by' => 'required',

                'ov_ul_if.*' => 'required|numeric',
                'ov_ul_ff.*' => 'required|numeric',
                'ov_l_if.*' => 'required|numeric',
                'ov_l_ff.*' => 'required|numeric',
                'ov_total.*' => 'required|numeric',
                'co_ul_if.*' => 'required|numeric',
                'co_ul_ff.*' => 'required|numeric',
                'co_l_if.*' => 'required|numeric',
                'co_l_ff.*' => 'required|numeric',
                'co_total.*' => 'required|numeric',
                'grand_total.*' => 'required|numeric',

            ];

            // Custom error messages
            $customMessages = [
                'select_year.required' => 'The select year field is required.',
                'select_year.numeric' => 'The select year must be in the format YYYY',
                'select_month.required' => 'The select month field is required.',
                'select_month.numeric' => 'The select month must be a number.',
                'select_month.between' => 'The select month must be between 1 and 12.',
                'state_id.required' => 'The state field is required.',
                'port_type.required' => 'The port type field is required.',
                'state_board.required' => 'The state board field is required.',
                'port_id.required' => 'The port field is required.',
                'commodity_id.required' => 'The commodity field is required.',
                'ov_ul_if.required' => 'The field is required.',
                'ov_ul_ff.required' => 'The field is required.',
                'ov_l_if.required' => 'The field is required.',
                'ov_l_ff.required' => 'The field is required.',
                'ov_total.required' => 'The field is required.',
                'co_ul_if.required' => 'The field is required.',
                'co_ul_ff.required' => 'The field is required.',
                'co_l_if.required' => 'The field is required.',
                'co_l_ff.required' => 'The field is required.',
                'co_total.required' => 'The field is required.',
                'grand_total.required' => 'The field is required.',
                // 'comm_remarks.required' => 'The commodity remarks field is required.',
                // 'created_by.required' => 'The created by field is required.',
                'ov_ul_if.*.required' => 'Each item is required.',
                'ov_ul_ff.*.required' => 'Each item is required.',
                'ov_l_if.*.required' => 'Each item is required.',
                'ov_l_ff.*.required' => 'Each item is required.',
                'ov_total.*.required' => 'Each item is required.',
                'co_ul_if.*.required' => 'Each item is required.',
                'co_ul_ff.*.required' => 'Each item is required.',
                'co_l_if.*.required' => 'Each item is required.',
                'co_l_ff.*.required' => 'Each item is required.',
                'co_total.*.required' => 'Each item is required.',
                'grand_total.*.required' => 'Each item is required.',
            ];


            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Check if a record with the specified year and month already exists
            $recordExists = CommoditiesData::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->where('port_type', $request->input('port_type'))
                ->where('state_board', $request->input('state_board'))
                ->where('port_id', $request->input('port_id'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            // Get the authenticated user's role ID
            $userRoleID = Auth::user()->role_id;

            // Assign the appropriate status ID based on the user's role and status
            if (in_array($userRoleID, [4, 5])) {
                $statusID = 1;
            } elseif ($userRoleID == 6) {
                $statusID = 3;
            } else {
                $statusID = 3; // Default status
            }

            foreach ($request['grand_total'] as $key => $commodityId) {
                $commodity = new CommoditiesData;

                // Set the values for the Commodity model attributes
                $commodity->select_year = $request['select_year'];
                $commodity->select_month = $request['select_month'];
                $commodity->state_id = $request['state_id'];
                $commodity->port_type = $request['port_type'];
                $commodity->state_board = $request['state_board'];
                $commodity->port_id = $request['port_id'];
                $commodity->created_by = $request['created_by'];
                $commodity->commodity_id = $commodityId;
                $commodity->ov_ul_if = $request['ov_ul_if'][$key];
                $commodity->ov_ul_ff = $request['ov_ul_ff'][$key];
                $commodity->ov_l_if = $request['ov_l_if'][$key];
                $commodity->ov_l_ff = $request['ov_l_ff'][$key];
                $commodity->ov_total = $request['ov_total'][$key];
                $commodity->co_ul_if = $request['co_ul_if'][$key];
                $commodity->co_ul_ff = $request['co_ul_ff'][$key];
                $commodity->co_l_if = $request['co_l_if'][$key];
                $commodity->co_l_ff = $request['co_l_ff'][$key];
                $commodity->co_total = $request['co_total'][$key];
                $commodity->grand_total = $request['grand_total'][$key];
                $commodity->comm_remarks = $request['comm_remarks'];
                $commodity->status = $statusID;

                // Save the Commodity record
                $createdResponse = $commodity->save();
                // $commodity->save();
                // Check if the Create was successful
                if ($createdResponse) {
                    $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
                        'Record Created successfully' :
                        'Record is Drafted successfully';

                    return redirect()->back()->with('success', $message);
                } else {
                    return redirect()->back()->with('error', 'Failed to create record');
                }
            }

            // dd($commodity->save());


        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in storeCommodityData method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    // public function storeCommodity(Request $request)
    // {
    //     try {
    //         // dd($request->all());
    //         // Validation rules
    //         $rules = [
    //             'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
    //             'select_month' => 'required|numeric|between:1,12',
    //             'state_id' => 'required',
    //             'port_type' => 'required',
    //             'state_board' => 'required',
    //             'port_id' => 'required',
    //             'commodity_id' => 'required',

    //             'ov_ul_if' => 'required|array',
    //             'ov_ul_ff' => 'required|array',
    //             'ov_ld_if' => 'required|array',
    //             'ov_ld_ff' => 'required|array',
    //             'ov_total' => 'required|array',
    //             'co_ul_if' => 'required|array',
    //             'co_ul_ff' => 'required|array',
    //             'co_ld_if' => 'required|array',
    //             'co_ld_ff' => 'required|array',
    //             'co_total' => 'required|array',
    //             'grand_total' => 'required|array',
    //             'created_by' => 'required',

    //             'ov_ul_if.*' => 'required|numeric',
    //             'ov_ul_ff.*' => 'required|numeric',
    //             'ov_ld_if.*' => 'required|numeric',
    //             'ov_ld_ff.*' => 'required|numeric',
    //             'ov_total.*' => 'required|numeric',
    //             'co_ul_if.*' => 'required|numeric',
    //             'co_ul_ff.*' => 'required|numeric',
    //             'co_ld_if.*' => 'required|numeric',
    //             'co_ld_ff.*' => 'required|numeric',
    //             'co_total.*' => 'required|numeric',
    //             'grand_total.*' => 'required|numeric',
    //         ];

    //         // Custom error messages
    //         $customMessages = [
    //             'select_year.required' => 'The select year field is required.',
    //             'select_year.regex' => 'The select year must be in the format YYYY-MM.',
    //             'select_month.required' => 'The select month field is required.',
    //             'select_month.numeric' => 'The select month must be a number.',
    //             'select_month.between' => 'The select month must be between 1 and 12.',
    //             'state_id.required' => 'The state field is required.',
    //             'port_type.required' => 'The port type field is required.',
    //             'state_board.required' => 'The state board field is required.',
    //             'port_id.required' => 'The port field is required.',
    //             'commodity_id.required' => 'The commodity field is required.',
    //             'ov_ul_if.required' => 'The field is required.',
    //             'ov_ul_ff.required' => 'The field is required.',
    //             'ov_ld_if.required' => 'The field is required.',
    //             'ov_ld_ff.required' => 'The field is required.',
    //             'ov_total.required' => 'The field is required.',
    //             'co_ul_if.required' => 'The field is required.',
    //             'co_ul_ff.required' => 'The field is required.',
    //             'co_ld_if.required' => 'The field is required.',
    //             'co_ld_ff.required' => 'The field is required.',
    //             'co_total.required' => 'The field is required.',
    //             'grand_total.required' => 'The field is required.',
    //             'created_by.required' => 'The created by field is required.',
    //             'ov_ul_if.*.required' => 'Each item is required.',
    //             'ov_ul_ff.*.required' => 'Each item is required.',
    //             'ov_ld_if.*.required' => 'Each item is required.',
    //             'ov_ld_ff.*.required' => 'Each item is required.',
    //             'ov_total.*.required' => 'Each item is required.',
    //             'co_ul_if.*.required' => 'Each item is required.',
    //             'co_ul_ff.*.required' => 'Each item is required.',
    //             'co_ld_if.*.required' => 'Each item is required.',
    //             'co_ld_ff.*.required' => 'Each item is required.',
    //             'co_total.*.required' => 'Each item is required.',
    //             'grand_total.*.required' => 'Each item is required.',
    //         ];

    //         // Validate the request data
    //         $validator = Validator::make($request->all(), $rules, $customMessages);

    //         // Check for validation failure
    //         if ($validator->fails()) {
    //             return redirect()->back()
    //                 ->withErrors($validator)  // Flash the validation errors to the session
    //                 ->withInput();  // Flash the input data to the session
    //         }

    //         // Process and save each commodity data entry
    //         foreach ($request->input('grand_total') as $totalkey => $totalvalue) {
    //             $commoditiesData = new CommoditiesData;

    //             // Assign values to the commoditiesData object
    //             $commoditiesData->select_year = $request->input('select_year')[$totalkey];
    //             $commoditiesData->select_month = $request->input('select_month')[$totalkey];
    //             $commoditiesData->state_id = $request->input('state_id')[$totalkey];
    //             $commoditiesData->port_type = $request->input('port_type')[$totalkey];
    //             $commoditiesData->state_board = $request->input('state_board')[$totalkey];
    //             $commoditiesData->port_id = $request->input('port_id')[$totalkey];
    //             $commoditiesData->commodity_id = $request->input('commodity_id')[$totalkey];

    //             // Assign OV and CO values
    //             $commoditiesData->ov_ul_if = $request->input('ov_ul_if')[$totalkey];
    //             $commoditiesData->ov_ul_ff = $request->input('ov_ul_ff')[$totalkey];
    //             $commoditiesData->ov_ld_if = $request->input('ov_ld_if')[$totalkey];
    //             $commoditiesData->ov_ld_ff = $request->input('ov_ld_ff')[$totalkey];
    //             $commoditiesData->ov_total = $request->input('ov_total')[$totalkey];
    //             $commoditiesData->co_ul_if = $request->input('co_ul_if')[$totalkey];
    //             $commoditiesData->co_ul_ff = $request->input('co_ul_ff')[$totalkey];
    //             $commoditiesData->co_ld_if = $request->input('co_ld_if')[$totalkey];
    //             $commoditiesData->co_ld_ff = $request->input('co_ld_ff')[$totalkey];
    //             $commoditiesData->co_total = $request->input('co_total')[$totalkey];
    //             $commoditiesData->grand_total = $totalvalue;

    //             // Assign created_by
    //             $commoditiesData->created_by = $request->input('created_by')[$totalkey];

    //             // Save the commoditiesData object to the database
    //             $commoditiesData->save();
    //         }

    //         return redirect()->route('backend.view-commodities')->with('success', 'Record created successfully');
    //     } catch (\Exception $e) {
    //         // Log the error for further investigation
    //         Log::error('Error in storeCommodity method: ' . $e->getMessage());

    //         // Return an error response
    //         return redirect()->back()->with('error', 'An error occurred while processing the request.')->withInput();
    //     }
    // }

    // public function storeCommodity(Request $request)
    // {
    //     // dd($request->input('commodity_id'));
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         // Define validation rules for each field here
    //     ]);

    //     // Loop through the submitted commodity data and save each record
    //     foreach ($request['grand_total'] as $key => $commodityId) {
    //         $commodity = new CommoditiesData; // Assuming your model is named Commodity

    //         // Set the values for the Commodity model attributes
    //         $commodity->state_id = $request['state_id'];
    //         $commodity->port_type = $request['port_type'];
    //         $commodity->state_board = $request['state_board'];
    //         $commodity->port_id = $request['port_id'];
    //         $commodity->created_by = $request['created_by'];
    //         $commodity->commodity_id = $commodityId;
    //         $commodity->ov_ul_if = $request['ov_ul_if'][$key];
    //         $commodity->ov_ul_ff = $request['ov_ul_ff'][$key];
    //         $commodity->ov_l_if = $request['ov_l_if'][$key];
    //         $commodity->ov_l_ff = $request['ov_l_ff'][$key];
    //         $commodity->ov_total = $request['ov_total'][$key];
    //         $commodity->co_ul_if = $request['co_ul_if'][$key];
    //         $commodity->co_ul_ff = $request['co_ul_ff'][$key];
    //         $commodity->co_l_if = $request['co_l_if'][$key];
    //         $commodity->co_l_ff = $request['co_l_ff'][$key];
    //         $commodity->co_total = $request['co_total'][$key];
    //         $commodity->grand_total = $request['grand_total'][$key];
    //         $commodity->comm_remarks = $request['comm_remarks'];

    //         // Save the Commodity record
    //         $commodity->save();
    //     }

    //     dd("save");

    //     // Redirect or return a response indicating successful data saving
    // }


    //Commodity Allocate

    public function commodityAllocate($id)
    {
        try {
            // Find the commodity data by ID
            $commodityData = Commodities::findOrFail($id);

            // Extract the port IDs from the commodity data and fetch the user's port ID
            $expPortId = explode(',', $commodityData->port_id);
            $user = User::findOrFail(Auth::id(), ['port_id']);

            // Check if the user's port ID is in the commodity's port IDs and the commodity's port ID is not 0
            if (in_array($user->port_id, $expPortId) && $commodityData->port_id != 0) {
                // Remove the user's port ID from the commodity's port IDs
                $array = array_filter($expPortId, function ($item) use ($user) {
                    return $item !== $user->port_id;
                });
                $impPortIdarray = implode(',', $array);

                // Update the commodity's port IDs without the user's port ID
                Commodities::where('id', $id)->update(['port_id' => $impPortIdarray]);

                // Return a success JSON response
                return response()->json(['message' => 'Commodity removed successfully']);
            } else {
                // Add the user's port ID to the commodity's port IDs
                $userPortIdArr[] = $user->port_id;
                $portIdArr = array_merge($expPortId, $userPortIdArr);
                $impPortId = implode(',', $portIdArr);

                // Update the commodity's port IDs with the user's port ID
                Commodities::where('id', $id)->update(['port_id' => $impPortId]);

                // Set success message in session flash for display in frontend
                $message = 'Commodity allocated successfully';
                session()->flash('success', $message);

                // Return a success JSON response with the success message
                return response()->json(['message' => $message]);
            }
        } catch (\Exception $e) {
            // Handle any exceptions and return an error JSON response
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
