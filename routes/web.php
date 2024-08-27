<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MetaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\DemoController;


use App\Http\Controllers\WebSiteController;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

/*--------------------------------- Website Routes ---------------------------------*/


Route::get('/',[WebSiteController::class,'viewIndex'])->name('viewIndex');
Route::get('/blogs/{search?}',[WebSiteController::class,'viewBlog'])->name('viewBlog');
Route::get('/blog/{id}',[WebSiteController::class,'viewBlogInner'])->name('viewBlogInner');
Route::get('/contact-us',[WebSiteController::class,'viewContactUsPage'])->name('viewContactUsPage');
Route::post('/contact-us',[WebSiteController::class,'viewContactUs'])->name('viewContactUs');


/*--------------------------------- Auth Routes ---------------------------------*/

Route::get('/admin/login', [AuthController::class, 'index'])->name('login.view')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login'])->name('login')->middleware('guest');

/*--------------------------------- Admin Routes ---------------------------------*/

Route::group(['middleware' => 'auth','prefix'=>'/admin'], function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




    Route::get('/tags', [TagsController::class, 'index'])->name('tags');
    Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
    Route::post('/tags/store', [TagsController::class, 'store'])->name('tags.store');
    Route::get('/tags/edit/{tags}', [TagsController::class, 'edit'])->name('tags.edit');
    Route::delete('/tags/edit/{tags}', [TagsController::class, 'destroy'])->name('tags.destroy');
    Route::put('/tags/update/{tags}', [TagsController::class, 'update'])->name('tags.update');



    Route::get('/subscribe', [ContactUsController::class, 'index'])->name('subscribe');
    Route::delete('/subscribe/{contactus}', [ContactUsController::class, 'destroy'])->name('contact.destroy');


    
    Route::get('/news-letter', [NewsLetterController::class, 'index'])->name('news');
    Route::delete('/news-letter/{newsletter}', [NewsLetterController::class,'destroy'])->name('news.destroy');

    Route::get('/demo', [DemoController::class, 'index'])->name('demo');
    
    /////////Demo Inquiry //////


    /*-------------------------------

     ______________
    |  Resources  |
    ______________
        1: Our Clients
        2: Category
        3: blogs
        4: Our Works
    --------------------------------*/

    Route::resources([
        '/our-clients' => OurClientController::class,
        '/category' => CategoryController::class,
        '/blog' => BlogController::class
    ]);

    /*--------------------------------- File Manager ---------------------------------*/

    Route::group(['prefix' => 'filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
  

    

    /*----------------------------------- Meta ---------------------------------*/

    Route::get('/meta', [MetaController::class, 'index'])->name('meta.index');
    Route::get('/meta/{meta}', [MetaController::class, 'edit'])->name('meta.edit');
    Route::put('meta/{meta}', [MetaController::class, 'update'])->name('meta.update');

});



Route::post('/news-letter/store', [NewsLetterController::class, 'store'])->name('news.store');
Route::get('/demo',[WebSiteController::class,'viewDemo'])->name('viewDemo');


