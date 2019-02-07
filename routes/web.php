<?php
//Admin Dashboard
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'LoginController@show')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
        Route::get('types/json', 'PropertyTypeController@json');
        Route::resource('types', 'PropertyTypeController');
        Route::resource('unittypes', 'RoomTypeController');
        Route::resource('period', 'PeriodController');
    });
});

//Tenant Dashboard.
Route::group(['prefix' => 'tenant', 'namespace' => 'Tenant'], function () {
    Route::get('login', 'TenantController@showLogin')->name('tenant.login');
    Route::post('login', 'TenantController@login');
    Route::group(['middleware' => 'auth:tenant'], function () {
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
        Route::get('dashboard', 'OwnerController@index')->name('owner.dashboard');
        Route::get('complains', 'ComplainsController@index')->name('owner.complains');
    });
});

//Property Managers/agents Dashboard.
Route::group(['prefix' => 'agent', 'namespace' => 'Agent'], function () {
    Route::get('login', 'AgentController@showLogin')->name('agent.login');
    Route::post('login', 'AgentController@login');
    Route::get('/password/reset','AgentController@resetPassword')->name('password.request');
    Route::post('/password/reset','AgentController@password')->name('agent.reset');
    Route::group(['middleware' => 'auth:agent'], function () {
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
        Route::resource('expense', 'ExpenseController');
        Route::post('/invoice/email/{invoice}', 'InvoiceController@email');
        Route::resource('invoice', 'InvoiceController');
        Route::get('/payment', 'PaymentController@index')->name('agent.payment');
        Route::post('/invoice/payment/{invoice}', 'PaymentController@store');
        Route::get('complains', 'ComplainsController@index')->name('agent.complains');
        Route::get('profile', 'SettingsController@profile')->name("agent.profile");
        Route::post('profile', 'SettingsController@uploadpic')->name("agent.upload");
    });
});

//Property Vendors Dashboard.
Route::group(['prefix' => 'vendor', 'namespace' => 'Vendor'], function () {
    Route::get('login', 'VendorController@showLogin')->name('vendor.login');
    Route::post('login', 'VendorController@login');
    Route::group(['middleware' => 'auth:vendor'], function () {
        Route::get('dashboard', 'VendorController@index')->name('vendor.dashboard');
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


Route::get('profiles/notifications', 'UserNotificationsController@index')->name('user-notifications');
Route::delete('profiles/notifications/{notification}', 'UserNotificationsController@destroy')->name('user-notification.destroy');

Route::get('/', 'SystemController@index')->name('sys.index');
Route::get('/howitworks', 'SystemController@howitworks')->name('sys.howitworks');
Route::get('/whyusethesoftware', 'SystemController@whyusethesoftware')->name('sys.whyusethesoftware');
Route::get('/whatyouget', 'SystemController@whatyouget')->name('sys.whatyouget');
Route::post('/system/login', 'SystemController@login')->name('sys.login.post');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
