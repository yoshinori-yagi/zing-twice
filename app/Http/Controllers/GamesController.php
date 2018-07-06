<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
            
            return view ('games.index');
        }
        else {
            return redirect('welcome');  
        }
    }

    public function show()
    {
        if (\Auth::check()) {
            return view ('games.show');
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function result()
    {
        if (\Auth::check()) {
            return view ('games.result');
        }
        else {
            return redirect('welcome');  
        }
    }
}
