<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AntivirusesController;
use App\Http\Controllers\Bitrix24Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\WebDevelopmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('about-us', ([AboutUsController::class, 'index']))->name('about-us');
Route::get('project', ([ProjectController::class, 'index']))->name('project');
Route::get('blog', ([BlogController::class, 'index']))->name('blog');
Route::get('contact', ([ContactController::class, 'index']))->name('contact');
Route::get('bitrix24', ([Bitrix24Controller::class, 'index']))->name('bitrix24');
Route::get('mobile', ([MobileController::class, 'index']))->name('mobile');
Route::get('web-development', ([WebDevelopmentController::class, 'index']))->name('web-development');
Route::get('antiviruses', ([AntivirusesController::class, 'index']))->name('antiviruses');

Route::get('/login', ([LoginController::class, 'index']))->name('login');

Route::get('/admin', ([DashboardController::class, 'index']))->name('dashboard');

