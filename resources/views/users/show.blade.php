@extends('layouts.app')

@section('content')
     <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Team Name</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="" alt="">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Now</h3>
                </div>
                <div class="panel-body">
                <img class="media-object img-rounded img-responsive" src="" alt="">
                </div>
            </div>
        </aside>
        
        <div class="col-xs-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Team Members</h3>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Notification</h3>
                </div>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Points</h3>
                </div>
            </div>
        
        </div>
        @if (Auth::user()->id != $user->id)
        <a href="{{ route('add.info') }}" class="btn btn-default btn-ghost btn-lg">攻める！！</a>
        @endif
    </div>
    
@endsection