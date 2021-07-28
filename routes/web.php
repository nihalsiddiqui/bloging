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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// post routes
    Route::post('/post',[\App\Http\Controllers\PostController::class,'store']);
    Route::get('posts/create',[\App\Http\Controllers\PostController::class,'create']);
    Route::get('posts/show',[\App\Http\Controllers\PostController::class,'index']);
    Route::get('posts/delete/{post}',[\App\Http\Controllers\PostController::class,'destroy'])->name('posts.delete');
    Route::get('posts/edit/{post}',[\App\Http\Controllers\PostController::class,'edit'])->name('posts.edit');
    Route::post('posts/update/{post}',[\App\Http\Controllers\PostController::class,'update'])->name('posts.update');

//category routes
    Route::get('category/create',[\App\Http\Controllers\CategoryController::class,'create']);
    Route::post('category/store',[\App\Http\Controllers\CategoryController::class,'store']);
    Route::get('category/show',[\App\Http\Controllers\CategoryController::class,'index']);
    Route::get('category/delete/{category}',[\App\Http\Controllers\CategoryController::class,'destroy'])->name('category.delete');
    Route::get('category/edit/{category}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::post('category/update/{category}',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

//tag routes
    Route::get('tag/create',[\App\Http\Controllers\TagController::class,'create']);
    Route::get('tag/store',[\App\Http\Controllers\TagController::class,'store']);
    Route::get('tag/show',[\App\Http\Controllers\TagController::class,'index']);
    Route::get('tag/edit/{tag}',[\App\Http\Controllers\TagController::class,'edit'])->name('tag.edit');
    Route::get('tag/delete{tag}',[\App\Http\Controllers\TagController::class,'destroy'])->name('tag.delete');
    Route::post('tag/update{tag}',[\App\Http\Controllers\TagController::class,'update'])->name('tag.update');


