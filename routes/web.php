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


Route::get('/',[\App\Http\Controllers\ProcessingController::class,'index'])->name('index');
Route::post('/image-post',[\App\Http\Controllers\ProcessingController::class,'imagePost'])->name('image.post');
Route::get('processing',[\App\Http\Controllers\ProcessingController::class,'processing'])->name('processing');
Route::get('download',[\App\Http\Controllers\ProcessingController::class,'download'])->name('download');


Route::get('/d', function () {
    echo ini_get('post_max_size') .'<br>';
    echo ini_get('max_execution_time').'<br>';
    echo ini_get('memory_limit').'<br>';
    echo ini_get('upload_max_filesize').'<br>';
    echo ini_get('max_file_uploads').'<br>';
    echo ini_get('max_input_time').'<br>';
});
