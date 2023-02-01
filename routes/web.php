<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomAuthController;


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


Route::get('/',[FrontendController::class,'index']);

Auth::routes();

Route::get(' /home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function()
{

    //Routes for login
    Route::get('/login', 'Admin\CustomAuthController@ShowLoginForm')->name('login.show');
    Route::post('/login', 'Admin\CustomAuthController@login')->name('login.perform');

    //Routes for Registration
    Route::get('/register', 'Admin\CustomAuthController@ShowRegistrationForm')->name('register.show');
    Route::post('/register', 'Admin\CustomAuthController@register')->name('register.perform');


});

Route::middleware(['auth'])->group(function()
{
    //protected route ,  accessed only by authenticated users

    Route::get('category',[FrontendController::class,'category']);
    Route::get('user-dashboard',[FrontendController::class,'dashboard']);

    Route::get('/logout', 'Admin\CustomAuthController@logout')->name('logout.perform');

});


Route::middleware('auth','isAdmin')->group(function ()
{
   //protected route . Can be access only by auth users with role admin
   Route::get('/admin-dashboard','Admin\FrontendController@dashboard');

   //category routes//
   Route::get('/categories','Admin\CategoryController@index');
   Route::get('/create-category','Admin\CategoryController@create');
   Route::post('/store-category','Admin\CategoryController@store');
   Route::get('/edit-category/{id}','Admin\CategoryController@edit');
   Route::put('/update-category/{id}','Admin\CategoryController@update');
   Route::delete('/delete-category/{id}','Admin\CategoryController@destroy')->name('category.destroy');;


   //user routes//
   Route::get('users',[UserController::class,'users']);

   Route::get('/new-user',[UserController::class,'create']);

   Route::post('/store-user',[UserController::class,'store']);

   Route::get('/edit-user/{id}',[UserController::class,'edit']);

   Route::put('/update-user/{id}',[UserController::class,'update']);

   Route::delete('/delete-user/{id}',[UserController::class,'delete'])->name('admin.destroy');
   //Route::get('/delete-user/{id}',[UserController::class,'delete'])->name('admin.destroy');


});
