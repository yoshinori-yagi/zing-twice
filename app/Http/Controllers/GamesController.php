<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

use App\Number;

use App\Game;

use Input;

use DB;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.index', $data);
        }
        else {
            return redirect('welcome');  
        }
    }

    public function show($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            return view ('games.show', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function result($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            return view ('games.result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function wait($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.wait', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function confirm($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function numbers($id)
    {
        $user = User::find($id);
        
        $number=Input::get('number');                                               
        $number=htmlspecialchars($number);
        
        $number = rand(1,6);
        
        $data = [
            'number' => $number,
            'user' => $user,
        ];
        

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]);
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $number]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 1]);
        
        return view('games.numbers',$data);                                
        
    }


    public function defence($id)
    {
        $user = User::find($id);
        
        $number=Input::get('number');                                               
        $number=htmlspecialchars($number);          
        
        $number = rand(1,6);
        
        $data = [
            'number' => $number,
            'user' => $user,
        ];

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]); 
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['team_id_score' => $number]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 2]);
        
        return view('games.defence',$data);                                
        
    }
        
}