@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_result">
                <h2>game result</h2>
                @if ($user_id_score > $team_id_score)
                <h1 class = "result">Win, seat change</h1>
                <a href="{{ route('seat.update', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg">See updated seats</a>
                @else
                <h1 class = "result">Lose, no seat change</h1>
                <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg">Back seat page</a>
                @endif
        </div>
    </div>   
@endsection