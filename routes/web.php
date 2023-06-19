<?php

use App\Http\Controllers\SantoorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TemplateSettingController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\SetFa;
use App\Http\Middleware\SetEn;

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
Route::group(['middleware' => [SetFa::class]], function () {

    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::get('/biography', [WebsiteController::class, 'biography']);
    Route::get('/gallery', [WebsiteController::class, 'products']);
    Route::get('/gallery/{id}/{slug}', [WebsiteController::class, 'singleProduct']);
    Route::get('/gallery/{id}/{slug}/sendReq', [WebsiteController::class, 'sendReq']);
    Route::get('/santoor', [WebsiteController::class, 'santoor']);
    Route::get('/santoor/{id}/{slug}', [WebsiteController::class, 'singleSantoor']);
    Route::get('/santoor/{id}/{slug}/sendReq', [WebsiteController::class, 'sendReq']);

    Route::get('/contact', [WebsiteController::class, 'contact']);
    Route::get('/events', [WebsiteController::class, 'events']);
    Route::get('/events/{id}/{slug}', [WebsiteController::class, 'singleEvent']);
    Route::post('/contact/send', [WebsiteController::class, 'contactSend']);
});

Route::group(['prefix' => 'en', 'middleware' => [SetEn::class]], function () {
    Route::get('/', [WebsiteController::class, 'index'])->name('index');
    Route::get('/biography', [WebsiteController::class, 'biography']);
    Route::get('/gallery', [WebsiteController::class, 'products']);
    Route::get('/gallery/{id}/{slug}', [WebsiteController::class, 'singleProduct']);
    Route::get('/gallery/{id}/{slug}/sendReq', [WebsiteController::class, 'sendReq']);
    
    Route::get('/santoor', [WebsiteController::class, 'santoor']);
    Route::get('/santoor/{id}/{slug}', [WebsiteController::class, 'singleSantoor']);
    Route::get('/santoor/{id}/{slug}/sendReq', [WebsiteController::class, 'sendReq']);

    Route::get('/contact', [WebsiteController::class, 'contact']);
    Route::get('/events', [WebsiteController::class, 'events']);
    Route::get('/events/{id}/{slug}', [WebsiteController::class, 'singleEvent']);
    Route::post('/contact/send', [WebsiteController::class, 'contactSend']);
});
Auth::routes();


//admin routes
Route::group(['prefix' => 'arts-admin'], function () {
    Route::get('/', [ProductsController::class, 'adminIndex'])->name('admin.index');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductsController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductsController::class, 'create'])->name('products.create');
        Route::post('/create', [ProductsController::class, 'store'])->name('products.store');
        Route::get('/{product}', [ProductsController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductsController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
    });

    Route::group(['prefix' => 'santoor'], function () {
        Route::get('/', [SantoorController::class, 'index'])->name('santoor.index');
        Route::get('/create', [SantoorController::class, 'create'])->name('santoor.create');
        Route::post('/create', [SantoorController::class, 'store'])->name('santoor.store');
        Route::get('/{product}', [SantoorController::class, 'edit'])->name('santoor.edit');
        Route::put('/{product}', [SantoorController::class, 'update'])->name('santoor.update');
        Route::delete('/{product}', [SantoorController::class, 'destroy'])->name('santoor.destroy');
    });


    Route::group(['prefix' => 'events'], function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::get('/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/create', [EventController::class, 'store'])->name('events.store');
        Route::get('/{event}', [EventController::class, 'edit'])->name('events.edit');
        Route::put('/{event}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    });
    Route::group(['prefix' => 'template'], function () {
        Route::get('/', [TemplateSettingController::class, 'index'])->name('template.index');
        Route::get('/{template}', [TemplateSettingController::class, 'edit'])->name('template.edit');
        Route::put('/{template}', [TemplateSettingController::class, 'update'])->name('template.update');

    });
});
Route::get('/home', [ProductsController::class, 'adminIndex'])->name('home');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('/pp', function () {
    return (public_path());
});


//Route::get('/sitemap', [WebsiteController::class, 'sitemap'])->name('sitemap');

//Route::get('/sitemap.xml', [SitemapController::class, 'index']);
//Route::group(['prefix' => 'sitemap'], function () {
//    Route::get('products.xml', ['as' => 'sitemap.products', 'uses' => [SitemapController::class, 'products']]);
//    Route::get('events.xml', ['as' => 'sitemap.events', 'uses' => [SitemapController::class, 'events']]);
//
//});