@extends('layouts.app')

@section('cover')

        <div class ="offence offence1">
            <h1> {{ $team1->name }} </h1>
            <a href="" class="btn btn-default btn-ghost btn-lg game_choice">Profile</a>
            <a href="{{ route('game.index', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_choice">Gameを選ぶ</a>
            <a href="" class="btn btn-default btn-ghost btn-lg close_button">閉じる</a>
        </div>

@endsection