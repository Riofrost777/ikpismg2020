<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <img class="logo-normal" src="{{ asset('material') }}/img/IKPI_SEMARANG_NEW_BLACK.png" style="width: 60%; margin-left: 20%; margin-right: 20%" />
    <!-- <a class="simple-text logo-normal">
      {{ __('IKPI Semarang') }}
    </a> -->
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          @if(Auth::user()->position == 'ADMIN')
            <p>{{ __('Admin Dashboard') }}</p>
          @else
            <p>{{ __('Dashboard') }}</p>
          @endif
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#userMan" aria-expanded="true">
          <i class="material-icons">face<!-- <img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"> --></i>
          <p>{{ __('User Management') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="userMan">
          <ul class="nav">
            @if(Auth::user()->position == 'ADMIN')
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <!-- <span class="sidebar-mini"> MM </span> -->
                <i class="material-icons">people</i>
                <span class="sidebar-normal"> {{ __('Member Management') }} </span>
              </a>
            </li>
            @else
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <!-- <span class="sidebar-mini"> UP </span> -->
                <i class="material-icons">account_circle</i>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            @endif
          </ul>
        </div>
      </li>
      @if(Auth::user()->position == 'ADMIN')
      <li class="nav-item{{ $activePage == 'event' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('event.index') }}">
          <i class="material-icons">event_note</i>
            <p>{{ __('Event Setup') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'attendance' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('event.attendance') }}">
          <i class="material-icons">event_available</i>
          <p>{{ __('Event Attendance') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'article-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('articles.index') }}">
          <i class="fa fa-newspaper-o"></i>
          <p>{{ __('Articles Setup') }}</p>
        </a>
      </li>
      
      @else
      <li class="nav-item{{ $activePage == 'memberEvent' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.event', ['user_id' => Auth::user()->id]) }}">
          <i class="material-icons">event_note</i>
            <p>{{ __('Upcoming Event List') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'PPL' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.ppl') }}">
          <i class="material-icons">description</i>
            <p>{{ __('PPL') }}</p>
        </a>
      </li>
      @endif
      <!-- 
      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('map') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('notifications') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('language') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>
      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('upgrade') }}">
          <i class="material-icons">unarchive</i>
          <p>{{ __('Upgrade to PRO') }}</p>
        </a>
      </li> 
      -->
    </ul>
  </div>
</div>