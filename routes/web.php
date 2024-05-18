<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\PosController;
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

Route::get("/", [PosController::class, 'home']);


Route::get("/menu", [MenuController::class, 'menu']);
Route::get("/menu/add", [MenuController::class, 'menu_add']);
Route::post("/menu/add/process", [MenuController::class, 'menu_add_process']);
Route::get("/menu/edit/{MenuModel:id}", [MenuController::class, 'menu_edit']);
Route::post("/menu/edit/process", [MenuController::class, 'menu_edit_process']);
Route::get("/menu/delete/{MenuModel:id}", [MenuController::class, 'menu_delete']);



Route::get("/pos", [PosController::class, 'pos']);
