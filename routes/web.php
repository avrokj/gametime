<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\ArenaController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GameController;
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
use App\Http\Controllers\UserController;
use App\Http\Controllers\GameLogController;
use App\Models\Position;
use App\Models\Event;
use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

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
    $events = Event::all();
    $games = Game::all();
    return view('welcome', ['events' => $events, 'games' => $games]);
});

Auth::routes();

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'games' => GameController::class,
    'events' => EventController::class,
]);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);

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
    Route::get('/teams/{teamId}/players', [TeamController::class, 'players'])->name('teams.players');

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

    Route::get('/games', [GameController::class, 'index'])->name('games.index');
    Route::post('/games', [GameController::class, 'store'])->name('games.store');
    Route::patch('/games/{sport}', [GameController::class, 'update'])->name('games.update');
    Route::delete('/games/{sport}', [GameController::class, 'destroy'])->name('games.destroy');
    Route::get('/games/search', [GameController::class, 'search'])->name('games.search');

    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::patch('/events/{sport}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{sport}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/search', [EventController::class, 'search'])->name('events.search');

    Route::get('/score/{id}', [ScoreController::class, 'index'])->name('score.index');
    Route::post('/score/{id}', [ScoreController::class, 'updateScore'])->name('score.index');
    Route::get('/score/hometeam/{game_id}/{team_id}', [SegmentController::class, 'hometeam'])->name('score.hometeam');
    Route::get('/score/guestteam/{game_id}/{team_id}', [SegmentController::class, 'guestteam'])->name('score.guestteam');
    Route::get('/score/team', [SegmentController::class, 'team'])->name('score.team');
    Route::get('/score/player', [SegmentController::class, 'player'])->name('score.player');
    Route::get('/score/gamelog/{game_id}', [SegmentController::class, 'gamelog'])->name('score.gamelog');
    Route::get('/score/stats/{game_id}', [SegmentController::class, 'stats'])->name('score.stats');
});

Route::post('/score/home', [ScoreController::class, 'lastHomeScoreUpdate'])->name('score.lastHomeScoreUpdate');
Route::post('/score/guest', [ScoreController::class, 'lastAwayScoreUpdate'])->name('score.lastAwayScoreUpdate');
Route::post('/score/gamelog/home', [GameLogController::class, 'storeHome']);
Route::post('/score/gamelog/away', [GameLogController::class, 'storeAway']);

Route::post('/apis', [ApiController::class, 'updateApi']);
Route::get('/api/teams/{team}/players', function (Team $team) {
    return response()->json($team->players);
});

Route::post('/players/updateAwayPlayerStatus/{id}', [PlayerController::class, 'updateAwayPlayerStatus'])->name('players.updateAwayPlayerStatus');
Route::post('/players/updateAwayPlayerStatusToBench/{id}', [PlayerController::class, 'updateAwayPlayerStatusToBench'])->name('players.updateAwayPlayerStatusToBench');
//Route::post('/players/updateHomePlayerStatus/{id}', [PlayerController::class, 'updateHomePlayerStatus'])->name('players.updateHomePlayerStatus');
Route::post('/players/{id}/update-status', [PlayerController::class, 'updateHomePlayerStatus'])->name('players.updateHomePlayerStatus');
Route::post('/players/updateHomePlayerStatusToBench/{id}', [PlayerController::class, 'updateHomePlayerStatusToBench'])->name('players.updateHomePlayerStatusToBench');
Route::post('/clear/clearAwayLineup', [PlayerController::class, 'clearAwayLineup'])->name('clear.clearAwayLineup');
Route::post('/clear/clearHomeLineup', [PlayerController::class, 'clearHomeLineup'])->name('clear.clearHomeLineup');
require __DIR__ . '/auth.php';
