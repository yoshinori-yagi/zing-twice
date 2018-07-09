@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                @if (!Auth::check())
                <h1>Zing</h1>
                <a href="{{ route('signup.get') }}" class="btn btn-default btn-ghost btn-lg">Sign Up</a>
                @else
                    <table class="seats_index">
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat1">1</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat4">4</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat7">7</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat10">10</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat13">13</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat16">16</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat19">19</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat22">22</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat25">25</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat28">28</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat31">31</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat34">34</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat37">37</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat40">40</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat43">43</a></th>
                        </tr>
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat2">2</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat5">5</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat8">8</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat11">11</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat14">14</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat17">17</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat20">20</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat23">23</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat26">26</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat29">29</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat32">32</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat35">35</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat38">38</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat41">41</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat44">44</a></th>
                        </tr>
                        <tr>
                            <th><a href="#" class="btn btn-default btn-ghost btn-md seat seat3">3</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat6">6</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat9">9</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat12">12</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat15">15</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat18">18</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat21">21</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat24">24</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat27">27</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat30">30</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat33">33</a></th><th>    </th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat36">36</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat39">39</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat42">42</a></th><th><a href="#" class="btn btn-default btn-ghost btn-md seat seat45">45</a></th>
                        </tr>
                    </table>
                    <div class ="offence">
                        <h1>team nameを攻める！！</h1>
                        <a href="" class="btn btn-default btn-ghost btn-lg game_choice">Profile</a>
                        <a href="{{ route('game.index', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-lg game_choice">Gameを選ぶ</a>
                        <a href="" class="btn btn-default btn-ghost btn-lg close_button">閉じる</a>
                    </div>
                    
                @endif
            </div>
        </div>
    </div>
@endsection
