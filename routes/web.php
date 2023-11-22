<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthloginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\detaildonateController;
use App\Http\Controllers\DetailPostController;
use App\Http\Controllers\FeedbackController;
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
Route::get('/register',[AuthloginController::class,'register'])->name('auth.register');
Route::get('/login/google',[AuthloginController::class,'redirectgoogle'])->name('auth.google');
Route::get('/auth/google/callback',[AuthloginController::class,'handleGoogleback'])->name('auth.googlecallback');
Route::get('/login/facebook',[AuthloginController::class,'redirectfacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback',[AuthloginController::class,'handlefacebookleback'])->name('auth.facebookcallback');
//profile
Route::get('/profile',[AuthloginController::class,'viewprofile'])->name('auth.profile');

//blog
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/blog_finished',[BlogController::class,'blog_finished'])->name('blog.blog_finished');
Route::get('/blog/blog_detail',[BlogController::class,'blog_detail'])->name('blog.blog_detail');

//detail-page
Route::get('/detail',[BlogController::class,'viewdetail'])->name('detail.post');

// Contact 
Route::get('/contact',[ContactusController::class,'index'])->name('contact.index');


// Aboutus 
Route::get('/aboutus',[AboutusController::class,'index'])->name('aboutus.index');


//feedback
Route::get('/feedback',[FeedbackController::class,'index'])->name('feedback.index');

// project
Route::get('/project',[BlogController::class,'project'])->name('project.index');

// video page
Route::get('/video',[BlogController::class,'video'])->name('video.index');



//admin
Route::get('/admin',[AdminPageController::class,'viewsidebar'])->name('admin.index');
Route::get('/admin/dashboard',[AdminPageController::class,'viewdashboard'])->name('admin.dashboard');
Route::get('/admin/managerpost',[AdminPageController::class,'viewmanagerpost'])->name('admin.managerpost');
Route::get('/admin/managerdesign',[AdminPageController::class,'viewmanagerdesign'])->name('admin.managerdesign');
Route::get('/admin/listuser',[AdminPageController::class,'viewlistuser'])->name('admin.listuser');

//