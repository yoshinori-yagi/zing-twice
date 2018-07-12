<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

use App\Game;

use DB;

class SeatsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
       
            
            $data = [
                'user' => $user,
                'seats' => $seats,
            ];
        
            return view('welcome',$data);
        }
        else {
            return redirect('welcome');  
        }
    
    }
    
   
    public function update($id)
    {
        $user = User::find($id);

        $data = [
            'user' => $user,
        ];
        
        $user_id_seat = DB::table('seats')->join('games','seats.team_id', '=', 'games.user_id')->select('seats.id')->first();
        $user_id_seat = $user_id_seat->id;
        
        $team_id_seat = DB::table('seats')->join('games','seats.team_id', '=', 'games.team_id')->select('seats.id')->first();
        $team_id_seat = $team_id_seat->id;
        
        DB::table('seats')->where ('id',intval($user_id_seat))->update(['team_id' => $team_id_seat]);
        DB::table('seats')->where ('id',intval($team_id_seat))->update(['team_id' => $user_id_seat]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 0]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 0]);
        
        
        
        if (\Auth::check()) {
            return view ('seat.update', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
} 