<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\SecurityController;
use App\Http\Controllers\ThreatController;
use App\Http\Controllers\TaraController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AppController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('assets.create');
})->middleware(['auth', 'verified'])->name('dashboard');


// This group of routes is protected by the 'auth' middleware, ensuring that only authenticated users can access them.
Route::middleware('auth')->group(function () {

    // Routes related to user profiles
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // Route to edit user profile
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Route to update user profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // Route to delete user profile

    // Routes related to assets
    Route::post('/assets', [AssetController::class, 'store'])->name('assets.store'); // Route to store assets
    Route::get('/assets', [AssetController::class, 'index'])->name('assets.index'); // Route to list assets
    Route::get('/assets/{id}', [AssetController::class, 'show'])->name('assets.show'); // Route to show a specific asset
    Route::get('/assets/{id}/details', [AssetController::class, 'details'])->name('assets.details');


    // Routes related to tara
    Route::get('/tara/{id}', [TaraController::class, 'index'])->name('tara.index'); // Route to display tara information
    Route::get('/tara/create', [TaraController::class, 'create'])->name('tara.create'); // Route to create tara
    Route::post('/tara/store', [TaraController::class, 'store'])->name('tara.store'); // Route to store tara
    Route::get('/tara/show', [TaraController::class, 'show'])->name('tara.show'); // Route to show tara
    Route::get('/tara/getDetails/{id}', [TaraController::class, 'getDetails'])->name('tara.getDetails');


    // Routes related to threats
    Route::get('/threat/{id}', [ThreatController::class, 'index'])->name('threat.index'); // Route to display threat information
    Route::post('/threat/store', [ThreatController::class, 'store'])->name('threat.store'); // Route to store threat

    // Routes related to damage
    Route::get('/damage/{id}', [DamageController::class, 'index'])->name('damage.index'); // Route to display damage information
    Route::post('/damage/store', [DamageController::class, 'store'])->name('damage.store'); // Route to store damage
    Route::get('/damage/getDetails', [DamageController::class, 'getDetails'])->name('damage.getDetails');


    // Main route
    Route::get('/app/{id}', [AppController::class, 'index'])->name('app.index'); // Route to display damage information
    Route::get('/main/{id}', [MainController::class, 'index'])->name('main.index'); // Main route of the application

});


require __DIR__.'/auth.php';
