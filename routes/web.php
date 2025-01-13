<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AntivirusesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Bitrix24Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Dashboard\ContactDash;
use App\Http\Controllers\Dashboard\WebDash;
use App\Http\Controllers\Dashboard\WebDevelopmentDash;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MobileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebDevelopmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeDashController;
use App\Http\Controllers\Dashboard\AboutUsDashController;
use App\Http\Controllers\Dashboard\Bitrix24DashController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MobileDashController;
use App\Http\Controllers\Dashboard\ProjectDashController;
use App\Http\Controllers\Dashboard\ContactDashController;
use App\Http\Controllers\Dashboard\AntivirusesDashController;
use App\Http\Controllers\Dashboard\BlogDashController;
use App\Http\Controllers\Dashboard\WebDashController;

Route::get('/settings', function () {return view('settings');})->name('settings');
Route::get('/lang/{locale}', function ($locale) {
    $supportedLocales = ['en', 'ru', 'tm'];

    if (in_array($locale, $supportedLocales)) {
        session(['locale' => $locale]);
        App::setLocale($locale);
    }

    return redirect()->back();
});






Route::get('/', ([HomeController::class, 'index']))->name('home');
Route::get('/about-us', ([AboutUsController::class, 'index']))->name('about-us');
Route::get('/project', ([ProjectController::class, 'index']))->name('project');
Route::get('/blog', ([BlogController::class, 'index']))->name('blog');
Route::get('/bitrix24', ([Bitrix24Controller::class, 'index']))->name('bitrix24');
Route::get('/mobile', ([MobileController::class, 'index']))->name('mobile');
Route::get('/web-development', ([WebDevelopmentController::class, 'index']))->name('web-development');
Route::get('/antiviruses', ([AntivirusesController::class, 'index']))->name('antiviruses');

// роуты логина
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// защита роутов от внешних входов

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

Route::post('/dashboard/achievements', [AboutUsDashController::class, 'achievementsStore'])->name('dashboard.achievements.store');
Route::post('/dashboard/achievements', [AboutUsDashController::class, 'achievementsStoreOrUpdate'])->name('dashboard.achievements.store_or_update');
Route::get('/dashboard/achievements', [AboutUsDashController::class, 'index'])->name('dashboard.achievements.index');

Route::post('/dashboard/employees', [AboutUsDashController::class, 'employeesStore'])->name('dashboard.employees.store');
Route::put('/dashboard/employees/{id}', [AboutUsDashController::class, 'employeesUpdate'])->name('dashboard.employees.update');
Route::delete('/dashboard/employees/{id}', [AboutUsDashController::class, 'employeesDestroy'])->name('dashboard.employees.destroy');

Route::post('/dashboard/about-us/save-certificates', [AboutUsDashController::class, 'saveCertificates'])->name('aboutus.saveCertificates');
Route::delete('/dashboard/about-us/delete-certificate/{id}', [AboutUsDashController::class, 'deleteCertificate'])->name('aboutus.deleteCertificate');

// Сервис Битрикс24
Route::get('bitrix24-dash', [Bitrix24DashController::class, 'index'])->name('bitrix24-dash');

Route::get('/service/bitrix24', [Bitrix24DashController::class, 'index'])->name('bitrix24.index');
Route::post('/service/bitrix24/store', [Bitrix24DashController::class, 'store'])->name('bitrix24.store');

Route::post('/services/store', [Bitrix24DashController::class, 'storeService'])->name('bitrix24-cloud.store');
Route::get('/services/{id}/edit', [Bitrix24DashController::class, 'editService'])->name('bitrix24-cloud.edit');
Route::put('/services/{id}/update', [Bitrix24DashController::class, 'updateService'])->name('bitrix24-cloud.update');
Route::delete('/services/{id}/destroy', [Bitrix24DashController::class, 'destroyService'])->name('bitrix24-cloud.destroy');

Route::post('/boxes/store', [Bitrix24DashController::class, 'storeBox'])->name('bitrix24-boxes.store');
Route::put('/boxes/{id}/update', [Bitrix24DashController::class, 'updateBox'])->name('bitrix24-boxes.update');
Route::delete('/boxes/{id}/destroy', [Bitrix24DashController::class, 'destroyBox'])->name('bitrix24-boxes.destroy');
Route::get('/boxes/{id}/edit', [Bitrix24DashController::class, 'editBox'])->name('bitrix24-boxes.edit');

Route::post('/implementation-stages/store', [Bitrix24DashController::class, 'storeImplementationStage'])->name('implementation-stages.store');
Route::put('/implementation-stages/{id}/update', [Bitrix24DashController::class, 'updateImplementationStage'])->name('implementation-stages.update');
Route::delete('/implementation-stages/{id}/destroy', [Bitrix24DashController::class, 'destroyImplementationStage'])->name('implementation-stages.destroy');
Route::get('/implementation-stages/{id}/edit', [Bitrix24DashController::class, 'editImplementationStage'])->name('implementation-stages.edit');

// Сервис мобильных приложений
Route::get('mobile-dash', [MobileDashController::class, 'index'])->name('mobile-dash');

Route::get('/service/mobile', [MobileDashController::class, 'index'])->name('mobile.index');
Route::post('/service/mobile/store', [MobileDashController::class, 'store'])->name('mobile.store');

Route::get('/mobile-services/{id}/edit', [MobileDashController::class, 'editService'])->name('mobile-development.edit');
Route::post('/mobile-services/store', [MobileDashController::class, 'storeService'])->name('mobile-development.store');
Route::put('/mobile-services/{id}/update', [MobileDashController::class, 'updateService'])->name('mobile-development.update'); 
Route::delete('/mobile-services/{id}/destroy', [MobileDashController::class, 'destroyService'])->name('mobile-development.destroy');

Route::post('/mobile-implementation-stages/store', [MobileDashController::class, 'storeImplementationStage'])->name('mobile-implementation-stages.store');
Route::put('/mobile-implementation-stages/{id}/update', [MobileDashController::class, 'updateImplementationStage'])->name('mobile-implementation-stages.update');
Route::delete('/mobile-implementation-stages/{id}/destroy', [MobileDashController::class, 'destroyImplementationStage'])->name('mobile-implementation-stages.destroy');
Route::get('/mobile-implementation-stages/{id}/edit', [MobileDashController::class, 'editImplementationStage'])->name('mobile-implementation-stages.edit');

// Сервис веб-разработки
Route::get('web-development-dash', [WebDashController::class, 'index'])->name('web-development-dash');

Route::get('/web-development/web', [WebDashController::class, 'index'])->name('web.index');
Route::post('/web-development/web/store', [WebDashController::class, 'store'])->name('web.store');

Route::get('/web-services/{id}/edit', [WebDashController::class, 'editService'])->name('web-services.edit');
Route::post('/web-services/store', [WebDashController::class, 'storeService'])->name('web-services.store');
Route::put('/web-services/{id}/update', [WebDashController::class, 'updateService'])->name('web-services.update'); 
Route::delete('/web-services/{id}/destroy', [WebDashController::class, 'destroyService'])->name('web-services.destroy');

Route::post('/web-implementation-stages/store', [WebDashController::class, 'storeImplementationStage'])->name('web-implementation-stages.store');
Route::put('/web-implementation-stages/{id}/update', [WebDashController::class, 'updateImplementationStage'])->name('web-implementation-stages.update');
Route::delete('/web-implementation-stages/{id}/destroy', [WebDashController::class, 'destroyImplementationStage'])->name('web-implementation-stages.destroy');
Route::get('/web-implementation-stages/{id}/edit', [WebDashController::class, 'editImplementationStage'])->name('web-implementation-stages.edit');

// Серивис антивирусов
Route::get('antiviruses-dash', [AntivirusesDashController::class, 'index'])->name('antiviruses-dash');

