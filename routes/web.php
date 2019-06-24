<?php
//Admin Dashboard
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@show')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/password/reset','DashboardController@resetPassword');
        Route::post('/password/reset','DashboardController@password')->name("admin.reset");
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('types/json', 'PropertyTypeController@json');
        Route::resource('types', 'PropertyTypeController');
        Route::resource('unittypes', 'RoomTypeController');
        Route::resource('period', 'PeriodController');
        Route::get('agents', 'AgentController@index')->name("agent.index");
        Route::get('agent/aprrove/{id}', 'AgentController@approve');
        Route::get('agent/decline/{id}', 'AgentController@decline');
        Route::get('agent/suspend/{id}', 'AgentController@suspend');
        Route::get('agent/unsuspend/{id}', 'AgentController@unsuspend');
        Route::get('owners', 'OwnerController@index')->name("owner.admin");
        Route::get('owner/aprrove/{id}', 'OwnerController@approve');
        Route::get('owner/decline/{id}', 'OwnerController@decline');
        Route::get('owner/suspend/{id}', 'OwnerController@suspend');
        Route::get('owner/unsuspend/{id}', 'OwnerController@unsuspend');
        Route::resource('vendor', 'VendorController');
        Route::resource('tenant', 'TenantController');
        Route::get('vendor/aprrove/{id}', 'VendorController@approve');
        Route::get('vendor/decline/{id}', 'VendorController@decline');
        Route::get('tenant/aprrove/{id}', 'TenantController@approve');
        Route::get('tenant/decline/{id}', 'TenantController@decline');
    });
});

//Tenant Dashboard.
Route::group(['prefix' => 'tenant', 'namespace' => 'Tenant'], function () {
    Route::get('login', 'TenantController@showLogin')->name('tenant.login');
    Route::post('login', 'TenantController@login');
    Route::group(['middleware' => 'auth:tenant'], function () {
        Route::get('/password/reset','TenantController@resetPassword');
        Route::post('/password/reset','TenantController@password')->name("tenant.reset");
        Route::get('dashboard', 'TenantController@index')->name('tenant.dashboard');
        Route::get('room/{room}', 'TenantController@show')->name('tenant.room');
        Route::get('invoice', 'InvoiceController@index')->name('tenant.invoice');
        Route::get('complains', 'ComplainsController@index')->name('complains.index');
        Route::post('complains', 'ComplainsController@store')->name('complains.store');
        Route::delete('complains/{complain}', 'ComplainsController@destroy')->name('complains.destroy');
        Route::resource('tasks', 'TaskController');
        Route::resource('notices', 'NoticeController');
        Route::resource('reports', 'ReportController');
        Route::get('profile', 'SettingsController@profile')->name("tenant.profile");
        Route::post('profile', 'SettingsController@uploadpic')->name("tenant.upload");
    });
});

//Property Owners Dashboard.
Route::group(['prefix' => 'owner', 'namespace' => 'Owner'], function () {
    Route::get('login', 'OwnerController@showLogin')->name('owner.login');
    Route::post('login', 'OwnerController@login');
    Route::group(['middleware' => 'auth:owner'], function () {
        Route::get('/password/reset','OwnerController@resetPassword');
        Route::post('/password/reset','OwnerController@password')->name("owner.reset");
        Route::get('dashboard', 'OwnerController@index')->name('owner.dashboard');
        Route::get('complains', 'ComplainsController@index')->name('owner.complains');
        Route::resource('tasks', 'TaskController');
        Route::post('tenant/assign/{room}/{tenant}', 'TenantController@assign');
        Route::get('tenant/search', 'TenantController@search');
        Route::resource('tenant', 'TenantController');
        Route::post('tenant/profile/{id}', 'TenantController@uploadpic');
        Route::get('invoice', 'InvoiceController@index')->name('owner.invoice');
        Route::resource('maintenance', 'MaintenanceController');
        Route::get('maintenance/approve/{id}', 'MaintenanceController@approve');
        Route::get('maintenance/decline/{id}', 'MaintenanceController@decline');
        Route::get('listings/unit/{id}', 'ListingController@units');
        Route::resource('listings', 'ListingController');
        Route::resource('rent', 'RentController');
        Route::resource('expense', 'ExpenseController');
        Route::resource('room', 'RoomController');
        
    });
});

