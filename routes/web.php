<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [IndexController::class,'index']);
Route::resource('post',PostController::class);
Route::resource('product',ProductController::class);

Route::get('test/{id}/{test}',[PostController::class,'test']);

// Route::get('product/{id}/{item}',[ProductController::class,'item']);

Route::get('category',[CategoryController::class,'index'])->name('category.index');
Route::post('category',[CategoryController::class,'store'])->name('category.store');

Route::patch('product/removeCover/{product}',[ProductController::class,'removeCover'])->name('removeCover');

// 還原
Route::get('product/restore/{id}',[ProductController::class,'restore'])->name('restore');
// 硬刪除
Route::post('product/forceDelete',[ProductController::class,'forceDelete'])->name('forceDelete');


Route::get('product/category/{category_id}',[IndexController::class,'productWithCategory'])->name('productCategory');
Route::get('product/tag/{tag_id}',[IndexController::class,'productWithTag'])->name('productTag');

Route::get('search',function(){
    return view('search');
});
Route::get('search/result',[SearchController::class,'searchResult'])->name('searchResult');
