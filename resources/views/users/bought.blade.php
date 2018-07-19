@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Thank you!!</h2>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Back</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">explanation</h3>
        </div>
    </div>   
@endsection