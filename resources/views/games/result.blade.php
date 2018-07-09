@extends('layouts.app')

@section('content')
    <div class = "game_result">
            <h1>game result</h1>
            <br><br><br><br><br>
            <h1>Win or Lose</h1>
            <a href="{{ route('seat.update', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg">陣取り結果をみる</a>
    </div>
    
@endsection