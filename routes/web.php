<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
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

/*Ruta Home */
Route::get('/', HomeController::class);

Route::get('get_ticket',[HomeController::class,'ticket']);

/*Rutas para UsuariosController*/

Route::get('login',[UsuariosController::class,'index']);

Route::get('new_user',[UsuariosController::class,'create']);

Route::get('user_panel',[UsuariosController::class,'show']);

/*Rutas para AdminController*/

Route::get('admin_showtimes',[AdminController::class,'showtimes']);

Route::get('admin_tickets',[AdminController::class,'tickets']);

Route::get('admin_movies',[AdminController::class,'movies']);


