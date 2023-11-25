<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AuthloginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\detaildonateController;
use App\Http\Controllers\DetailPostController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectListController;

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

Route::get('/', [AdminPageController::class, 'sliderview'])->name('/');
//donatedetail

Route::get('/donate', [detaildonateController::class, 'index'])->name('detail.donate');
Route::get('/donate2', [detaildonateController::class, 'index2'])->name('detail.donate2');
Route::post('/donate', [detaildonateController::class, 'thanhtoan'])->name('detail.thanhtoan');

//listdonate
Route::get('/listdonate', [detaildonateController::class, 'viewlistdonate'])->name('detail.listdonate');

//login
Route::get('/logout',[AuthloginController::class,'logout'])->name('logout');
Route::post('/login',[AuthloginController::class,'login'])->name('auth.login');
Route::post('/register', [AuthloginController::class, 'register'])->name('auth.register');
Route::get('/login/google',[AuthloginController::class,'redirectgoogle'])->name('auth.google');
Route::get('/auth/google/callback',[AuthloginController::class,'handleGoogleback'])->name('auth.googlecallback');
Route::get('/login/facebook',[AuthloginController::class,'redirectfacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback',[AuthloginController::class,'handlefacebookleback'])->name('auth.facebookcallback');
//profile
Route::get('/profile', [AuthloginController::class, 'viewprofile'])->name('auth.profile');

//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/blog_finished', [BlogController::class, 'blog_finished'])->name('blog.blog_finished');
Route::get('/blog/blog_detail', [BlogController::class, 'blog_detail'])->name('blog.blog_detail');

//detail-page
Route::get('/detail/{id}', [BlogController::class, 'viewdetail'])->name('detail.post');

// Contact 
Route::get('/contact', [ContactusController::class, 'index'])->name('contact.index');


// Aboutus 
Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus.index');


//feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
Route::post('/feedback/create', [FeedbackController::class, 'store'])->name('feedback.store');



// project
Route::get('/project/{id}', [BlogController::class, 'project'])->name('project.index');

// video page
Route::get('/video', [BlogController::class, 'video'])->name('video.index');



//admin
Route::group(['prefix' => 'admin/'], function(){
    Route::get('/', [AdminPageController::class, 'viewsidebar'])->name('admin.index');
Route::get('dashboard', [AdminPageController::class, 'viewdashboard'])->name('admin.dashboard');
Route::get('managerpost', [AdminPageController::class, 'viewmanagerpost'])->name('admin.managerpost');
Route::get('managerdesign', [AdminPageController::class, 'viewmanagerdesign'])->name('admin.managerdesign');
Route::post('managerdesign', [AdminPageController::class, 'create_slider'])->name('admin.create_slider');
Route::put('managerdesign/{slider}', [AdminPageController::class, 'update_slider'])->name('admin.update_slider');
Route::get('/get-slider-image/{id}', [AdminPageController::class, 'getSliderImage'])->name('get.slider.image');
Route::delete('managerdesign/{slider}', [AdminPageController::class, 'delete_slider'])->name('admin.delete_slider');
Route::get('listuser', [AdminPageController::class, 'viewlistuser'])->name('admin.listuser');
Route::get('listdonate', [AdminPageController::class, 'viewlistdonate'])->name('admin.listdonate');
});


//
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//caregory Admin page
Route::group(['prefix' => 'category/'], function () {
    Route::get('index', [CategoryController::class, 'index'])->name('category.index');

    Route::get('create', [CategoryController::class, 'create'])->name('category.create');

    Route::post('store', [CategoryController::class, 'store'])->name('category.store');

    Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');

    Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
});

//project admin page
Route::group(['prefix'=> 'project-post/'], function(){
    Route::get('index',[ProjectController::class,'index'])->name('projectAd.index');

    Route::get('create',[ProjectController::class,'create'])->name('projectAd.create');

    Route::post('store',[ProjectController::class,'store'])->name('projectAd.store');

    Route::post('delete/{id}',[ProjectController::class,'delete'])->name('projectAd.delete');

    Route::get('edit/{id}',[ProjectController::class,'edit'])->name('projectAd.edit');

    Route::get('editimage/{id}',[ProjectController::class,'deleteImgChild'])->name('delete_ImgChild');

    Route::put('update/{id}',[ProjectController::class,'update'])->name('projectAd.update');

    // trash
    Route::get('image-trash',[ProjectController::class,'trash_image'])->name('projectAd-image');
    Route::get('image-untrash/{id}',[ProjectController::class,'untrash_image'])->name('projectAd-untrash');
    Route::get('projectAd-forcedelete/{id}',[ProjectController::class,'projectAd_forcedelete'])->name('projectAd-forcedelete');

    //project status

    Route::get('project-finish/{id}',[ProjectController::class,'finish_status'])->name('projectAd.finish');
    Route::get('project-unfinish/{id}',[ProjectController::class,'unfinish_status'])->name('projectAd.unfinish');
});

