<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

use App\Models\User;
use App\Models\Post;

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

Route::get('/', function () {
    $posts=Post::with('user')->OrderBy('id','desc')->take(3)->get();
    return view('index',compact("posts"));
}); 

Route::get('index',[NavigationController::class,'index'])->name('index');
Route::get('login', function () {return view('login');})->name('login');
Route::get('registration', function () {return view('registration');})->name('registration');

//------User Registration---
Route::post('user_registration',[UserController::class,'create_user']);
//------Auth Routes------
Route::post('login_attempt',[AuthController::class,'login_attempt']);
Route::get('logout',[AuthController::class,'logout']);

//------Post Routes------
Route::get('post_list',[PostController::class,'post_list'])->name('post_list');
Route::get('post_details/{encrypted_id}',[PostController::class,'post_details'])->name('post_details');
Route::get('create_post',[PostController::class,'create_post'])->name('create_post');
Route::post('post_submit',[PostController::class,'post_submit'])->name('post_submit');
Route::get('edit_post/{encrypted_id}',[PostController::class,'edit_post'])->name('edit_post');
Route::post('update_post_data/{encrypted_id}',[PostController::class,'update_post_data'])->name('update_post_data');
Route::get('delete_post/{encrypted_id}',[PostController::class,'delete_post'])->name('delete_post');
Route::get('post_by_category/{category}',[PostController::class,'post_by_category'])->name('post_by_category');
Route::get('post_by_author/{id}/{author}',[PostController::class,'post_by_author'])->name('post_by_author');

