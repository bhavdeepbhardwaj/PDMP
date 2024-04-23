<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BEMonthlyAdd;
use App\Models\BudgetEstimate;
use App\Models\Department;
use App\Models\IconWithPanel;
use App\Models\IndianTonnage;
use App\Models\Modules;
use App\Models\Port;
use App\Models\PortCategory;
use App\Models\RevisedEstimate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RolePermission;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // view for the view for the dashboard.

    public function index()
    {
        return view('backend.dashboard');
    }

    // View for the User List

    public function moduleList()
    {
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/', $link);
        $moduleName = end($link_array);
        $moduleId = IconWithPanel::where('mod_list_name', $moduleName)->first();
        $permissionData = RolePermission::where('role_id', Auth::user()->role_id)->where('module_id', $moduleId->id)->where('status', 1)->first();

        $moduelsData = Modules::get()->toArray();
        // dd($permissionData);
        return view('backend.moduleList', ['moduelsData' => $moduelsData, 'permissionData' => $permissionData]);
    }

    // View for the Icon With Panels List

    public function iconWithPanelsList()
    {
        $iconName = IconWithPanel::get()->toArray();
        // dd($iconName);
        return view('backend.iconWithPanelsList', ['iconName' => $iconName]);
    }

    // View for the Port List

    public function portList()
    {
        $permissionData = $this->modulePermission();
        // $permissionData = app('App\Http\Controllers\Backend\DashboardController')->modulePermission();

        $portName = Port::where('is_deleted', '0')->get()->toArray();
        // dd($portName);
        return view('backend.portList', ['portName' => $portName, 'permissionData' => $permissionData]);
    }

    // View for the User Profile

    public function portName($id)
    {
        // dd($id);
        if ($id > 0) {
            // dd($portName);
            $portArr = User::where('port_type', $id)->pluck('port_id')->all();
            // dd($portArr);
            $toSingleArr = [];
            foreach ($portArr as $arrKey => $arrVal) {
                // dd($arrVal);
                $expArr = explode(',', $arrVal);
                if (count($expArr) > 1) {
                    foreach ($expArr as $key => $val) {
                        $toSingleArr[$arrKey] = $val;
                    }
                } else {
                    $toSingleArr[$arrKey] = $arrVal;
                }
                // dd(count($expArr));
                // $toSingleArr = $expArr;
                // dd($expArr,$toSingleArr);
            }

            $arrUnique = array_unique($toSingleArr);
            $portNameArr = Port::where("port_type", $id)->pluck('id')->all();
            $diffPortId = array_diff($portNameArr, $arrUnique);
            $portName = Port::whereIn("id", $diffPortId)->get()->toArray();

            // dd($portName);
            $html = view('backend.component.selectport', compact('portName'))->render();
            return response()->json(['html' => $html]);
        } else {
            return response()->json(['html' => '']);
        }
    }

    public function modulePermission()
    {
        $link = $_SERVER['PHP_SELF'];
        $link_array = explode('/', $link);
        $moduleName = end($link_array);
        $moduleId = IconWithPanel::where('mod_list_name', $moduleName)->first();
        $permissionData = RolePermission::where('role_id', Auth::user()->role_id)->where('module_id', $moduleId->id)->where('status', 1)->first();
        return $permissionData;
    }

    public function blankPage()

    {
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

        return view('backend.blank', [
            'userList' => $userList,
            'depID' => $depID,
            'roleId' => $roleId,
            'portName' => $portName,
            'portCatName' => $portCatName,
            'reportList' => $reportList,
        ]);
    }


    public function getData()
    {
        $uniqueTrades = IndianTonnage::distinct()->pluck('trade');

        $uniqueData = [];

        foreach ($uniqueTrades as $trade) {
            $sum = IndianTonnage::where('trade', $trade)->sum('no_of_ships');
            $uniqueData[$trade] = $sum;
        }

        return response()->json($uniqueData);
    }


    // Cargo Overview Data For All Port Major

    public function getCargoOverviewDataReportForAllPortMajor() {
        return view('backend.getCargoOverviewDataReportForAllPortMajor',);
    }

    // viewGetCargoOverviewDataReportForAllPortage Major

    public function viewGetCargoOverviewDataReportForAllPortMajor() {
        return view('backend.viewGetCargoOverviewDataReportForAllPortMajor',);
    }


    // Cargo Overview Data For All Port

    public function getCargoOverviewDataReportForAllPortNonMajor() {
        return view('backend.getCargoOverviewDataReportForAllPortNonMajor',);
    }

    // viewGetCargoOverviewDataReportForAllPortage

    public function viewGetCargoOverviewDataReportForAllPortNonMajor() {
        return view('backend.viewGetCargoOverviewDataReportForAllPortNonMajor',);
    }
}
