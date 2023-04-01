<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class, "index"]);
Route::get('/redirects',[HomeController::class, "redirects"]);
Route::get('/users',[AdminController::class, "user"]);
Route::get('/foodmenu',[AdminController::class, "foodmenu"]);
Route::get('/deleteUser/{id}',[AdminController::class, "deleteUser"]);

Route::post('/uploadItem',[AdminController::class, "uploaditem"]);
Route::get('/deleteItem/{id}',[AdminController::class, "deleteItem"]);
Route::get('/updateItems/{id}',[AdminController::class, "updateItems"]);
Route::post('/updateItem/{id}',[AdminController::class, "updateItem"]);

Route::post('/reservation',[AdminController::class, "reservation"]);
Route::get('/viewreservation',[AdminController::class, "viewreservation"]);

Route::get('/itemmaker',[AdminController::class, "itemmaker"]);
Route::post('/uploaditemmaker',[AdminController::class, "uploaditemmaker"]);
Route::get('/deleteitemmaker/{id}',[AdminController::class, "deleteitemmaker"]);
Route::get('/updateitemmakers/{id}',[AdminController::class, "updateitemmakers"]);
Route::post('/updateitemmaker/{id}',[AdminController::class, "updateitemmaker"]);

Route::post('/addcart/{id}',[HomeController::class, "addcart"]);
Route::get('/showcart/{id}',[HomeController::class, "showcart"]);
Route::post('/orderconfirm',[HomeController::class, "orderconfirm"]);
Route::get('/orders',[AdminController::class, "orders"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
