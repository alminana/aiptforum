<?php

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

Route::get('/', function () {return view('welcome'); });

Auth::routes();

//Auth routes
Route::group(['middleware' => 'web'], function () {
Route::view('/login', 'welcome')->name('login');
Route::post('/login-action', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('custom.login');
Route::post('/custom-logout', [App\Http\Controllers\CustomAuthController::class, 'customLogout'])->name('custom.logout');
});
Route::post('/confirm-password', function () {
    return view('auth.passwords.confirm');
})->middleware('auth')->name('password.confirm');

 
Route::group(['middleware' => ['web','auth']], function () {

    Route::group(['prefix' => 'users'], function() {
    Route::get('/index', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('/add', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::post('/store', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::get('/show/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('users.show');
    Route::delete('/delete/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.delete');
    Route::get('/active/{id}', [App\Http\Controllers\UsersController::class, 'active'])->name('users.active');
    Route::get('/unactive/{id}', [App\Http\Controllers\UsersController::class, 'unactive'])->name('users.unactive');
    Route::get('/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::put('/update/{id}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update'); 
    //mark as read notification
    Route::get('/mark_read/{id}', [App\Http\Controllers\UsersController::class, 'mark_read'])->name('notifications.mark_read'); 
    });

    Route::group(['prefix' => 'departments'], function() {
        Route::get('/index', [App\Http\Controllers\DepartmentsController::class, 'index'])->name('departments.index');
        Route::get('/add', [App\Http\Controllers\DepartmentsController::class, 'create'])->name('departments.create');
        Route::post('/store', [App\Http\Controllers\DepartmentsController::class, 'store'])->name('departments.store');
        Route::get('/show/{id}', [App\Http\Controllers\DepartmentsController::class, 'show'])->name('departments.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\DepartmentsController::class, 'destroy'])->name('departments.delete');
         Route::get('/edit/{id}', [App\Http\Controllers\DepartmentsController::class, 'edit'])->name('departments.edit');
        Route::put('/update/{id}', [App\Http\Controllers\DepartmentsController::class, 'update'])->name('departments.update'); 
    });

    Route::group(['prefix' => 'clients'], function() {
        Route::get('/index', [App\Http\Controllers\ClientsController::class, 'index'])->name('clients.index');
        Route::get('/add', [App\Http\Controllers\ClientsController::class, 'create'])->name('clients.create');
        Route::post('/store', [App\Http\Controllers\ClientsController::class, 'store'])->name('clients.store');
        Route::get('/show/{id}', [App\Http\Controllers\ClientsController::class, 'show'])->name('clients.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\ClientsController::class, 'destroy'])->name('clients.delete');
         Route::get('/edit/{id}', [App\Http\Controllers\ClientsController::class, 'edit'])->name('clients.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ClientsController::class, 'update'])->name('clients.update'); 
    });

    Route::group(['prefix' => 'methodes'], function() {
        Route::get('/index', [App\Http\Controllers\MethodesController::class, 'index'])->name('methodes.index');
        Route::get('/add', [App\Http\Controllers\MethodesController::class, 'create'])->name('methodes.create');
        Route::post('/store', [App\Http\Controllers\MethodesController::class, 'store'])->name('methodes.store');
        Route::get('/show/{id}', [App\Http\Controllers\MethodesController::class, 'show'])->name('methodes.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\MethodesController::class, 'destroy'])->name('methodes.delete');
         Route::get('/edit/{id}', [App\Http\Controllers\MethodesController::class, 'edit'])->name('methodes.edit');
        Route::put('/update/{id}', [App\Http\Controllers\MethodesController::class, 'update'])->name('methodes.update'); 
    });

    Route::group(['prefix' => 'procedures'], function() {
        Route::get('/index', [App\Http\Controllers\ProceduresController::class, 'index'])->name('procedures.index');
        Route::get('/add', [App\Http\Controllers\ProceduresController::class, 'create'])->name('procedures.create');
        Route::post('/store', [App\Http\Controllers\ProceduresController::class, 'store'])->name('procedures.store');
        Route::get('/show/{id}', [App\Http\Controllers\ProceduresController::class, 'show'])->name('procedures.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\ProceduresController::class, 'destroy'])->name('procedures.delete');
         Route::get('/edit/{id}', [App\Http\Controllers\ProceduresController::class, 'edit'])->name('procedures.edit');
        Route::put('/update/{id}', [App\Http\Controllers\ProceduresController::class, 'update'])->name('procedures.update'); 
    });

    Route::group(['prefix' => 'associates'], function() {
        Route::get('/index', [App\Http\Controllers\AssociatesController::class, 'index'])->name('associates.index');
        Route::get('/add', [App\Http\Controllers\AssociatesController::class, 'create'])->name('associates.create');
        Route::post('/store', [App\Http\Controllers\AssociatesController::class, 'store'])->name('associates.store');
        Route::get('/show/{id}', [App\Http\Controllers\AssociatesController::class, 'show'])->name('associates.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\AssociatesController::class, 'destroy'])->name('associates.delete');
         Route::get('/edit/{id}', [App\Http\Controllers\AssociatesController::class, 'edit'])->name('associates.edit');
        Route::put('/update/{id}', [App\Http\Controllers\AssociatesController::class, 'update'])->name('associates.update'); 
    });
 
    //chatgpt routes
    Route::group(['prefix' => 'chatgpt'], function() {
    Route::get('/', [App\Http\Controllers\ChatGPTController::class, 'index'])->name('chatgpt.index');
    Route::post('/ask', [App\Http\Controllers\ChatGPTController::class, 'ask'])->name('chatgpt.ask');
    });

     //notification routes
    Route::get('/notification', [App\Http\Controllers\HomeUsersControllerController::class, 'notification']);
   
     //import EXCEL routes
    Route::get('/file-import',[App\Http\Controllers\ExcelImportController::class,'importView'])->name('import-view');
    Route::post('/import',[App\Http\Controllers\ExcelImportController::class,'tests'])->name('import');

    //trademarks crud
    Route::group(['prefix' => 'trademarkstkts'], function() {
        Route::get('/',[App\Http\Controllers\TradeMarksController::class,'index'])->name('trademarkstkts.index');
        Route::get('/tkt_questions',[App\Http\Controllers\TradeMarksController::class,'tkt_questions'])->name('tkt_questions');
        Route::get('/add', [App\Http\Controllers\TradeMarksController::class, 'create'])->name('trademarkstkts.create');
        Route::post('/store', [App\Http\Controllers\TradeMarksController::class, 'store'])->name('trademarkstkts.store');
        Route::get('/show/{id}', [App\Http\Controllers\TradeMarksController::class, 'show'])->name('trademarkstkts.show');
        Route::patch('/update/{id}', [App\Http\Controllers\TradeMarksController::class, 'update'])->name('trademarkstkts.update');
        Route::post('/fileUploadPost', [App\Http\Controllers\TradeMarksController::class, 'fileUploadPost'])->name('fileUploadPost');
        Route::get('/report', [App\Http\Controllers\TradeMarksController::class, 'report'])->name('trademarkstkts.report');
        Route::get('/excel', [App\Http\Controllers\TradeMarksController::class, 'test'])->name('trademarkstkts.excel');
        Route::get('/request_report', [App\Http\Controllers\TradeMarksController::class, 'request_report'])->name('trademarkstkts.request_report');
        //        request_report
        //    Route::view('/create', 'tickets.add')->name('trademarkstkts.create');
     //   Route::get('/create',[App\Http\Controllers\TKTsController::class,'tkt_questions'])->name('trademarkstkts.create');
    });

    Route::group(['prefix' => 'notifications'], function() {
        Route::get('/index', [App\Http\Controllers\NotificationController::class, 'viewnotification'])->name('notifications.index');
        Route::get('/add', [App\Http\Controllers\NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/store', [App\Http\Controllers\NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/show/{id}', [App\Http\Controllers\NotificationController::class, 'show'])->name('notifications.show');
        Route::delete('/delete/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notifications.delete');
        Route::get('/edit/{id}', [App\Http\Controllers\NotificationController::class, 'edit'])->name('notifications.edit');
        Route::put('/update/{id}', [App\Http\Controllers\NotificationController::class, 'update'])->name('notifications.update'); 

        Route::get('/notificationall', [App\Http\Controllers\NotificationController::class, 'notificationall'])->name('notifications.notificationall');
        });



        Route::resource('applicants', App\Http\Controllers\ApplicantController::class);

        /*Route::group(['prefix' => 'applicants'], function() {
            Route::get('/index', [App\Http\Controllers\ApplicantController::class, 'index'])->name('applicants.index');
            Route::get('/add', [App\Http\Controllers\ApplicantController::class, 'create'])->name('applicants.create');
            Route::post('/store', [App\Http\Controllers\ApplicantController::class, 'store'])->name('applicants.store');
            Route::get('/show/{id}', [App\Http\Controllers\ApplicantController::class, 'show'])->name('applicants.show');
            Route::delete('/delete/{id}', [App\Http\Controllers\ApplicantController::class, 'destroy'])->name('applicants.delete');
            Route::get('/edit/{id}', [App\Http\Controllers\ApplicantController::class, 'edit'])->name('applicants.edit');
            Route::put('/update/{id}', [App\Http\Controllers\ApplicantController::class, 'update'])->name('applicants.update'); 
    
            });*/

            

       

    Route::post('notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notifications');
        //Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
        //Route::post('edit-company', [App\Http\Controllers\NotificationController::class, 'edit']);
        // Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);
        //Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification');
        //Route::post('/mark-as-read', [App\Http\Controllers\NotificationController::class, 'markNotification'])->name('markNotification');
        //Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead']);
    Route::resource('roles', App\Http\Controllers\RollController::class);


    Route::get('/clear', function() {
        Artisan::call('optimize:clear'); return redirect()->back();
    })->name('clear');

});

    //telescope 
    Route::middleware(['telescope'])->group(function () {
    // Telescope::routes();
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 

    Route::get('/draft', [App\Http\Controllers\HomeController::class, 'draft']);

