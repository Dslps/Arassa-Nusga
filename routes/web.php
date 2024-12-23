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

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('about-us', ([AboutUsController::class, 'index']))->name('about-us');
Route::get('project', ([ProjectController::class, 'index']))->name('project');
Route::get('blog', ([BlogController::class, 'index']))->name('blog');
Route::get('contact', ([ContactController::class, 'index']))->name('contact');
Route::get('bitrix24', ([Bitrix24Controller::class, 'index']))->name('bitrix24');
Route::get('mobile', ([MobileController::class, 'index']))->name('mobile');
Route::get('web-development', ([WebDevelopmentController::class, 'index']))->name('web-development');
Route::get('antiviruses', ([AntivirusesController::class, 'index']))->name('antiviruses');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('home-dashes', [HomeDashController::class, 'index'])->name('home-dash.index');
Route::get('home-dashes/create', [HomeDashController::class, 'create'])->name('home-dash.create');
Route::post('home-dashes', [HomeDashController::class, 'store'])->name('home-dash.store');
Route::get('home-dashes/{id}', [HomeDashController::class, 'show'])->name('home-dash.show');
Route::get('home-dashes/{id}/edit', [HomeDashController::class, 'edit'])->name('home-dash.edit');
Route::put('home-dashes/{id}', [HomeDashController::class, 'update'])->name('home-dash.update');
Route::delete('home-dashes/{id}', [HomeDashController::class, 'destroy'])->name('home-dash.destroy');





