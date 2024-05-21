<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    /**
     * Display a list of roles.
     *
     * @return \Illuminate\View\View
     */
    public function roleList()
    {
        try {
            // Fetch all roles from the database
            $permissionData = modulePermission();
            $roles = Role::get()->toArray();

            // Return the view with the fetched roles
            return view('backend.roleList', [
                'roles' => $roles,
                'permissionData' => $permissionData
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and errors gracefully
            // Log the error for further investigation
            Log::error('Error in roleList method: ' . $e->getMessage());

            // Return an error view or redirect with a flash message
            return redirect()->back()->with('error', 'An error occurred while fetching roles.');
        }
    }

    /**
     * Display the form for adding a new user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function addRole()
    {
        try {
            // Your logic goes here...
            // Fetch user list where is_deleted is 0

            // Return the view for adding a new user with necessary data
            return view('backend.addRole');
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
    public function saveRole(Request $request)
    {
        try {
            // dd($request->all());
            // Validation rules
            $rules = [
                'role_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_slug' => 'required',
                'level' => 'required|numeric|unique:roles,level|max:10',
                'employee_role' => 'required',
            ];

            // Custom error messages
            $customMessages = [
                'role_name.required' => 'The role name field is required.',
                'role_name.regex' => 'The role name field does not contain special characters and numbers.',
                'role_slug.required' => 'The slug name field is required.',
                'level.required' => 'The level field is required.',
                'level.numeric' => 'The level is (1-9) be a numeric value.',
                'level.unique' => 'The level number is already in use.',
                'level.max' => 'The level must be at least 10.',
                'employee_role.required' => 'The employee role field is required.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)  // Flash the validation errors to the session
                    ->withInput();  // Flash the input data to the session
            }

            // Create a new user record
            $createdResponse = Role::create([
                'role_name' => $request->input('role_name'),
                'role_slug' => $request->input('role_slug'),
                'level' => $request->input('level'),
                'employee_role' => $request->input('employee_role'),
                'created_by' => $request->input('created_by'),
            ]);
            // dd($createdResponse);
            // Check if the create operation was successful
            if ($createdResponse) {
                // If successful, redirect to the Role list page
                return redirect()->route('backend.role')->with('success', 'New Role created successfully');
            } else {
                // If unsuccessful, redirect with an error message
                return redirect()->route('backend.role')->with('error', 'Failed to create record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in saveRole method: ' . $e->getMessage());

            // Return an error response with a meaningful message
            return redirect()->route('backend.role')->with('error', 'An error occurred while processing the request. Please try again later.');
        }
    }

    /**
     * Create or update a role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRole(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'role_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_slug' => 'required',
                // 'level' => 'required|numeric|unique:roles,level|max:10',
                'level' => 'required|numeric|unique:roles,level|max:8',
                'employee_role' => 'required',
            ];

            // Custom error messages
            $customMessages = [
                'role_name.required' => 'The role name field is required.',
                'role_name.regex' => 'The role name field does not contain special characters and numbers.',
                'role_slug.required' => 'The slug name field is required.',
                'level.required' => 'The level field is required.',
                'level.numeric' => 'The level is (1-9) be a numeric value.',
                'level.unique' => 'The level number is already in use.',
                'level.max' => 'The level must be at least 10.',
                'employee_role.required' => 'The employee role field is required.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            // If 'id' is set in the request, update the existing role, else create a new role
            if ($request->has('id')) {
                $editResponse = Role::where('id', $request->input('id'))->update([
                    'role_name' => $request->input('role_name'),
                    'role_slug' => $request->input('role_slug'),
                    'level' => $request->input('level'),
                    'employee_role' => $request->input('employee_role'),
                    'updated_by' => $request->input('updated_by'),
                ]);

                // Check if the update was successful
                if ($editResponse) {
                    session()->flash('success', 'Role Details updated successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to update Role');
                    return response()->json(['success' => false]);
                }
            } else {
                $createdResponse = Role::create([
                    'role_name' => $request->input('role_name'),
                    'role_slug' => $request->input('role_slug'),
                    'level' => $request->input('level'),
                    'employee_role' => $request->input('employee_role'),
                    'created_by' => $request->input('created_by'),
                ]);

                // Check if the Create was successful
                if ($createdResponse) {
                    session()->flash('success', 'Role Created successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to Created Role');
                    return response()->json(['success' => false]);
                }
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in createRole method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    public function editRole($id)
    {
        try {
            // Use findOrFail to retrieve the edit data by ID; it automatically handles the 404 case
            $editData = Role::findOrFail($id);

            // Return the view with the edit data
            return view('backend.editRole')->with([
                'editData' => $editData,
            ]);
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in editRole method: ' . $e->getMessage());

            // Return an error response with a 422 status code
            return response()->json(['error' => 'Error retrieving Edit data. ' . $e->getMessage()], 422);
        }
    }

    /**
     * Update Role data.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id The ID of the Role to be updated
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        try {
            // Validation rules
            $rules = [
                'role_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'role_slug' => 'required',
                // 'level' => 'required|numeric|unique:roles,level|max:10',
                'employee_role' => 'required',
            ];

            // Custom error messages
            $customMessages = [
                'role_name.required' => 'The role name field is required.',
                'role_name.regex' => 'The role name field does not contain special characters and numbers.',
                'role_slug.required' => 'The slug name field is required.',
                // 'level.required' => 'The level field is required.',
                // 'level.numeric' => 'The level is (1-9) be a numeric value.',
                // 'level.unique' => 'The level number is already in use.',
                // 'level.max' => 'The level must be at least 10.',
                'employee_role.required' => 'The employee role field is required.',
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
            $editResponse = Role::find($id);

            // Update user data
            $editResponse->update([
                'role_name' => $request->input('role_name'),
                'role_slug' => $request->input('role_slug'),
                // 'level' => $request->input('level'),
                'employee_role' => $request->input('employee_role'),
                'updated_by' => $request->input('updated_by'),
            ]);

            // Check if the update was successful
            if ($editResponse) {
                // If successful, redirect to the user list page with a success message
                return redirect()->route('backend.role')->with('success', 'Record updated successfully');
            } else {
                // If unsuccessful, redirect with an error message
                return redirect()->route('backend.role')->with('error', 'Failed to update record');
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in updateRole method: ' . $e->getMessage());

            // Return an error response with a meaningful message
            return redirect()->route('backend.role')->with('error', 'An error occurred while processing the request. Please try again later.');
        }
    }
}
