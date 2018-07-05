@extends('layouts.app')

@section('content')
    <div class = "game_show">
            <h1>game</h1>
            <div></div>
            <a href="{{ route('game.result') }}" class="btn btn-default btn-ghost btn-lg">対戦結果をみる</a>
    </div>
    
@endsection