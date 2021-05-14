<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Login;
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
Route::get('showtimes',[HomeController::class,'show']);
Route::get('get_ticket',[HomeController::class,'ticket']);
Route::post('get_ticket',[HomeController::class,'store']);

/*Rutas para UsuariosController*/

Route::get('login',[UsuariosController::class,'index']);
Route::post('login',[UsuariosController::class,'validarlogin']);
Route::post('logout',[UsuariosController::class,'validarlogout']);
Route::post('register',[UsuariosController::class,'create']);
Route::get('register',[UsuariosController::class,'store']);
Route::get('user_panel',[UsuariosController::class,'show'])->Middleware('auth');



/*Rutas para AdminController*/
Route::get('admin',[AdminController::class,'index']);
Route::post('admin',[AdminController::class,'store']);
Route::get('admin/showtimes',[AdminController::class,'showtimes']);
Route::get('admin/tickets',[AdminController::class,'tickets']);
Route::get('admin/movies',[AdminController::class,'movies']);



