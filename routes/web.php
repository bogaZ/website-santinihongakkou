<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProspectiveStudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::domain(env('APP_RGPANEL_DOMAIN', 'rgpanel'))
    ->prefix('{locale?}')
    ->as('rgpanel.')
    ->middleware(['localeHandle'])
    ->group(__DIR__ . '/rgpanel/web.php');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/optimize-clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return redirect(route('home'));
});
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get("/programs", [ProgramController::class, "index"])->name("programs.index");
Route::get("/programs/{slug}", [ProgramController::class, "show"])->name("programs.show");
Route::get("/prospective-students/{program}/register", [ProspectiveStudentController::class, 'index'])->name('prospective-students.index');
Route::post("/prospective-students/{program}/store", [ProspectiveStudentController::class, 'store'])->name('prospective-students.store');