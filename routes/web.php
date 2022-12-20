<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CubeListController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\StatisticsController;
use BeyondCode\LaravelWebSockets\Facades\WebSocketsRouter;
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

Route::view('/debug', 'debug');


//--------------------------------------------------------------------------
//Individual Card Routes
//--------------------------------------------------------------------------
Route::prefix('/cards/')->group(function () {
    Route::get('/{name}', [CardController::class, 'show'])
        ->where('name',"[0-9a-zA-Z',_+/ ]+")
        ->name('cards.show');

    Route::get('/',[CardController::class, 'search'])
        ->name('cards.search');
});

//--------------------------------------------------------------------------
//Player Routes
//--------------------------------------------------------------------------
Route::prefix('/players/')->group(function () {

    Route::get('/',[PlayerController::class, 'search'])
        ->name('players.search');

    Route::get('/{id}', [PlayerController::class, 'show'])
        ->where('id',"[0-9]+")
        ->name('players.show');
});

//--------------------------------------------------------------------------
//Deck Routes
//--------------------------------------------------------------------------
Route::prefix('/decks')->group(function () {

    Route::get('/',[DeckController::class, 'search'])
        ->name('decks.search');

    Route::get('/{id}', [DeckController::class, 'show'])
        ->where('id',"[0-9]+")
        ->name('decks.show');
});

//--------------------------------------------------------------------------
//Leaderboard Routes
//--------------------------------------------------------------------------
Route::get('/leaderboard', LeaderboardController::class)
    ->name('leaderboard');

//--------------------------------------------------------------------------
//Cube List Routes
//--------------------------------------------------------------------------
Route::get('/list', CubeListController::class)
    ->name('cube_list');

//--------------------------------------------------------------------------
//Statistics Routes
//--------------------------------------------------------------------------
Route::get('/statistics', StatisticsController::class)
    ->name('statistics');

//--------------------------------------------------------------------------
//Draft Routes
//--------------------------------------------------------------------------
Route::prefix('/drafts')->group(function () {
    Route::get('/test',[DraftController::class, 'test'])
        ->name('drafts.test');

    Route::get('/create',[DraftController::class, 'create'])
        ->name('drafts.create');

    Route::get('/active',[DraftController::class, 'dashboard'])
        ->name('drafts.active');

    Route::get('/{id}', [DraftController::class, 'show'])
        ->where('id',"[0-9]+")
        ->name('drafts.show');
});

//specific previous draft route
//Route::get('/{id}', )->where('id',"[0-9]+");

//new draft route

//});
