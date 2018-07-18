@extends('layouts.app')

@section('content')
    <div class="cover">
        <div id="wrapper">
            <canvas id="canvas"></canvas>
            <div id="score"></div>
        </div>
        <script type = "text/javascript" src="/js/game.js">
        </script>
        <a href="{{ route('tetoris.game_result', ['id' => $user->id]) }}" class="btn btn-ghost btn-lg game_finish tetoris_fininsh">Send this result</a>
    </div>
@endsection