<?php

namespace App\Http\Controllers\Backend;

use App\Models\PortCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PortCategoryController extends Controller
{
    /**
     * Display a list of port categories.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function portCategoryList()
    {
        try {
            // Fetch port categories that are not deleted
            $portCatData = PortCategory::where('is_deleted', 0)->get()->toArray();

            // Return the view with port category data
            return view('backend.portCategoryList', ['portCatData' => $portCatData]);
        } catch (\Exception $e) {
            // Handle exceptions and show an error page or log the error
            return view('backend.error')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Create or update a PortCategory.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPortCategory(Request $request)
    {
        try {
            // Validation rules
            $rules = [
                'category_name' => 'required|regex:/^[A-Za-z\s]+$/',
                'slug' => 'required',
            ];

            // Custom error messages
            $customMessages = [
                'category_name.required' => 'The category name field is required.',
                'category_name.regex' => 'The category name field does not contain special characters and numbers.',
                'slug.required' => 'The slug name field is required.',
            ];

            // Validate the request data
            $validator = Validator::make($request->all(), $rules, $customMessages);

            // Check for validation failure
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()]);
            }

            // If 'id' is set in the request, update the existing PortCategory, else create a new PortCategory
            if ($request->has('id')) {
                $editResponse = PortCategory::where('id', $request->input('id'))->update([
                    'category_name' => $request->input('category_name'),
                    'slug' => $request->input('slug'),
                    'updated_by' => $request->input('updated_by'),
                ]);

                // Check if the update was successful
                if ($editResponse) {
                    session()->flash('success', 'Port Category updated successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to update PortCategory');
                    return response()->json(['success' => false]);
                }
            } else {
                $createdResponse = PortCategory::create([
                    'category_name' => $request->input('category_name'),
                    'slug' => $request->input('slug'),
                    'created_by' => $request->input('created_by'),
                ]);

                // Check if the Create was successful
                if ($createdResponse) {
                    session()->flash('success', 'Port Category Created successfully');
                    return response()->json(['success' => true]);
                } else {
                    session()->flash('error', 'Failed to Created Port Category');
                    return response()->json(['success' => false]);
                }
            }
        } catch (\Exception $e) {
            // Log the error for further investigation
            Log::error('Error in createPortCategory method: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'An error occurred while processing the request.']);
        }
    }

    /**
     * Retrieve PortCategory data for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editPortCategory($id)
    {
        try {
            // Find the PortCategory by ID
            $portCategory = PortCategory::findOrFail($id);

            // Return PortCategory data as JSON response
            return response()->json($portCategory);
        } catch (\Exception $e) {
            // Log the exception for further analysis
            Log::error('Error retrieving PortCategory data: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'PortCategory not found', 'details' => $e->getMessage()], 404);
        }
    }
}
