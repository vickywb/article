<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'index']);
// Route::get('/author/{username}', [IndexController::class, 'show']);
Route::resource('/articles', ArticleController::class);
Route::get('/article/{slug}', [ArticleController::class, 'show']);
Route::resource('/categories', ArticleCategoryController::class);
Route::get('/category/{slug}', [ArticleCategoryController::class, 'show']);
Route::resource('/about', AboutController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\RolesController::class, 'index'])->middleware('auth', 'role');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth', 'role');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::resource('/', AdminController::class);
});

Route::group(['middleware' => ['auth', 'author'], 'prefix' => 'author', 'as' => 'author.'], function () {
  Route::resource('/', AuthorController::class);

  Route::get('posts/checkSlug', [PostController::class, 'checkSlug']);

  Route::get('postcategories/cekSlug', [CategoryController::class, 'cekSlug']);

  Route::resource('/posts', PostController::class);

  Route::resource('/postcategories', CategoryController::class);
});

Route::group(['middleware' => ['auth', 'customer'], 'prefix' => 'customer', 'as' => 'customer.'], function () {
  Route::resource('/page', CustomerController::class);
  // Route::get('/page', [CustomerController::class, 'index']);
});
