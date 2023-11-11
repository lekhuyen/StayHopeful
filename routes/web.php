<?php

use App\Http\Controllers\detaildonateController;
use App\Http\Controllers\DetailPostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/detail',[DetailPostController::class,'index'])->name('detail.index');

//donatedetail
Route::get('/donate',[detaildonateController::class,'index'])->name('detail.donate');
Route::get('/listdonate',[detaildonateController::class,'viewlistdonate'])->name('detail.listdonate');
