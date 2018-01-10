<?php


Route::get('/', 'DashboardController@index');

Route::get('doors', 'DoorsController@index');
Route::post('doors', 'DoorsController@store');

Route::post('movements', 'MovementsController@store');

Auth::routes();


Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');

    CRUD::resource('doors', '\App\Http\Controllers\Admin\DoorCrudController');
    CRUD::resource('employees', '\App\Http\Controllers\Admin\EmployeeCrudController');

    Route::get('movements/ajax-employee-options', '\App\Http\Controllers\Admin\MovementCrudController@employeeOptions');
    Route::get('movements/ajax-door-options', '\App\Http\Controllers\Admin\MovementCrudController@doorOptions');
    CRUD::resource('movements', '\App\Http\Controllers\Admin\MovementCrudController');
});
