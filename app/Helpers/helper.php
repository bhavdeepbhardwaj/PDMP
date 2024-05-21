<?php

// app/Helpers/CustomHelpers.php

use App\Models\RolePermission;
use App\Models\IconWithPanel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

if (!function_exists('getUserName')) {
    function getUserName()
    {
        $getRole = DB::table("roles")->whereId(auth()->user()->role_id)->first();
        return $getRole->role_name;
    }
}

// For Month
if (!function_exists('getMonthNames')) {
    /**
     * Get an array of month names.
     *
     * @param int|null $selectedMonth
     * @return array
     */
    function getMonthNames($selectedMonth = null)
    {
        $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
        ];
        // dd($selectedMonth, $months);
        // If a month is selected, mark it as selected in the options
        // if ($selectedMonth !== null) {
        //     foreach ($months as $monthNumber => $monthName) {
        //         $months[$monthNumber] = ['value' => $monthNumber, 'label' => $monthName, 'selected' => $selectedMonth == $monthNumber];
        //     }
        // }
        // dd($months);

        return $months;
    }
}

// For Year
if (!function_exists('getYearOptions')) {
    function getYearOptions($selectedYear = null, $numYears = 6)
    {
        $currentYear = date('Y');
        $options = [];

        for ($i = $currentYear; $i >= $currentYear - $numYears; $i--) {
            $startYear = $i;
            $endYear = $startYear + 1;
            $yearRange = $startYear . '-' . substr($endYear, -2);

            $options[$yearRange] = [
                'value' => $yearRange,
                'selected' => ($selectedYear == $yearRange),
            ];
        }

        return $options;
    }
}

if (!function_exists('modulePermission')) {
    function modulePermission()
    {
        $link = $_SERVER['REQUEST_URI'];
        $link_array = explode('/', $link);
        $moduleName = end($link_array);
        $moduleId = IconWithPanel::where('mod_list_name', $moduleName)->first();
        $permissionData = RolePermission::where('role_id', Auth::user()->role_id)->where('module_id', $moduleId->id)->where('status', 1)->first();
        return $permissionData;
    }
}
