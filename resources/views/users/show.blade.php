@extends('layouts.app')

@section('content')
    <div class = "cover">
         <div class="row">
            <aside class="col-xs-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Seat number</h3>
                    </div>
                    <div class="panel-body">
                        <h2>{{ $user_id_seat }}</h2>
                        <br>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Points</h3>
                    </div>
                    <div class="panel-body">
                        <h3>{{ $user->points }} points</h3>
                    </div>
                </div>
            </aside>
            
            <div class="col-xs-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Team Name</h3>
                    </div>
                    <div class="panel-body">
                        <h2>{{ $user->name }}</h2>
                    </div>
                </div>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Notification</h3>
                    </div>
                    <div class="panel-body">
                        <br>
                        @if($notification == 0)
                        <br><br><br>
                        @elseif($notification == 1)
                        <h3>You are under attack.</h3>
                        <a href="{{ route('game.confirm', ['id' => $user->id])}}" class="btn btn-default btn-ghost btn-lg">Start game</a>
                        @else($notification == 2)
                        <h3>Game finished.</h3>
                        <a href="{{ route('game.result_after', ['id' => $user->id])}}" class="btn btn-default btn-ghost btn-lg">See result</a>
                        @endif
                    </div>
                </div>
                
            
            </div>
        </div>
    </div>
@endsection