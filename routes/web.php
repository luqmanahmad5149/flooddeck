<?php

use App\Http\Controllers\FloodsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ThingspeakController;
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

Route::get('/', [PagesController::class, 'index']);
Route::get('details/{id}', [PagesController::class, 'show']);

Route::resource('/floods', FloodsController::class);

Route::resource('/details', ThingspeakController::class);

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