//Property Managers/agents Dashboard.
Route::group(['prefix' => 'agent', 'namespace' => 'Agent'], function () {
    Route::get('login', 'AgentController@showLogin')->name('agent.login');
    Route::post('login', 'AgentController@login');
    
    Route::group(['middleware' => 'auth:agent'], function () {
        Route::get('/password/reset','AgentController@resetPassword')->name('password.request');
        Route::post('/password/reset','AgentController@password')->name('agent.reset');
        Route::get('dashboard', 'AgentController@index')->name('agent.dashboard');
        Route::resource('listing', 'ListingController');
        Route::resource('owner', 'OwnerController');
        Route::resource('room', 'RoomController');
        Route::post('tenant/assign/{room}/{tenant}', 'TenantController@assign');
        Route::get('tenant/search', 'TenantController@search');
        Route::resource('tenant', 'TenantController');
        Route::post('tenant/profile/{id}', 'TenantController@uploadpic');
        Route::resource('tasks', 'TaskController');
        Route::get('account/search', 'AccountController@search');
        Route::resource('account', 'AccountController');
        Route::resource('rent', 'RentController');
        Route::resource('maintenance', 'MaintenanceController');
        Route::resource('vendor', 'VendorController');
        Route::resource('expense', 'ExpenseController');
        Route::post('/invoice/email/{invoice}', 'InvoiceController@email');
        Route::resource('invoice', 'InvoiceController');
        Route::get('/payment', 'PaymentController@index')->name('agent.payment');
        Route::post('/invoice/payment/{invoice}', 'PaymentController@store');
        Route::get('complains', 'ComplainsController@index')->name('agent.complains');
        Route::get('profile', 'SettingsController@profile')->name("agent.profile");
        Route::post('profile', 'SettingsController@uploadpic')->name("agent.upload");
        Route::get('expense/approve/{id}', 'ExpenseController@approve');
        Route::get('expense/decline/{id}', 'ExpenseController@decline');
    });
});

//Property Vendors Dashboard.
Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor'], function () {
    Route::get('login', 'VendorController@showLogin')->name('vendor.login');
    Route::post('login', 'VendorController@login');
    Route::group(['middleware' => 'auth:vendor'], function () {
        Route::get('/password/reset','VendorController@resetPassword');
        Route::post('/password/reset','VendorController@password')->name("vendor.reset");
        Route::get('dashboard', 'VendorController@index')->name('vendor.dashboard');
        Route::resource('maintenance', 'MaintenanceController');
        Route::resource('expense', 'ExpenseController');
        Route::resource('tasks', 'TaskController');
    });
});

//Property Demo Dashboard.
Route::group(['prefix' => 'demo', 'namespace' => 'Demo'], function () {
    Route::get('login', 'DemoController@showLogin')->name('demo.login');
    Route::post('login', 'DemoController@login');
    Route::group(['middleware' => 'auth:demo'], function () {
        Route::get('dashboard', 'DemoController@index')->name('demo.dashboard');
    });
});

Route::get("sendsms","SMSController@sendsms");
Route::get('profiles/notifications', 'UserNotificationsController@index')->name('user-notifications');
Route::delete('profiles/notifications/{notification}', 'UserNotificationsController@destroy')->name('user-notification.destroy');

Route::get('/', 'SystemController@index')->name('sys.index');
Route::get('/howitworks', 'SystemController@howitworks')->name('sys.howitworks');
Route::get('/whyusethesoftware', 'SystemController@whyusethesoftware')->name('sys.whyusethesoftware');
Route::get('/whatyouget', 'SystemController@whatyouget')->name('sys.whatyouget');
Route::post('/system/login', 'SystemController@login')->name('sys.login.post');
Route::get('register','Auth\RegisterController@showRegistrationForm');
Route::post('register', [
  'as' => '',
  'uses' => 'Auth\RegisterController@register'
]);

Route::get('{entity}/logout', 'Auth\LoginController@logout');

Auth::routes();


