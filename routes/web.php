<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\FormController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

    // Route::get('user', [App\Http\Controllers\Backend\UserController::class, 'userList'])->name('user');
    Route::get('user', [App\Http\Controllers\Backend\UserController::class, 'userList'])->name('user');
    Route::get('add-user', [App\Http\Controllers\Backend\UserController::class, 'addUser'])->name('addUser');
    // Route::post('save-user', [App\Http\Controllers\Backend\UserController::class, 'saveUser'])->name('saveUser');
    Route::get('edit-user/{id}', [App\Http\Controllers\Backend\UserController::class, 'editUser'])->name('editUser');
    // Route::put('update-user/{id}', [App\Http\Controllers\Backend\UserController::class, 'updateUser'])->name('updateUser');
    Route::get('role', [App\Http\Controllers\Backend\RoleController::class, 'roleList'])->name('role');
    Route::get('port', [App\Http\Controllers\Backend\PortController::class, 'portList'])->name('port');
    Route::get('port-category', [App\Http\Controllers\Backend\PortCategoryController::class, 'portCategoryList'])->name('port-category');

    Route::get('view-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'viewMajorNonMajorPortCapacity'])->name('view-major-non-major-port-capacity');
    Route::get('view-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'viewBerthRelatedInformation'])->name('view-berth-related-information');
    Route::get('view-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'viewDirectPortEntryDeliveryRelatedContainers'])->name('view-direct-port-entry-delivery-related-containers');
    Route::get('view-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'viewCruiseTourism'])->name('view-cruise-tourism');
    Route::get('view-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'viewNationalWaterwaysInformation'])->name('view-national-waterways-information');
    Route::get('view-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'viewIndianTonnage'])->name('view-indian-tonnage');
    Route::get('view-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'viewSeafarersInformation'])->name('view-seafarers-information');
    Route::get('view-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'viewEmploymentMajorPorts'])->name('view-employment-major-ports');
    Route::get('view-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'viewEmploymentDockLabourBoardsMajorPort'])->name('view-employment-dock-labour-boards-major-port');
});

// Module Route Add
Route::get('add-module', [App\Http\Controllers\Backend\ModuleController::class, 'addModule'])->name('addModule');
Route::get('edit-module', [App\Http\Controllers\Backend\ModuleController::class, 'editModule'])->name('editModule');

// Role Add
Route::get('add-role', [App\Http\Controllers\Backend\RoleController::class, 'addRole'])->name('backend.addRole');
Route::get('edit-role/{id}', [App\Http\Controllers\Backend\RoleController::class, 'editRole'])->name('backend.editRole');
Route::post('save-role', [App\Http\Controllers\Backend\RoleController::class, 'saveRole'])->name('backend.saveRole');
Route::put('update-role/{id}', [App\Http\Controllers\Backend\RoleController::class, 'updateRole'])->name('backend.updateRole');





// User Routes create User
Route::post('usercreate', [UserController::class, 'createUser'])->name('user.create');
Route::get('useredit/{id?}', [UserController::class, 'editUser'])->name('user.edit');

// Route::get('add-user', [UserController::class, 'addUser'])->name('addUser');
Route::post('save-user', [App\Http\Controllers\Backend\UserController::class, 'saveUser'])->name('saveUser');
// Route::get('edit-user/{id}', [App\Http\Controllers\Backend\UserController::class, 'editUser'])->name('editUser');
Route::put('update-user/{id}', [App\Http\Controllers\Backend\UserController::class, 'updateUser'])->name('updateUser');


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
Route::get('add-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'addMajorNonMajorPortCapacity'])->name('addMajorNonMajorPortCapacity');
Route::post('save-major-non-major-port-capacity', [App\Http\Controllers\Backend\FormController::class, 'saveMajorNonMajorPortCapacity'])->name('saveMajorNonMajorPortCapacity');
Route::get('edit-major-non-major-port-capacity/{id}', [App\Http\Controllers\Backend\FormController::class, 'editMajorNonMajorPortCapacity'])->name('editMajorNonMajorPortCapacity');
Route::put('update-major-non-major-port-capacity/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateMajorNonMajorPortCapacity'])->name('updateMajorNonMajorPortCapacity');


// Berth Related Information berth-related-information
Route::get('add-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'addBerthRelatedInformation'])->name('addBerthRelatedInformation');
Route::post('save-berth-related-information', [App\Http\Controllers\Backend\FormController::class, 'saveBerthRelatedInformation'])->name('saveBerthRelatedInformation');
Route::get('edit-berth-related-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editBerthRelatedInformation'])->name('editBerthRelatedInformation');
Route::put('update-berth-related-information/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateBerthRelatedInformation'])->name('updateBerthRelatedInformation');

// Direct Port Entry Delivery Related Containers direct-port-entry-delivery-related-containers
Route::get('add-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'addDirectPortEntryDeliveryRelatedContainers'])->name('addDirectPortEntryDeliveryRelatedContainers');
Route::post('save-direct-port-entry-delivery-related-containers', [App\Http\Controllers\Backend\FormController::class, 'saveDirectPortEntryDeliveryRelatedContainers'])->name('saveDirectPortEntryDeliveryRelatedContainers');
Route::get('edit-direct-port-entry-delivery-related-containers/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editDirectPortEntryDeliveryRelatedContainers'])->name('editDirectPortEntryDeliveryRelatedContainers');
Route::put('update-direct-port-entry-delivery-related-containers/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateDirectPortEntryDeliveryRelatedContainers'])->name('updateDirectPortEntryDeliveryRelatedContainers');

// Cruise Tourism cruise-tourism
Route::get('add-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'addCruiseTourism'])->name('addCruiseTourism');
Route::post('save-cruise-tourism', [App\Http\Controllers\Backend\FormController::class, 'saveCruiseTourism'])->name('saveCruiseTourism');
Route::get('edit-cruise-tourism/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editCruiseTourism'])->name('editCruiseTourism');
Route::put('update-cruise-tourism/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateCruiseTourism'])->name('updateCruiseTourism');

// National Waterways Information national-waterways-information NationalWaterwaysInformation
Route::get('add-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'addNationalWaterwaysInformation'])->name('addNationalWaterwaysInformation');
Route::post('save-national-waterways-information', [App\Http\Controllers\Backend\FormController::class, 'saveNationalWaterwaysInformation'])->name('saveNationalWaterwaysInformation');
Route::get('edit-national-waterways-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editNationalWaterwaysInformation'])->name('editNationalWaterwaysInformation');
Route::put('update-national-waterways-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateNationalWaterwaysInformation'])->name('updateNationalWaterwaysInformation');

// Indian Tonnage indian-tonnage IndianTonnage
Route::get('add-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'addIndianTonnage'])->name('addIndianTonnage');
Route::post('save-indian-tonnage', [App\Http\Controllers\Backend\FormController::class, 'saveIndianTonnage'])->name('saveIndianTonnage');
Route::get('edit-indian-tonnage/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editIndianTonnage'])->name('editIndianTonnage');
Route::put('update-indian-tonnage/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateIndianTonnage'])->name('updateIndianTonnage');

// Seafarers Information seafarers-information SeafarersInformation
Route::get('add-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'addSeafarersInformation'])->name('addSeafarersInformation');
Route::post('save-seafarers-information', [App\Http\Controllers\Backend\FormController::class, 'saveSeafarersInformation'])->name('saveSeafarersInformation');
Route::get('edit-seafarers-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'editSeafarersInformation'])->name('editSeafarersInformation');
Route::put('update-seafarers-information/{id?}', [App\Http\Controllers\Backend\FormController::class, 'updateSeafarersInformation'])->name('updateSeafarersInformation');

// Employment Major Ports employment-major-ports EmploymentMajorPorts
Route::get('add-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'addEmploymentMajorPorts'])->name('addEmploymentMajorPorts');
Route::post('save-employment-major-ports', [App\Http\Controllers\Backend\FormController::class, 'saveEmploymentMajorPorts'])->name('saveEmploymentMajorPorts');
Route::get('edit-employment-major-ports/{id}', [App\Http\Controllers\Backend\FormController::class, 'editEmploymentMajorPorts'])->name('editEmploymentMajorPorts');
Route::put('update-employment-major-ports/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateEmploymentMajorPorts'])->name('updateEmploymentMajorPorts');

// Employment Dock Labour Boards Major Port employment-dock-labour-boards-major-port EmploymentDockLabourBoardsMajorPort
Route::get('add-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'addEmploymentDockLabourBoardsMajorPort'])->name('addEmploymentDockLabourBoardsMajorPort');
Route::get('/data-get-port-types', [FormController::class, 'dataPortTypes']);
Route::post('save-employment-dock-labour-boards-major-port', [App\Http\Controllers\Backend\FormController::class, 'saveEmploymentDockLabourBoardsMajorPort'])->name('saveEmploymentDockLabourBoardsMajorPort');
Route::get('edit-employment-dock-labour-boards-major-port/{id}', [App\Http\Controllers\Backend\FormController::class, 'editEmploymentDockLabourBoardsMajorPort'])->name('editEmploymentDockLabourBoardsMajorPort');
Route::put('update-employment-dock-labour-boards-major-port/{id}', [App\Http\Controllers\Backend\FormController::class, 'updateEmploymentDockLabourBoardsMajorPort'])->name('updateEmploymentDockLabourBoardsMajorPort');

Route::get('blank-page', [DashboardController::class, 'blankPage'])->name('backend.blankPage');

Route::get('Cargo-Overview-Data-Report-For-All-Port-Major', [DashboardController::class, 'getCargoOverviewDataReportForAllPortMajor'])->name('backend.getCargoOverviewDataReportForAllPortMajor');
Route::get('view-Cargo-Overview-Data-Report-For-All-Port-Major', [DashboardController::class, 'viewGetCargoOverviewDataReportForAllPortMajor'])->name('backend.viewGetCargoOverviewDataReportForAllPortMajor');

Route::get('Cargo-Overview-Data-Report-For-All-Port-Non-Major', [DashboardController::class, 'getCargoOverviewDataReportForAllPortNonMajor'])->name('backend.getCargoOverviewDataReportForAllPortNonMajor');
Route::get('view-Cargo-Overview-Data-Report-For-All-Port-Non-Major', [DashboardController::class, 'viewGetCargoOverviewDataReportForAllPortNonMajor'])->name('backend.viewGetCargoOverviewDataReportForAllPortNonMajor');


// Optimize
Route::get('/Optimize', function () {
    // Config Cache & Clear
    $configcache = Artisan::call('config:cache');
    $configclear = Artisan::call('config:clear');
    // Cache Clear
    $cacheclear = Artisan::call('cache:clear');
    // Route Cache & Clear
    $routeclear = Artisan::call('route:clear');
    $routecache = Artisan::call('route:cache');
    // View Clear
    $viewclear = Artisan::call('view:clear');
    $viewcache = Artisan::call('view:cache');

    echo "Optimize ...!<br>";
    // return redirect()->back()->with("success", "Optimize ...!");
});

// Migrate Fresh Table
Route::get('/re-migrate', function () {
    // Migrate Fresh Table
    $migrate = Artisan::call('migrate:fresh');
    echo "Migrate Fresh...!<br>";
});

// // Seeder
Route::get('/db-seed', function () {
    // php artisan db:seed
    $dbseed = Artisan::call('db:seed');

    echo "DB Seed!<br>";
});

Route::get('phpinfo', fn () => phpinfo());


Route::get('/chart-data', [App\Http\Controllers\Backend\DashboardController::class, 'getData']);

