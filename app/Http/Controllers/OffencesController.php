<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seat;

use App\User;

use Input;

use DB;

class OffencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function select($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team1_id=Input::get('team1_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team1 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 1)->first();
            $team1_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 1)->first();
            $team1_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 1)->first();
            
            $user_id = $user->id;
            $team1_id = $team1_id->id;
            $team1_notification = $team1_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 1)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;

            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team1' => $team1,
                    'team1_id' => $team1_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team1_notification' => $team1_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team1_id)]);
            
                return view('offence.offence',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team1' => $team1,
                    'team1_id' => $team1_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team1_notification' => $team1_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team1' => $team1,
                    'team1_id' => $team1_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team1_notification' => $team1_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team1' => $team1,
                    'team1_id' => $team1_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team1_notification' => $team1_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select2($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team2_id=Input::get('team2_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team2 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 2)->first();
            $team2_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 2)->first();
            $team2_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 2)->first();
            
            $user_id = $user->id;
            $team2_id = $team2_id->id;
            $team2_notification = $team2_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 2)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;

            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team2' => $team2,
                    'team2_id' => $team2_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team2_notification' => $team2_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team2_id)]);
            
                return view('offence.offence2',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team2' => $team2,
                    'team2_id' => $team2_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team2_notification' => $team2_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team2' => $team2,
                    'team2_id' => $team2_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team2_notification' => $team2_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team2' => $team2,
                    'team2_id' => $team2_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team2_notification' => $team2_notification,
                ];
                
                return view ('users.show', $data);
    
            }
            
        }
        else {
            return redirect('welcome');  
        }
    }
    
    
    public function select3($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team3_id=Input::get('team3_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team3 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 3)->first();
            $team3_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 3)->first();
            $team3_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 3)->first();
            
            $user_id = $user->id;
            $team3_id = $team3_id->id;
            $team3_notification = $team3_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 3)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;

            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team3' => $team3,
                    'team3_id' => $team3_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team3_notification' => $team3_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team3_id)]);
            
                return view('offence.offence3',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team3' => $team3,
                    'team3_id' => $team3_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team3_notification' => $team3_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team3' => $team3,
                    'team3_id' => $team3_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team3_notification' => $team3_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team3' => $team3,
                    'team3_id' => $team3_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team3_notification' => $team3_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    
    public function select4($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team4_id=Input::get('team4_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team4 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 4)->first();
            $team4_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 4)->first();
            $team4_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 4)->first();
            
            $user_id = $user->id;
            $team4_id = $team4_id->id;
            $team4_notification = $team4_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 4)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team4' => $team4,
                    'team4_id' => $team4_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team4_notification' => $team4_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team4_id)]);
            
                return view('offence.offence4',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team4' => $team4,
                    'team4_id' => $team4_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team4_notification' => $team4_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team4' => $team4,
                    'team4_id' => $team4_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team4_notification' => $team4_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team4' => $team4,
                    'team4_id' => $team4_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team4_notification' => $team4_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select5($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team5_id=Input::get('team5_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team5 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 5)->first();
            $team5_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 5)->first();
            $team5_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 5)->first();
            
            $user_id = $user->id;
            $team5_id = $team5_id->id;
            $team5_notification = $team5_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 5)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team5' => $team5,
                    'team5_id' => $team5_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team5_notification' => $team5_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team5_id)]);
            
                return view('offence.offence5',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team5' => $team5,
                    'team5_id' => $team5_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team5_notification' => $team5_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team5' => $team5,
                    'team5_id' => $team5_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team5_notification' => $team5_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team5' => $team5,
                    'team5_id' => $team5_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team5_notification' => $team5_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select6($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team6_id=Input::get('team6_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team6 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 6)->first();
            $team6_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 6)->first();
            $team6_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 6)->first();
            
            $user_id = $user->id;
            $team6_id = $team6_id->id;
            $team6_notification = $team6_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 6)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team6' => $team6,
                    'team6_id' => $team6_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team6_notification' => $team6_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team6_id)]);
            
                return view('offence.offence6',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team6' => $team6,
                    'team6_id' => $team6_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team6_notification' => $team6_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team6' => $team6,
                    'team6_id' => $team6_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team6_notification' => $team6_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team6' => $team6,
                    'team6_id' => $team6_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team6_notification' => $team6_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select7($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team7_id=Input::get('team7_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team7 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 7)->first();
            $team7_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 7)->first();
            $team7_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 7)->first();
            
            $user_id = $user->id;
            $team7_id = $team7_id->id;
            $team7_notification = $team7_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 7)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team7' => $team7,
                    'team7_id' => $team7_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team7_notification' => $team7_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team7_id)]);
            
                return view('offence.offence7',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team7' => $team7,
                    'team7_id' => $team7_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team7_notification' => $team7_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team7' => $team7,
                    'team7_id' => $team7_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team7_notification' => $team7_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team7' => $team7,
                    'team7_id' => $team7_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team7_notification' => $team7_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }

    public function select8($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team8_id=Input::get('team8_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team8 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 8)->first();
            $team8_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 8)->first();
            $team8_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 8)->first();
            
            $user_id = $user->id;
            $team8_id = $team8_id->id;
            $team8_notification = $team8_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 8)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team8' => $team8,
                    'team8_id' => $team8_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team8_notification' => $team8_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team8_id)]);
            
                return view('offence.offence8',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team8' => $team8,
                    'team8_id' => $team8_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team8_notification' => $team8_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team8' => $team8,
                    'team8_id' => $team8_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team8_notification' => $team8_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team8' => $team8,
                    'team8_id' => $team8_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team8_notification' => $team8_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select9($id)
    {
        $data = [];
        if (\Auth::check()) {
            
            $team9_id=Input::get('team9_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team9 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 9)->first();
            $team9_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 9)->first();
            $team9_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 9)->first();
            
            $user_id = $user->id;
            $team9_id = $team9_id->id;
            $team9_notification = $team9_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 9)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team9' => $team9,
                    'team9_id' => $team9_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team9_notification' => $team9_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team9_id)]);
            
                return view('offence.offence9',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team9' => $team9,
                    'team9_id' => $team9_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team9_notification' => $team9_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team9' => $team9,
                    'team9_id' => $team9_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team9_notification' => $team9_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team9' => $team9,
                    'team9_id' => $team9_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team9_notification' => $team9_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select10($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team10_id=Input::get('team10_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team10 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 10)->first();
            $team10_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 10)->first();
            $team10_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 10)->first();
            
            $user_id = $user->id;
            $team10_id = $team10_id->id;
            $team10_notification = $team10_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 10)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team10' => $team10,
                    'team10_id' => $team10_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team10_notification' => $team10_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team10_id)]);
            
                return view('offence.offence10',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team10' => $team10,
                    'team10_id' => $team10_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team10_notification' => $team10_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team10' => $team10,
                    'team10_id' => $team10_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team10_notification' => $team10_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team10' => $team10,
                    'team10_id' => $team10_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team10_notification' => $team10_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select11($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team11_id=Input::get('team11_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team11 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 11)->first();
            $team11_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 11)->first();
            $team11_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 11)->first();

            $user_id = $user->id;
            $team11_id = $team11_id->id;
            $team11_notification = $team11_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 11)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team11' => $team11,
                    'team11_id' => $team11_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team11_notification' => $team11_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team11_id)]);
            
                return view('offence.offence11',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team11' => $team11,
                    'team11_id' => $team11_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team11_notification' => $team11_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team11' => $team11,
                    'team11_id' => $team11_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team11_notification' => $team11_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team11' => $team11,
                    'team11_id' => $team11_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team11_notification' => $team11_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select12($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team12_id=Input::get('team12_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team12 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 12)->first();
            $team12_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 12)->first();
            $team12_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 12)->first();
            
            $user_id = $user->id;
            $team12_id = $team12_id->id;
            $team12_notification = $team12_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 12)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team12' => $team12,
                    'team12_id' => $team12_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team12_notification' => $team12_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team12_id)]);
            
                return view('offence.offence12',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team12' => $team12,
                    'team12_id' => $team12_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team12_notification' => $team12_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team12' => $team12,
                    'team12_id' => $team12_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team12_notification' => $team12_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team12' => $team12,
                    'team12_id' => $team12_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team12_notification' => $team12_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select13($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team13_id=Input::get('team13_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team13 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 13)->first();
            $team13_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 13)->first();
            $team13_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 13)->first();
            
            $user_id = $user->id;
            $team13_id = $team13_id->id;
            $team13_notification = $team13_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 13)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team13' => $team13,
                    'team13_id' => $team13_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team13_notification' => $team13_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team13_id)]);
            
                return view('offence.offence13',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team13' => $team13,
                    'team13_id' => $team13_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team13_notification' => $team13_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team13' => $team13,
                    'team13_id' => $team13_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team13_notification' => $team13_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team13' => $team13,
                    'team13_id' => $team13_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team13_notification' => $team13_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select14($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team14_id=Input::get('team14_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team14 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 14)->first();
            $team14_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 14)->first();
            $team14_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 14)->first();
            
            $user_id = $user->id;
            $team14_id = $team14_id->id;
            $team14_notification = $team14_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 14)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team14' => $team14,
                    'team14_id' => $team14_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team14_notification' => $team14_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team14_id)]);
            
                return view('offence.offence14',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team14' => $team14,
                    'team14_id' => $team14_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team14_notification' => $team14_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team14' => $team14,
                    'team14_id' => $team14_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team14_notification' => $team14_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team14' => $team14,
                    'team14_id' => $team14_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team14_notification' => $team14_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select15($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team15_id=Input::get('team15_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team15 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 15)->first();
            $team15_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 15)->first();
            $team15_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 15)->first();
            
            $user_id = $user->id;
            $team15_id = $team15_id->id;
            $team15_notification = $team15_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 15)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team15' => $team15,
                    'team15_id' => $team15_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team15_notification' => $team15_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team15_id)]);
            
                return view('offence.offence15',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team15' => $team15,
                    'team15_id' => $team15_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team15_notification' => $team15_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team15' => $team15,
                    'team15_id' => $team15_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team15_notification' => $team15_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team15' => $team15,
                    'team15_id' => $team15_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team15_notification' => $team15_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select16($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team16_id=Input::get('team16_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team16 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 16)->first();
            $team16_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 16)->first();
            $team16_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 16)->first();
            
            $user_id = $user->id;
            $team16_id = $team16_id->id;
            $team16_notification = $team16_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 16)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team16' => $team16,
                    'team16_id' => $team16_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team16_notification' => $team16_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team16_id)]);
            
                return view('offence.offence16',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team16' => $team16,
                    'team16_id' => $team16_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team16_notification' => $team16_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team16' => $team16,
                    'team16_id' => $team16_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team16_notification' => $team16_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team16' => $team16,
                    'team16_id' => $team16_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team16_notification' => $team16_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select17($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team17_id=Input::get('team17_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team17 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 17)->first();
            $team17_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 17)->first();
            $team17_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 17)->first();
            
            $user_id = $user->id;
            $team17_id = $team17_id->id;
            $team17_notification = $team17_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 17)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team17' => $team17,
                    'team17_id' => $team17_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team17_notification' => $team17_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team17_id)]);
            
                return view('offence.offence17',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team17' => $team17,
                    'team17_id' => $team17_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team17_notification' => $team17_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team17' => $team17,
                    'team17_id' => $team17_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team17_notification' => $team17_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team17' => $team17,
                    'team17_id' => $team17_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team17_notification' => $team17_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select18($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team18_id=Input::get('team18_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team18 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 18)->first();
            $team18_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 18)->first();
            $team18_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 18)->first();
            
            $user_id = $user->id;
            $team18_id = $team18_id->id;
            $team18_notification = $team18_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 18)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team18' => $team18,
                    'team18_id' => $team18_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team18_notification' => $team18_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team18_id)]);
            
                return view('offence.offence18',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team18' => $team18,
                    'team18_id' => $team18_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team18_notification' => $team18_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team18' => $team18,
                    'team18_id' => $team18_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team18_notification' => $team18_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team18' => $team18,
                    'team18_id' => $team18_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team18_notification' => $team18_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select19($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team19_id=Input::get('team19_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team19 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 19)->first();
            $team19_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 19)->first();
            $team19_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 19)->first();
            
            $user_id = $user->id;
            $team19_id = $team19_id->id;
            $team19_notification = $team19_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 19)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team19' => $team19,
                    'team19_id' => $team19_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team19_notification' => $team19_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team19_id)]);
            
                return view('offence.offence19',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team19' => $team19,
                    'team19_id' => $team19_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team19_notification' => $team19_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team19' => $team19,
                    'team19_id' => $team19_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team19_notification' => $team19_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team19' => $team19,
                    'team19_id' => $team19_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team19_notification' => $team19_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select20($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team20_id=Input::get('team20_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team20 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 20)->first();
            $team20_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 20)->first();
            $team20_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 20)->first();

            
            $user_id = $user->id;
            $team20_id = $team20_id->id;
            $team20_notification = $team20_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 20)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team20' => $team20,
                    'team20_id' => $team20_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team20_notification' => $team20_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team20_id)]);
            
                return view('offence.offence20',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team20' => $team20,
                    'team20_id' => $team20_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team20_notification' => $team20_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team20' => $team20,
                    'team20_id' => $team20_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team20_notification' => $team20_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select21($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team21_id=Input::get('team21_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team21 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 21)->first();
            $team21_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 21)->first();
            $team21_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 21)->first();
            
            $user_id = $user->id;
            $team21_id = $team21_id->id;
            $team21_notification = $team21_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 21)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team21' => $team21,
                    'team21_id' => $team21_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team21_notification' => $team21_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team21_id)]);
            
                return view('offence.offence21',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team21' => $team21,
                    'team21_id' => $team21_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team21_notification' => $team21_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team21' => $team21,
                    'team21_id' => $team21_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team21_notification' => $team21_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team21' => $team21,
                    'team21_id' => $team21_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team21_notification' => $team21_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select22($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team22_id=Input::get('team22_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team22 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 22)->first();
            $team22_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 22)->first();
            $team22_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 22)->first();
            
            $user_id = $user->id;
            $team22_id = $team22_id->id;
            $team22_notification = $team22_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 22)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team22' => $team22,
                    'team22_id' => $team22_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team22_notification' => $team22_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team22_id)]);
            
                return view('offence.offence22',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team22' => $team22,
                    'team22_id' => $team22_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team22_notification' => $team22_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team22' => $team22,
                    'team22_id' => $team22_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team22_notification' => $team22_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team22' => $team22,
                    'team22_id' => $team22_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team22_notification' => $team22_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select23($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team23_id=Input::get('team23_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team23 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 23)->first();
            $team23_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 23)->first();
            $team23_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 23)->first();
            
            $user_id = $user->id;
            $team23_id = $team23_id->id;
            $team23_notification = $team23_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 23)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team23' => $team23,
                    'team23_id' => $team23_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team23_notification' => $team23_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team23_id)]);
            
                return view('offence.offence23',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team23' => $team23,
                    'team23_id' => $team23_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team23_notification' => $team23_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team23' => $team23,
                    'team23_id' => $team23_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team23_notification' => $team23_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team23' => $team23,
                    'team23_id' => $team23_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team23_notification' => $team23_notification,

                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select24($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team24_id=Input::get('team24_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team24 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 24)->first();
            $team24_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 24)->first();
            $team24_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 24)->first();
            
            $user_id = $user->id;
            $team24_id = $team24_id->id;
            $team24_notification = $team24_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 24)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team24' => $team24,
                    'team24_id' => $team24_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team24_notification' => $team24_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team24_id)]);
            
                return view('offence.offence24',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team24' => $team24,
                    'team24_id' => $team24_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team24_notification' => $team24_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team24' => $team24,
                    'team24_id' => $team24_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team24_notification' => $team24_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team24' => $team24,
                    'team24_id' => $team24_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team24_notification' => $team24_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select25($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team25_id=Input::get('team25_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team25 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 25)->first();
            $team25_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 25)->first();
            $team25_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 25)->first();
            
            $user_id = $user->id;
            $team25_id = $team25_id->id;
            $team25_notification = $team25_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 25)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team25' => $team25,
                    'team25_id' => $team25_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team25_notification' => $team25_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team25_id)]);
            
                return view('offence.offence25',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team25' => $team25,
                    'team25_id' => $team25_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team25_notification' => $team25_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team25' => $team25,
                    'team25_id' => $team25_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team25_notification' => $team25_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team25' => $team25,
                    'team25_id' => $team25_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team25_notification' => $team25_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select26($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team26_id=Input::get('team26_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team26 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 26)->first();
            $team26_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 26)->first();
            $team26_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 26)->first();
            
            $user_id = $user->id;
            $team26_id = $team26_id->id;
            $team26_notification = $team26_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 26)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team26' => $team26,
                    'team26_id' => $team26_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team26_notification' => $team26_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team26_id)]);
            
                return view('offence.offence26',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team26' => $team26,
                    'team26_id' => $team26_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team26_notification' => $team26_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team26' => $team26,
                    'team26_id' => $team26_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team26_notification' => $team26_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team26' => $team26,
                    'team26_id' => $team26_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team26_notification' => $team26_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select27($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team27_id=Input::get('team27_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team27 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 27)->first();
            $team27_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 27)->first();
            $team27_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 27)->first();
            
            $user_id = $user->id;
            $team27_id = $team27_id->id;
            $team27_notification = $team27_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 27)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team27' => $team27,
                    'team27_id' => $team27_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team27_notification' => $team27_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team27_id)]);
            
                return view('offence.offence27',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team27' => $team27,
                    'team27_id' => $team27_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team27_notification' => $team27_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team27' => $team27,
                    'team27_id' => $team27_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team27_notification' => $team27_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team27' => $team27,
                    'team27_id' => $team27_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team27_notification' => $team27_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select28($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team28_id=Input::get('team28_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team28 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 28)->first();
            $team28_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 28)->first();
            $team28_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 28)->first();
            
            $user_id = $user->id;
            $team28_id = $team28_id->id;
            $team28_notification = $team28_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 28)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team28' => $team28,
                    'team28_id' => $team28_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team28_notification' => $team28_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team28_id)]);
            
                return view('offence.offence28',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team28' => $team28,
                    'team28_id' => $team28_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team28_notification' => $team28_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team28' => $team28,
                    'team28_id' => $team28_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team28_notification' => $team28_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team28' => $team28,
                    'team28_id' => $team28_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team28_notification' => $team28_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select29($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team29_id=Input::get('team29_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team29 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 29)->first();
            $team29_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 29)->first();
            $team29_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 29)->first();
            
            $user_id = $user->id;
            $team29_id = $team29_id->id;
            $team29_notification = $team29_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 29)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team29' => $team29,
                    'team29_id' => $team29_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team29_notification' => $team29_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team29_id)]);
            
                return view('offence.offence29',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team29' => $team29,
                    'team29_id' => $team29_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team29_notification' => $team29_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team29' => $team29,
                    'team29_id' => $team29_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team29_notification' => $team29_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team29' => $team29,
                    'team29_id' => $team29_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team29_notification' => $team29_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select30($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team30_id=Input::get('team30_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team30 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 30)->first();
            $team30_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 30)->first();
            $team30_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 30)->first();
            
            $user_id = $user->id;
            $team30_id = $team30_id->id;
            $team30_notification = $team30_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 30)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team30' => $team30,
                    'team30_id' => $team30_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team30_notification' => $team30_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team30_id)]);
            
                return view('offence.offence30',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team30' => $team30,
                    'team30_id' => $team30_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team30_notification' => $team30_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team30' => $team30,
                    'team30_id' => $team30_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team30_notification' => $team30_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team30' => $team30,
                    'team30_id' => $team30_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team30_notification' => $team30_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select31($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team31_id=Input::get('team31_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team31 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 31)->first();
            $team31_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 31)->first();
            $team31_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 31)->first();
            
            $user_id = $user->id;
            $team31_id = $team31_id->id;
            $team31_notification = $team31_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 31)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team31' => $team31,
                    'team31_id' => $team31_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team31_notification' => $team31_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team31_id)]);
            
                return view('offence.offence31',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team31' => $team31,
                    'team31_id' => $team31_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team31_notification' => $team31_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team31' => $team31,
                    'team31_id' => $team31_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team31_notification' => $team31_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team31' => $team31,
                    'team31_id' => $team31_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team31_notification' => $team31_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select32($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team32_id=Input::get('team32_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team32 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 32)->first();
            $team32_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 32)->first();
            $team32_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 32)->first();
            
            $user_id = $user->id;
            $team32_id = $team32_id->id;
            $team32_notification = $team32_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 32)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team32' => $team32,
                    'team32_id' => $team32_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team32_notification' => $team32_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team32_id)]);
            
                return view('offence.offence32',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team32' => $team32,
                    'team32_id' => $team32_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team32_notification' => $team32_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team32' => $team32,
                    'team32_id' => $team32_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team32_notification' => $team32_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team32' => $team32,
                    'team32_id' => $team32_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team32_notification' => $team32_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select33($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team33_id=Input::get('team33_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team33 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 33)->first();
            $team33_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 33)->first();
            $team33_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 33)->first();
            
            $user_id = $user->id;
            $team33_id = $team33_id->id;
            $team33_notification = $team33_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 33)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team33' => $team33,
                    'team33_id' => $team33_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team33_notification' => $team33_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team33_id)]);
            
                return view('offence.offence33',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team33' => $team33,
                    'team33_id' => $team33_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team33_notification' => $team33_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team33' => $team33,
                    'team33_id' => $team33_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team33_notification' => $team33_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team33' => $team33,
                    'team33_id' => $team33_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team33_notification' => $team33_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select34($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team34_id=Input::get('team34_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team34 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 34)->first();
            $team34_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 34)->first();
            $team34_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 34)->first();
            
            $user_id = $user->id;
            $team34_id = $team34_id->id;
            $team34_notification = $team34_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 34)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team34' => $team34,
                    'team34_id' => $team34_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team34_notification' => $team34_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team34_id)]);
            
                return view('offence.offence34',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team34' => $team34,
                    'team34_id' => $team34_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team34_notification' => $team34_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team34' => $team34,
                    'team34_id' => $team34_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team34_notification' => $team34_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team34' => $team34,
                    'team34_id' => $team34_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team34_notification' => $team34_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select35($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team35_id=Input::get('team35_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team35 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 35)->first();
            $team35_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 35)->first();
            $team35_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 35)->first();
            
            $user_id = $user->id;
            $team35_id = $team35_id->id;
            $team35_notification = $team35_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 35)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team35' => $team35,
                    'team35_id' => $team35_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team35_notification' => $team35_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team35_id)]);
            
                return view('offence.offence35',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team35' => $team35,
                    'team35_id' => $team35_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team35_notification' => $team35_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team35' => $team35,
                    'team35_id' => $team35_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team35_notification' => $team35_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team35' => $team35,
                    'team35_id' => $team35_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team35_notification' => $team35_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select36($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team36_id=Input::get('team36_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team36 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 36)->first();
            $team36_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 36)->first();
            $team36_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 36)->first();
            
            $user_id = $user->id;
            $team36_id = $team36_id->id;
            $team36_notification = $team36_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 36)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team36' => $team36,
                    'team36_id' => $team36_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team36_notification' => $team36_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team36_id)]);
            
                return view('offence.offence36',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team36' => $team36,
                    'team36_id' => $team36_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team36_notification' => $team36_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team36' => $team36,
                    'team36_id' => $team36_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team36_notification' => $team36_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team36' => $team36,
                    'team36_id' => $team36_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team36_notification' => $team36_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select37($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team37_id=Input::get('team37_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team37 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 37)->first();
            $team37_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 37)->first();
            $team37_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 37)->first();
            
            $user_id = $user->id;
            $team37_id = $team37_id->id;
            $team37_notification = $team37_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 37)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team37' => $team37,
                    'team37_id' => $team37_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team37_notification' => $team37_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team37_id)]);
            
                return view('offence.offence37',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team37' => $team37,
                    'team37_id' => $team37_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team37_notification' => $team37_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team37' => $team37,
                    'team37_id' => $team37_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team37_notification' => $team37_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team37' => $team37,
                    'team37_id' => $team37_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team37_notification' => $team37_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select38($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team38_id=Input::get('team38_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team38 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 38)->first();
            $team38_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 38)->first();
            $team38_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 38)->first();
            
            $user_id = $user->id;
            $team38_id = $team38_id->id;
            $team38_notification = $team38_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 38)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team38' => $team38,
                    'team38_id' => $team38_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team38_notification' => $team38_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team38_id)]);
            
                return view('offence.offence38',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team38' => $team38,
                    'team38_id' => $team38_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team38_notification' => $team38_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team38' => $team38,
                    'team38_id' => $team38_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team38_notification' => $team38_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team38' => $team38,
                    'team38_id' => $team38_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team38_notification' => $team38_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select39($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team39_id=Input::get('team39_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team39 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 39)->first();
            $team39_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 39)->first();
            $team39_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 39)->first();
            
            $user_id = $user->id;
            $team39_id = $team39_id->id;
            $team39_notification = $team39_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 39)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team39' => $team39,
                    'team39_id' => $team39_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team39_notification' => $team39_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team39_id)]);
            
                return view('offence.offence39',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team39' => $team39,
                    'team39_id' => $team39_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team39_notification' => $team39_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team39' => $team39,
                    'team39_id' => $team39_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team39_notification' => $team39_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team39' => $team39,
                    'team39_id' => $team39_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team39_notification' => $team39_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select40($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team40_id=Input::get('team40_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team40 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 40)->first();
            $team40_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 40)->first();
            $team40_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 40)->first();
            
            $user_id = $user->id;
            $team40_id = $team40_id->id;
            $team40_notification = $team40_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 40)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team40' => $team40,
                    'team40_id' => $team40_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team40_notification' => $team40_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team40_id)]);
            
                return view('offence.offence40',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team40' => $team40,
                    'team40_id' => $team40_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team40_notification' => $team40_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team40' => $team40,
                    'team40_id' => $team40_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team40_notification' => $team40_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team40' => $team40,
                    'team40_id' => $team40_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team40_notification' => $team40_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select41($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team41_id=Input::get('team41_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team41 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 41)->first();
            $team41_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 41)->first();
            $team41_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 41)->first();
            
            $user_id = $user->id;
            $team41_id = $team41_id->id;
            $team41_notification = $team41_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 41)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team41' => $team41,
                    'team41_id' => $team41_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team41_notification' => $team41_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team41_id)]);
            
                return view('offence.offence41',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team41' => $team41,
                    'team41_id' => $team41_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team41_notification' => $team41_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team41' => $team41,
                    'team41_id' => $team41_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team41_notification' => $team41_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team41' => $team41,
                    'team41_id' => $team41_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team41_notification' => $team41_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select42($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team42_id=Input::get('team42_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team42 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 42)->first();
            $team42_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 42)->first();
            $team42_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 42)->first();
            
            $user_id = $user->id;
            $team42_id = $team42_id->id;
            $team42_notification = $team42_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 42)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team42' => $team42,
                    'team42_id' => $team42_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team42_notification' => $team42_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team42_id)]);
            
                return view('offence.offence42',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team42' => $team42,
                    'team42_id' => $team42_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team42_notification' => $team42_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team42' => $team42,
                    'team42_id' => $team42_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team42_notification' => $team42_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team42' => $team42,
                    'team42_id' => $team42_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team42_notification' => $team42_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select43($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team43_id=Input::get('team43_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team43 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 43)->first();
            $team43_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 43)->first();
            $team43_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 43)->first();
            
            $user_id = $user->id;
            $team43_id = $team43_id->id;
            $team43_notification = $team43_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 43)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team43' => $team43,
                    'team43_id' => $team43_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team43_notification' => $team43_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team43_id)]);
            
                return view('offence.offence43',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team43' => $team43,
                    'team43_id' => $team43_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team43_notification' => $team43_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team43' => $team43,
                    'team43_id' => $team43_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team43_notification' => $team43_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team43' => $team43,
                    'team43_id' => $team43_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team43_notification' => $team43_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select44($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team44_id=Input::get('team44_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team44 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 44)->first();
            $team44_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 44)->first();
            $team44_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 44)->first();
            
            $user_id = $user->id;
            $team44_id = $team44_id->id;
            $team44_notification = $team44_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 44)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team44' => $team44,
                    'team44_id' => $team44_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team44_notification' => $team44_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team44_id)]);
            
                return view('offence.offence44',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team44' => $team44,
                    'team44_id' => $team44_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team44_notification' => $team44_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team44' => $team44,
                    'team44_id' => $team44_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team44_notification' => $team44_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{

                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team44' => $team44,
                    'team44_id' => $team44_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team44_notification' => $team44_notification,
                ];
                
                return view ('users.show', $data);
    
            }
        }
        else {
            return redirect('welcome');  
        }
    }
    
    public function select45($id)
        {
        $data = [];
        if (\Auth::check()) {
            
            $team45_id=Input::get('team45_id');   
            
            $user = \Auth::user();
            $seats = Seat::All('id');
            
            $team45 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 45)->first();
            $team45_id = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.id')-> where('seats.id', '=', 45)->first();
            $team45_notification = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.notification')-> where('seats.id', '=', 45)->first();
            
            $user_id = $user->id;
            $team45_id = $team45_id->id;
            $team45_notification = $team45_notification->notification;
            
            $seating = DB::table('seats')->select('seats.team_id')->where('seats.id', '=', 45)->first();
            $seating = $seating->team_id;
            
            $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
            $notification = $notification->notification;
        
            $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
            $user_id_seat = $user_id_seat->id;
            
            if($user->id != $seating && $notification == 0){
            
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team45' => $team45,
                    'team45_id' => $team45_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team45_notification' => $team45_notification,
                ];
            

                DB::insert('insert into games (user_id, team_id) values (?, ?)',[intval($user_id), intval($team45_id)]);
            
                return view('offence.offence45',$data);
                
            }elseif($notification == 99){
                    
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
                    
                $user_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.user_id')->first();
                $user_id = $user_id->user_id;
                $user_name = DB::table('users')->where('id', "=" , $user_id)->select('users.name')->first();
                $user_name = $user_name->name;
                    
                $data = [
                    'user' => $user,
                    'team_name' => $team_name,
                    'user_name' => $user_name,
                ];
                    
                return view('seat.timeline',$data);
                    
            }elseif($notification == 100){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.user_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team45' => $team45,
                    'team45_id' => $team45_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team45_notification' => $team45_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }elseif($notification = 1|| 3 || 5){
            
                $team_id = DB::table('users')->join('games','users.id', '=', 'games.team_id')->orderby('games.id', 'desc')->select('games.team_id')-> where('users.id', '=', $id)->first();
                $team_id = $team_id->team_id;
                $team_name = DB::table('users')->where('id', "=" , $team_id)->select('users.name')->first();
                $team_name = $team_name->name;
              
                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team45' => $team45,
                    'team45_id' => $team45_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team45_notification' => $team45_notification,
                    'team_name' => $team_name,
                ];
                
                return view ('users.show', $data);
    
            }else{

                $data = [
                    'user' => $user,
                    'seats' => $seats,
                    'team45' => $team45,
                    'team45_id' => $team45_id,
                    'user_id' => $user_id,
                    'seating' => $seating,
                    'notification' => $notification,
                    'user_id_seat' => $user_id_seat,
                    'team45_notification' => $team45_notification,
                ];
                
                return view ('users.show', $data);
    
            }
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
