<?php

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

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HelloLaravelController;
use App\Http\Controllers\PostController;

Route::get(uri:'',action:[HelloLaravelController::class,'home']);
Route::group(['prefix'=>'post'],function(){
    Route::get(uri:'',action:[PostController::class,'index'])->name('post.index');
    Route::get(uri:'create',action:[PostController::class,'create']);
    Route::post(uri:'',action:[PostController::class,'store']);
    Route::get(uri:'{post}',action:[PostController::class,'show'])->name('post.show');
    Route::get(uri:'{post}/edit',action:[PostController::class,'edit']);
    Route::put(uri:'{post}',action:[PostController::class,'update']);
    Route::get(uri:'{post}/delete',action:[PostController::class,'destroy']);
});
Route::post(uri:'comment',action:[CommentController::class,'store'])->name('comments.store');
