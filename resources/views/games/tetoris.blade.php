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
        <a href="{{ route('tetoris.wait', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
        <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
        <h3 class="information">ハイスコアを獲得して相手から席を奪うのじゃ！<br>ゲームが終了したら結果を送信するのじゃ！<br>※リフレッシュは押してはいかんぞー！</h3>
    </div>
@endsection