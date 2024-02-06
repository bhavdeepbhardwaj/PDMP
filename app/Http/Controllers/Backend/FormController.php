<?php


namespace App\Http\Controllers\Backend;

use DateTime;
use App\Models\Port;
use App\Models\StateBoard;
use App\Models\PortCategory;
use Illuminate\Http\Request;
use App\Models\CruiseTourism;
use App\Models\IndianTonnage;
use App\Models\MNMPortCapacity;
use App\Models\EmploymentMajorPort;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\SeafarersInformation;
use App\Models\BerthRelatedInformation;
use Illuminate\Support\Facades\Validator;
use App\Models\NationalWaterwaysInformation;
use App\Models\EmploymentDockLabourBoardsMajorPort;
use App\Models\DirectPortEntryDeliveryRelatedContainers;


class FormController extends Controller
{
    /**
     * Get specific port types based on their IDs.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPortTypes()
    {
        // Retrieve port types with IDs 1 and 2 from the database
        $portTypes = PortCategory::whereIn('id', [1, 2])->get();

        // Return the port types as a JSON response
        return response()->json(['portTypes' => $portTypes]);
    }
    /**
     * Get all state boards.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStateBoards()
    {
        // Retrieve all state boards from the database
        $stateBoards = StateBoard::all();

        // Return the state boards as a JSON response
        return response()->json(['stateBoards' => $stateBoards]);
    }
    /**
     * Get ports based on the specified criteria.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPorts(Request $request)
    {
        // Uncomment the line below for debugging purposes
        // dd($request->all());

        // Check if 'port_type' is set in the request and equal to 1
        if (isset($request['port_type']) && $request['port_type'] == 1) {
            // Retrieve ports based on 'port_type'
            $query = Port::where('port_type', $request->port_type)->get();
        } else {
            // Retrieve ports based on 'state_board'
            $query = Port::where('states_board_id', $request->state_board)->get();
        }

        // Return the result as a JSON response
        return response()->json(['ports' => $query]);
    }
    /**
     * Display the view for MAJOR/NON MAJOR PORTS AND CAPACITIES.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewMajorNonMajorPortCapacity()
    {
        try {
            // Fetch MAJOR/NON MAJOR PORTS AND Capacity that are not deleted
            $getData = MNMPortCapacity::where('is_deleted', 0)->get()->toArray();

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
            // $portTypes = PortCategory::whereIn('id', [1, 2])->get()->toArray();
            // dd($portTypes);
            // $stateBoards = StateBoard::all();

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
        // dd($request->all());
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

            // Check if a record with the specified year and month already exists
            $recordExists = MNMPortCapacity::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            // If 'id' is set in the request, update the existing record, else create a new record
            // dd($request->all());
            $createdResponse = MNMPortCapacity::create([
                'port_type' => $request->input('port_type'),
                'state_board' => $request->input('state_board'),
                'port_name' => $request->input('port_name'),
                'capacity' => $request->input('capacity'),
                'operational' => $request->input('operational'),
                'select_month' => $request->input('select_month'),
                'select_year' => $request->input('select_year'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-major-non-major-port-capacity')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-major-non-major-port-capacity')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveMajorNonMajorPortCapacity method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
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

        $editResponse = MNMPortCapacity::find($id);

        $editResponse->update([
            'port_type' => $request->input('port_type'),
            'state_board' => $request->input('state_board'),
            'port_name' => $request->input('port_name'),
            'capacity' => $request->input('capacity'),
            'operational' => $request->input('operational'),
            'select_month' => $request->input('select_month'),
            'select_year' => $request->input('select_year'),
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
    // ******************************************************
    // ******************************************************
    // ******************************************************
    // ******************************************************
    /**
     * Display the view for Berth Related Information.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewBerthRelatedInformation()
    {
        try {
            // Fetch Berth Related Information that are not deleted
            $getData = BerthRelatedInformation::where('is_deleted', 0)->get()->toArray();
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
            // dd($request->all());
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

            // Check if a record with the specified year and month already exists
            $recordExists = BerthRelatedInformation::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

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
                'designed_depth' => $request->input('designed_depth'),
                'permissible_draft' => $request->input('permissible_draft'),
                'avg_total_draft' => $request->input('avg_total_draft'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-berth-related-information')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-berth-related-information')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveBerthRelatedInformation method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
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
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for view Berth Related Information.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewDirectPortEntryDeliveryRelatedContainers()
    {
        try {
            // Fetch view Direct Port Entry Delivery Related Containers that are not deleted
            $getData = DirectPortEntryDeliveryRelatedContainers::where('is_deleted', 0)->get()->toArray();
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

            // Check if a record with the specified year and month already exists
            $recordExists = DirectPortEntryDeliveryRelatedContainers::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
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
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-direct-port-entry-delivery-related-containers')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveDirectPortEntryDeliveryRelatedContainers method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
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
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Cruise Tourism
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewCruiseTourism()
    {
        try {
            // Fetch Cruise Tourism that are not deleted
            $getData = CruiseTourism::where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewCruiseTourism', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewCruiseTourism method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Cruise Tourism details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCruiseTourism(Request $request)
    {
        try {
            // Your logic goes here...

            // Return the view with Cruise Tourism and the select_year
            return view('backend.addCruiseTourism');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Cruise Tourism
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveCruiseTourism(Request $request)
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
                'no_of_cruise_terminals' => 'required|numeric',
                'total_cruise_calls' => 'required|numeric',
                'no_of_cruise_passengers' => 'required|numeric',
                'cruise_berth_charges' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'port_type.required' => 'The port type field is required.',
                'port_id.required' => 'The port name field is required.',
                'select_year.required' => 'The year selection field is required.',
                'select_month.required' => 'The month selection field is required.',
                'state_board.required' => 'The state board field is required.',
                'no_of_cruise_terminals.required' => 'The number of cruise terminals field is required.',
                'total_cruise_calls.required' => 'The total cruise calls field is required.',
                'no_of_cruise_passengers.required' => 'The number of cruise passengers field is required.',
                'cruise_berth_charges.required' => 'The cruise berth charges field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'no_of_cruise_terminals.numeric' => 'The number of cruise terminals field must be a numeric value.',
                'total_cruise_calls.numeric' => 'The total cruise calls field must be a numeric value.',
                'no_of_cruise_passengers.numeric' => 'The number of cruise passengers field must be a numeric value.',
                'cruise_berth_charges.numeric' => 'The cruise berth charges field must be a numeric value.',
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
            $recordExists = CruiseTourism::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            // If 'id' is set in the request, update the existing record, else create a new record
            $createdResponse = CruiseTourism::create([
                'select_month' => $request->input('select_month'),
                'state_board' => $request->input('state_board'),
                'select_year' => $request->input('select_year'),
                'port_type' => $request->input('port_type'),
                'port_id' => $request->input('port_id'),
                'no_of_cruise_terminals' => $request->input('no_of_cruise_terminals'),
                'total_cruise_calls' => $request->input('total_cruise_calls'),
                'no_of_cruise_passengers' => $request->input('no_of_cruise_passengers'),
                'cruise_berth_charges' => $request->input('cruise_berth_charges'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-cruise-tourism')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-cruise-tourism')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveCruiseTourism method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Retrieve user data for editing Cruise Tourism.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editCruiseTourism(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = CruiseTourism::findOrFail($id);
            // dd($editData);
            return view('backend.editCruiseTourism')->with([
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
    public function updateCruiseTourism(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'port_type' => 'required',
            'port_id' => 'required',
            'state_board' => 'required',
            'no_of_cruise_terminals' => 'required|numeric',
            'total_cruise_calls' => 'required|numeric',
            'no_of_cruise_passengers' => 'required|numeric',
            'cruise_berth_charges' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'port_type.required' => 'The port type field is required.',
            'port_id.required' => 'The port name field is required.',
            'select_year.required' => 'The year selection field is required.',
            'select_month.required' => 'The month selection field is required.',
            'state_board.required' => 'The state board field is required.',
            'no_of_cruise_terminals.required' => 'The number of cruise terminals field is required.',
            'total_cruise_calls.required' => 'The total cruise calls field is required.',
            'no_of_cruise_passengers.required' => 'The number of cruise passengers field is required.',
            'cruise_berth_charges.required' => 'The cruise berth charges field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'no_of_cruise_terminals.numeric' => 'The number of cruise terminals field must be a numeric value.',
            'total_cruise_calls.numeric' => 'The total cruise calls field must be a numeric value.',
            'no_of_cruise_passengers.numeric' => 'The number of cruise passengers field must be a numeric value.',
            'cruise_berth_charges.numeric' => 'The cruise berth charges field must be a numeric value.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        $editResponse = CruiseTourism::find($id);

        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'state_board' => $request->input('state_board'),
            'select_year' => $request->input('select_year'),
            'port_type' => $request->input('port_type'),
            'port_id' => $request->input('port_id'),
            'no_of_cruise_terminals' => $request->input('no_of_cruise_terminals'),
            'total_cruise_calls' => $request->input('total_cruise_calls'),
            'no_of_cruise_passengers' => $request->input('no_of_cruise_passengers'),
            'cruise_berth_charges' => $request->input('cruise_berth_charges'),
            'updated_by' => $request->input('updated_by'),
        ]);

        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-cruise-tourism')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-cruise-tourism')->with('error', 'Failed to update record');
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for National Waterways Information
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewNationalWaterwaysInformation()
    {
        try {
            // Fetch National Waterways Information that are not deleted
            $getData = NationalWaterwaysInformation::where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewNationalWaterwaysInformation', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewNationalWaterwaysInformation method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add National Waterways Information details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addNationalWaterwaysInformation(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with National Waterways Information and the select_year
            return view('backend.addNationalWaterwaysInformation');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save National Waterways Information
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveNationalWaterwaysInformation(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'national_waterway_no' => 'required|numeric',
                'length_km' => 'required|numeric',
                'details_of_waterways' => 'required',
                'cargo_moved' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'select_year.required' => 'The year selection field is required.',
                'select_month.required' => 'The month selection field is required.',
                'national_waterway_no.required' => 'The national waterway number field is required.',
                'length_km.required' => 'The length in kilometers field is required.',
                'details_of_waterways.required' => 'The details of waterways field is required.',
                'cargo_moved.required' => 'The cargo moved field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'national_waterway_no.numeric' => 'The national waterway number field must be a numeric value.',
                'length_km.numeric' => 'The length in kilometers field must be a numeric value.',
                // 'details_of_waterways.numeric' => 'The details of waterways field must be a numeric value.',
                'cargo_moved.numeric' => 'The cargo moved field must be a numeric value.',
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
            $recordExists = NationalWaterwaysInformation::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            // If 'id' is set in the request, update the existing record, else create a new record
            $createdResponse = NationalWaterwaysInformation::create([
                'select_month' => $request->input('select_month'),
                'select_year' => $request->input('select_year'),
                'national_waterway_no' => $request->input('national_waterway_no'),
                'length_km' => $request->input('length_km'),
                'details_of_waterways' => $request->input('details_of_waterways'),
                'cargo_moved' => $request->input('cargo_moved'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-national-waterways-information')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-national-waterways-information')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveNationalWaterwaysInformation method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Retrieve user data for editing National Waterways Information
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editNationalWaterwaysInformation(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = NationalWaterwaysInformation::findOrFail($id);
            // dd($editData);
            return view('backend.editNationalWaterwaysInformation')->with([
                'editData' => $editData,
                // 'stateBoards' => $stateBoards,
            ]);
            // Return the edit data in a JSON response
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editNationalWaterwaysInformation method: ' . $e->getMessage());

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
    public function updateNationalWaterwaysInformation(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'national_waterway_no' => 'required|numeric',
            'length_km' => 'required|numeric',
            'details_of_waterways' => 'required',
            'cargo_moved' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'select_year.required' => 'The year selection field is required.',
            'select_month.required' => 'The month selection field is required.',
            'national_waterway_no.required' => 'The national waterway number field is required.',
            'length_km.required' => 'The length in kilometers field is required.',
            'details_of_waterways.required' => 'The details of waterways field is required.',
            'cargo_moved.required' => 'The cargo moved field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'national_waterway_no.numeric' => 'The national waterway number field must be a numeric value.',
            'length_km.numeric' => 'The length in kilometers field must be a numeric value.',
            // 'details_of_waterways.numeric' => 'The details of waterways field must be a numeric value.',
            'cargo_moved.numeric' => 'The cargo moved field must be a numeric value.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        $editResponse = NationalWaterwaysInformation::find($id);

        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'select_year' => $request->input('select_year'),
            'national_waterway_no' => $request->input('national_waterway_no'),
            'length_km' => $request->input('length_km'),
            'details_of_waterways' => $request->input('details_of_waterways'),
            'cargo_moved' => $request->input('cargo_moved'),
            'updated_by' => $request->input('updated_by'),
        ]);

        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-national-waterways-information')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-national-waterways-information')->with('error', 'Failed to update record');
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Indian Tonnage
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewIndianTonnage()
    {
        try {
            // Fetch Indian Tonnage that are not deleted
            $getData = IndianTonnage::where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewIndianTonnage', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewIndianTonnage method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Indian Tonnage details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addIndianTonnage(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with Indian Tonnage and the select_year
            return view('backend.addIndianTonnage');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Indian Tonnage
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveIndianTonnage(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'trade' => 'required',
                'no_of_ships' => 'required|numeric',
                'gross_tonnage' => 'required|numeric',
                'dead_weight_tonnage' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'select_year.required' => 'The year selection field is required.',
                'select_month.required' => 'The month selection field is required.',
                'trade.required' => 'The trade field is required.',
                'no_of_ships.required' => 'The number of ships field is required.',
                'gross_tonnage.required' => 'The gross tonnage field is required.',
                'dead_weight_tonnage.required' => 'The dead weight tonnage field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'no_of_ships.numeric' => 'The number of ships field must be a numeric value.',
                'gross_tonnage.numeric' => 'The gross tonnage field must be a numeric value.',
                'dead_weight_tonnage.numeric' => 'The dead weight tonnage field must be a numeric value.',
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
            $recordExists = IndianTonnage::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            // If 'id' is set in the request, update the existing record, else create a new record
            $createdResponse = IndianTonnage::create([
                'select_month' => $request->input('select_month'),
                'select_year' => $request->input('select_year'),
                'trade' => $request->input('trade'),
                'no_of_ships' => $request->input('no_of_ships'),
                'gross_tonnage' => $request->input('gross_tonnage'),
                'dead_weight_tonnage' => $request->input('dead_weight_tonnage'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-indian-tonnage')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-indian-tonnage')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveIndianTonnage method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Retrieve user data for editing Indian Tonnage
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editIndianTonnage(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = IndianTonnage::findOrFail($id);
            // dd($editData);
            return view('backend.editIndianTonnage')->with([
                'editData' => $editData,
                // 'stateBoards' => $stateBoards,
            ]);
            // Return the edit data in a JSON response
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editIndianTonnage method: ' . $e->getMessage());

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
    public function updateIndianTonnage(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'trade' => 'required',
            'no_of_ships' => 'required|numeric',
            'gross_tonnage' => 'required|numeric',
            'dead_weight_tonnage' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'select_year.required' => 'The year selection field is required.',
            'select_month.required' => 'The month selection field is required.',
            'trade.required' => 'The trade field is required.',
            'no_of_ships.required' => 'The number of ships field is required.',
            'gross_tonnage.required' => 'The gross tonnage field is required.',
            'dead_weight_tonnage.required' => 'The dead weight tonnage field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'no_of_ships.numeric' => 'The number of ships field must be a numeric value.',
            'gross_tonnage.numeric' => 'The gross tonnage field must be a numeric value.',
            'dead_weight_tonnage.numeric' => 'The dead weight tonnage field must be a numeric value.',
        ];


        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }

        $editResponse = IndianTonnage::find($id);

        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'select_year' => $request->input('select_year'),
            'trade' => $request->input('trade'),
            'no_of_ships' => $request->input('no_of_ships'),
            'gross_tonnage' => $request->input('gross_tonnage'),
            'dead_weight_tonnage' => $request->input('dead_weight_tonnage'),
            'updated_by' => $request->input('updated_by'),
        ]);

        // Check if the update was successful
        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-indian-tonnage')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-indian-tonnage')->with('error', 'Failed to update record');
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Seafarers Information
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewSeafarersInformation()
    {
        try {
            // Fetch Seafarers Information that are not deleted
            $getData = SeafarersInformation::where('is_deleted', 0)->get()->toArray();
            // Return the view with data
            return view('backend.viewSeafarersInformation', ['getData' => $getData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewSeafarersInformation method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Add Seafarers Information details.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addSeafarersInformation(Request $request)
    {
        try {
            // Your logic goes here...
            // Return the view with Seafarers Information and the select_year
            return view('backend.addSeafarersInformation');
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    /**
     * Save Seafarers Information
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveSeafarersInformation(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'select_year' => 'required|numeric',
                'select_month' => 'required|numeric|between:1,12',
                'total_seafarers' => 'required|numeric',
                'woman_seafarer' => 'required|numeric',
            ];

            // Custom error messages
            $customMessages = [
                'select_month.required' => 'The month selection field is required.',
                'select_year.required' => 'The year selection field is required.',
                'select_year.numeric' => 'The year must be a numeric value.',
                'select_month.numeric' => 'The month must be a numeric value.',
                'select_month.between' => 'The month must be between 1 and 12.',
                'total_seafarers.required' => 'The total seafarers field is required.',
                'woman_seafarer.required' => 'The woman seafarer field is required.',
                'total_seafarers.numeric' => 'The total seafarers be a numeric value.',
                'woman_seafarer.numeric' => 'The woman seafarer be a numeric value.',
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
            $recordExists = SeafarersInformation::where('select_year', $request->input('select_year'))
                ->where('select_month', $request->input('select_month'))
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
            }

            $createdResponse = SeafarersInformation::create([
                'select_month' => $request->input('select_month'),
                'select_year' => $request->input('select_year'),
                'total_seafarers' => $request->input('total_seafarers'),
                'woman_seafarer' => $request->input('woman_seafarer'),
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-seafarers-information')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-seafarers-information')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveSeafarersInformation method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }
    /**
     * Retrieve user data for editing Seafarers Information
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\JsonResponse
     */
    public function editSeafarersInformation(Request $request, $id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = SeafarersInformation::findOrFail($id);
            // dd($editData);
            // Return the edit data in a JSON response
            return view('backend.editSeafarersInformation')->with([
                'editData' => $editData,
            ]);
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editSeafarersInformation method: ' . $e->getMessage());

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
    public function updateSeafarersInformation(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'select_year' => 'required|numeric',
            'select_month' => 'required|numeric|between:1,12',
            'total_seafarers' => 'required|numeric',
            'woman_seafarer' => 'required|numeric',
        ];

        // Custom error messages
        $customMessages = [
            'select_month.required' => 'The month selection field is required.',
            'select_year.required' => 'The year selection field is required.',
            'select_year.numeric' => 'The year must be a numeric value.',
            'select_month.numeric' => 'The month must be a numeric value.',
            'select_month.between' => 'The month must be between 1 and 12.',
            'total_seafarers.required' => 'The total seafarers field is required.',
            'woman_seafarer.required' => 'The woman seafarer field is required.',
            'total_seafarers.numeric' => 'The total seafarers be a numeric value.',
            'woman_seafarer.numeric' => 'The woman seafarer be a numeric value.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)  // Flash the validation errors to the session
                ->withInput();  // Flash the input data to the session
        }
        $editResponse = SeafarersInformation::find($id);

        $editResponse->update([
            'select_month' => $request->input('select_month'),
            'select_year' => $request->input('select_year'),
            'total_seafarers' => $request->input('total_seafarers'),
            'woman_seafarer' => $request->input('woman_seafarer'),
            'updated_by' => $request->input('updated_by'),
        ]);

        if ($editResponse) {
            // If the operation was successful
            return redirect()->route('backend.view-seafarers-information')->with('success', 'Record updated successfully');
        } else {
            // If the operation was unsuccessful
            return redirect()->route('backend.view-seafarers-information')->with('error', 'Failed to update record');
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Employment Major Ports
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewEmploymentMajorPorts()
    {
        try {
            // Fetch Employment Major Ports that are not deleted
            $getData = EmploymentMajorPort::where('is_deleted', 0)->get()->toArray();
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
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
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
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-employment-major-ports')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-employment-major-ports')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveEmploymentMajorPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
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
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
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
    //
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
                ->exists();

            // If record exists, notify the user and redirect back
            if ($recordExists) {
                // Map numeric month value to month name using DateTime
                $monthName = DateTime::createFromFormat('!m', $request->input('select_month'))->format('F');
                $message = 'A record with the selected ' . $request->input('select_year') . ' and selected ' . $monthName . ' already exists.';
                return redirect()->back()->with('warning', $message);
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
                'created_by' => $request->input('created_by'),
            ]);

            // Check if the Create was successful
            if ($createdResponse) {
                // If the operation was successful
                return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('success', 'Record Created successfully');
            } else {
                // If the operation was unsuccessful
                return redirect()->route('backend.view-employment-dock-labour-boards-major-port')->with('error', 'Failed to Created record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveEmploymentDockLabourBoardsMajorPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
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
