@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                @if (!Auth::check())
                <h1>Zing</h1>
                <a href="{{ route('signup.get') }}" class="btn btn-default btn-ghost btn-lg">Sign Up</a>
                @else
                    <table class="seats_index">
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat1">{{ $seats->id = 1 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat4">{{ $seats->id = 4 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat7">{{ $seats->id = 7 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat10">{{ $seats->id = 10 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat13">{{ $seats->id = 13 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat16">{{ $seats->id = 16 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat19">{{ $seats->id = 19 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat22">{{ $seats->id = 22 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat25">{{ $seats->id = 25 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat28">{{ $seats->id = 28 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat31">{{ $seats->id = 31 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat34">{{ $seats->id = 34 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat37">{{ $seats->id = 37 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat40">{{ $seats->id = 40 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat43">{{ $seats->id = 43 }}</a></th>
                        </tr>
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat2">{{ $seats->id = 2 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat5">{{ $seats->id = 5 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat8">{{ $seats->id = 8 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat11">{{ $seats->id = 11 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat14">{{ $seats->id = 14 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat17">{{ $seats->id = 17 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat20">{{ $seats->id = 20 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat23">{{ $seats->id = 23 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat26">{{ $seats->id = 26 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat29">{{ $seats->id = 29 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat32">{{ $seats->id = 32 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat35">{{ $seats->id = 35 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat38">{{ $seats->id = 38 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat41">{{ $seats->id = 41 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat44">{{ $seats->id = 44 }}</a></th>
                        </tr>
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat3">{{ $seats->id = 3 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat6">{{ $seats->id = 6 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat9">{{ $seats->id = 9 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat12">{{ $seats->id = 12 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat15">{{ $seats->id = 15 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat18">{{ $seats->id = 18 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat21">{{ $seats->id = 21 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat24">{{ $seats->id = 24 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat27">{{ $seats->id = 27 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat30">{{ $seats->id = 30 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat33">{{ $seats->id = 33 }}</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat36">{{ $seats->id = 36 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat39">{{ $seats->id = 39 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat42">{{ $seats->id = 42 }}</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat45">{{ $seats->id = 45 }}</a></th>
                        </tr>
                    </table>
                    <div class ="offence">
                        <h1>team nameを攻める！！</h1>
                        <a href="" class="btn btn-default btn-ghost btn-lg game_choice">Profile</a>
                        <a href="{{ route('game.index', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_choice">Gameを選ぶ</a>
                    </div>
                    
                @endif
            </div>
        </div>
    </div>
@endsection
