<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);

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
    Route::resource('sports', SportController::class);
    Route::get('/sports/search', [SportController::class, 'search'])->name('sports.search');
    // Route::get('searchsports', [SportController::class, 'searchsports'])->name('searchsports');
});

Route::get('/segment', [SegmentController::class, 'index'])->name('segment.index');
Route::get('/segment/hometeam', [SegmentController::class, 'hometeam'])->name('segment.hometeam');
Route::get('/segment/guestteam', [SegmentController::class, 'guestteam'])->name('segment.guestteam');
Route::get('/segment/team', [SegmentController::class, 'team'])->name('segment.team');
Route::get('/segment/player', [SegmentController::class, 'player'])->name('segment.player');

require __DIR__ . '/auth.php';
