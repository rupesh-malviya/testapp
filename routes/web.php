<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
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
// Users Route
Route::get('user-list',[UserController::class, 'index'])->name('/userlist');
Route::get('user-add',[UserController::class, 'addUser'])->name('/adduser');
Route::get('user_edit/{id}',[UserController::class, 'editUser']);
Route::get('user_delete/{id}',[UserController::class, 'destroy']);
Route::post('user-store',[UserController::class, 'store'])->name('/user_store');
Route::post('user-update',[UserController::class, 'user_update'])->name('/user_update');


// Company Route
Route::resource('company', CompanyController::class);

Route::get('add_user_to_company/{id}',[CompanyController::class, 'userToCompany']);
Route::post('add-user-to-company',[CompanyController::class, 'connectUserToCompany'])->name('add_user_to_company');
Route::get('company_user/{id}',[CompanyController::class, 'viewCompanyUser']);


