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
        
        $notification=Input::get('notification');                                               
        $notification=htmlspecialchars($notification);
        
        $notification = "1";
        
        $data = [
            'number' => $number,
            'user' => $user,
        ];

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]);
        /*DB::update('update zing.users set notification = ? where games.team_id = users.id',[intval($notification)]);*/
        
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
        
        return view('games.defence',$data);                                
        
    }
        
}