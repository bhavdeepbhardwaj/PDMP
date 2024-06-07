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
            dd($request->all());

            // Validation rules
            $rules = [
                'select_year' => 'required|regex:/^\d{4}-\d{2}$/',
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

                'comm_remarks' => 'required',
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
            $customMessages = [];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Check if a record with the specified year and month already exists
            $recordExists = Commodities::where('select_year', $request->input('select_year'))
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


            $createdResponse = CommoditiesData::create([
                // 'select_year' => $request->input('select_year'),
            ]);

            // Check if the Create was successful
            // if ($createdResponse) {
            //     $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
            //         'Record Created successfully' :
            //         'Record is Drafted successfully';

            //     return redirect()->route('backend.view-employment-major-ports')->with('success', $message);
            // } else {
            //     return redirect()->route('backend.view-employment-major-ports')->with('error', 'Failed to create record');
            // }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveEmploymentMajorPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }


    //Commodity Allocate

    public function commodityAllocate($id)
    {
        // dd($id);
        $commodityData = Commodities::where('id', $id)->first();
        $expPortId = explode(',', $commodityData->port_id);
        $user = User::where('id', Auth::User()->id)->select('port_id')->first();

        if (in_array($user->port_id, $expPortId) && ($commodityData->port_id != 0)) {

            $array = $expPortId;
            $valueToRemove = $user->port_id;

            $array = array_filter($array, function ($item) use ($valueToRemove) {
                return $item !== $valueToRemove;
            });

            $impPortIdarray = implode(',', $array);

            // dd($impPortIdarray);

            // // print_r($array); // [1, 2, 4, 5]



            // $userPortIdArr[] = $user->port_id;
            // $portIdArr = array_merge($expPortId,$userPortIdArr);

            // $impPortId = implode(',',$portIdArr);
            // dd($impPortId);
            Commodities::where('id', $id)->update([
                'port_id' => $impPortIdarray
            ]);
        } else {

            $userPortIdArr[] = $user->port_id;
            $portIdArr = array_merge($expPortId, $userPortIdArr);

            $impPortId = implode(',', $portIdArr);
            // dd($impPortId);
            Commodities::where('id', $id)->update([
                'port_id' => $impPortId
            ]);
        }
    }
}
