@extends('layouts.app')

@section('content')
        <div class="cover">
            <div class = "select_teams">
                <h2>Updated</h2>
                <a href="{{ route('seat') }}" class="btn btn-ghost btn-lg">Finish, go to seat page.</a>
                <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
                <h3 class="information">explanation</h3>
            </div>
        </div>
    
@endsection