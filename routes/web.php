<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'user'], function (){
    Route::get('',[UserController::class, 'index'])->name('user.index');
    Route::get('profile/{id}',[UserController::class, 'profile'])->name('user.profile');
    Route::get('create',[UserController::class, 'create'])->name('user.create');
    Route::post('store',[UserController::class, 'store'])->name('user.store');
});
Route::group(['prefix' => 'article'], function (){
    Route::get('',[ArticleController::class, 'index'])->name('article.index');
    Route::get('create',[ArticleController::class, 'create'])->name('article.create');
    Route::post('store',[ArticleController::class, 'store'])->name('article.store');
    Route::delete('delete/{id}',[ArticleController::class, 'softDelete'])->name('article.delete');
    Route::post('restore/{id}',[ArticleController::class, 'restore'])->name('article.restore');
});
