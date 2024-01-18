<?php

namespace App\Http\Controllers\Backend;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DepartmentController extends Controller
{
    /**
     * Display a list of departments.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function departmentList()
    {
        try {
            // Fetch department names that are not deleted
            $depName = Department::where('is_deleted', 0)->get()->toArray();

            // Return the view with department names
            return view('backend.departmentList', ['depName' => $depName]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    /**
     * Create or update a Department.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDepartment(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'name' => 'required|regex:/^[A-Za-z\s]+$/',
            ];

            // Custom error messages
            $customMessages = [
                'name.required' => 'The department name field is required.',
                'name.regex' => 'The department name field does not contain special characters and numbers.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            // If 'id' is set in the request, update the existing Department, else create a new Department
            if ($request->has('id')) {
                $editResponse = Department::where('id', $request->input('id'))->update([
                    'name' => $request->input('name'),
                    'updated_by' => $request->input('updated_by'),
                ]);

                // Check if the update was successful
                if ($editResponse) {
                    session()->flash('success', 'Department Details updated successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to update Department');
                    return response()->json(['success' => false]);
                }

            } else {
                $createdResponse = Department::create([
                    'name' => $request->input('name'),
                    'created_by' => $request->input('created_by'),
                ]);

                // Check if the Create was successful
                if ($createdResponse) {
                    session()->flash('success', 'Department Created successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to Created Department');
                    return response()->json(['success' => false]);
                }
            }

            // if ($request->has('id')) {
            //     try {
            //         $department = Department::findOrFail($request->input('id'));
            //         $department->update([
            //             'name' => $request->input('name'),
            //             'updated_by' => $request->input('updated_by'),
            //         ]);
            //         session()->flash('success', 'Department Updated successfully');
            //         return response()->json(['success' => true]);
            //     } catch (ModelNotFoundException $e) {
            //         session()->flash('error', 'Failed to Updated Department');
            //         return response()->json(['success' => false], 404);
            //     }
            // } else {
            //     $createdResponse = Department::create([
            //         'name' => $request->input('name'),
            //         'created_by' => $request->input('created_by'),
            //     ]);
            //     // Check if the Create was successful
            //     if ($createdResponse) {
            //         session()->flash('success', 'Department Created successfully');
            //         return response()->json(['success' => true]);
            //     } else {
            //         session()->flash('error', 'Failed to Created Department');
            //         return response()->json(['success' => false], 404);
            //     }
            // }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in createDepartment method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    /**
     * Retrieve Department data for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editDepartment($id)
    {
        try {
            // Find the Department by ID
            $department = Department::findOrFail($id);

            // Return Department data as JSON response
            return response()->json($department);
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error retrieving Department data: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'Department not found', 'details' => $e->getMessage()], 404);
        }
    }
}
