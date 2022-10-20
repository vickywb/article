<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
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

//Article Page
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('article.store');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');

//About Page
Route::get('/abouts', [AboutController::class, 'index'])->name('about.index');

//Categories Page
Route::get('/categories', [ArticleCategoryController::class, 'index'])->name('article.category.index');
Route::get('/categories/{slug}', [ArticleCategoryController::class, 'show'])->name('article.category.show');

// Route::resource('/articles', ArticleController::class);
// Route::get('/article/{slug}', [ArticleController::class, 'show']);
// Route::resource('/categories', ArticleCategoryController::class);
// Route::get('/category/{slug}', [ArticleCategoryController::class, 'show']);
// Route::resource('/about', AboutController::class);

Auth::routes();
Route::get('/home', [App\Http\Controllers\RolesController::class, 'index'])->middleware('auth', 'role');

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::resource('/', AdminController::class);
});


Route::group(['middleware' => ['auth', 'author'], 'prefix' => 'author', 'as' => 'author.'], function () {
  Route::resource('/', AuthorController::class);

  Route::get('postcategories/cekSlug', [CategoryController::class, 'cekSlug']);

  Route::resource('/posts', PostController::class);

  Route::resource('/postcategories', CategoryController::class);
});

Route::group(['middleware' => ['auth', 'customer'], 'prefix' => 'customer', 'as' => 'customer.'], function () {
  Route::resource('/page', CustomerController::class);
  // Route::get('/page', [CustomerController::class, 'index']);
});
