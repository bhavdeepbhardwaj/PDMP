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
use Illuminate\Support\Facades\Auth;
use App\Models\EmploymentMajorPort;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\SeafarersInformation;
use App\Models\BerthRelatedInformation;
use App\Models\Commodities;
use Illuminate\Support\Facades\Validator;
use App\Models\NationalWaterwaysInformation;
use App\Models\EmploymentDockLabourBoardsMajorPort;
use App\Models\DirectPortEntryDeliveryRelatedContainers;
use App\Models\User;

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

        // $portTypes = PortCategory::whereIn('id', [1, 2])->get(); commentid line previous

        if (auth()->user()->port_type != 0) {
            $portTypes = PortCategory::where('id', auth()->user()->port_type)->select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();
        } else {
            $portTypes = PortCategory::whereIn('id', [1, 2])->get();
        }

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

        if (auth()->user()->port_type != 0) {
            // $portTypes = PortCategory::where('id',auth()->user()->port_type)->select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();
            $stateBoards = StateBoard::where('id', auth()->user()->state_board)->get();
        } else {
            $stateBoards = StateBoard::all();
        }

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
            if (auth()->user()->port_id != 0) {
                $query = Port::where('id', auth()->user()->port_id)->where('port_type', 1)->get();
            } else {
                $query = Port::where('port_type', $request->port_type)->get();
            }
            // $query = Port::where('port_type', $request->port_type)->get();
        } else {
            // Retrieve ports based on 'state_board'
            if (auth()->user()->port_id != 0) {
                $query = Port::where('id', auth()->user()->port_id)->where('states_board_id', $request->state_board)->get();
            } else {
                $query = Port::where('states_board_id', $request->state_board)->get();
            }
            // $query = Port::where('states_board_id', $request->state_board)->get();
        }

        // Return the result as a JSON response
        return response()->json(['ports' => $query]);
    }

    // ******************************************************
    // ******************************************************
    // ******************************************************
    // ******************************************************

    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************

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
            $getData = IndianTonnage::where('is_deleted', 0)->where('created_by', Auth::user()->id)->get()->toArray();
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

    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************

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
                "commodityArr" => $commodityArr
            ]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    // ****************************************************************
    /**
     * Display the view for Report
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function viewReport()
    {
        try {
            // dd("Report Page");
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
            // Return the view with data



            $merged_array=[];


            return view('backend.viewReport', ['commodityArr' => $commodityArr,'merged_array' => $merged_array]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            // It's a good practice to log errors for further investigation
            Log::error('Error in viewReport method: ' . $e->getMessage());

            // Return a view with an error message
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
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
