<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IconWithPanel;
use App\Models\Role;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Retrieve role names and icon names from the database.
     *
     * @return array
     */
    private function getRoleAndIconNames()
    {
        // Retrieve role names and icon names from the database
        $roleName = Role::get()->toArray(); // Get role names
        $iconName = IconWithPanel::get()->toArray(); // Get icon names

        return ['roleName' => $roleName, 'iconName' => $iconName];
    }

    /**
     * Add Module.
     *
     * Retrieve role names and icon names from the database and pass them to the view.
     *
     * @return \Illuminate\Http\Response
     */
    public function addModule()
    {
        try {
            // Retrieve role names and icon names
            $data = $this->getRoleAndIconNames();

            // Return the view with role and icon information
            return view('backend.addModule', ['data' => $data]);
        } catch (\Exception $e) {
            // If an error occurs, return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Edit Module.
     *
     * Retrieve role names and icon names from the database and pass them to the view.
     *
     * @return \Illuminate\Http\Response
     */
    public function editModule()
    {
        try {
            // Retrieve role names and icon names
            $data = $this->getRoleAndIconNames();

            // Return the view with role and icon information
            return view('backend.editModule', ['data' => $data]);
        } catch (\Exception $e) {
            // If an error occurs, return an error response
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }
}
