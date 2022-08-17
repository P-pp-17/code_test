<?php

Auth::routes();
Route::get('/', 'HomeController@index');
//Admin
Route::get('admin','Backend\Auth\AdminLoginController@index');
Route::get('login', 'Backend\Auth\AdminLoginController@showLoginForm')->name('show_login_form');
    Route::post('login', 'Backend\Auth\AdminLoginController@login')->name('login');
    Route::middleware('auth:admin')->group(function () {
        Route::post('Backend\logout', 'Backend\Auth\AdminLoginController@logout')->name('logout');
        Route::get('dashboard', 'Backend\BackendController@index')->name('dashboard');

        // Is Super Admin
        Route::middleware('isSuperAdmin')->group(function() {
            Route::get(
                'admins/search',
                'Backend\AdminController@search'
            )->name('admins.search');
            Route::put(
                'admins/active-status/{admin}',
                'Backend\AdminController@updateActiveStatus'
            )->name('admins.active-status.update');
            Route::resource('admins', 'Backend\AdminController');
        });


        Route::get(
            'users/search',
            'Backend\UserController@search'
        )->name('users.search');
        Route::put(
            'users/active-status/{user}',
            'Backend\UserController@updateActiveStatus'
        )->name('users.active-status.update');
        Route::resource('users', 'Backend\UserController');

        Route::resource('user-addresses', 'Backend\UserAddressController');

        Route::get(
            'vendors/search',
            'Backend\VendorController@search'
        )->name('vendors.search');
        Route::put(
            'vendors/active-status/{vendor}',
            'Backend\VendorController@updateActiveStatus'
        )->name('vendors.active-status.update');
        Route::resource('vendors', 'Backend\VendorController');

        
       
    });



