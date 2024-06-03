<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\EmploymentMajorPort;



class EmploymentMajorPortsController extends Controller
{
    /**
     * Display the view for Employment Major Ports
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewEmploymentMajorPorts()
    {
        try {
            // Fetch Employment Major Ports that are not deleted
            $getData = EmploymentMajorPort::where('port_type', auth()->user()->port_type)->where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewEmploymentMajorPorts', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewEmploymentMajorPorts method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Employment Major Ports details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addEmploymentMajorPorts(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with Employment Major Ports and the select_year
            return view('backend.addEmploymentMajorPorts');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Employment Major Ports
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveEmploymentMajorPorts(Request $request)
    {
        try {
            // dd($request->all(), $request->input('created_by'));

            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'port_type' => 'required',
                'port_id' => 'required',
                'class_1' => 'required|numeric',
                'class_2' => 'required|numeric',
                'class_3' => 'required|numeric',
                'class_4' => 'required|numeric',
                'class_5' => 'required|numeric',
                'class_6' => 'required|numeric',
                'class_7' => 'required|numeric',
                'shore_wrk' => 'required|numeric',
                'casual_work' => 'required|numeric',
                'total' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'select_month.required' => 'The month selection field is required.',
                'select_year.required' => 'The year selection field is required.',
                'port_type.required' => 'The port type field is required.',
                'port_id.required' => 'The port Name field is required.',
                'class_1.required' => 'The class 1 field is required.',
                'class_2.required' => 'The class 2 field is required.',
                'class_3.required' => 'The class 3 field is required.',
                'class_4.required' => 'The class 4 field is required.',
                'class_5.required' => 'The class 5 field is required.',
                'class_6.required' => 'The class 6 field is required.',
                'class_7.required' => 'The class 7 field is required.',
                'shore_wrk.required' => 'The shore work field is required.',
                'casual_work.required' => 'The casual work field is required.',
                'total.required' => 'The total field is required.',
                'class_1.numeric' => 'The class 1 field must be a numeric value.',
                'class_2.numeric' => 'The class 2 field must be a numeric value.',
                'class_3.numeric' => 'The class 3 field must be a numeric value.',
                'class_4.numeric' => 'The class 4 field must be a numeric value.',
                'class_5.numeric' => 'The class 5 field must be a numeric value.',
                'class_6.numeric' => 'The class 6 field must be a numeric value.',
                'class_7.numeric' => 'The class 7 field must be a numeric value.',
                'shore_wrk.numeric' => 'The shore work field must be a numeric value.',
                'casual_work.numeric' => 'The casual work field must be a numeric value.',
                'total.numeric' => 'The total field must be a numeric value.',
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

            // Check if a record with the specified year and month already exists
            $recordExists = EmploymentMajorPort::where('select_year', $request->input('select_year'))
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
                // For role IDs 4 and 5, set status ID to 1
                $statusID = 1;
            } elseif ($userRoleID == 6) {
                // For role ID 6, set status ID to 3
                $statusID = 3;
            } else {
                // For all other roles, set status ID to null or default value
                $statusID = 3; // Or set a default value as needed
            }

            $createdResponse = EmploymentMajorPort::create([
                'select_year' => $request->input('select_year'),
                'select_month' => $request->input('select_month'),
                'port_type' => $request->input('port_type'),
                'port_id' => $request->input('port_id'),
                'class_1' => $request->input('class_1'),
                'class_2' => $request->input('class_2'),
                'class_3' => $request->input('class_3'),
                'class_4' => $request->input('class_4'),
                'class_5' => $request->input('class_5'),
                'class_6' => $request->input('class_6'),
                'class_7' => $request->input('class_7'),
                'shore_wrk' => $request->input('shore_wrk'),
                'casual_work' => $request->input('casual_work'),
                'total' => $request->input('total'),
                'status' => $statusID,
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
                    'Record Created successfully' :
                    'Record is Drafted successfully';

                return redirect()->route('backend.view-employment-major-ports')->with('success', $message);
            } else {
                return redirect()->route('backend.view-employment-major-ports')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveEmploymentMajorPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Update the status of EmploymentMajorPorts records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusEmploymentMajorPorts(Request $request)
    {
        try {
            // dd($request->all());
            // Validate the incoming request
            $request->validate([
                'select_month' => 'required',
                'rowid' => 'required|numeric',
                'status' => 'required|in:1,2,3',
            ]);

            // Find view-EmploymentMajorPorts records based on the specified conditions
            $getData = EmploymentMajorPort::where('id', $request->rowid)
                ->where('select_month', $request->select_month)
                ->get()->toArray();
            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = EmploymentMajorPort::find($data['id']);
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
     * Retrieve user data for editing Employment Major Ports
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editEmploymentMajorPorts(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = EmploymentMajorPort::findOrFail($id);
            // dd($editData);
            // Return the edit data in a JSON response
            return view('backend.editEmploymentMajorPorts')->with([
                'editData' => $editData,
            ]);
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editEmploymentMajorPort method: ' . $e->getMessage());

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
    public function updateEmploymentMajorPorts(Request $request, $id)
    {
        // Validation rules
        // dd($request->all(), $request->input('status'));
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'port_type' => 'required',
            'port_id' => 'required',
            'class_1' => 'required|numeric',
            'class_2' => 'required|numeric',
            'class_3' => 'required|numeric',
            'class_4' => 'required|numeric',
            'class_5' => 'required|numeric',
            'class_6' => 'required|numeric',
            'class_7' => 'required|numeric',
            'shore_wrk' => 'required|numeric',
            'casual_work' => 'required|numeric',
            'total' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'select_month.required' => 'The month selection field is required.',
            'select_year.required' => 'The year selection field is required.',
            'port_type.required' => 'The port type field is required.',
            'port_id.required' => 'The port Name field is required.',
            'class_1.required' => 'The class 1 field is required.',
            'class_2.required' => 'The class 2 field is required.',
            'class_3.required' => 'The class 3 field is required.',
            'class_4.required' => 'The class 4 field is required.',
            'class_5.required' => 'The class 5 field is required.',
            'class_6.required' => 'The class 6 field is required.',
            'class_7.required' => 'The class 7 field is required.',
            'shore_wrk.required' => 'The shore work field is required.',
            'casual_work.required' => 'The casual work field is required.',
            'total.required' => 'The total field is required.',
            'class_1.numeric' => 'The class 1 field must be a numeric value.',
            'class_2.numeric' => 'The class 2 field must be a numeric value.',
            'class_3.numeric' => 'The class 3 field must be a numeric value.',
            'class_4.numeric' => 'The class 4 field must be a numeric value.',
            'class_5.numeric' => 'The class 5 field must be a numeric value.',
            'class_6.numeric' => 'The class 6 field must be a numeric value.',
            'class_7.numeric' => 'The class 7 field must be a numeric value.',
            'shore_wrk.numeric' => 'The shore work field must be a numeric value.',
            'casual_work.numeric' => 'The casual work field must be a numeric value.',
            'total.numeric' => 'The total field must be a numeric value.',
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

        $editResponse = EmploymentMajorPort::find($id);

        // Check if the status is already approved
        if ($editResponse->status == 1) {
            return redirect()->route('backend.view-employment-major-ports')->with('warning', 'Record is already approved.');
        }

        $editResponse->update([
            'select_year' => $request->input('select_year'),
            'select_month' => $request->input('select_month'),
            'port_type' => $request->input('port_type'),
            'port_id' => $request->input('port_id'),
            'class_1' => $request->input('class_1'),
            'class_2' => $request->input('class_2'),
            'class_3' => $request->input('class_3'),
            'class_4' => $request->input('class_4'),
            'class_5' => $request->input('class_5'),
            'class_6' => $request->input('class_6'),
            'class_7' => $request->input('class_7'),
            'shore_wrk' => $request->input('shore_wrk'),
            'casual_work' => $request->input('casual_work'),
            'total' => $request->input('total'),
            'status' => $request->input('status'),
            'updated_by' => $request->input('updated_by'),
        ]);
        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-employment-major-ports')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-employment-major-ports')->with('error', 'Failed to update record');
        }
    }
}
