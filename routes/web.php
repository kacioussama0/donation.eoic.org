<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\SiteController::class,'home']);


Route::get('/projects',[\App\Http\Controllers\SiteController::class,'projects']);
Route::get('/completed-projects',[\App\Http\Controllers\SiteController::class,'completedProject']);

Route::get('/projects/{slug}',[\App\Http\Controllers\SiteController::class,'project']);


Auth::routes();
Route::get('/change-language/{locale}',[\App\Http\Controllers\SiteController::class,'change_language'])->name('change-lang');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('categories',\App\Http\Controllers\CategoryController::class);
Route::resource('admin/projects',\App\Http\Controllers\ProjectController::class);
Route::post('/checkout',[\App\Http\Controllers\CheckoutController::class,'checkout']);

Route::get('/success',[\App\Http\Controllers\CheckoutController::class,'success'])->name('checkout.success');
Route::post('projects/uploadImage',[\App\Http\Controllers\ProjectController::class,'uploadImage'])->name('projects.uploadImage');

Route::view('about','about');
