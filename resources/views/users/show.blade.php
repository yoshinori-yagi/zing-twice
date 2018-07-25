<head>
    <link rel="stylesheet" type="text/css" href="button.php" /> 
</head>
@extends('layouts.app')

@section('content')
    <div class = "cover">
         <div class="row">
            <aside class="col-xs-12 col-md-4">
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">seat number</h3>
                    </div>
                    <div class="profile_body">
                        <h2><a href="{{ route('seat', ['id' => $user->id])}}"><span class="profile_link">{{ $user_id_seat }}</span></a></h2>
                        <table class="seats_mini">
                            <tr>
                                <th class="btn  btn-ghost btn-md seat_mini  seat_mini1"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini4"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini7"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini10"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini13"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini16"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini19"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini22"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini25"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini28"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini31"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini34"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini37"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini40"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini43"></th>
                            </tr>
                            <tr>
                                <th class="btn  btn-ghost btn-md seat_mini  seat_mini2"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini5"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini8"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini11"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini14"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini17"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini20"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini23"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini26"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini29"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini32"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini35"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini38"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini41"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini44"></th>
                            </tr>
                            <tr>
                                <th class="btn  btn-ghost btn-md seat_mini  seat_mini3"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini6"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini9"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini12"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini15"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini18"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini21"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini24"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini27"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini30"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini33"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini36"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini39"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini42"></th><th class="btn  btn-ghost btn-md seat_mini  seat_mini45"></th>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Points</h3>
                    </div>
                    <div class="profile_body">
                        <h3><a href="{{ route('users.buy', ['id' => $user->id])}}"><span class="profile_link">{{ $user->points }} points</span></a></h3>
                    </div>
                </div>
            </aside>
            
            <div class="col-xs-12 col-md-8">
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Team Name</h3>
                    </div>
                    <div class="profile_body">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                
                <div class="profile_box">
                    <div class="panel-heading">
                        <h3 class="profile_title">Message</h3>
                    </div>
                    <div class="profile_body">
                        @if($notification == 0)
                        <br>
                        @elseif($notification == 1)
                        <h3>You are under attack.
                        <a href="{{ route('game.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start numbers game</a>
                        </h3>
                        @elseif($notification == 2)
                        <h3>Game finished.
                        <a href="{{ route('game.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 3)
                        <h3>You are under attack.
                        <a href="{{ route('tetoris.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start tetoris game</a>
                        </h3>
                        @elseif($notification == 4)
                        <h3>Game finished.
                        <a href="{{ route('tetoris.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 5)
                        <h3>You are under attack.
                        <a href="{{ route('block.confirm', ['id' => $user->id])}}" class="btn btn-ghost btn-start profile_btn">Start block game</a>
                        </h3>
                        @elseif($notification == 6)
                        <h3>Game finished.
                        <a href="{{ route('block.result_after', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">See result</a>
                        </h3>
                        @elseif($notification == 10)
                        <h3>Your attack refused. 
                        <a href="{{ route('refused', ['id' => $user->id])}}" class="btn btn-ghost btn-lg profile_btn">Go</a>
                        </h3>
                        @elseif($notification == 99)
                        <h3>Game now. please wait. </h3>
                        @else($notification == 100)
                        <h3>Game haven't finished. (vs {{ $team_name }})</h3>
                        <h3>Wait for a moment.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
            <a href = "{{ route('seat') }}"><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">Messageを確認するのじゃ！</h3>
    </div>
@endsection