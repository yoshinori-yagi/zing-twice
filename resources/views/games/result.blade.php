@extends('layouts.app')

@section('content')
    <div class = "game_result">
            <h1>game result</h1>
            <div></div>
            <a href="{{ route('seat.update', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg">陣取り結果をみる</a>
    </div>
    
@endsection