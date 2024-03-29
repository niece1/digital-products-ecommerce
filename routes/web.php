<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCartController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DownloadController;

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

Route::get('/', HomeController::class)->name('home');
Route::get('/articles/{article:slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/articles', [ArticleCartController::class, 'store'])->name('cart.articles.store');
Route::delete('/cart/articles/{article:slug}', [ArticleCartController::class, 'destroy'])->name('cart.articles.destroy');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/stripe/webhook', [WebhookController::class, 'handleWebhook']);
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/articles/downloads/{article:slug}', [DownloadController::class, 'show'])->name('articles.downloads.show');

require __DIR__.'/auth.php';
