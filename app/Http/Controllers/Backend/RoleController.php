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
            $roles = Role::get()->toArray();

            // Return the view with the fetched roles
            return view('backend.roleList', ['roles' => $roles]);
        } catch (\Exception $e) {
            // Handle exceptions and errors gracefully
            // Log the error for further investigation
            Log::error('Error in roleList method: ' . $e->getMessage());

            // Return an error view or redirect with a flash message
            return redirect()->back()->with('error', 'An error occurred while fetching roles.');
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
            ];

            // Custom error messages
            $customMessages = [
                'role_name.required' => 'The role name field is required.',
                'role_name.regex' => 'The role name field does not contain special characters and numbers.',
                'role_slug.required' => 'The slug name field is required.',
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

    /**
     * Retrieve role data for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editRole($id)
    {
        try {
            // Find the role by ID
            $role = Role::findOrFail($id);

            // Return role data as JSON response
            return response()->json($role);
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error retrieving role data: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'Role not found', 'details' => $e->getMessage()], 404);
        }
    }
}
