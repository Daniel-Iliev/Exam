<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\GameCrudController;

class UserController extends Controller
{
    public function show()
    {
       

       return view('welcome')->withCharacters();
    }
}
