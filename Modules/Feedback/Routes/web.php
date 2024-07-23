<?php

use Modules\Feedback\Http\Controllers\FeedbackController;

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
Route::post("feedbacks", [FeedbackController::class, "store"])->name("feedback.store");
Route::domain(env('APP_RGPANEL_DOMAIN', 'rgpanel'))
    ->prefix('{locale?}/feedbacks')
    ->as('rgpanel.feedbacks.')
    ->middleware(['localeHandle', 'auth'])->group(function () {
        Route::get("/", [FeedbackController::class, "index"])->name("index");
        Route::delete("/delete/{feedback}", [FeedbackController::class, "destroy"])->name("destroy");
    });