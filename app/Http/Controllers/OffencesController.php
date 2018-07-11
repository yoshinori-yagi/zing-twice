<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seat;

use App\User;

use DB;

class OffencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team1 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 1)->first();
            
       
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team1' => $team1,
                
            ];
        
            return view('offence.offence',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select2()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team2 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 2)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team2' => $team2,
                
            ];
        
            return view('offence.offence2',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select3()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team3 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 3)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team3' => $team3,
                
            ];
        
            return view('offence.offence3',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select4()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team4 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 4)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team4' => $team4,
                
            ];
        
            return view('offence.offence4',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select5()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team5 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 5)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team5' => $team5,
                
            ];
        
            return view('offence.offence5',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select6()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team6 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 6)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team6' => $team6,
                
            ];
        
            return view('offence.offence6',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select7()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team7 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 7)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team7' => $team7,
                
            ];
        
            return view('offence.offence7',$data);
        }
        else {
            return redirect('welcome');  
        }
    }

    public function select8()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team8 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 8)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team8' => $team8,
                
            ];
        
            return view('offence.offence8',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select9()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team9 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 9)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team9' => $team9,
                
            ];
        
            return view('offence.offence9',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select10()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team10 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 10)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team10' => $team10,
                
            ];
        
            return view('offence.offence10',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select11()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team11 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 11)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team11' => $team11,
                
            ];
        
            return view('offence.offence11',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select12()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team12 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 12)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team12' => $team12,
                
            ];
        
            return view('offence.offence12',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select13()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team13 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 13)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team13' => $team13,
                
            ];
        
            return view('offence.offence13',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select14()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team14 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 14)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team14' => $team14,
                
            ];
        
            return view('offence.offence14',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select15()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team15 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 15)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team15' => $team15,
                
            ];
        
            return view('offence.offence15',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select16()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team16 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 16)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team16' => $team16,
                
            ];
        
            return view('offence.offence16',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select17()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team17 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 17)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team17' => $team17,
                
            ];
        
            return view('offence.offence17',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select18()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team18 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 18)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team18' => $team18,
                
            ];
        
            return view('offence.offence18',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select19()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team19 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 19)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team19' => $team19,
                
            ];
        
            return view('offence.offence19',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select20()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team20 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 20)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team20' => $team20,
                
            ];
        
            return view('offence.offence20',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select21()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team21 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 21)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team21' => $team21,
                
            ];
        
            return view('offence.offence21',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select22()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team22 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 22)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team22' => $team22,
                
            ];
        
            return view('offence.offence22',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select23()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team23 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 23)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team23' => $team23,
                
            ];
        
            return view('offence.offence23',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select24()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team24 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 24)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team24' => $team24,
                
            ];
        
            return view('offence.offence24',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select25()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team25 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 25)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team25' => $team25,
                
            ];
        
            return view('offence.offence25',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select26()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team26 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 26)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team26' => $team26,
                
            ];
        
            return view('offence.offence26',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select27()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team27 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 27)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team27' => $team27,
                
            ];
        
            return view('offence.offence27',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select28()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team28 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 28)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team28' => $team28,
                
            ];
        
            return view('offence.offence28',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select29()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team29 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 29)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team29' => $team29,
                
            ];
        
            return view('offence.offence29',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select30()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team30 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 30)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team30' => $team30,
                
            ];
        
            return view('offence.offence30',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select31()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team31 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 31)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team31' => $team31,
                
            ];
        
            return view('offence.offence31',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select32()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team32 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 32)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team32' => $team32,
                
            ];
        
            return view('offence.offence32',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select33()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team33 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 33)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team33' => $team33,
                
            ];
        
            return view('offence.offence33',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select34()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team34 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 34)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team34' => $team34,
                
            ];
        
            return view('offence.offence34',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select35()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team35 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 35)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team35' => $team35,
                
            ];
        
            return view('offence.offence35',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select36()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team36 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 36)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team36' => $team36,
                
            ];
        
            return view('offence.offence36',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select37()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team37 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 37)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team37' => $team37,
                
            ];
        
            return view('offence.offence37',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select38()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team38 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 38)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team38' => $team38,
                
            ];
        
            return view('offence.offence38',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select39()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team39 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 39)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team39' => $team39,
                
            ];
        
            return view('offence.offence39',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select40()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team40 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 40)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team40' => $team40,
                
            ];
        
            return view('offence.offence40',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select41()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team41 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 41)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team41' => $team41,
                
            ];
        
            return view('offence.offence41',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select42()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team42 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 42)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team42' => $team42,
                
            ];
        
            return view('offence.offence42',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select43()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team43 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 43)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team43' => $team43,
                
            ];
        
            return view('offence.offence43',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select44()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team44 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 44)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team44' => $team44,
                
            ];
        
            return view('offence.offence44',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select45()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team45 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 45)->first();
            
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team45' => $team45,
                
            ];
        
            return view('offence.offence45',$data);
        }
        else {
            return redirect('welcome');  
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
