<header>
<div class="dropdown">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-th-list"></span>
  </button>
  <!-- choices -->
  <ul class="dropdown-menu">
    @if (Auth::check())
    <li><a href="/">Timeline</a></li>
    <li><a href="#">My Page</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="{{ route('logout.get') }}">Logout</a></li>
    @else
    <li><a href="{{ route('signup.get') }}">Sign Up</a></li>
    <li><a href="{{ route('login') }}">Log in</a></li>
    @endif
  </ul>
</div>