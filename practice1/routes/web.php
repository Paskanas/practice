<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\RestorantController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('restorants')->name('restorants-js-')->group(function () {
    Route::get('', [RestorantController::class, 'indexJs'])->name('index')->middleware('rp:user');
});
Route::prefix('dishes-js')->name('dishes-js-')->group(function () {
    Route::get('', [DishController::class, 'indexJs'])->name('index')->middleware('rp:user');
});

// Restorants
Route::prefix('restorantsAdmin')->name('restorants-')->group(function () {
    Route::get('', [RestorantController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [RestorantController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [RestorantController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{restorant}', [RestorantController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{restorant}', [RestorantController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{restorant}', [RestorantController::class, 'destroy'])->name('delete')->middleware('rp:admin');
    Route::get('show/{id}', [RestorantController::class, 'show'])->name('show')->middleware('rp:user');
    // Route::get('show', [RestorantController::class, 'link'])->name('show-route');
});

// Dishes
Route::prefix('dishes')->name('dishes-')->group(function () {
    Route::get('', [DishController::class, 'index'])->name('index')->middleware('rp:user');
    Route::get('create', [DishController::class, 'create'])->name('create')->middleware('rp:admin');
    Route::post('', [DishController::class, 'store'])->name('store')->middleware('rp:admin');
    Route::get('edit/{dish}', [DishController::class, 'edit'])->name('edit')->middleware('rp:admin');
    Route::put('{dish}', [DishController::class, 'update'])->name('update')->middleware('rp:admin');
    Route::delete('{dish}', [DishController::class, 'destroy'])->name('delete')->middleware('rp:admin');
    Route::get('show/{id}', [DishController::class, 'show'])->name('show')->middleware('rp:user');
    Route::delete('delete-picture/{dish}', [DishController::class, 'deletePicture'])->name('delete-picture');
    Route::put('save-rating/{dish}', [DishController::class, 'saveRating'])->name('save-rating');
});


require __DIR__ . '/auth.php';
