<?php

Route::group(['middleware' => 'web'], function () {

    Route::get('/', 'LandingController@index');

    // Authentication Routes...
    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'acl']], function () {

        Route::get('/', [
            'as' => 'admin.dashboard',
            'uses' => 'DashboardController@index'
        ]);

        // Users
        Route::get('users', [
            'as' => 'admin.users.index',
            'uses' => 'UsersController@index'
        ]);

        Route::get('users/create', [
            'as' => 'admin.users.create',
            'uses' => 'UsersController@create'
        ]);

        Route::post('users', [
            'as' => 'admin.users.store',
            'uses' => 'UsersController@store'
        ]);

        Route::get('users/{user}', [
            'as' => 'admin.users.show',
            'uses' => 'UsersController@show'
        ]);

        Route::get('users/{user}/edit', [
            'as' => 'admin.users.edit',
            'uses' => 'UsersController@edit'
        ]);

        Route::post('users/{user}', [
            'as' => 'admin.users.update',
            'uses' => 'UsersController@update'
        ]);

        Route::post('users/{user}/update-password', [
            'as' => 'admin.users.update-password',
            'uses' => 'UsersController@updatePassword'
        ]);

        Route::post('users/{user}/destroy', [
            'as' => 'admin.users.destroy',
            'uses' => 'UsersController@destroy'
        ]);
        // End Users

        // Roles
        Route::get('roles', [
            'as' => 'admin.roles.index',
            'uses' => 'RolesController@index'
        ]);

        Route::get('roles/create', [
            'as' => 'admin.roles.create',
            'uses' => 'RolesController@create'
        ]);

        Route::post('roles', [
            'as' => 'admin.roles.store',
            'uses' => 'RolesController@store'
        ]);

        Route::get('roles/{role}/edit', [
            'as' => 'admin.roles.edit',
            'uses' => 'RolesController@edit'
        ]);

        Route::post('roles/{role}', [
            'as' => 'admin.roles.update',
            'uses' => 'RolesController@update'
        ]);

        Route::post('roles/{role}/destroy', [
            'as' => 'admin.roles.destroy',
            'uses' => 'RolesController@destroy'
        ]);
        // End Roles

        // Permissions
        Route::get('permissions', [
            'as' => 'admin.permissions.index',
            'uses' => 'PermissionsController@index'
        ]);

        Route::get('permissions/create', [
            'as' => 'admin.permissions.create',
            'uses' => 'PermissionsController@create'
        ]);

        Route::post('permissions', [
            'as' => 'admin.permissions.store',
            'uses' => 'PermissionsController@store'
        ]);

        Route::get('permissions/{permission}/edit', [
            'as' => 'admin.permissions.edit',
            'uses' => 'PermissionsController@edit'
        ]);

        Route::post('permissions/{permission}', [
            'as' => 'admin.permissions.update',
            'uses' => 'PermissionsController@update'
        ]);

        Route::post('permissions/{permission}/destroy', [
            'as' => 'admin.permissions.destroy',
            'uses' => 'PermissionsController@destroy'
        ]);
        // End Permissions

    });
});
