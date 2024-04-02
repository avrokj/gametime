<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArenaController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SegmentController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\TeamController;
use App\Models\Position;

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

    Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');
    Route::post('/coaches', [CoachController::class, 'store'])->name('coaches.store');
    Route::patch('/coaches/{sport}', [CoachController::class, 'update'])->name('coaches.update');
    Route::delete('/coaches/{sport}', [CoachController::class, 'destroy'])->name('coaches.destroy');
    Route::get('/coaches/search', [CoachController::class, 'search'])->name('coaches.search');

    Route::get('/teams', [TeamController::class, 'index'])->name('teams.index');
    Route::post('/teams', [TeamController::class, 'store'])->name('teams.store');
    Route::patch('/teams/{sport}', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/teams/{sport}', [TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('/teams/search', [TeamController::class, 'search'])->name('teams.search');

    Route::get('/positions', [PositionController::class, 'index'])->name('positions.index');
    Route::post('/positions', [PositionController::class, 'store'])->name('positions.store');
    Route::patch('/positions/{sport}', [PositionController::class, 'update'])->name('positions.update');
    Route::delete('/positions/{sport}', [PositionController::class, 'destroy'])->name('positions.destroy');
    Route::get('/positions/search', [PositionController::class, 'search'])->name('positions.search');

    Route::get('/players', [PlayerController::class, 'index'])->name('players.index');
    Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
    Route::patch('/players/{sport}', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{sport}', [PlayerController::class, 'destroy'])->name('players.destroy');
    Route::get('/players/search', [PlayerController::class, 'search'])->name('players.search');

    Route::get('/score', [ScoreController::class, 'index'])->name('score.index');
    Route::post('/score', [ScoreController::class, 'updateScore'])->name('score.index');
});


Route::get('/segment', [SegmentController::class, 'index'])->name('segment.index');
Route::get('/segment/hometeam', [SegmentController::class, 'hometeam'])->name('segment.hometeam');
Route::get('/segment/guestteam', [SegmentController::class, 'guestteam'])->name('segment.guestteam');
Route::get('/segment/team', [SegmentController::class, 'team'])->name('segment.team');
Route::get('/segment/player', [SegmentController::class, 'player'])->name('segment.player');

Route::post('/apis', [ApiController::class, 'updateApi'])->name('score.index');

require __DIR__ . '/auth.php';
