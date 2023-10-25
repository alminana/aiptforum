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
use App\Http\Controllers\AdminControllers\AdminpastController;

use App\Http\Controllers\AdminControllers\AdminPatentController;

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

use App\Http\Controllers\PatentController;

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
use App\Http\Controllers\PcommentController;
use App\Http\Controllers\PastController;

// Route::get('past', [PastController::class, 'index'])->name('past.index');
// Route::get('past/new', [PastController::class, 'create'])->name('create');
// Route::post('/past', [PastController::class, 'store'])->name('store');
Route::middleware('auth')->group(function(){


Route::resource('past', PastController::class);

Route::post('/pasts/{past}/comments', [PcommentController::class, 'store']);
Route::get('/pct/patent/deadline',[PastController::class, 'patentpct'])->name('past.pct');
Route::get('/regular/patent/deadline',[PastController::class, 'patentregular'])->name('past.regular');
Route::get('/request/patent/deadline',[PastController::class, 'patentrequest'])->name('past.request');
Route::get('/actual/patent/deadline',[PastController::class, 'patentactual'])->name('past.actual');
Route::get('/annual/patent/deadline',[PastController::class, 'patentannual'])->name('past.annual');





// Front User Routes
// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('profile', [AdminUsersController::class, 'profileindex'])->name('profiles.profileindex');
Route::post('profile/{id}', [AdminUsersController::class, 'update'])->name('profiles.update');

Route::get('/user/logout', [UserController::class, 'destroy'])->name('user.logout');
Route::get('/profile_view/{id}', [UserController::class, 'edit'])->name('profiles.edit');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('patent', PatentController::class);
// Route::get('/filter',[PatentController::class, 'filter'])->name('patent.filter');
Route::post('/patent/{patent:id}', [PatentController::class, 'addComment'])->name('patent.add_comment');
// Route::get('/patent/{id}', [PatentController::class, 'update'])->name('patent.update');
// Route::get('/patent/{id}', [PatentController::class, 'edit'])->name('patent.edit');
// Route::get('/patent', [PatentController::class, 'index'])->name('patent.index');
// Route::post('/patent/{id}', [PatentController::class, 'show'])->name('patent.show');
Route::resource('post', PostsController::class);
// 
Route::get('/posts/{post:id}', [PostsController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}', [PostsController::class, 'addComment'])->name('posts.add_comment');
// Route::get('/posts', [PostsController::class, 'create'])->name('posts.create');

Route::get('/pdf/{id}', [PostsController::class, 'generatepdf'])->name('pdf.generatepdf');

Route::get('/print/{post:id}', [PostsController::class, 'printthis'])->name('print.printthis');

Route::get('/client', [CategoryController::class, 'index'])->name('client.index');
// export excel for Application
Route::post('/posts/view-pdf',[PostsController::class, 'viewPDF'])->name('view-pdf');
Route::post('/posts/download-pdf',[PostsController::class, 'downloadPdf'])->name('download-pdf');
Route::post('/posts/export-excel',[PostsController::class, 'exportExcel'])->name('posts.download-excel');


// Route::resource('categories', CategoryController::class);

Route::get('/categories/{category:id}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/Trademark', [CategoryController::class, 'index'])->middleware(['auth','verified'])->name('categories.index');

Route::get('/tm/requested/deadline', [CategoryController::class, 'Tprocedure'])->middleware(['auth','verified'])->name('categories.requested');

Route::get('/tm/actual/deadline', [CategoryController::class, 'Tactual'])->middleware(['auth','verified'])->name('categories.actual');


// Route::get('/dashboard', [CategoryController::class, 'index'])->middleware(['auth','verified'])->name('categories.index');


Route::get('/tags/{tag:name}', [TagController::class, 'show'])->name('tags.show');

Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter_store');

Route::get('/client', [CategoryController::class, 'index'])->name('client.index');

Route::post('/filter',[CategoryController::class, 'getData'])->name('category.getData');

Route::get('/deadline', [PostsController::class, 'deadline'])->name('deadline.deadline');

Route::get('/select', [PostsController::class, 'getData'])->name('deadline.getData');

Route::get('/trademark/Request/filter', [PostsController::class, 'trademarkRequestfilter'])->name('deadline.trequested');

Route::get('/trademark/Actual/filter', [PostsController::class, 'trademarkactualfilter'])->name('deadline.tactual');

Route::get('/dashboard', [PostsController::class, 'notification'])->name('deadline.notification');

});
require __DIR__.'/auth.php';

// Admin Dashboard Routes

Route::name('admin.')->prefix('admin')->middleware(['auth', 'check_permissions'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::post('upload_tinymce_image', [TinyMCEController::class, 'upload_tinymce_image'])->name('upload_tinymce_image');

    Route::resource('clients', AdminClientController::class);
    Route::resource('method', AdminMethodController::class);

    Route::resource('posts', AdminPostsController::class);
    

    Route::resource('past', AdminpastController::class)->only(['index', 'show', 'destroy','create','edit','update','store']);
    //patent
    Route::resource('patents', AdminPatentController::class);

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
