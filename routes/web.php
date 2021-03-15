<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/' , 'AdminController@index');



// ************************** task *************************

Route::get('task/datatable', 'Task\TaskController@datatable');
Route::resource('task', 'Task\TaskController');


// ******************** roles ******************

Route::get('/roles/select2-roles' , 'Rback\Roles\RoleController@select2');
Route::get('/roles/datatable' , 'Rback\Roles\RoleController@datatable');

Route::get('/roles/roles-assign-permissions/{id}' , 'Rback\Roles\RoleController@assignPermission');
Route::post('/roles/roles-assign-permissions-to-role' , 'Rback\Roles\RoleController@assignPermissionToRole');

Route::resource('/roles' , 'Rback\Roles\RoleController');

// **********************permissions ********************************

Route::get('/permissions/datatable' , 'Rback\Permissions\PermissionController@datatable');
Route::resource('/permissions' , 'Rback\Permissions\PermissionController');

// **********************users ********************************

Route::get('/employees/select2' , 'Rback\Users\EmployeeController@select2');
Route::get('/employees/datatable' , 'Rback\Users\EmployeeController@datatable');
Route::resource('/employees' , 'Rback\Users\EmployeeController');

//********************* Research ******************//
Route::group(['prefix' => 'research'], function () {
	Route::post('/research-task/change-status', 'Research\ResearchController@changeStatus');
	Route::get('/research-task/datatable' , 'Research\ResearchController@datatable');
	Route::resource('/research-task' , 'Research\ResearchController');
	Route::post('/funders/change-status', 'Research\FunderController@changeStatus');


	Route::get('/funders/select2' , 'Research\FunderController@select2');
	Route::get('/funders-datatable' , 'Research\FunderController@datatable');
	Route::resource('/funders' , 'Research\FunderController');
	Route::post('/training-form/change-status', 'Research\TrainingFormController@changeStatus');
	Route::get('/training-form/datatable' , 'Research\TrainingFormController@datatable');
	Route::resource('/training-form' , 'Research\TrainingFormController');
});

//********************* Mady SkinCare ******************//
Route::group(['prefix' => 'skincare'], function () {

	Route::get('/inventory/batch/datatable', 'Skincare\Inventory\BatchController@datatable');

	Route::resource('/inventory/batch', 'Skincare\Inventory\BatchController');
	Route::get('/inventory/chemical/datatable', 'Skincare\Inventory\ChemicalController@datatable');
	Route::resource('/inventory/chemical', 'Skincare\Inventory\ChemicalController');
	Route::get('/inventory/equipment/datatable', 'Skincare\Inventory\EquipmentController@datatable');
	Route::resource('/inventory/equipment', 'Skincare\Inventory\EquipmentController');
	Route::get('/inventory/glasssware/datatable', 'Skincare\Inventory\GlassWareController@datatable');
	Route::resource('/inventory/glasssware', 'Skincare\Inventory\GlassWareController');
	Route::get('/inventory/soldstatus/datatable', 'Skincare\Inventory\SoldStatusController@datatable');
	Route::resource('/inventory/soldstatus', 'Skincare\Inventory\SoldStatusController');
	Route::get('/formulation/datatable', 'Skincare\FormulationController@datatable');
	Route::resource('/formulation', 'Skincare\FormulationController');

	Route::get('/vendors/select2', 'Skincare\Vendor\VendorController@select2');
	Route::get('/vendors/datatable', 'Skincare\Vendor\VendorController@datatable');
	Route::resource('/vendors', 'Skincare\Vendor\VendorController');

	Route::post('/purchase-order/change-order-status', 'Skincare\PurchaseOrder\PurchaseOrderController@changeOrderStatus');
	Route::get('/purchase-order/datatable', 'Skincare\PurchaseOrder\PurchaseOrderController@datatable');
	Route::resource('/purchase-order', 'Skincare\PurchaseOrder\PurchaseOrderController');
	Route::get('/costing/datatable', 'Skincare\Costing\CostingController@datatable');
	Route::resource('/costing', 'Skincare\Costing\CostingController');
	Route::get('/trend-analysis/datatable', 'Skincare\TrendAnalysis\TrendAnalysisController@datatable');
	Route::resource('/trend-analysis', 'Skincare\TrendAnalysis\TrendAnalysisController');

});
//********************* Consultancy *********************//
Route::group(['prefix' => 'consultancies'], function () {
	Route::get('/consultancy/datatable', 'Consultancy\ConsultancyController@datatable');
	Route::resource('/consultancy', 'Consultancy\ConsultancyController');
});
//********************* CRO *********************//
Route::group(['prefix' => 'cro'], function () {
	Route::post('/project/change-status', 'CRO\ProjectController@changeStatus');
	Route::get('/project/datatable', 'CRO\ProjectController@datatable');
	Route::resource('/project', 'CRO\ProjectController');
});
//********************* CRO *********************//
Route::group(['prefix' => 'community-awareness'], function () {
	Route::post('/project/change-status', 'CommunityAwareness\ProjectController@changeStatus');
	Route::get('/project/datatable', 'CommunityAwareness\ProjectController@datatable');
	Route::resource('/project', 'CommunityAwareness\ProjectController');
});

