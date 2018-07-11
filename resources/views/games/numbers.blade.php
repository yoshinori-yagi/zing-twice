@extends('layouts.app')

@section('content')
    <div class="cover">
        <div class = "game_index">
            <h1>Your number is …</h1>
            <div class="number_show">
                <h1>{{ $number }}</h1>
            </div>
            <a href="{{ route('game.result', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_start">Send this result</a>
        </div>
    </div>
@endsection