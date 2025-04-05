<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::controller(UserController::class)->group(function () {

    Route::get('/user_dashboard', 'index')->name('user.index')->middleware('auth', 'superAdmin');
    Route::get('/user_deleted', 'deleted')->name('user.deleted')->middleware('auth', 'superAdmin');

    Route::get('/user_create', 'createUser')->name('user.createUser')->middleware('auth', 'superAdmin');
    Route::post('/user_store', 'storeUser')->name('user.storeUser');

    Route::get('/user_view/{id}', 'view')->name('user.view')->middleware('auth', 'superAdmin');

    Route::get('/user_edit/{id}', 'edit')->name('user.edit')->middleware('auth', 'superAdmin');
    Route::put('/user_update/{id}', 'update')->name('user.update');

    Route::get('/user_viewDelete/{id}', 'viewDelete')->name('user.viewDelete')->middleware('auth', 'superAdmin');
    Route::delete('/user_delete/{id}', 'delete')->name('user.delete');


    Route::get('/login', 'login')->name('login');
    Route::post('/login_store', 'store')->name('user_store');

    Route::get('/register', 'register')->name('register');
    Route::post('/register_create', 'create')->name('user_create');

    Route::get('/logout', 'logout')->name('logout');
});

Route::controller(ReportController::class)
    ->group(function () {
        // view all data
        Route::get('/report_pending', 'pending')->name('report_pending');
        Route::get('/report_processed', 'processed')->name('report_processed');
        Route::get('/report_completed', 'completed')->name('report_completed');
        Route::get('/report_disapproved', 'disapproved')->name('report_disapproved');

        // create a data
        Route::get('/report_form', 'create')->name('report_create');
        Route::post('/report_store', 'store')->name('report_store');

        // view a data
        Route::get('/report_view/{id}', 'view')->name('report_view');

        // edit and update a data
        Route::get('/report_edit/{id}', 'edit')->name('report_edit');
        Route::put('/report_update/{id}', 'update')->name('report_update');

        // approve a data
        Route::get('/report_approve/{id}', 'approveView')->name('report_approveView');

        // process a data
        Route::get('/report_view_process/{id}', 'viewProcess')->name('report_viewProcess');
        Route::delete('/report_process/{id}', 'process')->name('report_process');

        // delete a data
        Route::get('/report_view_delete/{id}', 'viewDelete')->name('report_viewDelete');
        Route::delete('/report_delete/{id}', 'destroy')->name('report_destroy');
    })
    ->middleware('admin', 'auth');

Route::controller(MaintenanceController::class)->group(function () {
    Route::post('maintenance_store/{id}', 'store')->name('maintenance.store');

    // view a data
    Route::get('maintenance_view/{id}', 'view')->name('maintenance.view');
});

Route::controller(EmployeeController::class)->group(function () {
    // view all data
    Route::get('/employee_pending', 'pending')->name('employee_pending');
    Route::get('/employee_processed', 'processed')->name('employee_processed');
    Route::get('/employee_completed', 'completed')->name('employee_completed');
    Route::get('/employee_disapproved', 'disapproved')->name('employee_disapproved');

    // create a data
    Route::get('/employee_form', 'create')->name('employee_create');
    Route::post('/employee_store', 'store')->name('employee_store');

    // view a data
    Route::get('/employee_view/{id}', 'view')->name('employee_view');

    // edit and update a data
    Route::get('/employee_edit/{id}', 'edit')->name('employee_edit');
    Route::put('/employee_update/{id}', 'update')->name('employee_update');

    // delete a data
    Route::get('/employee_view_delete/{id}', 'viewDelete')->name('employee_viewDelete');
    Route::delete('/employee_delete/{id}', 'destroy')->name('employee_destroy');

    // view completed a data
    Route::get('maintenance_view/{id}', 'viewPDF')->name('maintenance.view');
});
