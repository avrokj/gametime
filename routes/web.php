<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArenaController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\SportController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('role:admin')->get('/users', function () {
    // ...
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/sports', [SportController::class, 'index'])->name('sports.index');
    Route::post('/sports', [SportController::class, 'store'])->name('sports.store');
    Route::patch('/sports/{sport}', [SportController::class, 'update'])->name('sports.update');
    Route::delete('/sports/{sport}', [SportController::class, 'destroy'])->name('sports.destroy');
    Route::get('/sports/search', [SportController::class, 'search'])->name('sports.search');

    Route::get('/countries', [CountryController::class, 'index'])->name('countries.index');
    Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');
    Route::patch('/countries/{id}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/countries/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');
    Route::get('/countries/search', [CountryController::class, 'search'])->name('countries.search');

    Route::get('/arenas', [ArenaController::class, 'index'])->name('arenas.index');
    Route::post('/arenas', [ArenaController::class, 'store'])->name('arenas.store');
    Route::patch('/arenas/{sport}', [ArenaController::class, 'update'])->name('arenas.update');
    Route::delete('/arenas/{sport}', [ArenaController::class, 'destroy'])->name('arenas.destroy');
    Route::get('/arenas/search', [ArenaController::class, 'search'])->name('arenas.search');
});


Route::get('/segment', [SegmentController::class, 'index'])->name('segment.index');
Route::get('/segment/hometeam', [SegmentController::class, 'hometeam'])->name('segment.hometeam');
Route::get('/segment/guestteam', [SegmentController::class, 'guestteam'])->name('segment.guestteam');
Route::get('/segment/team', [SegmentController::class, 'team'])->name('segment.team');
Route::get('/segment/player', [SegmentController::class, 'player'])->name('segment.player');

Route::get('/score', [ScoreController::class, 'index'])->name('score.index');
Route::post('/score', [ScoreController::class, 'updateScore'])->name('score.index');

Route::post('/apis', [ApiController::class, 'updateApi'])->name('score.index');

require __DIR__ . '/auth.php';
