@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_now">
                <h2>Game Now</h2>
                <h3 class="timeline">{{ $user_name }} vs {{ $team_name }}</h3>
                <h2>please wait</h2>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">My Page</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">マイページにいくのじゃ</h3>
        </div>
    </div>   
@endsection