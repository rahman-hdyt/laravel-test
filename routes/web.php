<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::post('postlogin', [AuthController::class, 'login'])->name('postlogin');

Route::get('signup', [AuthController::class, 'signup'])->name('register');

Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::post('postsignup', [AuthController::class, 'signupsave'])->name('postsignup');

Route::get('dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::post('/students', [StudentController::class, 'store'])->name('students.store');

Route::post('/store', [StudentController::class, 'store'])->name('students.store');

Route::patch('/update/{id}', ['as' => 'student.update', 'uses' => '\App\Http\Controllers\StudentController@update']);

Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
