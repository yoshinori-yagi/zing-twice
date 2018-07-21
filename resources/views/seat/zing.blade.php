@extends('layouts.app')

@section('content')
        <div class="cover">
            <div class = "select_teams">
                <h2>about Zing</h2>
                <div class="change-btn-wrapper">
                  <h3 class="change-btn prev-btn">← Previous</h3>
                  <h3 class="change-btn next-btn">Next →</h3>
            </div>
            <ul class = "slides">
                <li class = "slide active">
                    <div class="profile_box">
                            <h2 class="profile_title">取りたい陣地を選択</h2>
                        <div class="profile_body">
                        
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h2 class="profile_title">攻める</h2>
                        <div class="profile_body">
                            <p></p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h2 class="profile_title">戦いを受ける</h2>
                        <div class="profile_body">
                            <p></p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h2 class="profile_title">陣取り</h2>
                        <div class="profile_body">
                            <p></p>
                        </div>
                    </div>
                </li>
            </ul>
                <a href="/" class="btn btn-ghost btn-lg">Back</a>
            </div>
        </div>
@endsection