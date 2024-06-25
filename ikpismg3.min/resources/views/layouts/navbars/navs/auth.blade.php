<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="#">{{ $titlePage }}</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      @if(date("H:i", time()) > date("06:00") && date("H:i", time()) < date("11:00") )
      <a class="nav-item text-primary">Good Morning, {{ Auth::user()->name }}</a>
      @elseif(date("H:i", time()) > date("11:01") && date("H:i", time()) < date("18:00") )
      <a class="nav-item text-primary">Good Afternoon, {{ Auth::user()->name }}</a>
      @else
      <a class="nav-item text-primary">Good Evening, {{ Auth::user()->name }}</a>
      @endif
      <form class="navbar-form">
        
      </form>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">account_circle</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            @if(Auth::user()->position == 'ADMIN')
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <div class="dropdown-divider"></div>
            @endif
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
