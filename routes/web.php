<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');
});

Route::get('/', [PlaceController::class, 'index'])->name('welcome');
Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
Route::get('/show/{place}/{slug}', [PlaceController::class, 'show'])->name('place.show');

Route::get('/auto-complete', [SearchController::class, 'autoComplete'])->name('auto.complete');
Route::post('/search', [SearchController::class, 'search'])->name('search');


Route::get('/report', [ReportController::class, 'index'])->name('report.show');

Route::post('/review', [ReviewController::class, 'store'])->name('review.store');



Route::get('/{category:slug}', [CategoryController::class, 'places'])->name('category.places');
