<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\Creator\CreatorBlogPostImageController;
use App\Http\Controllers\Creator\CreatorBlogPostController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NewsPageController;
use App\Http\Controllers\StaticPagesController;
use App\Http\Controllers\UserAuthController;
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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');

Route::get('/', function () {
    return view('welcome', [
        'projectNamePublic' => 'Gartenliebe',
    ]);
});

Route::get('privacy', [StaticPagesController::class, 'pagePrivacy'])->name('static.privacy');
Route::get('imprint', [StaticPagesController::class, 'pageImprint'])->name('static.imprint');
Route::get('contact', [StaticPagesController::class, 'pageContact'])->name('static.contact');
Route::post('language', [LanguageController::class, 'languageSwitch'])->name('language.switch');

Route::get('landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('news', [NewsPageController::class, 'index'])->name('news.index');

Route::get('login', [AuthController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'store'])->name('login.store')->middleware('guest');
Route::delete('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('user-account', UserAuthController::class)->only(['create', 'store']);
Route::resource('blog', BlogPostController::class)->only(['index', 'show']);

Route::prefix('creator')
    ->name('creator.')
    ->middleware('auth')
    ->group(function () {
        /** ------------ creator start ------------   */
        Route::resource('blog', CreatorBlogPostController::class);
        Route::resource('blog.image', CreatorBlogPostImageController::class)->only(['create', 'store']);
        /** ------------ creator end ------------   */
    });
