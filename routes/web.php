<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use App\Http\Controllers\Backend\BudgetEstimateController;
use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Backend\RevisedEstimateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "web"
| middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Backend Routes
Route::group(['prefix' => 'portal', 'middleware' => ['auth', 'user-access', 'role-permission'], 'as' => 'backend.', 'namespace' => 'backend'], function () {

    // Dashboard
    Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
    Route::get('module', [App\Http\Controllers\Backend\DashboardController::class, 'moduleList'])->name('module');
    Route::get('icon-with-panels', [App\Http\Controllers\Backend\DashboardController::class, 'iconWithPanelsList'])->name('icon-with-panels');
    Route::get('department', [App\Http\Controllers\Backend\DepartmentController::class, 'departmentList'])->name('department');
    Route::get('profile', [App\Http\Controllers\Backend\DashboardController::class, 'profile'])->name('profile');
    Route::get('user', [App\Http\Controllers\Backend\UserController::class, 'userList'])->name('user');
    Route::get('role', [App\Http\Controllers\Backend\RoleController::class, 'roleList'])->name('role');
    Route::get('port', [App\Http\Controllers\Backend\PortController::class, 'portList'])->name('port');
    Route::get('port-category', [App\Http\Controllers\Backend\PortCategoryController::class, 'portCategoryList'])->name('port-category');

    // Budget Estimate Routes
    Route::get('add-budget-estimate', [BudgetEstimateController::class, 'addBudgetEstimateList'])->name('add-budget-estimate');
    Route::get('view-budget-estimate', [BudgetEstimateController::class, 'viewBudgetEstimateList'])->name('view-budget-estimate');
    Route::get('be-monthly-exp-add', [BudgetEstimateController::class, 'beMonthlyExpAdd'])->name('be-monthly-exp-add');
    Route::get('view-be-monthly-exp', [BudgetEstimateController::class, 'viewBeMonthlyExpList'])->name('view-be-monthly-exp');
    Route::get('be-report', [BudgetEstimateController::class, 'beReportList'])->name('be-report');

    // Revised Estimate Routes
    Route::get('add-revised-estimate', [RevisedEstimateController::class, 'addRevisedBudgetEstimateList'])->name('add-revised-estimate');
    Route::get('view-revised-estimate', [RevisedEstimateController::class, 'viewRevisedBudgetEstimateList'])->name('view-revised-estimate');
    Route::get('re-monthly-exp-add', [RevisedEstimateController::class, 'reMonthlyExpAdd'])->name('re-monthly-exp-add');
    Route::get('view-re-monthly-exp', [RevisedEstimateController::class, 'viewReMonthlyExpList'])->name('view-re-monthly-exp');
    Route::get('re-report', [RevisedEstimateController::class, 'reReportList'])->name('re-report');
});

// Other Routes Budget Estimate
Route::post('be-create', [BudgetEstimateController::class, 'beCreate'])->name('backend.be-create');
Route::post('beMonthlyExpCreate', [BudgetEstimateController::class, 'beMonthlyExpCreate'])->name('backend.beMonthlyExpCreate');
Route::post('/update-status', [BudgetEstimateController::class, 'updateStatus']);
Route::post('beMonthlyExpCreateEdit/{id?}', [BudgetEstimateController::class, 'beMonthlyExpCreateEdit']);
Route::post('/be-edit-updated-monthly', [BudgetEstimateController::class, 'beEditUpdatedMonthly']);
Route::get('be-export', [BudgetEstimateController::class, 'beExport'])->name('export');

// Other Routes Revised Estimate
Route::post('re-create', [RevisedEstimateController::class, 'reCreate'])->name('backend.re-create');
Route::post('reMonthlyExpCreate', [RevisedEstimateController::class, 'reMonthlyExpCreate'])->name('backend.reMonthlyExpCreate');
Route::post('/update-status-re', [RevisedEstimateController::class, 'reUpdateStatus']);
Route::post('reMonthlyExpCreateEdit/{id?}', [RevisedEstimateController::class, 'reMonthlyExpCreateEdit']);
Route::post('/re-edit-updated-monthly', [RevisedEstimateController::class, 'reEditUpdatedMonthly']);

