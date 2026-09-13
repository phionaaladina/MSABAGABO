<?php

use App\Http\Controllers\Api\AboutPageSettingController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\DivisionDutyCategoryController;
use App\Http\Controllers\Api\GalleryImageController;
use App\Http\Controllers\Api\HeroSlideController;
use App\Http\Controllers\Api\HomePageSettingController;
use App\Http\Controllers\Api\HomeStatController;
use App\Http\Controllers\Api\LeaderController;
use App\Http\Controllers\Api\NewsUpdateController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PriorityAreaController;
use App\Http\Controllers\Api\ProgramController;
use App\Http\Controllers\Api\ProgramStatController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\QuickLinkController;
use App\Http\Controllers\Api\SiteSettingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/news-updates', [NewsUpdateController::class, 'index']);
Route::get('/news-updates/{slug}', [NewsUpdateController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/partners', [PartnerController::class, 'index']);
Route::get('/quick-links', [QuickLinkController::class, 'index']);

Route::get('/hero-slides', [HeroSlideController::class, 'index']);
Route::get('/home-stats', [HomeStatController::class, 'index']);
Route::get('/divisions', [DivisionController::class, 'index']);
Route::get('/divisions/{slug}', [DivisionController::class, 'show']);
Route::get('/division-duty-categories', [DivisionDutyCategoryController::class, 'index']);
Route::get('/programs', [ProgramController::class, 'index']);
Route::get('/program-stats', [ProgramStatController::class, 'index']);
Route::get('/gallery-images', [GalleryImageController::class, 'index']);
Route::get('/leaders', [LeaderController::class, 'index']);
Route::get('/priority-areas', [PriorityAreaController::class, 'index']);
Route::get('/site-settings', [SiteSettingController::class, 'index']);
Route::get('/about-page-settings', [AboutPageSettingController::class, 'index']);
Route::get('/home-page-settings', [HomePageSettingController::class, 'index']);
