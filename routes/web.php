<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\Bitrix24Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('about-us', ([AboutUsController::class, 'index']))->name('about-us');
Route::get('project', ([ProjectController::class, 'index']))->name('project');
Route::get('blog', ([BlogController::class, 'index']))->name('blog');
Route::get('contact', ([ContactController::class, 'index']))->name('contact');
Route::get('bitrix24', ([Bitrix24Controller::class, 'index']))->name('bitrix24');