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
    $authors=User::with('posts')->take(4)->get();
    return view('index',compact("posts","authors"));
}); 

Route::get('home',[NavigationController::class,'index'])->name('index');
Route::get('login', function () {return view('login');})->name('login');
Route::get('registration', function () {return view('registration');})->name('registration');

//------User Registration---
Route::post('user_registration',[UserController::class,'create_user']);
//------Auth Routes------
Route::post('login_attempt',[AuthController::class,'login_attempt']);
Route::get('logout',[AuthController::class,'logout']);

//------Post Routes------
Route::get('all-posts',[PostController::class,'post_list'])->name('all-post');
Route::get('blog/{slug}',[PostController::class,'post_details'])->name('blog');
Route::get('create-post',[PostController::class,'create_post'])->name('create-post');
Route::post('post-submit',[PostController::class,'post_submit'])->name('post-submit');
Route::get('edit-post/{encrypted_id}',[PostController::class,'edit_post'])->name('edit-post');
Route::post('update-post-data/{encrypted_id}',[PostController::class,'update_post_data'])->name('update-post-data');
Route::get('delete-post/{encrypted_id}',[PostController::class,'delete_post'])->name('delete-post');
Route::get('category/{category}',[PostController::class,'post_by_category'])->name('post_by_category');
Route::get('author/{id}/{author}',[PostController::class,'post_by_author'])->name('author');

