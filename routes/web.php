<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CatalogController;
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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {

    Route::get('/', [PageController::class, 'index'])->name('home');
    Route::get('/about_us', [PageController::class, 'about_us'])->name('about_us');
    Route::get('/contacts', [PageController::class, 'contacts'])->name('contacts');
    Route::get('/articles', [PageController::class, 'articles'])->name('articles');
    Route::get('/articles/{slug}', [PageController::class, 'article'])->name('article');
    Route::post('/send_order', [PageController::class, 'sendOrder'])->name('send_order');
    Route::post('/update_favorites', [PageController::class, 'updateFavorite'])->name('update_favorites');
    Route::get('/articles/{slug}', [PageController::class, 'article'])->name('article');
    Route::get('/catalog/{slug}', [CatalogController::class, 'catalog'])->name('catalog');
    Route::get('/catalog/{slug}/{product_slug}', [CatalogController::class, 'product'])->name('product');
});
