<?php

use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\SocialiteLoginController;
use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\TestimonialController;
use App\Http\Controllers\Dashboard\MediaController;
use App\Http\Controllers\Dashboard\PageController;
use App\Http\Controllers\Dashboard\ProjectController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\SocialMediaController;
use App\Http\Controllers\Documentation\LayoutBuilderController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }

        // Custom page demo for 500 server error
        if (Str::contains($val['path'], 'error-500')) {
            Route::get($val['path'], function () {
                abort(500, 'Something went wrong! Please try again later.');
            });
        }
    }
});

// Route::get('/admin', function () {
//     return theme()->getView('layout/master');
// })->name('admin');

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
    Route::resource('layout-builder', LayoutBuilderController::class)->only(['store']);
});

Route::middleware('auth')->group(function () {
    // Account pages
    Route::prefix('account')->group(function () {
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
        Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
        Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
    });

    // Logs pages
    Route::prefix('log')->name('log.')->group(function () {
        Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
        Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
    });

    Route::resource('users', UsersController::class);
    Route::delete('users/delete', [UsersController::class, 'destroy'])->name('users.remove');

    Route::resource('pages', PageController::class);
    Route::delete('pages/delete', [PageController::class, 'destroy'])->name('pages.remove');

    Route::resource('sliders', SliderController::class);
    Route::delete('sliders/delete', [SliderController::class, 'destroy'])->name('sliders.remove');

    Route::resource('clients', ClientController::class);
    Route::delete('clients/delete', [ClientController::class, 'destroy'])->name('clients.remove');

    Route::resource('socialMedia', SocialMediaController::class);
    Route::delete('socialMedia/delete', [SocialMediaController::class, 'destroy'])->name('socialMedia.remove');

    Route::resource('admin_services', ServiceController::class);
    Route::delete('admin_services/delete', [ServiceController::class, 'destroy'])->name('admin_services.remove');

    Route::resource('admin_projects', ProjectController::class);
    Route::delete('admin_projects/delete', [ProjectController::class, 'destroy'])->name('admin_projects.remove');

    Route::resource('medias', MediaController::class);
    Route::delete('medias/delete', [MediaController::class, 'destroy'])->name('medias.remove');

    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');

    Route::resource('testimonials', TestimonialController::class);
    Route::delete('testimonials/delete', [TestimonialController::class, 'destroy'])->name('testimonials.remove');

});

Route::get('/', [HomeController::class, 'home'])->name('home')->middleware('check.locale');
Route::get('home', [HomeController::class, 'home'])->name('home')->middleware('check.locale');
Route::get('about-us', [HomeController::class, 'about'])->name('about')->middleware('check.locale');
Route::get('services', [HomeController::class, 'our_services'])->name('our_services')->middleware('check.locale');
Route::get('projects', [HomeController::class, 'our_projects'])->name('our_projects')->middleware('check.locale');
Route::get('contact-us', [HomeController::class, 'contact_us'])->name('contact_us')->middleware('check.locale');
Route::get('download', [HomeController::class, 'download'])->name('download')->middleware('check.locale');
Route::get('/download/{id}', [HomeController::class, 'downloadProject'])->name('downloadProject')->middleware('check.locale');

Route::get('set-locale/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->middleware('check.locale')->name('locale.setting');


/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

require __DIR__.'/auth.php';
