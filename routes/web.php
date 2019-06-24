<?php
Route::get('/', 'HomeController@index1');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('companies', 'Admin\CompaniesController');
    Route::post('companies_mass_destroy', ['uses' => 'Admin\CompaniesController@massDestroy', 'as' => 'companies.mass_destroy']);
    Route::post('companies_restore/{id}', ['uses' => 'Admin\CompaniesController@restore', 'as' => 'companies.restore']);
    Route::delete('companies_perma_del/{id}', ['uses' => 'Admin\CompaniesController@perma_del', 'as' => 'companies.perma_del']);
    Route::resource('clients', 'Admin\ClientsController');
    Route::post('clients_mass_destroy', ['uses' => 'Admin\ClientsController@massDestroy', 'as' => 'clients.mass_destroy']);
    Route::post('clients_restore/{id}', ['uses' => 'Admin\ClientsController@restore', 'as' => 'clients.restore']);
    Route::delete('clients_perma_del/{id}', ['uses' => 'Admin\ClientsController@perma_del', 'as' => 'clients.perma_del']);
    
    Route::get('clients/{id}/sales', [
        'uses' => 'SalesController@index',
        'as'   => 'sales.table'
    ]);
    Route::get('clients/{id}/sales/create', [
        'uses' => 'SalesController@create',
        'as'   => 'admin.sales.create'
    ]);
    Route::post('clients/{id}/sales/store', [
        'uses' => 'SalesController@store',
        'as'   => 'sales.store'
    ]);
    Route::get('clients/{id}/sales/{iid}', [
        'uses' => 'SalesController@show',
        'as'   => 'sales.show'
    ]);
    Route::get('clients/{id}/sales/{iid}/edit', [
        'uses' => 'SalesController@edit',
        'as'   => 'sales.edit'
    ]);
    Route::post('clients/{id}/sales/{iid}/update', [
        'uses' => 'SalesController@update',
        'as'   => 'sales.update'
    ]);
    Route::delete('clients/{id}/sales/{iid}/delete', [
        'uses' => 'SalesController@destroy',
        'as'   => 'sales.destroy'
    ]);
    Route::get('monthlylistings', [
        'uses' => 'HomeController@monthlist',
        'as'   => 'monthlist'
    ]);
    Route::get('monthlylistings/{salepurr}', [
        'uses' => 'HomeController@salepurr',
        'as'   => 'monthlist.salepurr'
    ]);
    Route::get('monthlylistings/{salepurr}/{clientname}', [
        'uses' => 'HomeController@clientname',
        'as'   => 'monthlist.clientname'
    ]);
    Route::get('monthlylistings/{salepurr}/{clientname}/{year}', [
        'uses' => 'HomeController@clientyear',
        'as'   => 'monthlist.clientyear'
    ]);
    Route::get('monthlylistings/{salepurr}/{clientname}/{year}/{month}', [
        'uses' => 'HomeController@clientmonth',
        'as'   => 'monthlist.clientmonth'
    ]);
    // purchases routes
    Route::get('clients/{id}/purchases', [
        'uses' => 'PurchasesController@index',
        'as'   => 'purchases.table'
    ]);
    Route::get('clients/{id}/purchases/create', [
        'uses' => 'PurchasesController@create',
        'as'   => 'admin.purchases.create'
    ]);
    Route::post('clients/{id}/purchases/store', [
        'uses' => 'PurchasesController@store',
        'as'   => 'purchases.store'
    ]);
    Route::get('clients/{id}/purchases/{iid}', [
        'uses' => 'PurchasesController@show',
        'as'   => 'purchases.show'
    ]);
    Route::get('clients/{id}/purchases/{iid}/edit', [
        'uses' => 'PurchasesController@edit',
        'as'   => 'purchases.edit'
    ]);
    Route::post('clients/{id}/purchases/{iid}/update', [
        'uses' => 'PurchasesController@update',
        'as'   => 'purchases.update'
    ]);
    Route::delete('clients/{id}/purchases/{iid}/delete', [
        'uses' => 'PurchasesController@destroy',
        'as'   => 'purchases.destroy'
    ]);
});
