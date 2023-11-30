<?php

use App\Http\Controllers\ChildTaskController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VersionController;

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

Auth::routes();
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('version/{$id}', [VersionController::class]);

Route::resource('role', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('department',DepartmentController::class);
Route::resource('employee',EmployeeController::class);
Route::resource('projects',ProjectController::class);
Route::resource('version',VersionController::class);
Route::resource('tasks',TaskController::class);
Route::resource('child_tasks',ChildTaskController::class);

Route::get('test',function(){
    return view('test');
});


