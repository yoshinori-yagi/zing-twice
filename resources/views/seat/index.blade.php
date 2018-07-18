@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class ="select_teams">
            <h2>Select team</h2>
            <table class="seats_index">
                <tr>
                    <th><a href="{{ route('offence.select', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat1">1</a></th><th><a href="{{ route('offence.select4', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat4">4</a></th><th><a href="{{ route('offence.select7', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat7">7</a></th><th>    </th><th><a href="{{ route('offence.select10', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat10">10</a></th><th><a href="{{ route('offence.select13', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat13">13</a></th><th><a href="{{ route('offence.select16', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat16">16</a></th><th><a href="{{ route('offence.select19', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat19">19</a></th><th>    </th><th><a href="{{ route('offence.select22', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat22">22</a></th><th><a href="{{ route('offence.select25', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat25">25</a></th><th><a href="{{ route('offence.select28', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat28">28</a></th><th><a href="{{ route('offence.select31', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat31">31</a></th><th>    </th><th><a href="{{ route('offence.select34', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat34">34</a></th><th><a href="{{ route('offence.select37', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat37">37</a></th><th><a href="{{ route('offence.select40', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat40">40</a></th><th><a href="{{ route('offence.select43', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat43">43</a></th>
                </tr>
                <tr>
                    <th><a href="{{ route('offence.select2', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat2">2</a></th><th><a href="{{ route('offence.select5', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat5">5</a></th><th><a href="{{ route('offence.select8', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat8">8</a></th><th>    </th><th><a href="{{ route('offence.select11', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat11">11</a></th><th><a href="{{ route('offence.select14', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat14">14</a></th><th><a href="{{ route('offence.select17', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat17">17</a></th><th><a href="{{ route('offence.select20', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat20">20</a></th><th>    </th><th><a href="{{ route('offence.select23', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat23">23</a></th><th><a href="{{ route('offence.select26', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat26">26</a></th><th><a href="{{ route('offence.select29', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat29">29</a></th><th><a href="{{ route('offence.select32', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat32">32</a></th><th>    </th><th><a href="{{ route('offence.select35', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat35">35</a></th><th><a href="{{ route('offence.select38', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat38">38</a></th><th><a href="{{ route('offence.select41', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat41">41</a></th><th><a href="{{ route('offence.select44', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat44">44</a></th>
                </tr>
                <tr>
                    <th><a href="{{ route('offence.select3', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat3">3</a></th><th><a href="{{ route('offence.select6', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat6">6</a></th><th><a href="{{ route('offence.select9', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat red seat9">9</a></th><th>    </th><th><a href="{{ route('offence.select12', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat12">12</a></th><th><a href="{{ route('offence.select15', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat15">15</a></th><th><a href="{{ route('offence.select18', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat18">18</a></th><th><a href="{{ route('offence.select21', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat yellow seat21">21</a></th><th>    </th><th><a href="{{ route('offence.select24', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat24">24</a></th><th><a href="{{ route('offence.select27', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat27">27</a></th><th><a href="{{ route('offence.select30', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat30">30</a></th><th><a href="{{ route('offence.select33', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat pink seat33">33</a></th><th>    </th><th><a href="{{ route('offence.select36', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat36">36</a></th><th><a href="{{ route('offence.select39', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat39">39</a></th><th><a href="{{ route('offence.select42', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat42">42</a></th><th><a href="{{ route('offence.select45', ['id' => $user->id]) }}" class="btn btn-default btn-ghost btn-md seat purple seat45">45</a></th>
                </tr>
            </table>
        </div>
    </div>
@endsection