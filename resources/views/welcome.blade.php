@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>Zing</h1>
                @if (!Auth::check())
                <a href="{{ route('signup.get') }}" class="btn btn-default btn-ghost btn-lg">Sign Up</a>
                @endif
            </div>
        </div>
    </div>
@endsection