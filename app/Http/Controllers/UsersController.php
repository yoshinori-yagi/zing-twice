<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Seat;

use App\Game;

use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $user = User::find($id);
        
        $notification = DB::table('users')->where('id', "=" , $id)->select('users.notification')->first();
        $notification = $notification->notification;
        
        $user_id_seat = DB::table('seats')->select('seats.id')->where('team_id', '=', $id)->first();
        $user_id_seat = $user_id_seat->id;
        

        $data = [
            'user' => $user,
            'notification' => $notification,
            'user_id_seat' => $user_id_seat,
        ];

        return view('users.show', $data);
    }

    public function buy($id)
    {
        $user = User::find($id);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('users.buy', $data);
    }
    
    public function bought($id)
    {
        $user = User::find($id);
        
        $points = DB::table('users')->where('id','=', $id)->select('users.points')->first();
        $points = $points->points;
        
        $points = $points+50;
        
        DB::table('users')->where ('id','=', $id)->update(['points' => $points]);
        
        $data = [
            'user' => $user,
        ];
        
        return view ('users.bought', $data);
    }
   
}
