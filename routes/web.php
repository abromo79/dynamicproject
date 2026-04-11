<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'home'])->name('home');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/programs', [WebsiteController::class, 'programs'])->name('programs');
Route::get('/opportunities', [WebsiteController::class, 'opportunities'])->name('opportunities');
Route::get('/innovation-hub', [WebsiteController::class, 'innovationHub'])->name('innovation-hub');
Route::get('/impact', [WebsiteController::class, 'impact'])->name('impact');
Route::get('/partnerships', [WebsiteController::class, 'partnerships'])->name('partnerships');
Route::get('/events', [WebsiteController::class, 'events'])->name('events');
Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
Route::get('/get-involved', [WebsiteController::class, 'getInvolved'])->name('get-involved');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');
Route::post('/apply', [WebsiteController::class, 'storeApplication'])->name('apply.store');
Route::post('/contact', [WebsiteController::class, 'storeContact'])->name('contact.store');
Route::post('/newsletter', [WebsiteController::class, 'subscribe'])->name('newsletter.store');

Route::prefix('admin')->name('admin.')->group(function (): void {
    Route::get('/login', [AdminController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/{module}', [AdminController::class, 'index'])->name('module.index');
    Route::post('/{module}', [AdminController::class, 'store'])->name('module.store');
    Route::put('/{module}/{id}', [AdminController::class, 'update'])->name('module.update');
    Route::delete('/{module}/{id}', [AdminController::class, 'destroy'])->name('module.destroy');
    Route::patch('/applications/{id}/status', [AdminController::class, 'updateApplicationStatus'])->name('applications.status');
    Route::get('/newsletter/export/csv', [AdminController::class, 'exportNewsletter'])->name('newsletter.export');
});
