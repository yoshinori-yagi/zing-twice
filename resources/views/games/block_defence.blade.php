@extends('layouts.app')

@section('content')
       <div class="cover">
            <div id="wrapper">
                <canvas id="sample" width="640" height="480"></canvas>
                <button id="disp" onclick="main()" class ="btn-lg block_start">START</button>
                <a href="{{ route('block.game_result', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
            </div>
            <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">ハイスコアを獲得して相手から席を守るのじゃ！<br>ゲームが終了したら結果を送信するのじゃ！</h3>
        </div>
@endsection