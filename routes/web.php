<?php

use App\Http\Controllers\KdramaController;
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
    return view('login');
});
Route::get('kdramas', [KdramaController::class, 'index']);
Route::get('add-kdrama', [KdramaController::class, 'create']);
Route::post('add-kdrama', [KdramaController::class, 'store']);
Route::get('edit-kdrama/{id}', [KdramaController::class, 'edit']);
Route::put('update-kdrama/{id}', [KdramaController::class, 'update']);
Route::get('delete-kdrama/{id}', [KdramaController::class, 'delete']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
