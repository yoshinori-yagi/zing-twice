@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class ="select_teams">
            <h2 class='select-team'>Select team</h2>
            <h2 class='team1'>{{ $team1->name }}</h2>
            <h2 class='team2'>{{ $team2->name }}</h2>
            <h2 class='team3'>{{ $team3->name }}</h2>
            <h2 class='team4'>{{ $team4->name }}</h2>
            <h2 class='team5'>{{ $team5->name }}</h2>
            <h2 class='team6'>{{ $team6->name }}</h2>
            <h2 class='team7'>{{ $team7->name }}</h2>
            <h2 class='team8'>{{ $team8->name }}</h2>
            <h2 class='team9'>{{ $team9->name }}</h2>
            <h2 class='team10'>{{ $team10->name }}</h2>
            <h2 class='team11'>{{ $team11->name }}</h2>
            <h2 class='team12'>{{ $team12->name }}</h2>
            <h2 class='team13'>{{ $team13->name }}</h2>
            <h2 class='team14'>{{ $team14->name }}</h2>
            <h2 class='team15'>{{ $team15->name }}</h2>
            <h2 class='team16'>{{ $team16->name }}</h2>
            <h2 class='team17'>{{ $team17->name }}</h2>
            <h2 class='team18'>{{ $team18->name }}</h2>
            <h2 class='team19'>{{ $team19->name }}</h2>
            <h2 class='team20'>{{ $team20->name }}</h2>
            <h2 class='team21'>{{ $team21->name }}</h2>
            <h2 class='team22'>{{ $team22->name }}</h2>
            <h2 class='team23'>{{ $team23->name }}</h2>
            <h2 class='team24'>{{ $team24->name }}</h2>
            <h2 class='team25'>{{ $team25->name }}</h2>
            <h2 class='team26'>{{ $team26->name }}</h2>
            <h2 class='team27'>{{ $team27->name }}</h2>
            <h2 class='team28'>{{ $team28->name }}</h2>
            <h2 class='team29'>{{ $team29->name }}</h2>
            <h2 class='team30'>{{ $team30->name }}</h2>
            <h2 class='team31'>{{ $team31->name }}</h2>
            <h2 class='team32'>{{ $team32->name }}</h2>
            <h2 class='team33'>{{ $team33->name }}</h2>
            <h2 class='team34'>{{ $team34->name }}</h2>
            <h2 class='team35'>{{ $team35->name }}</h2>
            <h2 class='team36'>{{ $team36->name }}</h2>
            <h2 class='team37'>{{ $team37->name }}</h2>
            <h2 class='team38'>{{ $team38->name }}</h2>
            <h2 class='team39'>{{ $team39->name }}</h2>
            <h2 class='team40'>{{ $team40->name }}</h2>
            <h2 class='team41'>{{ $team41->name }}</h2>
            <h2 class='team42'>{{ $team42->name }}</h2>
            <h2 class='team43'>{{ $team43->name }}</h2>
            <h2 class='team44'>{{ $team44->name }}</h2>
            <h2 class='team45'>{{ $team45->name }}</h2>
            <div class = "seats_index">
                <ul class = "tribe_index">
                    <li class = "btn btn-lg tribe_index_red">red</li>
                    <li class = "btn btn-lg tribe_index_yellow">yellow</li>
                    <li class = "btn btn-lg tribe_index_pink">pink</li>
                    <li class = "btn btn-lg tribe_index_purple">purple</li>
                </ul>
                <table class="tribe tribe_red">
                    <tr>
                        <th><a href="{{ route('offence.select', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat1">1</a></th><th><a href="{{ route('offence.select4', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat4">4</a></th><th><a href="{{ route('offence.select7', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat7">7</a></th> 
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select2', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat2">2</a></th><th><a href="{{ route('offence.select5', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat5">5</a></th><th><a href="{{ route('offence.select8', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat8">8</a></th> 
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select3', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat3">3</a></th><th><a href="{{ route('offence.select6', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat6">6</a></th><th><a href="{{ route('offence.select9', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat9">9</a></th> 
                    </tr>
                </table>
                <table class="tribe tribe_yellow">
                    <tr>
                        <th><a href="{{ route('offence.select10', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat10">10</a></th><th><a href="{{ route('offence.select13', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat13">13</a></th><th><a href="{{ route('offence.select16', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat16">16</a></th><th><a href="{{ route('offence.select19', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat19">19</a></th>
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select11', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat11">11</a></th><th><a href="{{ route('offence.select14', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat14">14</a></th><th><a href="{{ route('offence.select17', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat17">17</a></th><th><a href="{{ route('offence.select20', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat20">20</a></th> 
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select12', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat12">12</a></th><th><a href="{{ route('offence.select15', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat15">15</a></th><th><a href="{{ route('offence.select18', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat18">18</a></th><th><a href="{{ route('offence.select21', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat21">21</a></th> 
                    </tr>
                </table>
                <table class="tribe tribe_pink">
                    <tr>
                        <th><a href="{{ route('offence.select22', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat22">22</a></th><th><a href="{{ route('offence.select25', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat25">25</a></th><th><a href="{{ route('offence.select28', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat28">28</a></th><th><a href="{{ route('offence.select31', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat31">31</a></th>
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select23', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat23">23</a></th><th><a href="{{ route('offence.select26', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat26">26</a></th><th><a href="{{ route('offence.select29', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat29">29</a></th><th><a href="{{ route('offence.select32', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat32">32</a></th> 
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select24', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat24">24</a></th><th><a href="{{ route('offence.select27', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat27">27</a></th><th><a href="{{ route('offence.select30', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat30">30</a></th><th><a href="{{ route('offence.select33', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat33">33</a></th> 
                    </tr>
                </table>
                <table class="tribe tribe_purple">
                    <tr>
                        <th><a href="{{ route('offence.select34', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat34">34</a></th><th><a href="{{ route('offence.select37', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat37">37</a></th><th><a href="{{ route('offence.select40', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat40">40</a></th><th><a href="{{ route('offence.select43', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat43">43</a></th>
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select35', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat35">35</a></th><th><a href="{{ route('offence.select38', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat38">38</a></th><th><a href="{{ route('offence.select41', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat41">41</a></th><th><a href="{{ route('offence.select44', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat44">44</a></th> 
                    </tr>
                    <tr>
                        <th><a href="{{ route('offence.select36', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat36">36</a></th><th><a href="{{ route('offence.select39', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat39">39</a></th><th><a href="{{ route('offence.select42', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat42">42</a></th><th><a href="{{ route('offence.select45', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat45">45</a></th>
                    </tr>
                </table>
            </div>
            <a><img src="{{ secure_asset("images/character.jpg") }}" alt="" class="character"></a>
            <h3 class="information">Tribeの中から席を交換したいScrumを選択して、挑戦状を送るのじゃ！</h3>
        </div>
    </div>
@endsection