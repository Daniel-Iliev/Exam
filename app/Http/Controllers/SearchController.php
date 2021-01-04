<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	if($request->has('search')){
    		$games = Game::search($request->get('search'))->get();	
    	}else{
    		$games = Game::get();
    	}
        return view('welcome', compact('games'));
    }
}