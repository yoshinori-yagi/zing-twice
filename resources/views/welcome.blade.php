@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                @if (!Auth::check())
                <h1>Zing</h1>
                <a href="{{ route('signup.get') }}" class="btn btn-default btn-ghost btn-lg">Sign Up</a>
                @else
                    @foreach($seats as $seat)
                    <a href="" class="btn btn-default btn-ghost btn-md seat seat{!! $seat->id !!}">{!! ($seat->id) !!}</a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection