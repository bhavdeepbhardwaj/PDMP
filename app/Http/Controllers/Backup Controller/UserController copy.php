<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Rules\AllowedEmailDomain;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        // dd($request->all());
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role_id' => 'required',
        //     'status' => 'required',
        //     'dep_id' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'error' => $validator->errors()->first()
        //     ]);
        // }/

        $rules = [
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'role_id' => 'required',
            // 'email' => 'required|email',
            'dep_id' => 'required',
            'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
            'status' => 'required',

        ];

        $customMessages = [
            'name.required' => 'The name field is required.',
            'name.regex' => 'The name field should only contain letters and spaces.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'role_id.required' => 'The role field is required.',
            'status.required' => 'The status field is required.',
            'dep_id.required' => 'The department field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        if(isset($request['id'])) {
            // dd($request->all());
            $userResponse = User::where('id',$request['id'])->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role_id' => $request['role_id'],
                'dep_id' => $request['dep_id'],
                'status' => $request['status'],
                'username' => $request['username'],
            ]);
        } else {
            $username = explode('@', $request['email']);
            // dd($username[0]);
            $userResponse = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'role_id' => $request['role_id'],
                'dep_id' => $request['dep_id'],
                'status' => $request['status'],
                'password' => '123456',
                'username' => $username[0]
            ]);
        }


        if (isset($userResponse->id)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => true]);
        }
        // dd($request->all());
    }

    public function createUser(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|regex:/^[A-Za-z\s]+$/',
            'role_id' => 'required',
            'dep_id' => 'required',
            'email' => ['required', 'email', new AllowedEmailDomain(['gmail.com', 'gov.in'])],
            'port_type' => 'required',
            'port_id' => 'required',
            'status' => 'required',
        ];

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

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        }

        if (isset($request['id'])) {
            // Edit Part
            $userResponse = User::where('id', $request['id'])->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role_id' => $request['role_id'],
                'dep_id' => $request['dep_id'],
                'status' => $request['status'],
                'username' => $request['username'],
            ]);

            if ($userResponse) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false, 'error' => 'Failed to update user']);
            }
        } else {
            // Create Part
            $portIdImp = implode(',', $request['port_id']);
            $username = explode('@', $request['email']);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'role_id' => $request['role_id'],
                'dep_id' => $request['dep_id'],
                'status' => $request['status'],
                // 'port_id' => $request['port_id'],
                'port_id' => $portIdImp,
                'port_type' => $request['port_type'],
                'password' => '123456',
                'username' => $username[0]
            ]);

            if ($user) {
                return response()->json(['status' => 'success']);
                // Set success message in the session
                session()->flash('success', 'New User created successfully');
            } else {
                return response()->json(['success' => 'error']);
                session()->flash('error', 'Failed to create user');
            }
        }
    }

    public function editUser(Request $request, $id)
    {
        // dd($request->all());
        $user = User::find($id); // Load the user data based on the provided $id

        // dd($user);
    if (!$user) {
        // Handle the case where the user with the given ID is not found
        return response()->json(['error' => 'User not found'], 404);
    }

    return response()->json($user);
    }
}
