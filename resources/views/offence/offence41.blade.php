@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class ="offence">
            <h2> Attack </h2><br><h1>{{ $team41->name }} </h1>
            <a href="{{ route('game.index', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_choice">Select Games</a>
            <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg close_button">Close</a>
        </div>
    </div>
@endsection