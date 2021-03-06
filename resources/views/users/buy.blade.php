@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Do you buy 50 points?</h2>
                <a href="{{ route('users.bought', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Buy</a>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Not buy</a>
        </div>
    </div>   
@endsection