<?php
use Modules\AboutPage\Http\Controllers\AboutPageController;

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

Route::domain(env('APP_RGPANEL_DOMAIN', 'rgpanel'))
    ->prefix('{locale?}/pages/')
    ->as('rgpanel.pages.')
    ->middleware(['localeHandle', 'auth'])->group(function () {
        Route::resource('/about-page', AboutPageController::class)->except(['show', 'destroy', 'create', 'store']);
    });