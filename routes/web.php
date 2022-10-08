<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});

//消去
Route::delete('/items/add/{item_id}', [App\Http\Controllers\ItemController::class,'delete'])->name('delete');

//編集画面取得
Route::get('/items/edit/{item_id}', [App\Http\Controllers\ItemController::class,'get_edit'])->name('get_edit');


//編集処理
Route::post('/edit_item/{id}', [App\Http\Controllers\ItemController::class, 'edit_item'])->name('edit_item');

Route::prefix('/search')->group(function(){
    //検索処理
    Route::get('/', [App\Http\Controllers\ItemController::class,'search'])->name('search');

});