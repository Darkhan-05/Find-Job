<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacancyController;
use App\Http\Middleware\Localization;
use App\Http\Middleware\SetLocale;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Route;


Route::get('/language', function () {
    $locale = request('locale');
    if (in_array($locale, config('app.supported_locales'))) {
        session()->put('locale', $locale);
    }

    return redirect()->back();
})->name('locale');



Route::middleware(['setlocale'])->group(function () {

    Route::get('/', HomeController::class)
        ->name('home');

    Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancy.index');

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        SetLocale::class
    ])->group(function () {
        Route::post('/vacancies/{vacancy}/apply', [VacancyController::class, 'apply'])->name('apply');
    });
});
