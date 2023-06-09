<?php

use Inertia\Inertia;
use App\Models\Article;
use App\Models\Product;
use App\Models\Plan;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\StripeController;



require __DIR__ . '/admin.php';

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
    $plans = Plan::where('is_free', false)
        ->orderBy('price', 'asc')
        ->get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'products' => Product::take(3)->get(),
        'plans' => $plans,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/welcome', function () {
        return Inertia::render('Welcome');
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

    //Route::resource('/category', App\Http\Controllers\CategoryController::class);
    Route::get('/gallery',  [GalleryController::class, 'index'])->name('gallery.indexgallery');
    Route::get('/gallery/semanasanta', [GalleryController::class, 'showsanta'])->name('gallery.showsanta');
    Route::get('/gallery/semanasanta/banderas', [GalleryController::class, 'showbanderas'])->name('gallery.showbanderas');
    Route::get('/gallery/semanasanta/romanos', [GalleryController::class, 'showromanos'])->name('gallery.showromanos');

    Route::get('/category', [CategoryController::class, 'index'])->name('categories.indexcategory');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('categories.createcategory');
    Route::post('/category', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('categories.editcategory');
    Route::put('/category/{category}/edit', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/category/{category}/delete', [CategoryController::class, 'destroy'])->name('categories.destroy');

    Route::get('/article', [ArticleController::class, 'index'])->name('articles.indexarticle');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.createarticle');
    Route::post('/article', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('articles.editarticle');
    Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->name('articles.update');
    Route::get('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::post('/article/upload/{article}', [ArticleController::class, 'upload'])->name('articles.upload');
});

Route::get('/products', [StripeController::class, 'createCheckoutSession'])->name('products.indexproduct');

/* Fin venta */


Route::prefix('billings')->middleware('auth')->group(function () {
    Route::controller(BillingController::class)->group(function () {
        Route::get('', 'render')->name('billings.indexbilling');
        Route::post('', 'update')->name('billings.payment');
    });
});

//Subcripciones

Route::prefix('plans')->middleware('auth')->group(function () {
    Route::controller(PlanViewController::class)->group(function () {
        Route::get('', 'index')->name('plans.indexplan');
        Route::post('checkout/{slug}', 'checkout')->name('checkout.plan');
        Route::get('checkout/{slug}', 'checkout')->name('checkout.plan');
        Route::post('{slug}', 'createSubcription')->name('subcription.payment');
    });
});
