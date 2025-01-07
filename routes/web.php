<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AntivirusesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Bitrix24Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebDevelopmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeDashController;
use App\Http\Controllers\Dashboard\AboutUsDashController;

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('/about-us', ([AboutUsController::class, 'index']))->name('about-us');
Route::get('/project', ([ProjectController::class, 'index']))->name('project');
Route::get('/blog', ([BlogController::class, 'index']))->name('blog');
Route::get('/contact', ([ContactController::class, 'index']))->name('contact');
Route::get('/bitrix24', ([Bitrix24Controller::class, 'index']))->name('bitrix24');
Route::get('/mobile', ([MobileController::class, 'index']))->name('mobile');
Route::get('/web-development', ([WebDevelopmentController::class, 'index']))->name('web-development');
Route::get('/antiviruses', ([AntivirusesController::class, 'index']))->name('antiviruses');
// роуты логина
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// домашняя страница админ панели
Route::get('home-dashes', [HomeDashController::class, 'index'])->name('home-dash.index');
Route::get('home-dashes/create', [HomeDashController::class, 'create'])->name('home-dash.create');
Route::post('home-dashes', [HomeDashController::class, 'store'])->name('home-dash.store');
Route::get('home-dashes/{id}', [HomeDashController::class, 'show'])->name('home-dash.show');
Route::get('home-dashes/{id}/edit', [HomeDashController::class, 'edit'])->name('home-dash.edit');
Route::put('home-dashes/{id}', [HomeDashController::class, 'update'])->name('home-dash.update');
Route::delete('home-dashes/{id}', [HomeDashController::class, 'destroy'])->name('home-dash.destroy');

Route::post('/services', [HomeDashController::class, 'storeService'])->name('services.store');
Route::put('/services/{id}', [HomeDashController::class, 'updateService'])->name('services.update');
Route::delete('/services/{id}', [HomeDashController::class, 'destroyService'])->name('services.destroy');

Route::post('/about-us', [HomeDashController::class, 'storeAboutUs'])->name('about-us.store');
Route::put('/about-us/{id}', [HomeDashController::class, 'updateAboutUs'])->name('about-us.update');
Route::delete('/about-us/{id}', [HomeDashController::class, 'destroyAboutUs'])->name('about-us.destroy');

// о нас страница админ панели
Route::get('about-us-dashes', [AboutUsDashController::class, 'index'])->name('about-us-dash');
Route::get('/dashboard/aboutus', [AboutUsDashController::class, 'index'])->name('aboutus.index');
Route::post('/dashboard/aboutus', [AboutUsDashController::class, 'store'])->name('aboutus.store');

Route::post('/principles', [AboutUsDashController::class, 'principlesStore'])->name('dashboard.principles.store');
Route::put('/principles/{id}', [AboutUsDashController::class, 'principlesUpdate'])->name('dashboard.principles.update');
Route::delete('/principles/{id}', [AboutUsDashController::class, 'principlesDestroy'])->name('dashboard.principles.destroy');

Route::put('/dashboard/company-descriptions', [AboutUsDashController::class, 'companyDescriptionsUpdate'])->name('dashboard.company-descriptions.store');
Route::put('/company-descriptions/{id}', [AboutUsDashController::class, 'companyDescriptionsUpdate'])->name('dashboard.company-descriptions.update');
Route::delete('/company-descriptions/{id}', [AboutUsDashController::class, 'companyDescriptionsDestroy'])->name('dashboard.company-descriptions.destroy');




