@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>You need to buy 50 points</h2>
                <a href="{{ route('tetoris.bought', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Buy</a>
        </div>
    </div>   
@endsection