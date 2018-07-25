@extends('layouts.app')

@section('content')
    <div class="cover">
        <div class = "aside col-xs-2">
            <h2>Time:</h2><h2 id ="time"></h2>
            <h2>Score:</h2><h2 id="score"></h2>
        </div>
        <div id="wrapper col-xs-10 tetoris">
            <div id = "speedup"></div>
            <canvas id="canvas"></canvas>
        </div>
        <div class="tetoris_buttons">
            <input class = "tetoris_btn tetoris_turn" type="button" value="↻" onclick="myfunc1()">
            <input class = "tetoris_btn tetoris_left" type="button" value="⇐" onclick="myfunc2()">
            <input class = "tetoris_btn tetoris_right" type="button" value="⇒" onclick="myfunc3()">
            <input class = "tetoris_btn tetoris_down" type="button" value="⇓" onclick="myfunc4()">
        </div>
        <script type = "text/javascript" src="/js/game.js">
        </script>
        <a href="{{ route('practice', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Retry</a>
        <a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Back</a>
        <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
        <h3 class="information">練習に励むのじゃ</h3>
    </div>
@endsection