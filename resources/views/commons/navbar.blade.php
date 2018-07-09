<header>
<div class="dropdown">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-th-list"></span>
  </button>
  <!-- choices -->
  <ul class="dropdown-menu">
    @if (Auth::check())
<<<<<<< HEAD
    <li><a href="/">Timeline</a></li>
    <li><a href="#">My Page</a></li>
=======
    <li><a href="#">Timeline</a></li>
    <li><a href="{{ route('seat', ['id' => $user->id]) }}">Seats</a></li>
    <li><a href="{{ route('users.show', ['id' => $user->id])}}">My Page</a></li>
>>>>>>> 6dec784700c728c644e67ab0bdf709637b8e7d2a
    <li role="separator" class="divider"></li>
    <li><a href="{{ route('logout.get') }}">Logout</a></li>
    @else
    <li><a href="{{ route('signup.get') }}">Sign Up</a></li>
    <li><a href="{{ route('login') }}">Log in</a></li>
    @endif
  </ul>
</div>