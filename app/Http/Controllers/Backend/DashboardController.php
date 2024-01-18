<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BEMonthlyAdd;
use App\Models\BudgetEstimate;
use App\Models\Department;
use App\Models\IconWithPanel;
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
        // dd($modueData);
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

    // // View for the User Profile

    // public function departmentList()
    // {
    //     $depName = Department::where('is_deleted', 0)->get()->toArray();
    //     // dd($depName);
    //     return view('backend.departmentList', ['depName' => $depName]);
    // }

    // // View for the User List

    // public function userList()
    // {
    //     $userList = User::where('is_deleted', 0)->get()->toArray();
    //     $depID = Department::where('is_deleted', 0)->get();
    //     $portName = Port::where('is_deleted', 0)->get();
    //     $portCatName = PortCategory::select('category_name', 'id')->where('is_deleted', 0)->get()->toArray();
    //     $roleId = Role::get();
    //     // dd($portCatName);
    //     return view('backend.userList', ['userList' => $userList, 'depID' => $depID, 'roleId' => $roleId, 'portName' => $portName, 'portCatName' => $portCatName]);
    // }

    // // View for the Role List

    // public function roleList()
    // {
    //     $rolename = Role::get()->toArray();
    //     // dd($rolename);
    //     return view('backend.roleList', ['rolename' => $rolename]);
    // }

    // // View for the Port Category List

    // public function portCategoryList()
    // {
    //     $portCatData = PortCategory::where('is_deleted', '0')->get()->toArray();
    //     // dd($portCatData);
    //     return view('backend.portCategoryList', ['portCatData' => $portCatData]);
    // }



    // // View for the Port Category List

    // public function portMonthlyExpList()
    // {
    //     return view('backend.portMonthlyExpList');
    // }

    // // View for the Budget Estimate Listrevised

    // public function budgetEstimateList()
    // {
    //     return view('backend.budgetEstimateList');
    // }

    // // Add Budget Estimate List

    // public function addBudgetEstimateList()
    // {
    //     try {
    //         $year = BudgetEstimate::select('select_year')->distinct()->first();
    //         // dd($year);

    //         $portsArrs = [];
    //         if (Auth::user()->role_id == 1) {
    //             $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
    //             foreach ($catName as $key => $catval) {
    //                 $portsArrs[$key]['category_name'] = $catval['category_name'];
    //                 $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])->get()->toArray();
    //             }
    //         } else {
    //             $expPortId = explode(',', Auth::user()->port_id);
    //             $catName = PortCategory::where('is_deleted', 0)
    //                 ->where('id', Auth::user()->port_type)
    //                 ->get()
    //                 ->toArray();

    //             foreach ($catName as $key => $catval) {
    //                 $portsArrs[$key]['category_name'] = $catval['category_name'];
    //                 $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])
    //                     ->whereIn('id', $expPortId)
    //                     ->get()
    //                     ->toArray();
    //             }
    //         }

    //         return view('backend.addBudgetEstimateList', compact('portsArrs', 'year'));
    //     } catch (\Exception $e) {
    //         // Handle exceptions...
    //     }
    // }


    // View Budget Estimate List

    // public function viewBudgetEstimateList()
    // {
    //     // $year = BudgetEstimate::select('select_year')->distinct()->first();
    //     // $distinctPortType = BudgetEstimate::select('port_type')->distinct()->get()->toArray();
    //     // $portsArrs = [];

    //     // foreach($distinctPortType as $key => $val){
    //     //     $beData = BudgetEstimate::where('port_type',$val['port_type'])->get();
    //     //     foreach($beData as $bekey => $beval){
    //     //         $catName = PortCategory::where('id',$beval['port_type'])->first()->toArray();
    //     //     // foreach ($catName as $catkey => $catval) {
    //     //         $portsArrs[$key]['category_name'] = $catName['category_name'];
    //     //         // $portsdata = Port::where('port_type', $beval['port_type'])->->get()->toArray();
    //     //         $portsArrs[$key]['slug'] = $portsdata;
    //     //     }

    //     // }

    //     // }
    //     // dd($portsArrs);
    //     // $data = BudgetEstimate::get();
    //     // dd($data);
    //     // $portsArrs = [];
    //     // if (Auth::User()->role_id == 1) {
    //     //     $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
    //     //     foreach ($catName as $key => $catval) {
    //     //         $portsArrs[$key]['category_name'] = $catval['category_name'];
    //     //         $portsdata = Port::where('port_type', $catval['id'])->get()->toArray();
    //     //         $portsArrs[$key]['slug'] = $portsdata;
    //     //     }
    //     // } else {
    //     //     $expPortId = explode(',', Auth::User()->port_id);
    //     //     // dd($expPortId);
    //     //     $catName = PortCategory::where('is_deleted', 0)->where('id', Auth::user()->port_type)->get()->toArray();
    //     //     foreach ($catName as $key => $catval) {
    //     //         $portsArrs[$key]['category_name'] = $catval['category_name'];
    //     //         $portsdata = Port::where('port_type', $catval['id'])->whereIn('id', $expPortId)->get()->toArray();
    //     //         $portsArrs[$key]['slug'] = $portsdata;
    //     //     }
    //     // }
    //     // return view('backend.viewBudgetEstimateList', ['portsArrs' => $portsArrs, 'year' => $year]);
    //     return view('backend.viewBudgetEstimateList');
    // }

    // // View for the Revised Budget Estimate List

    // public function revisedBudgetEstimateList()
    // {
    //     return view('backend.revisedBudgetEstimateList');
    // }

    // // Add for the Revised Budget Estimate List

    // public function addRevisedBudgetEstimateList()
    // {
    //     // $portsArrs = [];
    //     // $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
    //     // // dd($catName);
    //     // foreach ($catName as $key => $catval) {
    //     //     $portsArrs[$key]['category_name'] = $catval['category_name'];
    //     //     $portsdata = Port::where('port_type', $catval['id'])->get()->toArray();
    //     //     // dd($catName);
    //     //     $portsArrs[$key]['slug'] = $portsdata;
    //     // }
    //     $year = RevisedEstimate::select('select_year')->distinct()->first();
    //         // dd($year);

    //         $portsArrs = [];
    //         if (Auth::user()->role_id == 1) {
    //             $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
    //             foreach ($catName as $key => $catval) {
    //                 $portsArrs[$key]['category_name'] = $catval['category_name'];
    //                 $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])->get()->toArray();
    //             }
    //         } else {
    //             $expPortId = explode(',', Auth::user()->port_id);
    //             $catName = PortCategory::where('is_deleted', 0)
    //                 ->where('id', Auth::user()->port_type)
    //                 ->get()
    //                 ->toArray();

    //             foreach ($catName as $key => $catval) {
    //                 $portsArrs[$key]['category_name'] = $catval['category_name'];
    //                 $portsArrs[$key]['slug'] = Port::where('port_type', $catval['id'])
    //                     ->whereIn('id', $expPortId)
    //                     ->get()
    //                     ->toArray();
    //             }
    //         }
    //     return view('backend.addRevisedBudgetEstimateList')->with([
    //         'portsArrs' => $portsArrs,
    //         'year' => $year,
    //     ]);;
    // }

    // // View for the Revised Budget Estimate List

    // public function viewRevisedBudgetEstimateList()
    // {
    //     return view('backend.viewRevisedBudgetEstimateList');
    // }

    // // View BE Monthly Exp List

    // public function viewBeMonthlyExpList()
    // {
    //     return view('backend.viewBeMonthlyExpList');
    // }

    // // View RE Monthly Exp List

    // public function viewReMonthlyExpList()
    // {
    //     return view('backend.viewReMonthlyExpList');
    // }

    // BE Monthly Exp Add

    // public function beMonthlyExpAdd()
    // {
    //     $year = BEMonthlyAdd::select('select_month_year')->distinct()->get();
    //     // dd($year);
    //     $portsArrs = [];
    //     if (Auth::User()->role_id == 1) {
    //         $catName = PortCategory::where('is_deleted', 0)->get()->toArray();
    //         foreach ($catName as $key => $catval) {
    //             $portsArrs[$key]['category_name'] = $catval['category_name'];
    //             $portsdata = Port::where('port_type', $catval['id'])->get()->toArray();
    //             $portsArrs[$key]['slug'] = $portsdata;
    //         }
    //     } else {
    //         $expPortId = explode(',', Auth::User()->port_id);
    //         // dd($expPortId);
    //         $catName = PortCategory::where('is_deleted', 0)->where('id', Auth::user()->port_type)->get()->toArray();
    //         foreach ($catName as $key => $catval) {
    //             $portsArrs[$key]['category_name'] = $catval['category_name'];
    //             $portsdata = Port::where('port_type', $catval['id'])->whereIn('id', $expPortId)->get()->toArray();
    //             $portsArrs[$key]['slug'] = $portsdata;
    //         }
    //     }
    //     return view('backend.beMonthlyExpAdd')->with([
    //         'portsArrs' => $portsArrs
    //     ]);
    // }

    // public function reMonthlyExpAdd()
    // {
    //     return view('backend.reMonthlyExpAdd');
    // }

    // // Report List

    // public function reportList()
    // {
    //     return view('backend.reportList');
    // }

    // // beReportList

    // public function beReportList()
    // {
    //     return view('backend.beReportList');
    // }

    // beReportList

    // public function reReportList()
    // {
    //     return view('backend.reReportList');
    // }

    public function blankPage()
    {
        return view('backend.blank');
    }
}
