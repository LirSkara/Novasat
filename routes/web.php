<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [MainController::class, 'home']);
Route::get('/product', [MainController::class, 'product']);

Route::get('/admin_panel', [AdminController::class, 'admin_panel']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);


Route::get('/c_carousel', [AdminController::class, 'c_carousel'])->name('c_carousel');
Route::post('/add_carousel', [AdminController::class, 'add_carousel']);
Route::post('/edit_carousel/{id}', [AdminController::class, 'edit_carousel']);
Route::get('/delete_carousel/{id}', [AdminController::class, 'delete_carousel']);

