<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title>Zing</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/earlyaccess/hannari.css" rel="stylesheet">
        <script src="https://use.typekit.net/cdl6ugv.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
        
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/game.css') }}">
        
        <script type = "text/javascript" src="/js/game.js"></script>
        
    </head>
    <body>
        @include('commons.navbar3')

        @yield('cover')

        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>

        
    </body>
</html>