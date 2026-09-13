<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::redirect('/dashboard', '/admin');
Route::redirect('/cms', '/admin');

Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/divisions', [PublicController::class, 'divisions'])->name('divisions');
Route::get('/divisions/{slug}', [PublicController::class, 'division'])->name('divisions.show');
Route::get('/departments/{slug}', [PublicController::class, 'department'])->name('departments.show');
Route::get('/programs', [PublicController::class, 'programs'])->name('programs');
Route::get('/opportunities/jobs', [PublicController::class, 'jobs'])->name('jobs');
Route::get('/opportunities/e-library', [PublicController::class, 'library'])->name('library');
Route::get('/news', [PublicController::class, 'news'])->name('news');
Route::get('/news/gallery', [PublicController::class, 'gallery'])->name('gallery');
Route::get('/news/{slug}', [PublicController::class, 'newsDetail'])->name('news.show');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
