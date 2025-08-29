<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/lang/{locale}', function (string $locale) {
    if (! in_array($locale, ['en', 'fa'])) {
        abort(400);
    }
    session(['locale' => $locale]);
    return redirect()->back();
})->name('lang.switch');