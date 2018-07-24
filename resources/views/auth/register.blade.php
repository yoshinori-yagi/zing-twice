@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-offset-3 col-md-6 col-xs-12">
        <div class="profile_box">
            <div class="profile_title">Registration</div>
            <div class="profile_body">
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Teamname') !!}
                        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password') !!}
                        {!! Form::password('password', ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirmation') !!}
                        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                    </div>

                    <div class="text-right">
                        {!! Form::submit('Register', ['class' => 'btn-ghost btn-start']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection