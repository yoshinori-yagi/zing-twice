@extends('layouts.app')

@section('content')
    <div class = "cover">    
        <div class = "game_confirm">
                <h2>Sorry, they are in battle…</h2>
                <a href="{{ route('seats.index', ['id' => $user->id])}}" class="btn btn-ghost btn-lg">Back</a>
        </div>
    </div>   
@endsection