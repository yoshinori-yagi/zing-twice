@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-offset-3 col-xs-6">
        <div class="panel panel-default">
            <div class="panel-heading">Login Page</div>
            <div class="panel-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Team name') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! form::label('email', 'e-mail') !!}
                        {!! form::email('email', old('email'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::label('password', 'Password') !!}
                        {!! form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        <a href="{{ route('signup.get') }}">you are not registered?</a>
                        {!! form::submit('Login', ['class' => 'btn btn-default btn-ghost']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection