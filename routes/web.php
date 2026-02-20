<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home'])->name('home');

Route::get('/campaigns/{slug}',[\App\Http\Controllers\SiteController::class,'campaign'])->name('campaign.show');

Auth::routes();
Route::get('/change-language/{locale}',[\App\Http\Controllers\SiteController::class,'change_language'])->name('change-lang');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/campaigns', [App\Http\Controllers\SiteController::class, 'campaigns'])->name('campaigns');
Route::post('/donate',[\App\Http\Controllers\CheckoutController::class,'checkout']);
Route::get('/success',[\App\Http\Controllers\CheckoutController::class,'success'])->name('checkout.success');


Route::view('about','about');


Route::middleware('auth')->group(function () {
    Route::post('projects/uploadImage',[\App\Http\Controllers\ProjectController::class,'uploadImage'])->name('projects.uploadImage');
    Route::resource('admin/categories',\App\Http\Controllers\CategoryController::class);
    Route::resource('admin/projects',\App\Http\Controllers\ProjectController::class);
    Route::get('admin/orders',[\App\Http\Controllers\SiteController::class,'orders']);
});
