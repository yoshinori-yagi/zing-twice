@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Refused</h2>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Back</a>
        </div>
    </div>   
@endsection