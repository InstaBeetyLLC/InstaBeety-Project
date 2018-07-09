<?php


Route::get('/', ['as' => 'HomeSweet', 'uses' => 'HomeController@index']);
Route::get('/inbox', ['as' => 'myInbox', 'uses' => 'InboxController@index']);
Route::get('/compose_email', ['as' => 'composeEmail', 'uses' => 'InboxController@compose']);
Route::get('/get_emails_list', ['as' => 'getEmailsList', 'uses' => 'InboxController@getUsersEmail']);
Route::get('/email_view', ['as' => 'emailView', 'uses' => 'InboxController@show']);
Route::get('/delete_message', ['as' => 'message.delete', 'uses' => 'InboxController@delete']);
Route::post('/bulk_delete_message', ['as' => 'messages.bulkDelete', 'uses' => 'InboxController@bulkDelete']);
Route::post('/send_email', ['as' => 'sendEmail', 'uses' => 'InboxController@sendEmail']);


Route::get('/profile', ['as' => 'users.profile', 'uses' => 'UserController@profile']);
Route::post('/update_profile', ['as' => 'users.updateProfile', 'uses' => 'UserController@updateProfile']);


Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@dashboard', 'middleware' => ['role:admin']]);
Route::get('/dashboardV2', ['as' => 'dashboardV2', 'uses' => 'HomeController@dashboardV2', 'middleware' => ['role:admin']]);
Route::get('/chart_details', ['as' => 'dashboard.chartDetails', 'uses' => 'HomeController@chartDetails', 'middleware' => ['role:admin']]);

Route::get('get_region_cities', 'AssignManagerController@get_region_cities');
Route::post('submit_manager_assign', 'AssignManagerController@submit_manager_assign');

Route::get('assign_promoter', ['as' => 'assignPromoter', 'uses' => 'AssignPromoterController@assignPromoter']);
Route::get('view_promoters_stores', ['as' => 'viewPromotersStores', 'uses' => 'AssignPromoterController@viewAssignedPromoter']);


//Route::get('get_city_stores', 'AssignPromoterController@get_city_stores');

Route::get('get_city_stores', 'AssignPromoterController@getCityStores');
Route::get('get_store_accounts', 'AssignPromoterController@getStoreAccounts');
Route::post('assign_promoter', ['as' => 'promoter.assign', 'uses' => 'AssignPromoterController@save']);


Route::get('view_managers_cities', ['as' => 'viewManagerCities', 'uses' => 'AssignManagerController@view_managers_cities']);


Route::delete('delete_manager_city', ['as' => 'deleteManagerCity', 'uses' => 'AssignManagerController@delete']);

Route::get('edit_manager_cities', ['as' => 'edit_manager_cities', 'uses' => 'AssignManagerController@edit_manager_assign']);
Route::post('submit_manager_assign_edit', ['as'   => 'EditManagerAssign',
                                           'uses' => 'AssignManagerController@submit_manager_assign_edit']);

Route::get('edit_assigned_promoters', ['as' => 'assignedPromoters.edit', 'uses' => 'AssignPromoterController@edit']);

Route::post('submit_promoter_assign_edit', ['as' => 'assignedPromoters.update', 'uses' => 'AssignPromoterController@update']);


Route::get('get_sub_categories', ['as' => 'getSubCategories', 'uses' => 'ProductsController@getSubCategories']);
Route::get('get_categories', ['as' => 'getCategories', 'uses' => 'ProductsController@getCategories']);
Route::get('get_models', ['as' => 'getModels', 'uses' => 'ProductsController@getModels']);
Route::post('store_product', ['as' => 'storeProduct', 'uses' => 'ProductsController@store']);
Route::get('new_product', ['as' => 'products.create', 'uses' => 'ProductsController@create']);


Route::post('uploadCsvFile', ['as' => 'uploadCsvFile', 'uses' => 'StoreProductController@uploadCsvFile']);

Route::get('edit_product', ['as' => 'edit_product', 'uses' => 'ProductsController@edit']);
Route::get('delete_product', ['as' => 'delete_product', 'uses' => 'ProductsController@destroy']);
Route::post('update_product', ['as' => 'update_product', 'uses' => 'ProductsController@update']);
Route::get('view_product', ['as' => 'view_product', 'uses' => 'ProductsController@show']);


Route::resource("competitors", "CompetitorController");
Route::resource("product_shares", "ProductShareController");
Route::resource("comments", "CommentController");

Auth::routes();


//Route::group(['middleware' => 'role:admin'], function ($router) {

    Route::resource("cities", "CityController");
    Route::resource("regions", "RegionController");
    Route::resource("locations", "LocationController"); // Add this line in routes.php
    Route::resource("accounts", "AccountController");
    Route::resource("users", "UserController");
    Route::resource("categories", "CategoryController");
    Route::resource("sub_categories", "SubCategoryController");
    Route::resource("brands", "BrandController");
    Route::get('assign_manager', ['as' => 'assign.manager', 'uses' => 'AssignManagerController@assign_manager']);
    Route::resource("items", "ItemController");
    Route::resource("models", "ModelController");
//});

Route::resource("stores", "StoreController");
//, ['except' => ['index', 'products']]
Route::get('/home', 'HomeController@index');
Route::resource("store_products", "StoreProductController");
Route::get('delete_store_product', ['as' => 'products.delete', 'uses' => 'StoreProductController@delete']);
Route::get("account_promoters", ['as' => 'accountPromoters', 'uses' => 'AccountController@accountPromoters']);

Route::get('get_city_locations', ['as' => 'getCityLocations', 'uses' => 'StoreController@getCityLocations']);
Route::get('list_store_products', ['as' => 'listStoreProduct', 'uses' => 'StoreController@products']);


Route::delete('delete_promoter_store', ['as' => 'deletePromoterStore', 'uses' => 'AssignPromoterController@delete']);


Route::get('products', ['as' => 'store_products.products', 'uses' => 'StoreProductController@products']);
Route::get('locationDistributedReports', ['as' => 'store_products.locationDistributedReports', 'uses' => 'StoreProductController@locationDistributedReports']);
Route::get('getRegionCities', ['as' => 'getRegionCities', 'uses' => 'AssignManagerController@getCities']);
Route::get('getStoresAsCheckBoxes', ['as' => 'getStoresAsCheckBoxes', 'uses' => 'AssignManagerController@getStoresAsCheckBoxes']);
Route::get('getStoreAccounts', ['as' => 'getStoreAccounts', 'uses' => 'AssignManagerController@getStoreAccounts']);


Route::get('imager/{size?}/{image?}', ['as' => 'imager', 'uses' => 'HomeController@imager'])->where('image', '[A-Za-z0-9\/\.\-\_]+');


Route::get('getRolesAccounts', ['as' => 'getRolesAccounts', 'uses' => 'AssignPromoterController@getRolesAccounts']);
Route::get('logoutUser', ['as' => 'logoutUser', 'uses' => 'HomeController@logoutUser']);
Route::get('attendanceReports', ['as' => 'store_products.attendanceReports', 'uses' => 'StoreProductController@attendanceReports']);

Route::get('product_status_list', ['as' => 'store_products.getPrStatus', 'uses' => 'StoreProductController@getPrStatus']);
Route::get('viewOrAdd', ['as' => 'store_products.viewOrAdd', 'uses' => 'StoreProductController@viewOrAdd']);
