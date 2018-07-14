@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_result">
                <h2>game result</h2>
                @if ($team_id_score >= $user_id_score)
                <h1 class = "result">Win, no seat change</h1>
                <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg">Back seat page</a>
                @else
                <h1 class = "result">Lose, seat change</h1>
                <a href="{{ route('seat.update', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg">See updated seats</a>
                @endif
        </div>
    </div>   
@endsection