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
                        <img class="media-object img-rounded img-responsive" src="" alt="">
                        <br>
                        <br>
                        <br>
                        <br>
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
                        <a href="{{ route('game.confirm', ['id' => $user->id])}}" class="btn btn-default btn-ghost btn-lg">Start game</a>
                        <a href="{{ route('seat.update', ['id' => $user->id])}}" class="btn btn-default btn-ghost btn-lg">See result</a>
                    </div>
                </div>
                
            
            </div>
        </div>
    </div>
@endsection