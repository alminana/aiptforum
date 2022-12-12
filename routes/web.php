<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can regsister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\AdminPostsController;
use App\Http\Controllers\AdminControllers\TinyMCEController;
use App\Http\Controllers\AdminControllers\AdminCategoriesController;
use App\Http\Controllers\AdminControllers\AdminTagsController;
use App\Http\Controllers\AdminControllers\AdminCommentsController;
use App\Http\Controllers\AdminControllers\AdminRolesController;
use App\Http\Controllers\AdminControllers\AdminUsersController;
use App\Http\Controllers\AdminControllers\AdminContactsController;
use App\Http\Controllers\AdminControllers\AdminSettingController;

use App\Http\Controllers\AdminControllers\AdminClientController;
use App\Http\Controllers\AdminControllers\AdminMethodController;
use App\Http\Controllers\AdminControllers\AdminProfileController;
use App\Http\Controllers\AdminControllers\AdminImportController;
// arabic
use App\Http\Controllers\homearController;
use App\Http\Controllers\aboutarController;
use App\Http\Controllers\ServicearController;
use App\Http\Controllers\NewsarController;
use App\Http\Controllers\ContactarController;


use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\userController;

// Front User Routes
// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('profile', [AdminUsersController::class, 'profileindex'])->name('profiles.profileindex');
Route::post('profile/{id}', [AdminUsersController::class, 'update'])->name('profiles.update');

Route::get('/user/logout', [UserController::class, 'destroy'])->name('user.logout');
Route::get('/profile_view/{id}', [UserController::class, 'edit'])->name('profiles.edit');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{post:slug}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}',[PostsController::class, 'addComment'])->name('posts.add_comment');
Route::get('/pdf/{id}', [PostsController::class, 'generatepdf'])->name('pdf.generatepdf');

Route::get('/print/{post:slug}', [PostsController::class, 'printthis'])->name('print.printthis');

Route::get('/client', [CategoryController::class, 'index'])->name('client.index');
// export excel for Application
Route::post('/posts/view-pdf',[PostsController::class, 'viewPDF'])->name('view-pdf');
Route::post('/posts/download-pdf',[PostsController::class, 'downloadPdf'])->name('download-pdf');
Route::post('/posts/export-excel',[PostsController::class, 'exportExcel'])->name('posts.download-excel');


Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/dashboard', [CategoryController::class, 'index'])->middleware(['auth','verified'])->name('categories.index');

Route::get('/tags/{tag:name}', [TagController::class, 'show'])->name('tags.show');

Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter_store');

Route::get('/client', [CategoryController::class, 'index'])->name('client.index');

Route::post('/filter',[CategoryController::class, 'getData'])->name('category.getData');

Route::get('/deadline', [PostsController::class, 'deadline'])->name('deadline.deadline');

Route::get('/select', [PostsController::class, 'getData'])->name('deadline.getData');

Route::resource('profile/{id}', [AdminUsersController::class, 'update'])->name('profiles.update');
require __DIR__.'/auth.php';

// Admin Dashboard Routes

Route::name('admin.')->prefix('admin')->middleware(['auth', 'check_permissions'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');

    Route::resource('clients', AdminClientController::class);
    Route::resource('method', AdminMethodController::class);

    Route::resource('posts', AdminPostsController::class);
    Route::resource('categories', AdminCategoriesController::class);
    Route::resource('tags', AdminTagsController::class)->only(['index', 'show', 'destroy']);
    Route::resource('comments', AdminCommentsController::class)->except('show');

    Route::resource('roles', AdminRolesController::class)->except('show');
    Route::resource('users', AdminUsersController::class);
    

    Route::get('contacts', [AdminContactsController::class, 'index'])->name('contacts');
    Route::delete('contacts/{contact}', [AdminContactsController::class, 'destroy'])->name('contacts.destroy');

    Route::get('about', [AdminSettingController::class, 'edit'])->name('setting.edit');
    Route::post('about', [AdminSettingController::class, 'update'])->name('setting.update');

    Route::post('import', [AdminImportController::class, 'importdata'])->name('import.index');

    Route::get('/users/status/{status_code}', [AdminUsersController::class, 'updateStatus'])->name('index.updateStatus');
});
