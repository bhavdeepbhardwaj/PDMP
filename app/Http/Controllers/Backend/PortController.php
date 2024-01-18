<?php

namespace App\Http\Controllers\Backend;

use App\Models\Port;

use App\Models\PortCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortController extends Controller
{
    public function portList()
    {
        $permissionData = app('App\Http\Controllers\Backend\DashboardController')->modulePermission();

        // Fetch port category names and IDs that are not deleted
        $portCatName = PortCategory::select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();

        $portName = Port::where('is_deleted', '0')->get()->toArray();
        // dd($portName);
        return view('backend.portList', [
            'portName' => $portName,
            'permissionData' => $permissionData,
            'portCatName' => $portCatName,
        ]);
    }
    /**
     * Create or update a Port.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPort(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'port_type' => 'required',
                'port_name' => 'required',
                'port_code' => 'required',
                'port_data_code' => 'required',
            ];

            // Custom error messages
            $customMessages = [
                'port_type.required' => 'The port_type field is required.',
                'port_name.required' => 'The port_name field is required.',
                'port_code.required' => 'The port_code field is required.',
                'port_data_code.required' => 'The port_data code field is required.',
            ];


            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            // If 'id' is set in the request, update the existing Port, else create a new Port
            if ($request->has('id')) {
                $editResponse = Port::where('id', $request->input('id'))->update([
                    'port_type' => $request->input('port_type'),
                    'port_name' => $request->input('port_name'),
                    'port_code' => $request->input('port_code'),
                    'port_data_code' => $request->input('port_data_code'),
                    'updated_by' => $request->input('updated_by'),
                ]);

                // Check if the update was successful
                if ($editResponse) {
                    session()->flash('success', 'Port Category updated successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to update Port');
                    return response()->json(['success' => false]);
                }
            } else {
                $createdResponse = Port::create([
                    'port_type' => $request->input('port_type'),
                    'port_name' => $request->input('port_name'),
                    'port_code' => $request->input('port_code'),
                    'port_data_code' => $request->input('port_data_code'),
                    'created_by' => $request->input('created_by'),
                ]);

                // Check if the Create was successful
                if ($createdResponse) {
                    session()->flash('success', 'Port Created successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to Created Port');
                    return response()->json(['success' => false]);
                }
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in createPort method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    /**
     * Retrieve Port data for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPort($id)
    {
        try {
            // Find the Port by ID
            $Port = Port::findOrFail($id);

            // Return Port data as JSON response
            return response()->json($Port);
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error retrieving Port data: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'Port not found', 'details' => $e->getMessage()], 404);
        }
    }
}
