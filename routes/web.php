<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\AboutuspageController;
use App\Http\Controllers\AboutuspageiconController;
use App\Http\Controllers\AboutusteamController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminPermissionsController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AuthloginController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentPostController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\detaildonateController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SensitiveController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\VolunteerController;
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
Route::get('/nav', [AdminPageController::class, 'viewnav'])->name('nav');
// Route::get('/category-list', [AdminPageController::class, 'category']);
//donatedetail

Route::get('/donate', [detaildonateController::class, 'index'])->name('detail.donate'); //view user
Route::get('/donate/{id}', [detaildonateController::class, 'donatepage'])->name('detail.getdonate'); //view user

Route::post('/donate/payment', [detaildonateController::class, 'payment'])->name('detail.payment');
Route::get('/donate/success', [detaildonateController::class, 'paymentsuccess'])->name('detail.paymentsuccess');

//listdonate
Route::get('/listdonate', [detaildonateController::class, 'viewlistdonate'])->name('detail.listdonate');

//login
Route::get('/logout', [AuthloginController::class, 'logout'])->name('logout');
Route::post('/login', [AuthloginController::class, 'login'])->name('auth.login');
Route::post('/register', [AuthloginController::class, 'register'])->name('auth.register');
Route::get('/login/google', [AuthloginController::class, 'redirectgoogle'])->name('auth.google');
Route::get('/auth/google/callback', [AuthloginController::class, 'handleGoogleback'])->name('auth.googlecallback');
Route::get('/login/twitter', [AuthloginController::class, 'redirectTwitter'])->name('auth.twitter');
Route::get('/callback/twitter', [AuthloginController::class, 'handleTwitterCallback'])->name('auth.twittercallback');
Route::get('/login/facebook', [AuthloginController::class, 'redirectfacebook'])->name('auth.facebook');
Route::get('/auth/facebook/callback', [AuthloginController::class, 'handlefacebookleback'])->name('auth.facebookcallback');
//verify_email
// Route::get('/verify_email', [AuthloginController::class, 'abc'])->name('verify.email');
Route::get('/verified/{verify_token}', [AuthloginController::class, 'verified_email'])->name('auth.verified_email');
Route::post('/change-password', [AuthloginController::class, 'change_password'])->name('auth.changepassword');
//forgot password
Route::post('/send-otp', [OtpController::class, 'sendOtp'])->name('auth.send_otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('auth.verify_otp');
//profile
Route::get('/profile/css', [AuthloginController::class, 'profilePopupView'])->name('auth.profilecss');

//profile rieng cua user
Route::get('/profile/{id}', [AuthloginController::class, 'user_profile'])->name('user.profile');

Route::get('/profile', [AuthloginController::class, 'viewprofile'])->name('auth.profile');
Route::get('/post-edit/{id}', [AuthloginController::class, 'post_edit'])->name('post.edit');
Route::post('/post-edit/{id}', [AuthloginController::class, 'post_edit'])->name('post.edit.form');
// user middleware close


//blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/blog_finished', [BlogController::class, 'blog_finished'])->name('blog.blog_finished');
Route::get('/blog/blog_detail', [BlogController::class, 'blog_detail'])->name('blog.blog_detail');
Route::get('/news-detail/{id}-{slug}', [BlogController::class, 'news_detail'])->name('news-detail');



//detail-page
Route::get('/detail/{id}-{slug}', [BlogController::class, 'viewdetail'])->name('detail.post');

// Contact
Route::get('/contact', [ContactusController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactusController::class, 'create'])->name('contact.create');
// Contact


// Aboutus user
Route::get('/aboutus', [AboutusController::class, 'index'])->name('aboutus.index');

Route::get('/aboutus/whoweare', [AboutUsController::class, 'aboutus_whoweare'])->name('aboutus.aboutus_whoweare');

Route::get('/aboutus/whoweare/johndoe', [AboutUsController::class, 'johndoe'])->name('aboutus.johndoe');

Route::get('/aboutus/whoweare/janesmith', [AboutUsController::class, 'janesmith'])->name('aboutus.janesmith');

Route::get('/aboutus/whoweare/robertjohnson', [AboutUsController::class, 'robertjohnson'])->name('aboutus.robertjohnson');

Route::get('/aboutus/whoweare/kaigreene', [AboutUsController::class, 'kaigreene'])->name('aboutus.kaigreene');

Route::get('/aboutus/whoweare/oliverhudson', [AboutUsController::class, 'oliverhudson'])->name('aboutus.oliverhudson');

// About Us Team admin
Route::get('/aboutusteam', [AboutusteamController::class, 'aboutus_team_index'])->name('aboutusteam.index');

Route::get('/aboutusteam/create', [AboutusTeamController::class, 'aboutus_team_create'])->name('aboutusteam.create');

Route::post('/aboutusteam/create', [AboutusTeamController::class, 'aboutus_team_store'])->name('aboutusteam.store');

Route::get('/aboutusteam/edit/{aboutusteam}', [AboutusTeamController::class, "aboutus_team_edit"])->name("aboutusteam.edit_aboutus");

Route::put('/aboutusteam/edit/{aboutusteam}', [AboutusTeamController::class, 'aboutus_team_update'])->name('aboutusteam.update');

Route::get('/aboutusteam/search', [AboutusTeamController::class, 'search'])->name('aboutusteam.search');  // Place search route before the detail route

Route::delete('/aboutusteam/delete/{aboutusteam}', [AboutusteamController::class, "aboutus_team_delete"])->name("aboutusteam.delete");

Route::get('/aboutusteam/{id}', [AboutusteamController::class, 'aboutus_team_detail'])->name('aboutusteam.detail');

Route::get('/aboutus/whoweare/{id}', [AboutUsController::class, 'showTeamMemberDetail'])->name('aboutus.aboutus_whoweare.detail'); //user

// About Us Page

Route::get('/aboutus_page_table', [AboutuspageController::class, 'aboutus_page_index'])->name('aboutuspage.index');
Route::get('/aboutus_page_main/{id}', [AboutuspageController::class, 'Aboutus_page_main'])->name('aboutus_page_main');

// About Us main Page
Route::get('/aboutus_page_table/create_main', [AboutuspageController::class, 'aboutus_page_create_main'])->name('aboutuspage.create_main');
Route::post('/aboutus_page_table/create_main', [AboutuspageController::class, 'aboutus_page_store_main'])->name('aboutuspage.store_main');
Route::get('/aboutus_page_table/edit_main/{mainPages}', [AboutuspageController::class, 'aboutus_page_edit_main'])->name('aboutuspage.edit_main');
Route::put('/aboutus_page_table/edit/{mainPages}', [AboutuspageController::class, 'aboutus_page_update_main'])->name('aboutuspage.update_main');
Route::delete('/aboutus_page_table/delete/{mainPages}', [AboutuspageController::class, 'aboutus_page_delete_main'])->name('aboutuspage.delete_main');
Route::get('/aboutus_page_detail/{id}', [AboutuspageController::class, 'Aboutus_page_detail'])->name('aboutuspage.detail');

// About Us (about us) Page
Route::get('/aboutus_page_table/create_aboutus', [AboutuspageController::class, 'aboutus_page_create_aboutus'])->name('aboutuspage.create_aboutus');
Route::post('/aboutus_page_table/create_aboutus', [AboutuspageController::class, 'aboutus_page_store_aboutus'])->name('aboutuspage.store_aboutus');
Route::get('/aboutus_page_table/edit_aboutus/{aboutUsPages}', [AboutuspageController::class, 'aboutus_page_edit_aboutus'])->name('aboutuspage.edit_aboutus');
Route::put('/aboutus_page_table/edit_aboutus/{aboutUsPages}', [AboutuspageController::class, 'aboutus_page_update_aboutus'])->name('aboutuspage.update_aboutus');
Route::delete('/aboutus_page_table/delete/{aboutuspage}', [AboutuspageController::class, 'aboutus_page_delete_aboutus'])->name('aboutuspage.delete_aboutus');

// About Us (logo) Page
Route::get('/aboutus_page_table/create_logo', [AboutuspageController::class, 'aboutus_page_create_logo'])->name('aboutuspage.create_logo');
Route::post('/aboutus_page_table/create_logo', [AboutuspageController::class, 'aboutus_page_store_logo'])->name('aboutuspage.store_logo');
Route::get('/aboutus_page_table/edit_logo/{logoPages}', [AboutuspageController::class, 'aboutus_page_edit_logo'])->name('aboutuspage.edit_logo');
Route::put('/aboutus_page_table/edit_logo/{logoPages}', [AboutuspageController::class, 'aboutus_page_update_logo'])->name('aboutuspage.update_logo');
Route::delete('/aboutus_page_table/delete/{logoPages}', [AboutuspageController::class, 'aboutus_page_delete_logo'])->name('aboutuspage.delete_logo');

// About Us introcall Page
Route::get('/aboutus_page_table/create_introcall', [AboutuspageController::class, 'aboutus_page_create_introcall'])->name('aboutuspage.create_introcall');
Route::post('/aboutus_page_table/create_introcall', [AboutuspageController::class, 'aboutus_page_store_call'])->name('aboutuspage.store_introcall');
Route::get('/aboutus_page_table/edit_introcall/{introcallPages}', [AboutuspageController::class, 'aboutus_page_edit_introcall'])->name('aboutuspage.edit_introcall');
Route::put('/aboutus_page_table/edit_introcall/{introcallPages}', [AboutuspageController::class, 'aboutus_page_update_introcall'])->name('aboutuspage.update_introcall');
Route::delete('/aboutus_page_table/delete/{introcallPages}', [AboutuspageController::class, 'aboutus_page_delete_call'])->name('aboutuspage.delete_introcall');

// About Us left call Page
Route::get('/aboutus_page_table/create_leftcall', [AboutuspageController::class, 'aboutus_page_create_leftcall'])->name('aboutuspage.create_leftcall');
Route::post('/aboutus_page_table/create_leftcall', [AboutuspageController::class, 'aboutus_page_store_leftcall'])->name('aboutuspage.store_leftcall');
Route::get('/aboutus_page_table/edit_leftcall/{leftcallPages}', [AboutuspageController::class, 'aboutus_page_edit_leftcall'])->name('aboutuspage.edit_leftcall');
Route::put('/aboutus_page_table/edit_introcall/{leftcallPages}', [AboutuspageController::class, 'aboutus_page_update_leftcall'])->name('aboutuspage.update_leftcall');
Route::delete('/aboutus_page_table/delete/{leftcallPages}', [AboutuspageController::class, 'aboutus_page_delete_leftcall'])->name('aboutuspage.delete_leftcall');
//feedback
Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index'); //admin
Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create'); //user
Route::post('/feedback/create', [FeedbackController::class, 'store'])->name('feedback.store'); //user
Route::get('/feedback/detail/{id}', [FeedbackController::class, 'detail'])->name('feedback.detail'); //admin

//sensitive admin
Route::get('/sensitive', [SensitiveController::class, 'index'])->name('sensitive.index');
Route::get('/sensitive/create', [SensitiveController::class, 'create'])->name('sensitive.create');
Route::post('/sensitive/create', [SensitiveController::class, 'store'])->name('sensitive.store');
Route::get('/sensitive/delete/{id}', [SensitiveController::class, 'delete'])->name('sensitive.delete');
Route::get('/sensitive/edit/{id}', [SensitiveController::class, 'edit'])->name('sensitive.edit');
Route::put('/sensitive/update/{id}', [SensitiveController::class, 'update'])->name('sensitive.update');
Route::get('/sensitive/status/{id}', [SensitiveController::class, 'editStatus'])->name('sensitive.status');



//volunteer form
Route::get('/volunteer', [VolunteerController::class, 'index'])->name('volunteer.index'); //admin
Route::get('/volunteer/create', [VolunteerController::class, 'create'])->name('volunteer.create'); //user
Route::post('/volunteer/create', [VolunteerController::class, 'store'])->name('volunteer.store'); //user
Route::get('/volunteer/detail/{id}', [VolunteerController::class, 'detail'])->name('volunteer.detail'); //admin


// project
Route::get('/project/{id}', [BlogController::class, 'project'])->name('project.post');
Route::get('/project-all', [BlogController::class, 'project_index'])->name('project.index');

// video page
Route::get('/video', [BlogController::class, 'video'])->name('video.index');

//comment
Route::post('/comment/{id}', [CommentController::class, 'comment'])->name('comment.index');


//search bar project page
Route::post('/search', [BlogController::class, 'search'])->name('search_project');


//admin
Route::group(['prefix' => 'admin/'], function () {
    // Route::get('/', [AdminPageController::class, 'viewsidebar'])->name('admin.index');
    Route::get('/', [AdminPageController::class, 'viewdashboard'])->name('admin.dashboard');
    Route::get('/managermail', [AdminPageController::class, 'viewmail'])->name('admin.viewmail');
    Route::get('/replymail/{id}', [AdminPageController::class, 'getreplymail'])->name('admin.getreplymail');
    Route::post('/replymail/{id}', [AdminPageController::class, 'sendreplymail'])->name('admin.sendreplymail');
    Route::get('/maildetail/{id}', [AdminPageController::class, 'viewmaildetail'])->name('admin.viewmaildetail');

    Route::get('managerdesign', [AdminPageController::class, 'viewmanagerdesign'])->name('admin.managerdesign')->middleware('can:slider_list');
    Route::post('managerdesign', [AdminPageController::class, 'create_slider'])->name('admin.create_slider')->middleware('can:slider_add');
    Route::put('managerdesign/{slider}', [AdminPageController::class, 'update_slider'])->name('admin.update_slider')->middleware('can:slider_add');
    Route::get('managerdesign/{id}', [AdminPageController::class, 'getSliderImage'])->name('get.slider.image');
    Route::delete('managerdesign/{slider}', [AdminPageController::class, 'delete_slider'])->name('admin.delete_slider')->middleware('can:slider_delete');

    Route::post('changeuserstatus/{id}', [AdminPageController::class, 'changeUserStatus'])->name('admin.changeUserStatus');
    Route::get('listuser', [AdminPageController::class, 'viewlistuser'])->name('admin.listuser');
    Route::post('listuser', [AdminPageController::class, 'registeruser'])->name('admin.registeruser');
    Route::put('listuser/{id}', [AdminPageController::class, 'updateuser'])->name('admin.updateuser');
    Route::get('listuser/{id}', [AdminPageController::class, 'deleteuser'])->name('admin.deleteuser');
    Route::get('updateuser/{id}', [AdminPageController::class, 'getiduser'])->name('admin.getiduser');
    Route::get('listdonate', [AdminPageController::class, 'viewlistdonate'])->name('admin.listdonate');
    Route::get('/getuserdonate', [AdminPageController::class, 'getdonateuser'])->name('detail.getuserdonate');
    Route::get('/totaldonate', [AdminPageController::class, 'GetTotalAmount'])->name('detail.GetTotalAmount');
    Route::get('/searchdashboard', [AdminPageController::class, 'searchdashboard'])->name('admin.searchdashboard');
    Route::get('/searchdesign', [AdminPageController::class, 'searchdesign'])->name('admin.searchdesign');
    Route::get('/searchlistuser', [AdminPageController::class, 'searchlistuser'])->name('admin.searchlistuser');
    Route::get('/searchlistdonate', [AdminPageController::class, 'searchlistdonate'])->name('admin.searchlistdonate');
    Route::get('/searchhome', [AdminPageController::class, 'searchhome'])->name('admin.searchhome');
});

//caregory Admin page
Route::group(['prefix' => 'category/'], function () {
    Route::get('index', [CategoryController::class, 'index'])->name('category.index')->middleware('can:category_list');

    Route::get('create', [CategoryController::class, 'create'])->name('category.create')->middleware('can:category_add');

    Route::post('store', [CategoryController::class, 'store'])->name('category.store');

    Route::post('delete/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('can:category_delete');

    Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('can:category_edit');

    Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
});

//project admin page
Route::group(['prefix' => 'project-post/'], function () {
    Route::get('index', [ProjectController::class, 'index'])->name('projectAd.index')->middleware('can:project_list');

    Route::get('create', [ProjectController::class, 'create'])->name('projectAd.create')->middleware('can:project_add');

    Route::post('store', [ProjectController::class, 'store'])->name('projectAd.store');

    Route::post('delete/{id}', [ProjectController::class, 'delete'])->name('projectAd.delete')->middleware('can:project_delete');

    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('projectAd.edit')->middleware('can:project_edit');

    Route::get('editimage/{id}', [ProjectController::class, 'deleteImgChild'])->name('delete_ImgChild');

    Route::put('update/{id}', [ProjectController::class, 'update'])->name('projectAd.update');

    // trash - softDelete - ProjectImage
    Route::get('image-trash', [ProjectController::class, 'trash_image'])->name('projectAd-image');
    Route::get('image-untrash/{id}', [ProjectController::class, 'untrash_image'])->name('projectAd-untrash');
    Route::get('projectAd-forcedelete/{id}', [ProjectController::class, 'projectAd_forcedelete'])->name('projectAd-forcedelete');

    // trash - softDelete - Project
    Route::get('project-trash', [ProjectController::class, 'project_trash'])->name('project-trash');
    Route::get('project_untrash/{id}', [ProjectController::class, 'project_untrash'])->name('project-untrash');
    Route::get('project-forcedelete/{id}', [ProjectController::class, 'project_forcedelete'])->name('project-forcedelete');

    //project status

    Route::get('project-finish/{id}', [ProjectController::class, 'finish_status'])->name('projectAd.finish');
    Route::get('project-unfinish/{id}', [ProjectController::class, 'unfinish_status'])->name('projectAd.unfinish');
});

// blog - news
Route::group(['prefix' => 'news/'], function () {
    Route::get('index', [NewsController::class, 'index'])->name('news.index')->middleware('can:news_list');

    Route::get('create', [NewsController::class, 'create'])->name('news.create')->middleware('can:news_add');

    Route::post('store', [NewsController::class, 'store'])->name('news.store');

    Route::post('delete/{id}', [NewsController::class, 'delete'])->name('news.delete')->middleware('can:news_delete');

    Route::get('edit/{id}', [NewsController::class, 'edit'])->name('news.edit')->middleware('can:news_edit');

    Route::put('update/{id}', [NewsController::class, 'update'])->name('news.update');

    // delete imageChild
    Route::get('edit-news-image/{id}', [NewsController::class, 'deleteImgChild'])->name('delete_newsImgChild');

    // trash - softDelete - newsImage
    Route::get('news-image-trash', [NewsController::class, 'trash_image'])->name('news-image-trash');
    Route::get('news-image-untrash/{id}', [NewsController::class, 'untrash_image'])->name('news-image-untrash');
    Route::get('news-image-forcedelete/{id}', [NewsController::class, 'news_image_forcedelete'])->name('news-image-forcedelete');

    // trash - softDelete - Project
    Route::get('news-trash', [NewsController::class, 'news_trash'])->name('news-trash');
    Route::get('news_untrash/{id}', [NewsController::class, 'news_untrash'])->name('news-untrash');
    Route::get('news-forcedelete/{id}', [NewsController::class, 'news_forcedelete'])->name('news-forcedelete');

    // news-detail
    // Route::get('/news-detail/{id}', [NewsController::class, 'news_detail'])->name('news-detail');
});

// video-adminpage
Route::group(['prefix' => 'video-list/'], function () {
    Route::get('index', [VideoController::class, 'index'])->name('video-list.index')->middleware('can:video_list');

    Route::get('create', [VideoController::class, 'create'])->name('video-list.create')->middleware('can:video_add');

    Route::post('store', [VideoController::class, 'store'])->name('video-list.store');

    Route::get('edit/{id}', [VideoController::class, 'edit'])->name('video-list.edit')->middleware('can:video_edit');

    Route::put('update/{id}', [VideoController::class, 'update'])->name('video-list.update');

    Route::post('delete/{id}', [VideoController::class, 'delete'])->name('video-list.delete')->middleware('can:video_delete');

    //softDelete
    Route::get('video-trash', [VideoController::class, 'video_trash'])->name('video-trash');
    Route::get('video_untrash/{id}', [VideoController::class, 'video_untrash'])->name('video-untrash');
    Route::get('video-forcedelete/{id}', [VideoController::class, 'video_forcedelete'])->name('video-forcedelete');
});


//user-post

Route::group(['prefix' => 'post/'], function () {
    Route::get('index', [UserPostController::class, 'index'])->name('post.index');

    Route::post('store', [UserPostController::class, 'store'])->name('post.store');

    Route::post('dalete/{id}', [UserPostController::class, 'delete'])->name('post.delete');

    Route::get('detail/{id}', [UserPostController::class, 'detail_post'])->name('post.detail');
    Route::post('updateuser/{id}', [UserPostController::class, 'updateprofile'])->name('post.updateprofile');


    // Route::put('update/{id}',[VideoController::class,'update'])->name('video-list.update');

    Route::get('post-cho-duyet/{id}', [UserPostController::class, 'choduyet'])->name('post.choduyet');
    Route::get('post-da-duyet/{id}', [UserPostController::class, 'daduyet'])->name('post.duyet');

    //softDelete
    Route::get('post-trash', [UserPostController::class, 'post_trash'])->name('post-trash');
    Route::get('post_untrash/{id}', [UserPostController::class, 'post_untrash'])->name('post-untrash');
    Route::get('post-forcedelete/{id}', [UserPostController::class, 'post_forcedelete'])->name('post-forcedelete');
});
//show-post(web)
Route::get('/post/post-detail', [UserPostController::class, 'show_post_home'])->name('post.detail.web');

Route::group(['middleware' => 'user_auth'], function () {
    //like-user-post
    Route::post('like', [UserPostController::class, 'like'])->name('post.like');
});



//edit-post(user)
Route::get('/post/delete_image/{id}', [UserPostController::class, 'delete_post_image'])->name('delete.post_image');
Route::get('/post/delete_post/{id}', [UserPostController::class, 'delete_post_user'])->name('delete.post_user');
Route::put('/post/edit', [UserPostController::class, 'edit_post'])->name('edit.post');

// comment post-user
Route::post('/store-comment/{id}', [CommentPostController::class, 'storeComment'])->name('store-comment');
//reply
Route::post('/store-comment-reply/{id}', [CommentPostController::class, 'storeCommentReply'])->name('store-comment_reply');
//show comment
Route::get('/comments/{postId}', [CommentPostController::class, 'showComments'])->name('show-comments');
//delete -comment
Route::delete('/delete-comments/{id}', [CommentPostController::class, 'deleteComments'])->name('delete-comment');
//edit comment
Route::post('/edit-comments/{id}', [CommentPostController::class, 'editComments'])->name('edit-comment');


Route::get('/post/get-post/{id}',[CommentPostController::class,'get_comment'])->name('show_comment-post');


//ds nv

Route::group(['prefix' => 'staff/'], function () {
    Route::get('index', [UserAdminController::class, 'index'])->name('staff.index')->middleware('can:user_list');
    Route::get('create', [UserAdminController::class, 'create'])->name('staff.create')->middleware('can:user_add');
    Route::get('index', [UserAdminController::class, 'index'])->name('staff.index')->middleware('can:user_list');
    Route::get('create', [UserAdminController::class, 'create'])->name('staff.create')->middleware('can:user_add');
    Route::post('store', [UserAdminController::class, 'store'])->name('staff.store');
    Route::get('edit/{id}', [UserAdminController::class, 'edit'])->name('staff.edit')->middleware('can:user_edit');
    Route::post('update/{id}', [UserAdminController::class, 'update'])->name('staff.update');
    Route::get('delete/{id}', [UserAdminController::class, 'delete'])->name('staff.delete')->middleware('can:user_delete');
});
//roles
Route::group(['prefix' => 'roles/'], function () {
    Route::get('index', [AdminRoleController::class, 'index'])->name('roles.index')->middleware('can:roles_list');
    Route::get('create', [AdminRoleController::class, 'create'])->name('roles.create')->middleware('can:roles_add');
    Route::post('store', [AdminRoleController::class, 'store'])->name('roles.store');
    Route::get('edit/{id}', [AdminRoleController::class, 'edit'])->name('roles.edit')->middleware('can:roles_edit');
    Route::post('update/{id}', [AdminRoleController::class, 'update'])->name('roles.update');
    Route::get('delete/{id}', [AdminRoleController::class, 'delete'])->name('roles.delete')->middleware('can:roles_delete');
});
Route::group(['prefix' => 'permissions/'], function () {
    Route::get('create', [AdminPermissionsController::class, 'create'])->name('permissions.create')->middleware('can:permissions_add');
    Route::get('create', [AdminPermissionsController::class, 'create'])->name('permissions.create')->middleware('can:permissions_add');
    Route::post('store', [AdminPermissionsController::class, 'store'])->name('permissions.store');
});
