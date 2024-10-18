<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(CategoryController::class)->group(function()
{
    Route::post('category/create', 'create')->name('category.create');
    Route::post('category/update', 'update')->name('category.update');
    Route::get('category/index', 'index')->name('category.index');
    Route::post('category/show', 'show')->name('category.show');
    Route::post('category/delete', 'delete')->name('category.delete');
});
