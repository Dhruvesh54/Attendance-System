<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
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

Route::get('/', function () {
    // return view('welcome');
    return view('index');
});

Route::view('login', 'login');
Route::post('login_authentication', [LoginController::class, 'Login_authentication'])->name('admin.login_authentication_method');
Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::post('add_attendance', [AdminController::class,'add_attendance'])->name('add_attendance');
Route::get('create_post', [LoginController::class, 'create_post'])->name('create_post');

Route::prefix('admin')->group(function () {
    Route::middleware(['admin_authentication'])->group(function () {
        Route::get('index', [AdminController::class, 'index'])->name('admin.index');
        Route::get('add_employee', [AdminController::class, 'add_employee'])->name('admin.add_employee');
        Route::get('manage_employee', [AdminController::class, 'manage_employee'])->name('admin.manage_employee');
        Route::get('add_job_title', [AdminController::class, 'add_job_title'])->name('admin.add_job_title');
        Route::get('manage_job', [AdminController::class, 'manage_job'])->name('admin.manage_job');
        Route::get('manage_attendance', [AdminController::class, 'manage_attendance'])->name('admin.manage_attendance');

        Route::post('add_employee_method', [AdminController::class, 'add_employee_method'])->name('admin.add_employee_method');
        Route::post('add_job_method', [AdminController::class, 'add_job_method'])->name('admin.add_job_method');

        // *CRUDE Employee
        Route::get('edit_employee/{employee_id}', [AdminController::class, 'fetch_data_for_edit_employee'])->name('admin.edit_employee');
        Route::get('delete_employee/{employee_id}', [AdminController::class, 'delete_employee'])->name('admin.delete_employee');
        Route::get('activate_employee/{employee_id}', [AdminController::class, 'activate_employee'])->name('admin.active_employee');
        Route::get('inactivate_employee/{employee_id}', [AdminController::class, 'inactivate_employee'])->name('admin.inactive_employee');
        Route::post('edit_employee', [AdminController::class, 'edit_employee_action'])->name('admin.update_employee_method');

        // *CRUDE Job
        Route::get('edit_job/{id}', [AdminController::class, 'fetch_data_for_edit_job'])->name('admin.edit_job');
        Route::get('delete_job/{id}', [AdminController::class, 'delete_job'])->name('admin.delete_job');
        Route::get('activate_job/{id}', [AdminController::class, 'activate_job'])->name('admin.active_job');
        Route::get('inactivate_job/{id}', [AdminController::class, 'inactivate_job'])->name('admin.inactive_job');
        Route::post('edit_job', [AdminController::class, 'edit_job_action'])->name('admin.update_job_method');

    });
});