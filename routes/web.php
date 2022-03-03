<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SocialShareButtonsController;

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

Route::get('',[HomeController::class,'index'])->name('home');
Route::get('posts',[HomeController::class,'post'])->name('posts');
Route::get('posts/tag/{tag}',[HomeController::class,'byTag'])->name('byTag');
Route::get('posts/category/{category}',[HomeController::class,'byCategory'])->name('byCategory');
Route::post('posts/search',[HomeController::class,'bySearch'])->name('bySearch');
Route::get('posts/{id}',[HomeController::class,'show'])->name('post');

// Post
Route::get('post/create',[PostController::class,'show_create'])->name('show_create.post');
Route::post('post/create',[PostController::class,'create'])->name('create.post');
Route::get('posts/{id}/edit',[PostController::class,'show_edit'])->name('show_edit.post');
Route::put('posts/{id}/edit',[PostController::class,'edit'])->name('edit.post');
Route::get('posts/{id}/delete',[PostController::class,'show_delete'])->name('show_delete.post');
Route::delete('posts/{id}/delete',[PostController::class,'delete'])->name('delete.post');


// Tag
Route::get('tag/create',[TagController::class,'show_create'])->name('show_create.tag');
Route::post('tag/create',[TagController::class,'create'])->name('create.tag');
Route::get('tags/{id}/edit',[TagController::class,'show_edit'])->name('show_edit.tag');
Route::put('tags/{id}/edit',[TagController::class,'edit'])->name('edit.tag');
Route::get('tags/{id}/delete',[TagController::class,'show_delete'])->name('show_delete.tag');
Route::delete('tags/{id}/delete',[TagController::class,'delete'])->name('delete.tag');


// Category
Route::get('category/create',[CategoryController::class,'show_create'])->name('show_create.category');
Route::post('category/create',[CategoryController::class,'create'])->name('create.category');
Route::get('categories/{id}/edit',[CategoryController::class,'show_edit'])->name('show_edit.category');
Route::put('categories/{id}/edit',[CategoryController::class,'edit'])->name('edit.category');
Route::get('categories/{id}/delete',[CategoryController::class,'show_delete'])->name('show_delete.category');
Route::delete('categories/{id}/delete',[CategoryController::class,'delete'])->name('delete.category');


// Admin
Route::get('admin',[AdminController::class,'index'])->name('admin.index');
Route::get('admin/posts',[AdminController::class,'posts'])->name('admin.posts');
Route::get('admin/tags',[AdminController::class,'tags'])->name('admin.tags');
Route::get('admin/categories',[AdminController::class,'categories'])->name('admin.categories');
Route::get('admin/users',[AdminController::class,'users'])->name('admin.users');

// User
Route::get('user/create',[UserController::class,'show_create'])->name('show_create.user');
Route::post('user/create',[UserController::class,'create'])->name('create.user');
Route::get('users/{id}/edit',[UserController::class,'show_edit'])->name('show_edit.user');
Route::get('users/{id}/edit_password',[UserController::class,'show_edit_password'])->name('show_edit_password.user');
Route::put('users/edit_password',[UserController::class,'edit_password'])->name('edit_password.user');
Route::put('users/{id}/edit',[UserController::class,'edit'])->name('edit.user');
Route::get('users/{id}/delete',[UserController::class,'show_delete'])->name('show_delete.user');
Route::delete('users/{id}/delete',[UserController::class,'delete'])->name('delete.user');

require __DIR__.'/auth.php';