Route::get('/antiviruses-dash/antiviruses', [AntivirusesDashController::class, 'index'])->name('antiviruses.index');
Route::post('/antiviruses-dash/antiviruses/store', [AntivirusesDashController::class, 'store'])->name('antiviruses.store');

Route::post('/kaspersky/store', [AntivirusesDashController::class, 'storeKaspersky'])->name('kaspersky.store');
Route::put('/kaspersky/{id}/update', [AntivirusesDashController::class, 'updateKaspersky'])->name('kaspersky.update');
Route::delete('/kaspersky/{id}/destroy', [AntivirusesDashController::class, 'destroyKaspersky'])->name('kaspersky.destroy');
Route::get('/kaspersky/{id}/edit', [AntivirusesDashController::class, 'editKaspersky'])->name('kaspersky.edit');

Route::post('/eset/store', [AntivirusesDashController::class, 'storeEset'])->name('eset.store');
Route::put('/eset/{id}/update', [AntivirusesDashController::class, 'updateEset'])->name('eset.update');
Route::delete('/eset/{id}/destroy', [AntivirusesDashController::class, 'destroyEset'])->name('eset.destroy');
Route::get('/eset/{id}/edit', [AntivirusesDashController::class, 'editEset'])->name('eset.edit');


Route::post('/pro32/store', [AntivirusesDashController::class, 'storePro32'])->name('pro32.store');
Route::put('/pro32/{id}/update', [AntivirusesDashController::class, 'updatePro32'])->name('pro32.update');
Route::delete('/pro32/{id}/destroy', [AntivirusesDashController::class, 'destroyPro32'])->name('pro32.destroy');
Route::get('/pro32/{id}/edit', [AntivirusesDashController::class, 'editPro32'])->name('pro32.edit');

// страница блога админки
Route::get('blog-dash', [BlogDashController::class, 'index'])->name('blog-dash');

Route::get('/blog/blog', [BlogDashController::class, 'index'])->name('blog.index');
Route::post('/blog/blog', [BlogDashController::class, 'store'])->name('blog.store');

Route::post('/blog-store', [BlogDashController::class, 'blogStore'])->name('dashboard.blog.store');
Route::put('/blog-store/{id}', [BlogDashController::class, 'blogUpdate'])->name('dashboard.blog.update');
Route::delete('/blog-store/{id}', [BlogDashController::class, 'blogDestroy'])->name('dashboard.blog.destroy');
Route::get('/blog-show/{id}', [BlogDashController::class, 'blogShow'])->name('blog.show');

// страница проектов админки
Route::get('project-dash', [ProjectDashController::class, 'index'])->name('project-dash');

Route::get('/project/project', [ProjectDashController::class, 'index'])->name('project.index');
Route::post('/project/project', [ProjectDashController::class, 'store'])->name('project.store');

Route::post('/project-store', [ProjectDashController::class, 'projectStore'])->name('dashboard.project.store');
Route::put('/project-store/{id}', [ProjectDashController::class, 'projectUpdate'])->name('dashboard.project.update');
Route::delete('/progect-store/{id}', [ProjectDashController::class, 'projectDestroy'])->name('dashboard.project.destroy');
Route::get('/project-show/{id}', [ProjectDashController::class, 'projectShow'])->name('project.show');



// контакты
Route::get('contact-dash', [ContactDashController::class, 'index'])->name('contact-dash');
Route::get('/contact', ([ContactController::class, 'index']))->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/contacts', [ContactDashController::class, 'index'])->name('dashboard.contacts');
    Route::get('/contacts/{contact}', [ContactDashController::class, 'show'])->name('dashboard.contacts.show');
    Route::delete('/contacts/{contact}', [ContactDashController::class, 'destroy'])->name('dashboard.contacts.destroy');
    Route::post('/contacts/reply', [ContactDashController::class, 'reply'])->name('dashboard.contacts.reply');
});

// пользователи
Route::get('users', [UserController::class, 'index'])->name('users'); 
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');});
