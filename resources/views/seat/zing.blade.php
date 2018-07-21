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
                            <h3 class="profile_title">取りたい陣地を選択</h3>
                        <div class="profile_body">
                            <p>このアプリの目的は行きたい場所にいるチームと席を合法的に入れ替わること。</p>
                            <p>まずは座席の一覧ページで入れ替わりたい場所を選択。</p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h3 class="profile_title">攻める</h3>
                        <div class="profile_body">
                            <p>攻撃の際には10ポイントを消費する。</p>
                            <p>対戦するチームを選択したら、数あるゲームから好きなものを選択。</p>
                            <p>ゲームが終了したら、相手に通知が届くので双方がゲームを終了するのを待つ。</p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h3 class="profile_title">戦いを受ける</h3>
                        <div class="profile_body">
                            <p>マイページに挑戦状が届いたら、戦いを受けるか断るかを選択。</p>
                            <p>戦いを断る際にも、10ポイントを消費する。</p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h3 class="profile_title">陣取り</h3>
                        <div class="profile_body">
                            <p>攻め手のゲームスコアが戦いを受けた側のスコアを上回った場合にのみ席の入れ替えが起きる。</p>
                            <p>嫌な席に来てしまったら、次の戦いを申し込もう。</p>
                        </div>
                    </div>
                </li>
                <li class= "slide">
                    <div class="profile_box">
                            <h3 class="profile_title">その他</h3>
                        <div class="profile_body">
                            <p>マイページでは現在いる場所や戦いに関する通知、そしてポイントの確認・購入(50ポイント＝100円)ができる。</p>
                        </div>
                    </div>
                </li>
            </ul>
                <a href="/" class="btn btn-ghost btn-lg">Back</a>
            </div>
        </div>
@endsection