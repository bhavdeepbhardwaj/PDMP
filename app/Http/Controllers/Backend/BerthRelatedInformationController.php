<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BerthRelatedInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;

class BerthRelatedInformationController extends Controller
{
    /**
     * Display the view for Berth Related Information.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewBerthRelatedInformation()
    {
        try {
            // Fetch Berth Related Information that are not deleted
            $getData = BerthRelatedInformation::where('port_type', auth()->user()->port_type)->where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewBerthRelatedInformation', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewBerthRelatedInformation method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Berth Related Information details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addBerthRelatedInformation(Request $request)
    {
        try {
            // Your logic goes here...

            // Return the view with Berth Related Information and the select_year
            return view('backend.addBerthRelatedInformation');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Berth Related Information details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveBerthRelatedInformation(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'port_type' => 'required',
                'port_id' => 'required',
                'state_board' => 'required',
                'type_of_berth' => 'required',
                'no_of_berth' => 'required|numeric',
                'public' => 'required|numeric',
                'ppp' => 'required|numeric',
                'designed_depth' => 'required|numeric',
                'permissible_draft' => 'required|numeric',
                'avg_total_draft' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'port_type.required' => 'The port type field is required.',
                'port_id.required' => 'The port name field is required.',
                'select_month.required' => 'The month selection field is required.',
                'select_year.required' => 'The year selection field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'state_board.required' => 'The state board field is required.',
                'type_of_berth.required' => 'The type of berth field is required.',
                'no_of_berth.required' => 'The number of berth field is required.',
                'public.required' => 'The public field is required.',
                'ppp.required' => 'The PPP field is required.',
                'designed_depth.required' => 'The designed depth field is required.',
                'permissible_draft.required' => 'The permissible draft field is required.',
                'avg_total_draft.required' => 'The average total draft field is required.',
                'no_of_berth.numeric' => 'The number of berth must be a numeric value.',
                'public.numeric' => 'The public field must be a numeric value.',
                'ppp.numeric' => 'The PPP field must be a numeric value.',
                'designed_depth.numeric' => 'The designed depth field must be a numeric value.',
                'permissible_draft.numeric' => 'The permissible draft field must be a numeric value.',
                'avg_total_draft.numeric' => 'The average total draft field must be a numeric value.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Check if a record with the specified year, month, port_type, state_board, and port_id already exists
            $recordExists = BerthRelatedInformation::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->where('port_type', $request->input('port_type'))
                ->where('state_board', $request->input('state_board'))
                ->where('port_id', $request->input('port_id'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
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

            // Create the new BerthRelatedInformation record
            $createdResponse = BerthRelatedInformation::create([
                'select_month' => $request->input('select_month'),
                'state_board' => $request->input('state_board'),
                'select_year' => $request->input('select_year'),
                'port_type' => $request->input('port_type'),
                'port_id' => $request->input('port_id'),
                'type_of_berth' => $request->input('type_of_berth'),
                'no_of_berth' => $request->input('no_of_berth'),
                'public' => $request->input('public'),
                'ppp' => $request->input('ppp'),
                'status' => $statusID,
                'designed_depth' => $request->input('designed_depth'),
                'permissible_draft' => $request->input('permissible_draft'),
                'avg_total_draft' => $request->input('avg_total_draft'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the create operation was successful
            if ($createdResponse) {
                $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
                    'Record Created successfully' :
                    'Record is Drafted successfully';

                return redirect()->route('backend.view-berth-related-information')->with('success', $message);
            } else {
                return redirect()->route('backend.view-berth-related-information')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveBerthRelatedInformation method: ' . $e->getMessage());

            // Return an error response
            return redirect()->back()->with('error', 'An error occurred while processing the request.');
        }
    }

    /**
     * Update the status of view-berth-related-information records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusBerthRelatedInformation(Request $request)
    {
        try {
            // dd($request->all());
            // Validate the incoming request
            $request->validate([
                'select_month' => 'required',
                'rowid' => 'required|numeric',
                'status' => 'required|in:1,2,3',
            ]);

            // Find view-major-non-major-port-capacity records based on the specified conditions
            $getData = BerthRelatedInformation::where('id', $request->rowid)
                ->where('select_month', $request->select_month)
                ->get()->toArray();
            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = BerthRelatedInformation::find($data['id']);
                    $portData->status = $request->status;
                    $portData->updated_by = $request->updated_by;
                    $portData->save();
                }
                // dd($portData);
                // Set success message in the session
                if ($request->status == 1) {
                    session()->flash('success', 'Status updated successfully');
                } elseif (in_array($request->status, [2, 3])) {
                    session()->flash('warning', 'Status updated for Approval Awaited successfully');
                }
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
     * Retrieve user data for editing.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editBerthRelatedInformation(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = BerthRelatedInformation::findOrFail($id);
            // dd($editData);
            return view('backend.editBerthRelatedInformation')->with([
                'editData' => $editData,
                // 'stateBoards' => $stateBoards,
            ]);
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editData method: ' . $e->getMessage());

            // Return an error response with a 422 status code
            return response()->json(['error' => 'Error retrieving Edit data. ' . $e->getMessage()], 422);
        }
    }
    /**
     * Retrieve user data for editing.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBerthRelatedInformation(Request $request, $id)
    {
        // dd($request->state_board);
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'port_type' => 'required',
            'port_id' => 'required',
            'state_board' => 'required',
            'type_of_berth' => 'required',
            'no_of_berth' => 'required|numeric',
            'public' => 'required|numeric',
            'ppp' => 'required|numeric',
            'designed_depth' => 'required|numeric',
            'permissible_draft' => 'required|numeric',
            'avg_total_draft' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'port_type.required' => 'The port type field is required.',
            'port_id.required' => 'The port name field is required.',
            'select_month.required' => 'The month selection field is required.',
            'select_year.required' => 'The year selection field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'state_board.required' => 'The state board field is required.',
            'type_of_berth.required' => 'The type of berth field is required.',
            'no_of_berth.required' => 'The number of berth field is required.',
            'public.required' => 'The public field is required.',
            'ppp.required' => 'The ppp field is required.',
            'designed_depth.required' => 'The designed depth field is required.',
            'permissible_draft.required' => 'The permissible draft field is required.',
            'avg_total_draft.required' => 'The average total draft field is required.',
            'no_of_berth.numeric' => 'The number of berth must be a numeric value.',
            'public.numeric' => 'The public field must be a numeric value.',
            'ppp.numeric' => 'The ppp field must be a numeric value.',
            'designed_depth.numeric' => 'The designed depth field must be a numeric value.',
            'permissible_draft.numeric' => 'The permissible draft field must be a numeric value.',
            'avg_total_draft.numeric' => 'The average total draft field must be a numeric value.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        $editResponse = BerthRelatedInformation::find($id);

        // Check if the status is already approved
        if ($editResponse->status == 1) {
            return redirect()->route('backend.view-berth-related-information')->with('warning', 'Record is already approved.');
        }

        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'state_board' => $request->input('state_board'),
            'select_year' => $request->input('select_year'),
            'port_type' => $request->input('port_type'),
            'port_id' => $request->input('port_id'),
            'type_of_berth' => $request->input('type_of_berth'),
            'no_of_berth' => $request->input('no_of_berth'),
            'public' => $request->input('public'),
            'ppp' => $request->input('ppp'),
            'designed_depth' => $request->input('designed_depth'),
            'permissible_draft' => $request->input('permissible_draft'),
            'avg_total_draft' => $request->input('avg_total_draft'),
            'updated_by' => $request->input('updated_by'),
        ]);
        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-berth-related-information')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-berth-related-information')->with('error', 'Failed to update record');
        }
    }
}
