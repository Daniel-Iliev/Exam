<?php

namespace App\Http\Controllers;

use Input;
use App\Models\Game;

class IndexController extends Controller
{
    public function index() {
    
       
            $q = Input::get ( 'q' );
            if ($q){
            $game = Game::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'manufacturer', 'LIKE', '%' . $q . '%' )->orWhere ( 'year_released', 'LIKE', '%' . $q . '%' )
            ->orderBy('created_at','desc')->get ();
            if (count ( $game ) > 0)
                return view ( 'index.index' )->withDetails ( $game )->withQuery ( $q );
            else
                return view ( 'index.index' )->withMessage ( 'No Details found. Try to search again !' );
               }
               $games  = Game::orderBy('created_at','desc')->get();
               return view('index.index', ['games' => $games]);
                   
        } 

    
}
