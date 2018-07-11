@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_result">
                <h2>game result</h2>
                <h1 class = "result">Win or Lose</h1>
                <a href="{{ route('seat.update', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg">See updated seats</a>
        </div>
    </div>   
@endsection