<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Port;
use App\Models\PortCategory;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\AllowedEmailDomain;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Fetches user list and related data for display.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function userList()
    {
        try {
            // Fetch user list where is_deleted is 0
            $userList = User::where('is_deleted', 0)->get()->toArray();

            // Fetch Report Officer list where is_deleted is 0 and role ID is 1 or 2
            $reportList = User::where('is_deleted', 0)->whereIn('role_id', [1, 2])->get()->toArray();

            // Fetch department IDs that are not deleted
            $depID = Department::where('is_deleted', 0)->get();

            // Fetch all ports that are not deleted
            $portName = Port::where('is_deleted', 0)->get();

            // Fetch port category names and IDs that are not deleted
            $portCatName = PortCategory::select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();

            // Fetch all roles
            $roleId = Role::get();

            // Return the view with user list and related data
            return view('backend.userList', [
                'userList' => $userList,
                'depID' => $depID,
                'roleId' => $roleId,
                'portName' => $portName,
                'portCatName' => $portCatName,
                'reportList' => $reportList,
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Display the form for adding a new user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function addUser()
    {
        try {
            // Your logic goes here...
            // Fetch user list where is_deleted is 0
            $userList = User::where('is_deleted', 0)->get()->toArray();

            // Fetch Report Officer list where is_deleted is 0 and role ID is 1,3
            $reportList = User::where('is_deleted', 0)->whereIn('role_id', [1, 2])->get()->toArray();

            // Fetch department IDs that are not deleted
            $depID = Department::where('is_deleted', 0)->get();

            // Fetch all ports that are not deleted
            $portName = Port::where('is_deleted', 0)->get();

            // Fetch port category names and IDs that are not deleted
            $portCatName = PortCategory::select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();

            // Fetch all roles
            $roleId = Role::get();

            // Return the view for adding a new user with necessary data
            return view('backend.addUser', [
                'userList' => $userList,
                'depID' => $depID,
                'roleId' => $roleId,
                'portName' => $portName,
                'portCatName' => $portCatName,
                'reportList' => $reportList,
            ]);
        } catch (\Exception $e) {
            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Save user details submitted through the form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveUser(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_id' => 'required',
                'dep_id' => 'required',
                'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
                'port_type' => 'required',
                'port_id' => 'required',
                'report_to' => 'required',
                'status' => 'required',
                'created_by' => 'required',
            ];

            // Custom validation messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name field should only contain letters and spaces.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'role_id.required' => 'The role field is required.',
                'status.required' => 'The status field is required.',
                'port_id.required' => 'The port field is required.',
                'port_type.required' => 'The porttype field is required.',
                'dep_id.required' => 'The department field is required.',
                'report_to.required' => 'The report Officer field is required.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            $portIdImp = implode(',', $request->input('port_id'));
            $username = explode('@', $request->input('email'));

            // Create a new user record
            $createdResponse = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id'),
                'dep_id' => $request->input('dep_id'),
                'status' => $request->input('status'),
                'created_by' => $request->input('created_by'),
                'report_to' => $request->input('report_to'),
                'port_id' => $portIdImp,
                'port_type' => $request->input('port_type'),
                'password' => bcrypt('123456'), // Secure password hashing
                'username' => $username[0],
            ]);

            // Check if the create operation was successful
            if ($createdResponse) {
                // If successful, redirect to the user list page
                return redirect()->route('backend.user')->with('success', 'New User created successfully');
            } else {
                // If unsuccessful, redirect with an error message
                return redirect()->route('backend.user')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveUser method: ' . $e->getMessage());

            // Return an error response with a meaningful message
            return redirect()->route('backend.user')->with('error', 'An error occurred while processing the request. Please try again later.');
        }
    }

    /**
     * Retrieve user data for editing User.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be edited
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = User::findOrFail($id);

            // Return the view with the edit data
            return view('backend.editUser')->with([
                'editData' => $editData,
            ]);

            // Alternatively, you can return the edit data in a JSON response
            // return response()->json($editData);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editUser method: ' . $e->getMessage());

            // Return an error response with a 422 status code
            return response()->json(['error' => 'Error retrieving Edit data. ' . $e->getMessage()], 422);
        }
    }

    /**
     * Update user data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the user to be updated
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        try {
            // Validation rules
            $rules = [
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_id' => 'required',
                'dep_id' => 'required',
                'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
                'port_type' => 'required',
                'port_id' => 'required',
                'report_to' => 'required',
                'status' => 'required',
            ];

            // Custom validation messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name field should only contain letters and spaces.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'role_id.required' => 'The role field is required.',
                'status.required' => 'The status field is required.',
                'port_id.required' => 'The port field is required.',
                'port_type.required' => 'The porttype field is required.',
                'dep_id.required' => 'The department field is required.',
                'report_to.required' => 'The report Officer field is required.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Find the user by ID
            $editResponse = User::find($id);

            // Update user data
            $editResponse->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id'),
                'dep_id' => $request->input('dep_id'),
                'status' => $request->input('status'),
                'report_to' => $request->input('report_to'),
                'port_id' => $request->input('port_id'),
                'port_type' => $request->input('port_type'),
                'updated_by' => $request->input('updated_by'),
            ]);

            // Check if the update was successful
            if ($editResponse) {
                // If successful, redirect to the user list page with a success message
                return redirect()->route('backend.user')->with('success', 'Record updated successfully');
            } else {
                // If unsuccessful, redirect with an error message
                return redirect()->route('backend.user')->with('error', 'Failed to update record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in updateUser method: ' . $e->getMessage());

            // Return an error response with a meaningful message
            return redirect()->route('backend.user')->with('error', 'An error occurred while processing the request. Please try again later.');
        }
    }

    /**
     * Create or update a user based on the provided request data.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        // dd($request->all());
        try {
            // Validation rules
            $rules = [
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_id' => 'required',
                'dep_id' => 'required',
                'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
                'port_type' => 'required',
                'port_id' => 'required',
                'report_to' => 'required',
                'status' => 'required',
                'created_by' => 'required',
            ];

            // Custom validation messages
            $customMessages = [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name field should only contain letters and spaces.',
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                // 'email.unique' => 'The email has already been taken.',
                'role_id.required' => 'The role field is required.',
                'status.required' => 'The status field is required.',
                'port_id.required' => 'The port field is required.',
                'port_type.required' => 'The porttype field is required.',
                'dep_id.required' => 'The department field is required.',
                'report_to.required' => 'The report Officer field is required.',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            // if ($validator->fails()) {
            //     return response()->json(['error' => $validator->errors()->first()]);
            // }

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }


            // Check if an ID is provided (update) or not (create)
            if ($request->has('id')) {
                // Update Part

                // dd($request->all());
                $userResponse = User::where('id', $request->input('id'))->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'role_id' => $request->input('role_id'),
                    'dep_id' => $request->input('dep_id'),
                    'status' => $request->input('status'),
                    'username' => $request->input('username'),
                    'created_by' => $request->input('created_by'),
                    'report_to' => $request->input('report_to'),
                    'port_id' => $request->input('port_id'),
                    'port_type' => $request->input('port_type'),
                ]);

                // Check if the update was successful
                if ($userResponse) {
                    session()->flash('success', 'User Details updated successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to update user');
                    return response()->json(['success' => false]);
                }
            } else {
                // Create Part
                $portIdImp = implode(',', $request->input('port_id'));
                $username = explode('@', $request->input('email'));

                // Create a new user
                $user = User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'role_id' => $request->input('role_id'),
                    'dep_id' => $request->input('dep_id'),
                    'status' => $request->input('status'),
                    'created_by' => $request->input('created_by'),
                    'report_to' => $request->input('report_to'),
                    'port_id' => $portIdImp,
                    'port_type' => $request->input('port_type'),
                    'password' => bcrypt('123456'), // Secure password hashing
                    'username' => $username[0],
                ]);

                // Check if user creation was successful
                if ($user) {
                    // Set success message in the session
                    session()->flash('success', 'New User created successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to create user');
                    return response()->json(['success' => false]);
                }
            }
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error creating/updating user: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Retrieve user data for editing.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function editUser($id)
    // {
    //     try {
    //         // Find the user by ID
    //         $user = User::findOrFail($id);

    //         // Return user data as JSON response
    //         return response()->json($user);
    //     } catch (\Exception $e) {
    //         // Log the exception for further analysis
    //         Log::error('Error retrieving user data: ' . $e->getMessage());

    //         // Return a more detailed error response
    //         return response()->json(['error' => 'User not found', 'details' => $e->getMessage()], 404);
    //     }
    // }


    // public function editUser(Request $request, $id)
    // {
    //     try {
    //         $user = User::findOrFail($id); // Use findOrFail to automatically handle the 404 case
    //         return response()->json($user);
    //     } catch (\Exception $e) {
    //         // Handle exceptions, such as database errors
    //         return response()->json(['error' => 'Error retrieving user data'], 500);
    //     }
    // }
}
