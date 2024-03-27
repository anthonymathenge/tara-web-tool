<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\ThreatController;
use App\Http\Controllers\TaraController;



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

Route::get('/dashboard', function () {
    return view('assets.create');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::post('/assets', [AssetController::class, 'store'])->name('assets.store');
    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
    Route::get('/assets/{id}', [AssetController::class, 'show'])->name('assets.show');

    Route::get('/tara', [TaraController::class, 'index'])->name('tara.index');
    Route::get('/tara/create', [TaraController::class, 'create'])->name('tara.create');
    Route::post('/tara/store', [TaraController::class, 'store'])->name('tara.store');
    Route::get('/tara/show', [TaraController::class, 'show'])->name('tara.show');

    // Routes related to Threat
    Route::get('/threat', [ThreatController::class, 'index'])->name('threat.index');
    Route::get('/threat/create', [ThreatController::class, 'create'])->name('threat.create');
    Route::post('/threat/store', [ThreatController::class, 'store'])->name('threat.store');
    Route::get('/threat/show', [ThreatController::class, 'show'])->name('threat.show');

    // Routes related to Damage
    Route::get('/damage', [DamageController::class, 'index'])->name('damage.index');
    Route::get('/damage/create', [DamageController::class, 'create'])->name('damage.create');
    Route::post('/damage/store', [DamageController::class, 'store'])->name('damage.store');
    Route::get('/damage/show/{id}', [DamageController::class, 'show'])->name('damage.show');
});

require __DIR__.'/auth.php';
