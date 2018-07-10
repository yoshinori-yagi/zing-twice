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
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $seats = Seat::All('id');
            $team1 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 1)->first();
            $team2 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 2)->first();
            $team3 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 3)->first();
            $team4 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 4)->first();
            $team5 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 5)->first();
            $team6 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 6)->first();
            $team7 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 7)->first();
            $team8 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 8)->first();
            $team9 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 9)->first();
            $team10 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 10)->first();
            $team11 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 11)->first();
            $team12 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 12)->first();
            $team13 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 13)->first();
            $team14 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 14)->first();
            $team15 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 15)->first();
            $team16 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 16)->first();
            $team17 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 17)->first();
            $team18 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 18)->first();
            $team19 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 19)->first();
            $team20 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 20)->first();
            $team21 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 21)->first();
            $team22 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 22)->first();
            $team23 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 23)->first();
            $team24 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 24)->first();
            $team25 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 25)->first();
            $team26 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 26)->first();
            $team27 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 27)->first();
            $team28 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 28)->first();
            $team29 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 29)->first();
            $team30 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 30)->first();
            $team31 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 31)->first();
            $team32 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 32)->first();
            $team33 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 33)->first();
            $team34 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 34)->first();
            $team35 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 35)->first();
            $team36 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 36)->first();
            $team37 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 37)->first();
            $team38 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 38)->first();
            $team39 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 39)->first();
            $team40 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 40)->first();
            $team41 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 41)->first();
            $team42 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 42)->first();
            $team43 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 43)->first();
            $team44 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 44)->first();
            $team45 = DB::table('users')->join('seats','users.id', '=', 'seats.team_id')->select('users.name')-> where('seats.id', '=', 45)->first();
            
       
            $data = [
                'user' => $user,
                'seats' => $seats,
                'team1' => $team1,
                'team2' => $team2,
                'team3' => $team3,
                'team4' => $team4,
                'team5' => $team5,
                'team6' => $team6,
                'team7' => $team7,
                'team8' => $team8,
                'team9' => $team9,
                'team10' => $team10,
                'team11' => $team11,
                'team12' => $team12,
                'team13' => $team13,
                'team14' => $team14,
                'team15' => $team15,
                'team16' => $team16,
                'team17' => $team17,
                'team18' => $team18,
                'team19' => $team19,
                'team20' => $team20,
                'team21' => $team21,
                'team22' => $team22,
                'team23' => $team23,
                'team24' => $team24,
                'team25' => $team25,
                'team26' => $team26,
                'team27' => $team27,
                'team28' => $team28,
                'team29' => $team29,
                'team30' => $team30,
                'team31' => $team31,
                'team32' => $team32,
                'team33' => $team33,
                'team34' => $team34,
                'team35' => $team35,
                'team36' => $team36,
                'team37' => $team37,
                'team38' => $team38,
                'team39' => $team39,
                'team40' => $team40,
                'team41' => $team41,
                'team42' => $team42,
                'team43' => $team43,
                'team44' => $team44,
                'team45' => $team45,
                
            ];
        
            return view('offence.offence',$data);
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
