<?php
use  Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Models\Game;

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
    $genres = 
    $games  = DB::table('games')
    ->join('game_genres','games.id','=','game_genres.game_id')
    ->join('genres','genres.id','=','game_genres.genre_id')
    ->select('games.*')
    ->addselect("genres.name as genres")
    ->get();

    return view('welcome', ['games' => $games]);
});

Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $game = Game::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'manufacturer', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $game ) > 0)
        return view ( 'welcome' )->withDetails ( $game )->withQuery ( $q );
    else
        return view ( 'welcome' )->withMessage ( 'No Details found. Try to search again !' );
} );