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

class UserController extends Controller
{
    public function userList()
    {
        try {
            // Fetch user list where is_deleted is 0
            $userList = User::where('is_deleted', 0)->get()->toArray();

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
            ]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    // professional format with validation for the method with proper comment

    public function createUser(Request $request)
    {
        // Validation rules
        $rules = [
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'role_id' => 'required',
            'dep_id' => 'required',
            'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
            'port_type' => 'required',
            'port_id' => 'required',
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
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $customMessages);

        // Check for validation failure
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        // Check if an ID is provided (update) or not (create)
        if ($request->has('id')) {
            // Update Part
            $userResponse = User::where('id', $request->input('id'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role_id' => $request->input('role_id'),
                'dep_id' => $request->input('dep_id'),
                'status' => $request->input('status'),
                'username' => $request->input('username'),
            ]);

            // Check if the update was successful
            if ($userResponse) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Failed to update user']);
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
                'port_id' => $portIdImp,
                'port_type' => $request->input('port_type'),
                'password' => '123456', // You may want to generate a secure password
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
            // Redirect back to the form or another page
            return redirect()->back();
        }
    }

    public function editUser(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id); // Use findOrFail to automatically handle the 404 case
            return response()->json($user);
        } catch (\Exception $e) {
            // Handle exceptions, such as database errors
            return response()->json(['error' => 'Error retrieving user data'], 500);
        }
    }
}
