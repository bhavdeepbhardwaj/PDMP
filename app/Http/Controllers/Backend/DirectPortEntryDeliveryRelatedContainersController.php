<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DirectPortEntryDeliveryRelatedContainers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;

class DirectPortEntryDeliveryRelatedContainersController extends Controller
{
    /**
     * Display the view for view Berth Related Information.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewDirectPortEntryDeliveryRelatedContainers()
    {
        try {
            // Fetch view Direct Port Entry Delivery Related Containers that are not deleted
            $getData = DirectPortEntryDeliveryRelatedContainers::where('port_type', auth()->user()->port_type)->where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewDirectPortEntryDeliveryRelatedContainers', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewDirectPortEntryDeliveryRelatedContainers method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Direct Port Entry Delivery Related Containers details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addDirectPortEntryDeliveryRelatedContainers(Request $request)
    {
        try {
            // Your logic goes here...

            // Return the view with Direct Port Entry Delivery Related Containers and the select_year
            return view('backend.addDirectPortEntryDeliveryRelatedContainers');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Direct Port Entry Delivery Related Containers
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDirectPortEntryDeliveryRelatedContainers(Request $request)
    {
        try {
            // dd($request->all());
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'port_type' => 'required',
                'port_id' => 'required',
                'state_board' => 'required',
                'containers' => 'required|numeric',
                'direct_port_entry_of_teu' => 'required|numeric',
                'direct_port_delivery' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'port_type.required' => 'The port type field is required.',
                'port_id.required' => 'The port name field is required.',
                'state_board.required' => 'The state board field is required.',
                'select_month.required' => 'The month selection field is required.',
                'select_year.required' => 'The year selection field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'containers.required' => 'The containers field is required.',
                'containers.required' => 'The containers field is required.',
                'direct_port_entry_of_teu.required' => 'The direct port entry of teu field is required.',
                'direct_port_entry_of_teu.numeric' => 'The direct port entry of teu field must be a numeric value.',
                'direct_port_delivery.required' => 'The direct port delivery field is required.',
                'direct_port_delivery.numeric' => 'The direct port delivery field must be a numeric value.',
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
            $recordExists = DirectPortEntryDeliveryRelatedContainers::where('select_year', $request->input('select_year'))
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

            // If 'id' is set in the request, update the existing record, else create a new record
            $createdResponse = DirectPortEntryDeliveryRelatedContainers::create([
                'select_month' => $request->input('select_month'),
                'state_board' => $request->input('state_board'),
                'select_year' => $request->input('select_year'),
                'port_type' => $request->input('port_type'),
                'port_id' => $request->input('port_id'),
                'containers' => $request->input('containers'),
                'direct_port_entry_of_teu' => $request->input('direct_port_entry_of_teu'),
                'direct_port_delivery' => $request->input('direct_port_delivery'),
                'status' => $statusID,
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
                    'Record Created successfully' :
                    'Record is Drafted successfully';

                return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('success', $message);
            } else {
                return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveDirectPortEntryDeliveryRelatedContainers method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    /**
     * Update the status of Direct Port Entry Delivery Related Containers records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusDirectPortEntryDeliveryRelatedContainers(Request $request)
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
            $getData = DirectPortEntryDeliveryRelatedContainers::where('id', $request->rowid)
                ->where('select_month', $request->select_month)
                ->get()->toArray();
            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = DirectPortEntryDeliveryRelatedContainers::find($data['id']);
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
     * Retrieve user data for editing Direct Port Entry Delivery Related Containers.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editDirectPortEntryDeliveryRelatedContainers(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = DirectPortEntryDeliveryRelatedContainers::findOrFail($id);
            // dd($editData);
            return view('backend.editDirectPortEntryDeliveryRelatedContainers')->with([
                'editData' => $editData,
                // 'stateBoards' => $stateBoards,
            ]);
            // Return the edit data in a JSON response
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
    public function updateDirectPortEntryDeliveryRelatedContainers(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'port_type' => 'required',
            'port_id' => 'required',
            'state_board' => 'required',
            'containers' => 'required|numeric',
            'direct_port_entry_of_teu' => 'required|numeric',
            'direct_port_delivery' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'port_type.required' => 'The port type field is required.',
            'port_id.required' => 'The port name field is required.',
            'state_board.required' => 'The state board field is required.',
            'select_month.required' => 'The month selection field is required.',
            'select_year.required' => 'The year selection field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'containers.required' => 'The containers field is required.',
            'containers.required' => 'The containers field is required.',
            'direct_port_entry_of_teu.required' => 'The direct port entry of teu field is required.',
            'direct_port_entry_of_teu.numeric' => 'The direct port entry of teu field must be a numeric value.',
            'direct_port_delivery.required' => 'The direct port delivery field is required.',
            'direct_port_delivery.numeric' => 'The direct port delivery field must be a numeric value.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        $editResponse = DirectPortEntryDeliveryRelatedContainers::find($id);


        // Check if the status is already approved
        if ($editResponse->status == 1) {
            return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('warning', 'Record is already approved.');
        }
        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'state_board' => $request->input('state_board'),
            'select_year' => $request->input('select_year'),
            'port_type' => $request->input('port_type'),
            'port_id' => $request->input('port_id'),
            'containers' => $request->input('containers'),
            'direct_port_entry_of_teu' => $request->input('direct_port_entry_of_teu'),
            'direct_port_delivery' => $request->input('direct_port_delivery'),
            'updated_by' => $request->input('updated_by'),
        ]);

        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('error', 'Failed to update record');
        }
    }
}
