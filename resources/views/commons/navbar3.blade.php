<header>
  <div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
        <ul>
          @if (Auth::check())
            <li><a href="#"><span class="nav-text">Timeline</span></a></li>
            <li><a href="{{ route('seat', ['id' => $user->id]) }}"><span class="nav-text">Seats</span></a></li>
            <li><a href="{{ route('users.show', ['id' => $user->id])}}"><span class="nav-text">My Page</span></a></li>
            <li><a href="{{ route('users.buy', ['id' => $user->id])}}"><span class="nav-text">Buy points</span></a></li>
            <li><a href="{{ route('logout.get') }}"><span class="nav-text">Log out</span></a></li>
          @else
            <li><a href="{{ route('signup.get') }}"><span class="nav-text">Sign Up</span></a></li>
            <li><a href="{{ route('login') }}"><span class="nav-text">Log in</span></a></li>
          @endif
      </ul>
    </div>
  </div>
</header>