// User Routes create User
Route::post('usercreate', [UserController::class, 'createUser'])->name('user.create');
Route::get('useredit/{id?}', [UserController::class, 'editUser'])->name('user.edit');

// Department Created Route
Route::post('departmentcreate', [DepartmentController::class, 'createDepartment'])->name('department.create');
Route::get('departmentedit/{id?}', [DepartmentController::class, 'editDepartment'])->name('department.edit');

// Additional Route port Name
Route::get('/portName/{id?}', [App\Http\Controllers\Backend\DashboardController::class, 'portName'])->name('portName');

// Role Route
Route::post('createRole', [App\Http\Controllers\Backend\RoleController::class, 'createRole'])->name('role.create');
Route::get('roleEdit/{id?}', [App\Http\Controllers\Backend\RoleController::class, 'editRole'])->name('role.edit');

// Port Category Controller
Route::post('createPortCategory', [App\Http\Controllers\Backend\PortCategoryController::class, 'createPortCategory'])->name('portCategory.create');
Route::get('portCategoryEdit/{id?}', [App\Http\Controllers\Backend\PortCategoryController::class, 'editPortCategory'])->name('portCategory.edit');

// Port Route
Route::post('createPort', [App\Http\Controllers\Backend\PortController::class, 'createPort'])->name('port.create');
Route::get('portEdit/{id?}', [App\Http\Controllers\Backend\PortController::class, 'editPort'])->name('port.edit');

// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$
// Route::post('fetch-statesBoard', [FormController::class, 'fetchStateBoard']);
// Route::post('fetch-port', [FormController::class, 'fetchPort']);
Route::get('/get-port-types', [FormController::class, 'getPortTypes']);
Route::get('/get-state-boards', [FormController::class, 'getStateBoards']);
Route::post('/get-ports', [FormController::class, 'getPorts']);
// $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$


