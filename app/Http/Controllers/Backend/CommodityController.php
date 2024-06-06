<?php

namespace App\Http\Controllers\Backend;

use App\Models\Commodities;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


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
        dd($request->all());
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
