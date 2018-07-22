@extends('layouts.app')

@section('content')
       <div class="cover">
            <div id="wrapper">
                <canvas id="sample" width="640" height="480"></canvas>
                <button id="disp" onclick="main()" class ="btn-lg">START</button>
                <a href="{{ route('block.wait', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
            </div>
            <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">explanation</h3>
        </div>
       
@endsection