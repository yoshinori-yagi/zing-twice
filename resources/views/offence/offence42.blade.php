@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class ="offence">
            @if($team42_notification == 0)
            <h2> Attack </h2><br><h1>{{ $team42->name }} </h1>
            <a href="{{ route('game.index', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_choice">Select Games</a>
            <a href="{{ route('seat', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg close_button">Close</a>
            @else
            <h2>Sorry, they are in battle…</h2>
            <a href="{{ route('seat', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Back</a>
            @endif
        </div>
    </div>
@endsection