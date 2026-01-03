<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return redirect()->back();
})->name('language.switch');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Admin Dashboard Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $projects = \App\Models\Project::orderBy('order')->get();
        return view('admin.dashboard', compact('projects'));
    })->name('dashboard');

    Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);
});
