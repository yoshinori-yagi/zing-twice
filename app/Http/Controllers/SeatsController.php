<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

use App\Game;

use Input;

use DB;

class SeatsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team1_id=Input::get('team1_id');   
             $team1 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 1)->first();
               $team1_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 1)->first();
               
            $team2_id=Input::get('team2_id');   
             $team2 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 2)->first();
               $team2_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 2)->first();
               
            $team3_id=Input::get('team3_id');   
             $team3 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 3)->first();
               $team3_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 3)->first();
            
            $team4_id=Input::get('team4_id');   
             $team4 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 4)->first();
               $team4_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 4)->first();
               
            $team5_id=Input::get('team5_id');   
             $team5 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 5)->first();
               $team5_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 5)->first();
               
            $team6_id=Input::get('team6_id');   
             $team6 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 6)->first();
               $team6_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 6)->first();
            
            $team7_id=Input::get('team7_id');   
             $team7 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 7)->first();
               $team7_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 7)->first();
               
            $team8_id=Input::get('team8_id');   
             $team8 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 8)->first();
               $team8_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 8)->first();
            
            $team9_id=Input::get('team9_id');   
             $team9 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 9)->first();
               $team9_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 9)->first(); 
            
             $team10_id=Input::get('team10_id');   
              $team10 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 10)->first();
               $team10_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 10)->first();
               
            $team11_id=Input::get('team11_id');   
             $team11 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 11)->first();
               $team11_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 11)->first();
               
            $team12_id=Input::get('team12_id');   
             $team12 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 12)->first();
               $team12_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 12)->first();
            
            $team13_id=Input::get('team13_id');   
             $team13 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 13)->first();
               $team13_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 13)->first();
               
            $team14_id=Input::get('team14_id');   
             $team14 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 14)->first();
               $team14_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 14)->first();
               
            $team15_id=Input::get('team15_id');   
             $team15 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 15)->first();
               $team15_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 15)->first();
               
            $team16_id=Input::get('team16_id');   
             $team16 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 16)->first();
               $team16_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 16)->first();
               
            $team17_id=Input::get('team17_id');   
             $team17 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 17)->first();
               $team17_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 17)->first();
            
            $team18_id=Input::get('team18_id');   
             $team18 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 18)->first();
               $team18_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 18)->first();   
            
             $team19_id=Input::get('team19_id');   
              $team19 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 19)->first();
               $team19_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 19)->first();
               
            $team20_id=Input::get('team20_id');   
             $team20 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 20)->first();
               $team20_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 20)->first();
               
            $team21_id=Input::get('team21_id');   
             $team21 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 21)->first();
               $team21_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 21)->first();
            
            $team22_id=Input::get('team22_id');   
             $team22 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 22)->first();
               $team22_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 22)->first();
               
            $team23_id=Input::get('team23_id');   
             $team23 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 23)->first();
               $team23_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 23)->first();
               
            $team24_id=Input::get('team24_id');   
             $team24 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 24)->first();
               $team24_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 24)->first();
            
            $team25_id=Input::get('team25_id');   
             $team25 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 25)->first();
               $team25_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 25)->first();
               
            $team26_id=Input::get('team26_id');   
             $team26 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 26)->first();
               $team26_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 26)->first();
            
            $team27_id=Input::get('team27_id');   
             $team27 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 27)->first();
               $team27_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 27)->first();   
            
             $team28_id=Input::get('team28_id');   
              $team28 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 28)->first();
               $team28_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 28)->first();
               
            $team29_id=Input::get('team29_id');   
             $team29 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 29)->first();
               $team29_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 29)->first();
               
            $team30_id=Input::get('team30_id');   
             $team30 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 30)->first();
               $team30_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 30)->first();
            
            $team31_id=Input::get('team31_id');   
             $team31 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 31)->first();
               $team31_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 31)->first();
               
            $team32_id=Input::get('team32_id');   
             $team32 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 32)->first();
               $team32_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 32)->first();
               
            $team33_id=Input::get('team33_id');   
             $team33 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 33)->first();
               $team33_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 33)->first();
            
            $team34_id=Input::get('team34_id');   
             $team34 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 34)->first();
               $team34_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 34)->first();
               
            $team35_id=Input::get('team35_id');   
             $team35 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 35)->first();
               $team35_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 35)->first();
            
            $team36_id=Input::get('team36_id');   
             $team36 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 36)->first();
               $team36_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 36)->first();
               
             $team37_id=Input::get('team37_id');   
              $team37 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 37)->first();
               $team37_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 37)->first();
               
            $team38_id=Input::get('team38_id');   
             $team38 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 38)->first();
               $team38_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 38)->first();
               
            $team39_id=Input::get('team39_id');   
             $team39 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 39)->first();
               $team39_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 39)->first();
            
            $team40_id=Input::get('team40_id');   
             $team40 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 40)->first();
               $team40_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 40)->first();
               
            $team41_id=Input::get('team41_id');   
             $team41 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 41)->first();
               $team41_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 41)->first();
               
            $team42_id=Input::get('team42_id');   
             $team42 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 42)->first();
               $team42_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 42)->first();
            
            $team43_id=Input::get('team43_id');   
             $team43 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 43)->first();
               $team43_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 43)->first();
               
            $team44_id=Input::get('team44_id');   
             $team44 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 44)->first();
               $team44_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 44)->first();
            
            $team45_id=Input::get('team45_id');   
             $team45 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 45)->first();
               $team45_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 45)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team1' => $team1,
                'team1_id' => $team1_id,
                 'team2' => $team2,
                'team2_id' => $team2_id,
                 'team3' => $team3,
                'team3_id' => $team3_id,
                 'team4' => $team4,
                'team4_id' => $team4_id,
                 'team5' => $team5,
                'team5_id' => $team5_id,
                 'team6' => $team6,
                'team6_id' => $team6_id,
                 'team7' => $team7,
                'team7_id' => $team7_id,
                 'team8' => $team8,
                'team8_id' => $team8_id,
                 'team9' => $team9,
                'team9_id' => $team9_id,
                 'team10' => $team10,
                'team10_id' => $team10_id,
                 'team11' => $team11,
                'team11_id' => $team11_id,
                 'team12' => $team12,
                'team12_id' => $team12_id,
                 'team13' => $team13,
                'team13_id' => $team13_id,
                 'team14' => $team14,
                'team14_id' => $team14_id,
                 'team15' => $team15,
                'team15_id' => $team15_id,
                 'team16' => $team16,
                'team16_id' => $team16_id,
                 'team17' => $team17,
                'team17_id' => $team17_id,
                 'team18' => $team18,
                'team18_id' => $team18_id,
                 'team19' => $team19,
                'team19_id' => $team19_id,
                 'team20' => $team20,
                'team20_id' => $team20_id,
                 'team21' => $team21,
                'team21_id' => $team21_id,
                 'team22' => $team22,
                'team22_id' => $team22_id,
                 'team23' => $team23,
                'team23_id' => $team23_id,
                 'team24' => $team24,
                'team24_id' => $team24_id,
                 'team25' => $team25,
                'team25_id' => $team25_id,
                 'team26' => $team26,
                'team26_id' => $team26_id,
                 'team27' => $team27,
                'team27_id' => $team27_id,
                 'team28' => $team28,
                'team28_id' => $team28_id,
                 'team29' => $team29,
                'team29_id' => $team29_id,
                 'team30' => $team30,
                'team30_id' => $team30_id,
                 'team31' => $team31,
                'team31_id' => $team31_id,
                 'team32' => $team32,
                'team32_id' => $team32_id,
                 'team33' => $team33,
                'team33_id' => $team33_id,
                 'team34' => $team34,
                'team34_id' => $team34_id,
                 'team35' => $team35,
                'team35_id' => $team35_id,
                 'team36' => $team36,
                'team36_id' => $team36_id,
                 'team37' => $team37,
                'team37_id' => $team37_id,
                 'team38' => $team38,
                'team38_id' => $team38_id,
                 'team39' => $team39,
                'team39_id' => $team39_id,
                 'team40' => $team40,
                'team40_id' => $team40_id,
                 'team41' => $team41,
                'team41_id' => $team41_id,
                 'team42' => $team42,
                'team42_id' => $team42_id,
                 'team43' => $team43,
                'team43_id' => $team43_id,
                 'team44' => $team44,
                'team44_id' => $team44_id,
                 'team45' => $team45,
                'team45_id' => $team45_id,
            ];
        
            return view('seat.index', $data);
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
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $user_id)->first();
        $user_id_seat = $user_id_seat->id;
        
        $team_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $team_id)->first();
        $team_id_seat = $team_id_seat->id;
        
        DB::table('seats')->where ('id',intval($user_id_seat))->update(['team_id' => $team_id]);
        DB::table('seats')->where ('id',intval($team_id_seat))->update(['team_id' => $user_id]);

        
        if (\Auth::check()) {
            return view ('seat.update', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function zing()
    {

      return view ('seat.zing');
    }
    
    public function timeline() 
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            
            $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')->where('users.id', '=', $id)->first();
            $team_id = $team_id->team_id;
            $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
            $team_name = $team_name->name;
            
            $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->where('users.id', '=', $id)->first();
            $user_id = $user_id->user_id;
            $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
            $user_name = $user_name->name;
            
            $data = [
                'user' => $user,
                'team_name' => $team_name,
                'user_name' => $user_name,
            ];
            
            return view ('seat.timeline', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
} 