<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VesselwiseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VesselWisePhyPerformanceController extends Controller
{
    // View Vessel Wise Phy Performance

    public function viewVesselWisePhyPerformance()
    {
        try {
            // Fetch Vessel Wise Phy Performance that are not deleted
            $userData = User::where('id', Auth::User()->id)->first();

            $commodityArr = [];

            $commodityParents = VesselwiseItem::where('parent_id', 0)->get()->toArray();

            foreach ($commodityParents as $parent) {
                $commodityItem = [
                    'parent' => $parent,
                    'sub' => [], // Initialize an empty array for sub-commodities
                ];

                $subCommodities = VesselwiseItem::where('parent_id', $parent['id'])->get()->toArray();

                foreach ($subCommodities as $subCommodity) {
                    $subCommodityItem = [
                        'sub' => $subCommodity,
                        'innersub' => [], // Initialize an empty array for inner sub-commodities
                    ];

                    $innerSubCommodities = VesselwiseItem::where('parent_id', $subCommodity['id'])->get()->toArray();

                    foreach ($innerSubCommodities as $innerSubCommodity) {
                        $innerSubCommodityItem = [
                            'innersub' => $innerSubCommodity,
                            'innermostsub' => [], // Initialize an empty array for innermost sub-commodities
                        ];

                        $innerMostSubCommodities = VesselwiseItem::where('parent_id', $innerSubCommodity['id'])->get()->toArray();

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

            // dd("View Vessel Wise Phy Performance");
            return view('backend.viewVesselWisePhyPerformance', [
                'userData' => $userData,
                'commodityArr' => $commodityArr
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewVesselWisePhyPerformance method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