// MAJOR/NON MAJOR PORTS AND CAPACITIES.
Route::get('view-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'viewMajorNonMajorPortCapacity'])->name('viewMajorNonMajorPortCapacity');
Route::get('add-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'addMajorNonMajorPortCapacity'])->name('addMajorNonMajorPortCapacity');
Route::post('save-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'saveMajorNonMajorPortCapacity'])->name('saveMajorNonMajorPortCapacity');
Route::get('edit-major-non-major-port-capacity/{id}', [App\Http\Controllers\Backend\FormController::class, 'editMajorNonMajorPortCapacity'])->name('editMajorNonMajorPortCapacity');
Route::put('update-major-non-major-port-capacity/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateMajorNonMajorPortCapacity'])->name('updateMajorNonMajorPortCapacity');


// Berth Related Information berth-related-information
Route::get('view-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'viewBerthRelatedInformation'])->name('viewBerthRelatedInformation');
Route::get('add-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'addBerthRelatedInformation'])->name('addBerthRelatedInformation');
Route::post('save-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'saveBerthRelatedInformation'])->name('saveBerthRelatedInformation');
Route::get('edit-berth-related-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editBerthRelatedInformation'])->name('editBerthRelatedInformation');
Route::put('update-berth-related-information/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateBerthRelatedInformation'])->name('updateBerthRelatedInformation');

// Direct Port Entry Delivery Related Containers direct-port-entry-delivery-related-containers
Route::get('view-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'viewDirectPortEntryDeliveryRelatedContainers'])->name('viewDirectPortEntryDeliveryRelatedContainers');
Route::get('add-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'addDirectPortEntryDeliveryRelatedContainers'])->name('addDirectPortEntryDeliveryRelatedContainers');
Route::post('save-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'saveDirectPortEntryDeliveryRelatedContainers'])->name('saveDirectPortEntryDeliveryRelatedContainers');
Route::get('edit-direct-port-entry-delivery-related-containers/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editDirectPortEntryDeliveryRelatedContainers'])->name('editDirectPortEntryDeliveryRelatedContainers');
Route::put('update-direct-port-entry-delivery-related-containers/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateDirectPortEntryDeliveryRelatedContainers'])->name('updateDirectPortEntryDeliveryRelatedContainers');

// Cruise Tourism cruise-tourism
Route::get('view-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'viewCruiseTourism'])->name('viewCruiseTourism');
Route::get('add-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'addCruiseTourism'])->name('addCruiseTourism');
Route::post('save-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'saveCruiseTourism'])->name('saveCruiseTourism');
Route::get('edit-cruise-tourism/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editCruiseTourism'])->name('editCruiseTourism');
Route::put('update-cruise-tourism/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateCruiseTourism'])->name('updateCruiseTourism');

// National Waterways Information national-waterways-information NationalWaterwaysInformation
Route::get('view-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'viewNationalWaterwaysInformation'])->name('viewNationalWaterwaysInformation');
Route::get('add-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'addNationalWaterwaysInformation'])->name('addNationalWaterwaysInformation');
Route::post('save-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'saveNationalWaterwaysInformation'])->name('saveNationalWaterwaysInformation');
Route::get('edit-national-waterways-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editNationalWaterwaysInformation'])->name('editNationalWaterwaysInformation');
Route::put('update-national-waterways-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateNationalWaterwaysInformation'])->name('updateNationalWaterwaysInformation');

// Indian Tonnage indian-tonnage IndianTonnage
Route::get('view-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'viewIndianTonnage'])->name('viewIndianTonnage');
Route::get('add-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'addIndianTonnage'])->name('addIndianTonnage');
Route::post('save-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'saveIndianTonnage'])->name('saveIndianTonnage');
Route::get('edit-indian-tonnage/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editIndianTonnage'])->name('editIndianTonnage');
Route::put('update-indian-tonnage/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateIndianTonnage'])->name('updateIndianTonnage');

// Seafarers Information seafarers-information SeafarersInformation
Route::get('view-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'viewSeafarersInformation'])->name('viewSeafarersInformation');
Route::get('add-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'addSeafarersInformation'])->name('addSeafarersInformation');
Route::post('save-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'saveSeafarersInformation'])->name('saveSeafarersInformation');
Route::get('edit-seafarers-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editSeafarersInformation'])->name('editSeafarersInformation');
Route::put('update-seafarers-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateSeafarersInformation'])->name('updateSeafarersInformation');

// Employment Major Ports employment-major-ports EmploymentMajorPorts
Route::get('view-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'viewEmploymentMajorPorts'])->name('viewEmploymentMajorPorts');
Route::get('add-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'addEmploymentMajorPorts'])->name('addEmploymentMajorPorts');
Route::post('save-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'saveEmploymentMajorPorts'])->name('saveEmploymentMajorPorts');
Route::get('edit-employment-major-ports/{id}', [App\Http\Controllers\Backend\FormController::class, 'editEmploymentMajorPorts'])->name('editEmploymentMajorPorts');
Route::put('update-employment-major-ports/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateEmploymentMajorPorts'])->name('updateEmploymentMajorPorts');

// Employment Dock Labour Boards Major Port employment-dock-labour-boards-major-port EmploymentDockLabourBoardsMajorPort
Route::get('view-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'viewEmploymentDockLabourBoardsMajorPort'])->name('viewEmploymentDockLabourBoardsMajorPort');
Route::get('add-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'addEmploymentDockLabourBoardsMajorPort'])->name('addEmploymentDockLabourBoardsMajorPort');
Route::post('save-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'saveEmploymentDockLabourBoardsMajorPort'])->name('saveEmploymentDockLabourBoardsMajorPort');
Route::get('edit-employment-dock-labour-boards-major-port/{id}', [App\Http\Controllers\Backend\FormController::class, 'editEmploymentDockLabourBoardsMajorPort'])->name('editEmploymentDockLabourBoardsMajorPort');
Route::put('update-employment-dock-labour-boards-major-port/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateEmploymentDockLabourBoardsMajorPort'])->name('updateEmploymentDockLabourBoardsMajorPort');

Route::get('blank-page', [DashboardController::class, 'blankPage'])->name('backend.blankPage');
