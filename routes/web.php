<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthloginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\detaildonateController;
use App\Http\Controllers\DetailPostController;
use App\Http\Controllers\LoginController;
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
// home

//frontend
Route::get('/', function () {
    return view('welcome');
})->name('/');

//donatedetail
Route::get('/donate',[detaildonateController::class,'index'])->name('detail.donate');
Route::post('/donate',[detaildonateController::class,'thanhtoan'])->name('detail.thanhtoan');

//listdonate
Route::get('/listdonate',[detaildonateController::class,'viewlistdonate'])->name('detail.listdonate');

//login
Route::get('/login',[AuthloginController::class,'index'])->name('auth.index');

//blog
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog',[BlogController::class,'index_finished'])->name('blog.index_finished');

//detail-page
Route::get('/detail',[BlogController::class,'detail'])->name('detail.post');

// Contact 
Route::get('/contact',[ContactusController::class,'index'])->name('contact.index');



//admin
Route::get('/admin',[AdminPageController::class,'viewsidebar'])->name('admin.index');
Route::get('/admin/dashboard',[AdminPageController::class,'viewdashboard'])->name('admin.dashboard');
Route::get('/admin/manager',[AdminPageController::class,'viewmanagermember'])->name('admin.managermember');
Route::get('/admin/managerdesign',[AdminPageController::class,'viewmanagerdesign'])->name('admin.managerdesign');
Route::get('/admin/listuser',[AdminPageController::class,'viewlistuser'])->name('admin.listuser');

//