<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GolfparkController;
use App\Http\Controllers\LoginController;


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

Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::get('/new_account', [LoginController::class, 'new_account'])->name('new_account');
Route::post('/accountCreate', [LoginController::class, 'accountCreate'])->name('accountCreate');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/top', [GolfparkController::class, 'top'])->name('top');
Route::get('/form', [GolfparkController::class, 'form'])->name('form');
Route::post('/form', [GolfparkController::class, 'add'])->name('add');
Route::get('/list', [GolfparkController::class, 'list'])->name('list');
Route::get('/list/info/{id}', [GolfparkController::class, 'showDetail'])->name('show');
Route::post('/list/delete', [GolfparkController::class, 'delete'])->name('delete');
Route::get('/info/edit/{id}', [GolfparkController::class, 'edit'])->name('edit');
Route::post('/info/update', [GolfparkController::class, 'update'])->name('update');


