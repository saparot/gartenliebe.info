<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\NewsPageController;
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

Route::get('/', function () {
    return view('welcome', [
        'projectNamePublic' => 'Gartenliebe',
    ]);
});

Route::get('/landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');
Route::get('/news', [NewsPageController::class, 'index'])->name('news.index');
