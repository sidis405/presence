<?php


Route::get('/', 'DashboardController@index');

Route::post('presences', 'PresencesController@store');



Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', '\App\Http\Controllers\Admin\AdminController@dashboard');

    CRUD::resource('doors', '\App\Http\Controllers\Admin\DoorCrudController');
    CRUD::resource('employees', '\App\Http\Controllers\Admin\EmployeeCrudController');

    Route::get('presences/ajax-employee-options', '\App\Http\Controllers\Admin\PresenceCrudController@employeeOptions');
    CRUD::resource('presences', '\App\Http\Controllers\Admin\PresenceCrudController');
});
