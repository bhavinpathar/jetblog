<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::get('/users', [UserController::class, 'index'])->name('users.list'); // user listing view page
Route::get('/users/get_users_list', [UserController::class, 'get_users_list'])->name('users.get_users_list'); // get users list for datatable
Route::get('/users/add_user', [UserController::class, 'add_user'])->name('users.add_user'); // add user view page
Route::post('/users/add_user', [UserController::class, 'create_user'])->name('users.create_user'); // create user post request
Route::get('/users/edit_user/{id}', [UserController::class, 'edit_user'])->name('users.edit_user'); // edit user view page
Route::post('/users/edit_user/{id}', [UserController::class, 'update_user'])->name('users.update_user'); // update user post request
Route::delete('/users/delete_user', [UserController::class, 'delete_user'])->name('users.delete_user'); // delete user post request