// ************************* New Requirements *********************************

Route::group(['prefix' => 'dhaaga-clothings'], function () {

	Route::get('/vendors/select2', 'DhaagaClothing\Vendor\VendorController@select2');
	Route::get('/vendors/datatable', 'DhaagaClothing\Vendor\VendorController@datatable');
	Route::resource('/vendors', 'DhaagaClothing\Vendor\VendorController');

	Route::post('/purchase-order/change-order-status', 'DhaagaClothing\PurchaseOrder\PurchaseOrderController@changeOrderStatus');
	Route::get('/purchase-order/datatable', 'DhaagaClothing\PurchaseOrder\PurchaseOrderController@datatable');
	Route::resource('/purchase-order', 'DhaagaClothing\PurchaseOrder\PurchaseOrderController');

	Route::get('/trend-analysis/datatable', 'DhaagaClothing\TrendAnalysis\TrendAnalysisController@datatable');
	Route::resource('/trend-analysis', 'DhaagaClothing\TrendAnalysis\TrendAnalysisController');

	Route::get('/women-stitching-registration/datatable', 'DhaagaClothing\WomenStitchingRegistrationRecord\StitchingRegistrationController@datatable');
	Route::resource('/women-stitching-registration', 'DhaagaClothing\WomenStitchingRegistrationRecord\StitchingRegistrationController');

	Route::get('/women-product-registration/datatable', 'DhaagaClothing\WomenPreparedProductsRegistrationRecord\PreparedProductsRegistrationController@datatable');
	Route::resource('/women-product-registration', 'DhaagaClothing\WomenPreparedProductsRegistrationRecord\PreparedProductsRegistrationController');

	Route::get('/costing/datatable', 'DhaagaClothing\costing\CostingController@datatable');
	Route::resource('/costing', 'DhaagaClothing\costing\CostingController');

});

Route::group(['prefix' => 'dastarkhwan'], function () {

	Route::get('/daily-expense-sheet/datatable', 'Dastarkhwan\DailyExpenseSheetController@datatable');
	Route::resource('/daily-expense-sheet', 'Dastarkhwan\DailyExpenseSheetController');

	Route::get('/daily-dastarkhwan-record/datatable', 'Dastarkhwan\DailyDastarkhwanRecordController@datatable');
	Route::resource('/daily-dastarkhwan-record', 'Dastarkhwan\DailyDastarkhwanRecordController');

});



// Chat
Route::resource('/inbox' , 'Chat\ChatController');
// Route::get('/{page}', 'AdminController@index');
Auth::routes();

Route::resource('/logout', 'Auth\LogoutController');
