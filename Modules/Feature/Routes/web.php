<?php

use Modules\Feature\Http\Controllers\FeatureController;

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
    ->prefix('{locale?}')
    ->as('rgpanel.')
    ->middleware(['localeHandle', 'auth'])->group(function () {
        Route::resource('/features', FeatureController::class);
    });