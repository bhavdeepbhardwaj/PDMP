<?php


namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmploymentDockLabourBoardsMajorPort;
use App\Models\PortCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Auth;

class EmploymentDockLabourBoardsMajorPortController extends Controller
{
    /**
     * Get specific port types based on their IDs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataPortTypes()
    {
        // Retrieve port types with IDs 1 and 2 from the database
        $portTypes = PortCategory::whereIn('id', [1])->get();

        // Return the port types as a JSON response
        return response()->json(['portTypes' => $portTypes]);
    }
    /**
     * Display the view for Employment Dock Labour Boards Major Port
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewEmploymentDockLabourBoardsMajorPort()
    {
        try {
            // Fetch Employment Dock Labour Boards Major Port that are not deleted
            $getData = EmploymentDockLabourBoardsMajorPort::where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewEmploymentDockLabourBoardsMajorPort', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewEmploymentDockLabourBoardsMajorPort method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Employment Employment Dock Labour Boards Major Port details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addEmploymentDockLabourBoardsMajorPort(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with Employment Employment Dock Labour Boards Major Port and the select_year
            return view('backend.addEmploymentDockLabourBoardsMajorPort');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Employment Dock Labour Boards Major Port
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveEmploymentDockLabourBoardsMajorPort(Request $request)
    {
        try {
            // dd($request->all());
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'port_type' => 'required',
                // 'state_board' => 'required',
                'port_id' => 'required',
                'class_1' => 'required|numeric',
                'class_2' => 'required|numeric',
                'class_3' => 'required|numeric',
                'class_4' => 'required|numeric',
                'total' => 'required|numeric',
                'registered' => 'required|numeric',
                'listed' => 'required|numeric',
                'others' => 'required|numeric',
                'dwtotal' => 'required|numeric',
                'grandTotal' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'select_month.required' => 'The month selection field is required.',
                'port_type.required' => 'The port type field is required.',
                // 'state_board.required' => 'The state board field is required.',
                'port_id.required' => 'The port Name field is required.',
                'class_1.required' => 'The class 1 field is required.',
                'class_2.required' => 'The class 2 field is required.',
                'class_3.required' => 'The class 3 field is required.',
                'class_4.required' => 'The class 4 field is required.',
                'total.required' => 'The DLB Employment Total field is required.',
                'registered.required' => 'The registered field is required.',
                'listed.required' => 'The listed field is required.',
                'others.required' => 'The others field is required.',
                'dwtotal.required' => 'The Dock Workers Total field is required.',
                'grandTotal.required' => 'The Grand Total field is required.',
                'class_1.required' => 'The class 1 field must be a numeric value.',
                'class_2.required' => 'The class 2 field must be a numeric value.',
                'class_3.required' => 'The class 3 field must be a numeric value.',
                'class_4.required' => 'The class 4 field must be a numeric value.',
                'total.required' => 'The DLB Employment Total field must be a numeric value.',
                'registered.required' => 'The registered field must be a numeric value.',
                'listed.required' => 'The listed field must be a numeric value.',
                'others.required' => 'The others field must be a numeric value.',
                'dwtotal.required' => 'The Dock Workers Total field must be a numeric value.',
                'grandTotal.required' => 'The Grand Total field is required.',
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
            $recordExists = EmploymentDockLabourBoardsMajorPort::where('select_year', $request->input('select_year'))
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

            $createdResponse = EmploymentDockLabourBoardsMajorPort::create([
                'select_year' => $request->input('select_year'),
                'select_month' => $request->input('select_month'),
                'port_type' => $request->input('port_type'),
                // 'state_board' => $request->input('state_board'),
                'port_id' => $request->input('port_id'),
                'class_1' => $request->input('class_1'),
                'class_2' => $request->input('class_2'),
                'class_3' => $request->input('class_3'),
                'class_4' => $request->input('class_4'),
                'total' => $request->input('total'),
                'registered' => $request->input('registered'),
                'listed' => $request->input('listed'),
                'others' => $request->input('others'),
                'dwtotal' => $request->input('dwtotal'),
                'grandTotal' => $request->input('grandTotal'),
                'status' => $statusID,
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                $message = ($createdResponse->status === 1 || $createdResponse->status === 2) ?
                    'Record Created successfully' :
                    'Record is Drafted successfully';

                return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('success', $message);
            } else {
                return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveEmploymentDockLabourBoardsMajorPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Update the status of Employment Dock Labour Boards Major Port records based on the specified conditions.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatusEmploymentDockLabourBoardsMajorPort(Request $request)
    {
        try {
            // dd($request->all());
            // Validate the incoming request
            $request->validate([
                'select_month' => 'required',
                'rowid' => 'required|numeric',
                'status' => 'required|in:1,2,3',
            ]);

            // Find view-Employment Dock Labour Boards Major Port records based on the specified conditions
            $getData = EmploymentDockLabourBoardsMajorPort::where('id', $request->rowid)
                ->where('select_month', $request->select_month)
                ->get()->toArray();
            // Check if records are found
            if (!empty($getData)) {
                // Update the status and user ID in the database
                foreach ($getData as $data) {
                    $portData = EmploymentDockLabourBoardsMajorPort::find($data['id']);
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
     * Retrieve user data for editing Employment Dock Labour Boards Major Port
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editEmploymentDockLabourBoardsMajorPort(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = EmploymentDockLabourBoardsMajorPort::findOrFail($id);
            // dd($editData);
            // Return the edit data in a JSON response
            return view('backend.editEmploymentDockLabourBoardsMajorPort')->with([
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
     * Retrieve Employment Dock Labour Boards Major Port for editing.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateEmploymentDockLabourBoardsMajorPort(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'port_type' => 'required',
            // 'state_board' => 'required',
            'port_id' => 'required',
            'class_1' => 'required|numeric',
            'class_2' => 'required|numeric',
            'class_3' => 'required|numeric',
            'class_4' => 'required|numeric',
            'total' => 'required|numeric',
            'registered' => 'required|numeric',
            'listed' => 'required|numeric',
            'others' => 'required|numeric',
            'dwtotal' => 'required|numeric',
            'grandTotal' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'select_month.required' => 'The month selection field is required.',
            'port_type.required' => 'The port type field is required.',
            // 'state_board.required' => 'The state board field is required.',
            'port_id.required' => 'The port Name field is required.',
            'class_1.required' => 'The class 1 field is required.',
            'class_2.required' => 'The class 2 field is required.',
            'class_3.required' => 'The class 3 field is required.',
            'class_4.required' => 'The class 4 field is required.',
            'total.required' => 'The DLB Employment Total field is required.',
            'registered.required' => 'The registered field is required.',
            'listed.required' => 'The listed field is required.',
            'others.required' => 'The others field is required.',
            'dwtotal.required' => 'The Dock Workers Total field is required.',
            'grandTotal.required' => 'The Grand Total field is required.',
            'class_1.required' => 'The class 1 field must be a numeric value.',
            'class_2.required' => 'The class 2 field must be a numeric value.',
            'class_3.required' => 'The class 3 field must be a numeric value.',
            'class_4.required' => 'The class 4 field must be a numeric value.',
            'total.required' => 'The DLB Employment Total field must be a numeric value.',
            'registered.required' => 'The registered field must be a numeric value.',
            'listed.required' => 'The listed field must be a numeric value.',
            'others.required' => 'The others field must be a numeric value.',
            'dwtotal.required' => 'The Dock Workers Total field must be a numeric value.',
            'grandTotal.required' => 'The Grand Total field is required.',
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

        $editResponse = EmploymentDockLabourBoardsMajorPort::find($id);

        // Check if the status is already approved
        if ($editResponse->status == 1) {
            return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('warning', 'Record is already approved.');
        }

        $editResponse->update([
            'select_year' => $request->input('select_year'),
            'select_month' => $request->input('select_month'),
            'port_type' => $request->input('port_type'),
            // 'state_board' => $request->input('state_board'),
            'port_id' => $request->input('port_id'),
            'class_1' => $request->input('class_1'),
            'class_2' => $request->input('class_2'),
            'class_3' => $request->input('class_3'),
            'class_4' => $request->input('class_4'),
            'total' => $request->input('total'),
            'registered' => $request->input('registered'),
            'listed' => $request->input('listed'),
            'others' => $request->input('others'),
            'dwtotal' => $request->input('dwtotal'),
            'grandTotal' => $request->input('grandTotal'),
            'status' => $request->input('status'),
            'updated_by' => $request->input('updated_by'),
        ]);
        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('error', 'Failed to update record');
        }
    }
}
