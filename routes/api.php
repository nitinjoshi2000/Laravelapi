<?php

use App\Http;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\BannerController;
use App\Http\Controllers\api\BlogController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ContactController;
use App\Http\Controllers\api\CurdController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('display',[ApiController::class,'index']);
Route::post('insertapi',[ApiController::class,'insertapi']);
Route::get('view/{id}',[ApiController::class,'view']);
Route::post('update/{id}',[ApiController::class,'update']);
Route::get('delete/{id}',[ApiController::class,'delete']);

//Curd
Route::get('display',[CurdController::class,'index']);
Route::post('insert',[CurdController::class,'insert']);
Route::get('view/{id}',[CurdController::class,'view']);
Route::put('update/{id}',[CurdController::class,'update']);
Route::get('delete/{id}',[CurdController::class,'delete']);

//Blog
Route::get('displayblog',[BlogController::class,'index']);
Route::post('insertblog',[BlogController::class,'insert']);
Route::get('viewblog/{id}',[BlogController::class,'view']);
Route::post('update/{id}',[BlogController::class,'update']);
Route::get('deleteblog/{id}',[BlogController::class,'delete']);

//Blog Contact
Route::get('displaycontact',[ContactController::class,'index']);
Route::post('insertcontact',[ContactController::class,'insert']);
Route::get('view/{id}',[ContactController::class,'view']);
Route::post('update/{id}',[ContactController::class,'update']);
Route::get('delete/{id}',[ContactController::class,'delete']);

//Blog Banner
Route::get('displaybanner',[BannerController::class,'index']);
Route::post('insertbanner',[BannerController::class,'insert']);
Route::get('view/{id}',[BannerController::class,'view']);
Route::post('update/{id}',[BannerController::class,'update']);
Route::get('deletebanner/{id}',[BannerController::class,'delete']);

//Category Banner
Route::get('displaycategory',[CategoryController::class,'index']);
Route::post('insertcategory',[CategoryController::class,'insert']);
Route::get('view/{id}',[CategoryController::class,'view']);
Route::post('update/{id}',[CategoryController::class,'update']);
Route::get('deletecategory/{id}',[CategoryController::class,'delete']);
