<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [MainController::class, 'home']);
Route::get('/product/{id}', [MainController::class, 'product']);

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);

// Контрольная панель
Route::get('/control_panel', [AdminController::class, 'index']);

Route::get('/cp_slide', [AdminController::class, 'slide'])->name('slide');
Route::get('/all_slide', [AdminController::class, 'all_slide']);
Route::post('/add_slider', [AdminController::class, 'add_slider']);
Route::post('/edit_slider/{id}', [AdminController::class, 'edit_slider']);
Route::get('/delete_slider/{id}', [AdminController::class, 'delete_slider']);

Route::get('/cp_advertising', [AdminController::class, 'advertising'])->name('advertising');
Route::get('/all_advertising', [AdminController::class, 'all_advertising']);
Route::post('/edit_tising/{id}', [AdminController::class, 'edit_tising']);

Route::get('/cp_stock', [AdminController::class, 'stock'])->name('stock');
Route::get('/all_stock', [AdminController::class, 'all_stock']);
Route::post('/edit_stock/{id}', [AdminController::class, 'edit_stock']);

Route::get('/cp_blocks', [AdminController::class, 'blocks'])->name('blocks');
Route::get('/all_blocks', [AdminController::class, 'all_blocks']);
Route::post('/edit_block/{id}', [AdminController::class, 'edit_block']);

Route::get('/cp_banner', [AdminController::class, 'banner'])->name('banner');
Route::get('/all_banner', [AdminController::class, 'all_banner']);
Route::post('/edit_banner/{id}', [AdminController::class, 'edit_banner']);

Route::get('/cp_servises', [AdminController::class, 'servises'])->name('servises');
Route::get('/all_servises', [AdminController::class, 'all_servises']);
Route::post('/edit_servises/{id}', [AdminController::class, 'edit_servises']);

Route::get('/cp_social_network', [AdminController::class, 'social_network'])->name('social_network');
Route::get('/all_social_network', [AdminController::class, 'all_social_network']);
Route::post('/edit_social_network/{id}', [AdminController::class, 'edit_social_network']);

Route::get('/cp_your_data', [AdminController::class, 'your_data'])->name('your_data');
Route::get('/all_your_data', [AdminController::class, 'all_your_data']);
Route::post('/edit_your_data/{id}', [AdminController::class, 'edit_your_data']);