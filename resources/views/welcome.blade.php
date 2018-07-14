@extends('layouts.app')

@section('cover')
    <div class="cover">
                @if (!Auth::check())
                    <div class="sign_up">
                        <h1>Zing</h1>
                        <a href="{{ route('login') }}" class="btn btn-ghost btn-lg">Log in</a>
                    </div>
                @else
                    <div class ="select_teams">
                        <h2>Select team</h2>
                    </div>
                @endif
    </div>
@endsection
