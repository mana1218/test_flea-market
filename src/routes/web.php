<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NiceController;
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

Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class, 'show']);
Route::post('/item/{item_id}/comment', [CommentController::class, 'store'])->middleware('auth');
Route::post('/item/{item_id}/nice', [NiceController::class, 'store'])->middleware('auth');
Route::delete('/item/{item_id}/nice', [NiceController::class, 'destroy']);
Route::get('/purchase/{item_id}', [PurchaseController::class, 'create'])->middleware('auth');
Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);
Route::get('/purchase/success/{item_id}', [PurchaseController::class, 'success'])->middleware('auth');
Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'edit'])->middleware('auth');
Route::patch('/purchase/address/{item_id}', [PurchaseController::class, 'update']);
Route::get('/sell', [ItemController::class, 'create'])->middleware('auth');
Route::post('/sell', [ItemController::class, 'store']);
Route::get('/mypage', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/mypage/profile', [ProfileController::class, 'edit'])->middleware('auth');
Route::patch('/mypage/profile', [ProfileController::class, 'update']);