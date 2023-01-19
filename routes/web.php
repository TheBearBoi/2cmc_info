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


// TODO add default validation for certain params (id&name)
Route::view('/debug', 'debug');

//--------------------------------------------------------------------------
//Individual Card Routes
//--------------------------------------------------------------------------
Route::name('cards.')->group(function () {
    Route::prefix('/cards/')->group(function () {
        Route::get('/{name}', [CardController::class, 'show'])
            ->where('name',"[0-9a-zA-Z',_+/ ]+")
            ->name('show');

        Route::get('/',[CardController::class, 'search'])
            ->name('search');
    });

    Route::get('/list', CubeListController::class)  // cube_list_route
        ->name('list');

    Route::get('/sleeve/{id}', [CardController::class, 'sleeve'])
        ->where('id','[0-9]+')
        ->name('sleeve');
});



//--------------------------------------------------------------------------
//Player Routes
//--------------------------------------------------------------------------
Route::prefix('/players/')->name('players.')->group(function () {
    Route::get('/',[PlayerController::class, 'search'])
        ->name('search');

    Route::get('/{id}', [PlayerController::class, 'show'])
        ->where('id',"[0-9]+")
        ->name('show');
});

//--------------------------------------------------------------------------
//Deck Routes
//--------------------------------------------------------------------------
Route::name('decks.')->group(function () {
    Route::prefix('/decks')->group(function () {
        Route::get('/',[DeckController::class, 'search'])
            ->name('search');

        Route::get('/{id}', [DeckController::class, 'show'])
            ->where('id',"[0-9]+")
            ->name('show');
    });
    Route::get('/box/{id}',[DeckController::class, 'box'])
        ->where('id','[0-9]+')
        ->name('box');
});

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

    Route::get('/index', [DraftController::class, 'index'])
        ->name('drafts.list');
});

//specific previous draft route
//Route::get('/{id}', )->where('id',"[0-9]+");

//new draft route

//});

//--------------------------------------------------------------------------
//Redirects
//--------------------------------------------------------------------------
Route::get('/', function () {
    return redirect()->route('cards.list');
}); // TODO redirect to Cube List


Route::get('/s/{id}', function ($id) {
    return redirect()->route('cards.sleeve', ['id' => $id]);
}); // Sleeve Page

Route::get('/b/{id}', function ($id) {
    return redirect()->route('decks.box', ['id' => $id]);
}); // Deck Box Page

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
