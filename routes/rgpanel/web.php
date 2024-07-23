<?php
use App\Http\Controllers\OrganizationStructureController;
use App\Http\Controllers\Rgpanel\AuthController;
use App\Http\Controllers\Rgpanel\ProspectiveStudentController;
use App\Http\Controllers\Rgpanel\UserController;
use App\Http\Controllers\Rgpanel\BannerController;
use App\Http\Controllers\Rgpanel\GalleryController;
use App\Http\Controllers\Rgpanel\ServiceController;
use App\Http\Controllers\Rgpanel\TinymceController;
use App\Http\Controllers\Rgpanel\DashboardController;

// rgpanel.

Route::middleware(['auth'])
         ->group(function () {
                  Route::get('/', DashboardController::class)->name('index');
                  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
                  Route::post('/tinymce/upload', [TinymceController::class, 'index'])->name('tinymce.upload');
                  Route::resource('banners', BannerController::class)->middleware(['can:read banner']);

                  Route::resource('/users', UserController::class)->middleware('can:read user');
                  Route::resource('/organization-structures', OrganizationStructureController::class)->middleware('can:read organization structure');
                  Route::get("/prospective-students/exports-excel", [ProspectiveStudentController::class, "exportsExcel"])->name('prospective-students.export-excel');
                  Route::get("/prospective-students/exports-pdf/{prospective_student}", [ProspectiveStudentController::class, "exportPdf"])->name('prospective-students.export-pdf');
                  Route::resource('/prospective-students', ProspectiveStudentController::class)->middleware('can:read user')->except(['update', 'store', 'edit']);

                  Route::resource('/galleries', GalleryController::class)->middleware('can:read gallery');
         });
Route::prefix('/auth')
         ->as('auth.')
         ->middleware('guest')
         ->controller(AuthController::class)
         ->group(__DIR__ . '/auth/web.php');