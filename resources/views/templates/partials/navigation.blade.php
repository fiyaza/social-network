<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('home') }}">Social Network</a>
    </div>

    <div class="collapse navbar-collapse">
      @if (Auth::check())
        <ul class="nav navbar-nav">
          <li><a href="{{ route('home') }}">Timeline</a></li>
          <li><a href="{{ route('friend.index') }}">Friends</a></li>
        </ul>
        <form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
          <div class="form-group">
            <input type="text" name="query" class="form-control" placeholder="Find People">
          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </form>
      @endif
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
          <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername() }}</a></li>
          <li><a href="{{ route('profile.edit') }}">Update Profile</a>
          <li><a href="{{ route('auth.signout') }}">Sign out</a>
        @else
          <li><a href="{{ route('auth.signup') }}">Sign up</a></li>
          <li><a href="{{ route('auth.signin') }}">Sign in</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>