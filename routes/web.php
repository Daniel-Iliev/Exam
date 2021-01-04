<?php
use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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


//Route::get('/',[UserController::class,'show' ]);
Route::get('/', function () {

    $games  = DB::table('games')
    ->join('game_genres', 'games.id', '=', 'game_genres.game_id')
    ->join('genres', 'genres.id', '=', 'game_genres.genre_id')
    ->select('games.*','genres.name as genres')
    ->get();

    return view('welcome', ['games' => $games]);
});
Route::get('welcome','App\Http\Controllers\SearchController@search');