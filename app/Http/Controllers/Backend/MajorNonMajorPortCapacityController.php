<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MNMPortCapacity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;

class MajorNonMajorPortCapacityController extends Controller
{
        /**
     * Display the view for MAJOR/NON MAJOR PORTS AND CAPACITIES.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewMajorNonMajorPortCapacity()
    {
        try {
            // Fetch MAJOR/NON MAJOR PORTS AND Capacity that are not deleted
            $getData = MNMPortCapacity::where('port_type', auth()->user()->port_type)->where('is_deleted', 0)->get()->toArray();
            // dd($getData);
            // Return the view with data
            return view('backend.viewMajorNonMajorPortCapacity', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewMajorNonMajorPortCapacity method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add or update major non-major port capacity details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addMajorNonMajorPortCapacity(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with port information and the select_year
            return view('backend.addMajorNonMajorPortCapacity')->with([
                // 'portTypes' => $portTypes,
                // 'stateBoards' => $stateBoards,
            ]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Add or update major non-major port capacity details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveMajorNonMajorPortCapacity(Request $request)
    {
        // dd($request->input('status'));
        try {
            // Validation rules
            $rules = [
                'port_type' => 'required',
                'state_board' => 'required',
                'port_name' => 'required',
                'capacity' => 'required|numeric',
                'operational' => 'required',
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
            ];

            // Custom error messages
            $customMessages = [
                'port_type.required' => 'The port type field is required.',
                'state_board.required' => 'The state board field is required.',
                'port_name.required' => 'The port name field is required.',
                'capacity.required' => 'The capacity field is required.',
                'capacity.numeric' => 'The capacity be a numeric value.',
                'operational.required' => 'The operational field is required.',
                'select_month.required' => 'The month selection field is required.',
                'select_year.required' => 'The year selection field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
            ];


            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }
            // Check if a record with the specified year, month, port_type, state_board, and port_name already exists
            $recordExists = MNMPortCapacity::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->where('port_type', $request->input('port_type'))
                ->where('state_board', $request->input('state_board'))
                ->where('port_name', $request->input('port_name'))
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
                // For role IDs 4 and 5, set status ID to 1
                $statusID = 1;
            } elseif ($userRoleID == 6) {
                // For role ID 6, set status ID to 3
                $statusID = 3;
            } else {
                // For all other roles, set status ID to null or default value
                $statusID = 3; // Or set a default value as needed
            }

            // If 'id' is set in the request, update the existing record, else create a new record
            $createdResponse = MNMPortCapacity::create([
                'port_type' => $request->input('port_type'),
                'state_board' => $request->input('state_board'),
                'port_name' => $request->input('port_name'),
                'capacity' => $request->input('capacity'),
                'operational' => $request->input('operational'),
                'status' => $statusID,
                'select_month' => $request->input('select_month'),
                'select_year' => $request->input('select_year'),
                'created_by' => $request->input('created_by'),
            ]);

            // dd($createdResponse);

            // Check if the Create was successful
            if ($createdResponse) {
                if (!in_array($createdResponse->status, [1, 2])) {
                    // If the status is not 1 or 2, assume it is Drafted
                    return redirect()->route('backend.view-major-non-major-port-capacity')->with('success', 'Record is Drafted successfully');
                } else {
                    // If the status is 1 or 2, assume it is Created successfully
                    return redirect()->route('backend.view-major-non-major-port-capacity')->with('success', 'Record Created successfully');
                }
            } else {
                // If the create operation was unsuccessful
                return redirect()->route('backend.view-major-non-major-port-capacity')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveMajorNonMajorPortCapacity method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Update the status of view-major-non-major-port-capacity records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
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
            $getData = MNMPortCapacity::where('id', $request->rowid)
                ->where('select_month', $request->select_month)
                ->get()->toArray();

            // dd($getData);
            // if ($request->status != 3) {
            //     session()->flash('warning', 'Status Not update Because Data is Not Submit');
            //     return response()->json(['status' => 'error']);

            // } else {
            //     dd('dd');
            // }

            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = MNMPortCapacity::find($data['id']);
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
    public function editMajorNonMajorPortCapacity(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = MNMPortCapacity::findOrFail($id);

            // Return the edit data in a JSON response
            // return response()->json($editData);
            return view('backend.editMajorNonMajorPortCapacity')->with([
                'editData' => $editData,
                // 'stateBoards' => $stateBoards,
            ]);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editUser method: ' . $e->getMessage());

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
    public function updateMajorNonMajorPortCapacity(Request $request, $id)
    {
        // dd($request->all());
        // Validation rules
        $rules = [
            'port_type' => 'required',
            'state_board' => 'required',
            'port_name' => 'required',
            'capacity' => 'required|numeric',
            'operational' => 'required',
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
        ];

        // Custom error messages
        $customMessages = [
            'port_type.required' => 'The port type field is required.',
            'state_board.required' => 'The state board field is required.',
            'port_name.required' => 'The port name field is required.',
            'capacity.required' => 'The capacity field is required.',
            'capacity.numeric' => 'The capacity be a numeric value.',
            'operational.required' => 'The operational field is required.',
            'select_month.required' => 'The month selection field is required.',
            'select_year.required' => 'The year selection field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        // Check if the record is found
        $editResponse = MNMPortCapacity::find($id);

        // Check if the status is already approved
        if ($editResponse->status == 1) {
            return redirect()->route('backend.view-major-non-major-port-capacity')->with('warning', 'Record is already approved.');
        }

        $editResponse->update([
            'port_type' => $request->input('port_type'),
            'state_board' => $request->input('state_board'),
            'port_name' => $request->input('port_name'),
            'capacity' => $request->input('capacity'),
            'operational' => $request->input('operational'),
            'select_month' => $request->input('select_month'),
            'select_year' => $request->input('select_year'),
            'status' => $request->input('status'),
            'updated_by' => $request->input('updated_by'),
        ]);
        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-major-non-major-port-capacity')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-major-non-major-port-capacity')->with('error', 'Failed to update record');
        }
    }
}
