<?php

use Inertia\Inertia;
use App\Models\Article;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'products' => Product::take(3)->get(),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    /*Route::get('/categories', [CategoryController::class, 'create'])
        ->name('categories.createcategory');*/

    //Route::resource('/categories', App\Http\Controllers\CategoryController::class);
});

Route::group(['middleware' => [
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]], function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('categories.indexcategory');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.createcategory');
    Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.editcategory');
    Route::put('/category/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.indexproduct');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.indexarticle');



Route::get('/billings', [BillingController::class, 'index'])
    ->middleware('auth')
    ->name('billings.indexbilling');
