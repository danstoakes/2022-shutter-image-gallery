<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ModalController;
use App\Models\Media;

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

/* Route::get('/library', function () {
    return view('library');
})->middleware(['auth'])->name('library'); */

Route::middleware(['auth:sanctum', 'verified'])->get('library', 'App\Http\Controllers\MediaController@library')->name('library');

Route::resource('album', AlbumController::class)->middleware('auth');

Route::controller(AlbumController::class)->group(function () {
    Route::post('/album/create-album', [AlbumController::class, 'createAlbum'])->name('createAlbum');
});

Route::controller(MediaController::class)->group(function () {
    Route::post('/album/upload-media', [MediaController::class, 'uploadMedia'])->name('uploadMedia');
});

Route::controller(ModalController::class)->group(function () {
    Route::post("/modal/loadModal", [ModalController::class, "loadModal"])->name("modal.loadModal");
});

require __DIR__.'/auth.php';
