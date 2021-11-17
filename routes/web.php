<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register' => false]);
Route::get('/unauthorized', [App\Http\Controllers\HomeController::class, 'unauthorizedView'])->name('unauthorized');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::prefix('pages')->group(function () {
        Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');
        Route::get('/academics', [\App\Http\Controllers\PageController::class, 'academics'])->name('academics');
        Route::get('/admission', [\App\Http\Controllers\PageController::class, 'admission'])->name('admission');
        Route::get('/student-life', [\App\Http\Controllers\PageController::class, 'studentLife'])->name('student-life');
        Route::get('/giving', [\App\Http\Controllers\PageController::class, 'giving'])->name('giving');
        Route::get('/parents', [\App\Http\Controllers\PageController::class, 'parents'])->name('parents');

        Route::get('/edit/{slug}', [\App\Http\Controllers\PageController::class, 'editPage'])->name('page-edit');
        Route::post('/edit/{slug}', [\App\Http\Controllers\PageController::class, 'updatePage']);
        Route::delete('/delete/{slug}', [\App\Http\Controllers\PageController::class, 'deletePage'])->name('page-delete');
    });
    Route::get('/news/{slug}/edit', [\App\Http\Controllers\NewsController::class, 'edit'])->name('news-edit');
    Route::post('/news/{slug}/edit', [\App\Http\Controllers\NewsController::class, 'update']);
    Route::get('/news/{slug}/delete', [\App\Http\Controllers\NewsController::class, 'destroy'])->name('news-delete');
    Route::get('/news/create', [\App\Http\Controllers\NewsController::class, 'create'])->name('news-create');
    Route::post('/news', [\App\Http\Controllers\NewsController::class, 'store'])->name('store-news');
    Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])->name('news');
    Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('article');
    Route::get('/site-setting', [\App\Http\Controllers\SiteSettingController::class, 'index'])->name('site-setting');
    Route::post('/site-setting/update-name', [\App\Http\Controllers\SiteSettingController::class, 'updateSiteName'])->name('site-setting-update-name');
    Route::post('/site-setting/update-name', [\App\Http\Controllers\SiteSettingController::class, 'updateSiteLogo'])->name('site-setting-update-logo');
    Route::get('/sponsors/create', [\App\Http\Controllers\SiteSettingController::class, 'createSponsor'])->name('sponsors-create');
    Route::post('/sponsors/store', [\App\Http\Controllers\SiteSettingController::class, 'storeSponsor'])->name('sponsors-store');
    Route::get('/sponsors/edit', [\App\Http\Controllers\SiteSettingController::class, 'editSponsor'])->name('sponsors-edit');
    Route::post('/sponsors/update', [\App\Http\Controllers\SiteSettingController::class, 'updateSponsor'])->name('sponsors-update');
    });
