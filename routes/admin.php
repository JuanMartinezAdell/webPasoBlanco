<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;


/*Route::get('/', function () {
    return Inertia::render('AdminDashboard');
})->name('admin.admindashboard');*/

Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');


/*Route::prefix('diary')->middleware('auth')->group(function () {
    Route::controller(AgendaController::class)->group(function () {
        Route::get('', 'index')->name('diary.index');
        Route::get('create', 'create')->name('diary.create');
        Route::get('', 'store')->name('diary.store');
        Route::get('{user}/edit', 'index')->name('diary.edit');
        Route::put('{user}', 'update')->name('diary.update');
        Route::get('{user}', 'destroy')->name('diary.destroy');
    });
});*/

Route::get('/diary', [AgendaController::class, 'index'])->name('diary.index');
Route::get('/diary/create', [AgendaController::class, 'create'])->name('diary.create');
Route::post('/diary', [AgendaController::class, 'store'])->name('diary.store');
Route::get('/diary/{user}/edit', [AgendaController::class, 'edit'])->name('diary.edit');
Route::put('/diary/{user}/edit', [AgendaController::class, 'update'])->name('diary.update');
Route::get('/diary/{user}/delete', [AgendaController::class, 'destroy'])->name('diary.destroy');



/*Route::prefix('post')->middleware('auth')->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('', 'index')->name('posts.indexpost');
        Route::get('create', 'create')->name('posts.createpost');
    });
});*/

Route::get('/post', [PostController::class, 'index'])->name('posts.indexpost');
Route::get('/post/create', [ArticleController::class, 'create'])->name('articles.createarticle');
/*Route::post('/article', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('articles.editarticle');
Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::post('/article/upload/{article}', [ArticleController::class, 'upload'])->name('articles.upload');*/

Route::prefix('category')->middleware('auth')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('', 'index')->name('category.indexcategory');
        Route::get('create', 'create')->name('category.createcategory');
        Route::get('', 'store')->name('category.store');
    });
});

Route::get('/category', [CategoryController::class, 'index'])->name('category.indexcategory');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.createcategory');


Route::get('/article', [ArticleController::class, 'index'])->name('articles.indexarticle');
Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.createarticle');
Route::post('/article', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/article/{article}/edit', [ArticleController::class, 'edit'])->name('articles.editarticle');
Route::put('/article/{article}/edit', [ArticleController::class, 'update'])->name('articles.update');
Route::get('/article/{article}/delete', [ArticleController::class, 'destroy'])->name('articles.destroy');
Route::post('/article/upload/{article}', [ArticleController::class, 'upload'])->name('articles.upload');
