@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_wait">
                <h2>Wait for a moment…</h2>
                <a href="{{ route('users.show', ['id' => $user->id])}}" class="btn btn-default btn-ghost btn-lg">Back to my profile</a>
        </div>
    </div>   
@endsection