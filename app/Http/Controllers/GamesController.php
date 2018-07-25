<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Seat;

use App\User;

use App\Number;

use App\Game;

use App\Block;

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
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;

        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.index', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function numbers($id)
    {
        $user = User::find($id);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $number=Input::get('number');                                               
        $number=htmlspecialchars($number);
        
        $number = rand(1,6);
        
        $data = [
            'number' => $number,
            'user' => $user,
            'user_point' => $user_point,
        ];
        

        DB::insert('insert into zing.numbers (number) values (?)',[intval($number)]);
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $number]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->update(['notification' => 99]);
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 1]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 100]);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points-10;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        if ($points > 0) {
            
            return view ('games.numbers',$data);  
        
        }else{
            
            return view ('games.numbers_buy',$data);
            
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
        
        DB::table('users')->update(['notification' => 0]);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
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
        
        return view('games.defence',$data);                                
        
    }
    
    public function result($id)
    {
        $user = User::find($id);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        
        DB::table('users')->update(['notification' => 0]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 2]);

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function result_after($id)
    {
        $user = User::find($id);
        
        DB::table('users')->update(['notification' => 0]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.result_after', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function numbers_buy($id)
    {
        $user = User::find($id);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.numbers_buy', $data);
    }
    
    public function numbers_bought($id)
    {
        $user = User::find($id);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points+50;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.numbers_bought', $data);
    }
    
    /* tetoris*/
    
    public function tetoris($id)
    {
        $user = User::find($id);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points-10;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
    
        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if ($points > 0) {
            
            return view ('games.tetoris',$data);  
        
        }else{
            
            return view ('games.tetoris_buy',$data);
            
        }
        
    }
    
    public function tetoris_result(Request $request) {
        
        $tetoris_score = $request;
        $tetoris_score = $tetoris_score->point;
        
        DB::insert('insert into tetoris (tetoris) values (?)',[intval($tetoris_score)]);

        return $tetoris_score;
        
    }
    
    public function tetoris_wait($id) {
        
        $user = User::find($id);
        
        $tetoris_score = DB::table('tetoris')->orderby('id', 'desc')->select('tetoris.tetoris')->first();
        $tetoris_score = $tetoris_score->tetoris;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $tetoris_score]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->update(['notification' => 99]);
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 3]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 100]);
        
        $data = [
            'user' => $user,
            'tetoris_score' => $tetoris_score,
        ];
        
        return view ('games.tetoris_wait', $data);
        
    }
    
    public function tetoris_confirm($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.tetoris_confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function tetoris_defence($id)
    {
        $user = User::find($id);
    
        $data = [
            'user' => $user,
        ];
        
        return view('games.tetoris_defence',$data);                                
        
    }
    
    public function tetoris_game_result($id)
    {
        $user = User::find($id);
        
        $tetoris_score = DB::table('tetoris')->orderby('id', 'desc')->select('tetoris.tetoris')->first();
        $tetoris_score = $tetoris_score->tetoris;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['team_id_score' => $tetoris_score]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->update(['notification' => 0]);
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 4]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.tetoris_result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }

    public function tetoris_result_after($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.tetoris_result_after', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function refuse($id) 
    {
        
        $user = User::find($id);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points-10;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->update(['notification' => 0]);
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 10]);
    
        $data = [
            'user' => $user,
        ];
        
        return view ('games.refuse', $data);
    }
    
    public function refused($id) 
    {
        $user = User::find($id);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 0]);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.refused', $data);
    }
    
    public function tetoris_buy($id)
    {
        $user = User::find($id);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.tetoris_buy', $data);
    }
    
    public function tetoris_bought($id)
    {
        $user = User::find($id);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points+50;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.tetoris_bought', $data);
    }
    
    /*block kuzushi*/
    
    public function block($id)
    {
        $user = User::find($id);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points-10;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
    
        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if ($points > 0) {
            
            return view ('games.block',$data);  
        
        }else{
            
            return view ('games.block_buy',$data);
            
        }
                                     
        
    }
    
    public function block_result(Request $request) {
        
        $block_score = $request->BlockScore;
        
        DB::insert('insert into block (block) values (?)',[intval($block_score)]);

        return $block_score;
        
    }
    
     public function block_wait($id) {
        
        $user = User::find($id);
        
        $block_score = DB::table('block')->orderby('id', 'desc')->select('block.block')->first();
        $block_score = $block_score->block;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['user_id_score' => $block_score]);
        
        $team_id = DB::table('games')->orderby('id', 'desc')->select('games.team_id')->first();
        $team_id = $team_id->team_id;
        
        DB::table('users')->update(['notification' => 99]);
        
        DB::table('users')->where ('id',intval($team_id))->update(['notification' => 5]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 100]);
        
        $data = [
            'user' => $user,
            'block_score' => $block_score,
        ];
        
        return view ('games.block_wait', $data);
        
    }
    
    public function block_confirm($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $user_point = DB::table('users')->where('users.id', '=' , $id)->select('users.points')->first();
        $user_point = $user_point->points;
        
        $data = [
            'user' => $user,
            'user_point' => $user_point,
        ];
        
        if (\Auth::check()) {
            
            return view ('games.block_confirm', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function block_defence($id)
    {
        $user = User::find($id);
    
        $data = [
            'user' => $user,
        ];
        
        return view('games.block_defence',$data);                                
        
    }
    
    public function block_game_result($id)
    {
        $user = User::find($id);
        
        $block_score = DB::table('block')->orderby('id', 'desc')->select('block.block')->first();
        $block_score = $block_score->block;
        
        $game_id = DB::table('games')->orderby('id', 'desc')->select('games.id')->first();
        $game_id =  $game_id->id;
        
        DB::table('games')->where ('id',intval($game_id))->update(['team_id_score' => $block_score]);
        
        $user_id = DB::table('games')->orderby('id', 'desc')->select('games.user_id')->first();
        $user_id = $user_id->user_id;
        
        DB::table('users')->update(['notification' => 0]);
        
        DB::table('users')->where ('id',intval($user_id))->update(['notification' => 6]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.block_result', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function block_result_after($id)
    {
        $user = User::find($id);
        
        DB::table('users')->where ('id', $id)->update(['notification' => 0]);
        
        $user_id_score = DB::table('games')->orderby('id', 'desc')->select('games.user_id_score')->first();
        $user_id_score = $user_id_score->user_id_score;
        
        $team_id_score = DB::table('games')->orderby('id', 'desc')->select('games.team_id_score')->first();
        $team_id_score = $team_id_score->team_id_score;
        

        $data = [
            'user' => $user,
            'user_id_score' => $user_id_score,
            'team_id_score' => $team_id_score,
        ];
        
        if (\Auth::check()) {
            return view ('games.block_result_after', $data);
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function block_buy($id)
    {
        $user = User::find($id);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.block_buy', $data);
    }
    
    public function block_bought($id)
    {
        $user = User::find($id);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points+50;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('games.block_bought', $data);
    }
} 
   