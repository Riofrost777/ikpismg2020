@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      @if(Auth::user()->position == 'ADMIN')
      @php
        $countMember = DB::table('users')
                        ->where('position', '=' , 'MEMBER')
                        ->count();

        $countGuest = DB::table('users')
                        ->where('position', '=' , 'GUEST')
                        ->count();                        

        $countEvent = DB::table('events')
                        ->count();
      @endphp
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">people</i>
              </div>
              <p class="card-category">Member</p>
              <h3 class="card-title">{{ $countMember }}
                <!-- <small>person</small> -->
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-warning">people</i>
                <a href="{{ route('user.index') }}">Show details...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">event</i>
              </div>
              <p class="card-category">Event</p>
              <h3 class="card-title">{{ $countEvent }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-success">date_range</i>
                <a href="{{ route('event.index') }}">Show details...</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">emoji_people</i>
              </div>
              <p class="card-category">Guest</p>
              <h3 class="card-title">{{ $countGuest }}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons text-danger">emoji_people</i>
                <a href="{{ route('event.index') }}">Show details...</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
      <div class="row">
        @if(auth()->user()->position == 'MEMBER' || auth()->user()->position == 'GUEST')
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Event Attendance</h4>
              <p class="card-category">Display all event attendance</p>
            </div>
            <div class="card-body">
              @if (session('status'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-success">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('status') }}</span>
                    </div>
                  </div>
                </div>
              @endif
              @if (session('statuserror'))
                <div class="row">
                  <div class="col-sm-12">
                    <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                      </button>
                      <span>{{ session('statuserror') }}</span>
                    </div>
                  </div>
                </div>
              @endif

              <div class="row">
      @foreach($events as $event)
          <div class="col-sm-3 ">
              <div class="card-columns-fluid">
                  <div class="card  bg-dark">
                      <img class="card-img-top"  src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17b2384db09%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17b2384db09%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1875%22%20y%3D%2296.2015625%22%3EImage%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">

                      <div class="card-body">
                          <h3 class="card-title text-warning"><b>{{ $event->event_name }}</b></h3>
                          <h5 class="card-text ev-cat"><b>{{ $event->event_category }}</b></h5>
                          <i class="material-icons">attach_money</i>
                          <p class="card-text ev-price">
                            @if(auth()->user()->position == 'MEMBER')
                              {{ __('Rp. '.number_format($event->price_int)) }}
                            @else
                              {{ __('Rp. '.number_format($event->price_ext)) }}
                            @endif
                          </p>
                            <span class="material-icons">place</span>
                            @if(strlen($event->place) >= 40)
                            <p>{{ __(substr($event->place,0,40).'...') }}</p>
                            @else
                            <p>{{ $event->place }}</p>
                            @endif
                          <i class="material-icons">schedule</i>
                          <span>  
                            <p class="card-text"><i class="material-icons text-success">play_arrow</i>{{ __(' '.date('d M Y H:i', strtotime($event->event_start))) }}</p>
                          </span>  
                          <p class="card-text"><i class="material-icons text-danger">stop</i>{{ __(' '.date('d M Y H:i', strtotime($event->event_end))) }}</p>
                          <!-- <p class="card-text text-danger">test</p> -->
                          <a href="#" class="btn btn-primary">Full Details</a>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
      </div>

              <!-- <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered display nowrap" id="user-table">
                  <thead class="text-primary">
                    <th>
                      {{ __('No') }}
                    </th>
                    <th>
                      {{ __('Event Name') }}
                    </th>
                    <th>
                      {{ __('Event Category') }}
                    </th>
                    <th>
                      {{ __('Price') }}
                    </th>
                    <th>
                      {{ __('Event Start') }}
                    </th>
                    <th>
                      {{ __('Event End') }}
                    </th>
                    <th>
                      {{ __('Description') }}
                    </th>
                    <th>
                      {{ __('Attachment') }}
                    </th>
                    <th>
                      {{ __('Status') }}
                    </th>
                  </thead>
                  <tbody>
                    @php
                      $i = 1
                    @endphp
                    @foreach($events as $event)
                      <tr>
                        <td>
                          {{ $i++ }}
                        </td>
                        <td>
                          {{ $event->event_name }}
                        </td>
                        <td>
                          {{ $event->event_category }}
                        </td>
                        <td>
                        @if(auth()->user()->position == 'MEMBER')
                          {{ __('Rp. '.number_format($event->price_int)) }}
                        @else
                          {{ __('Rp. '.number_format($event->price_ext)) }}
                        @endif
                        </td>
                        <td>
                          {{ date('d-m-Y H:i', strtotime($event->event_start)) }}
                        </td>
                        <td>
                          {{ date('d-m-Y H:i', strtotime($event->event_end)) }}
                        </td>
                        <td>
                          {{ $event->description }}
                        </td>
                        @if($event->status == 0)
                          <td class="text-warning">
                            {{ __('You are not allowed to see this file') }}
                          </td>
                        @else
                          @if($event->attachment == NULL)
                            <td class="text-warning">
                            {{ __('No file attachment') }}
                            </td>
                          @else
                            <td>
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ asset('storage/docs/'.$event->attachment) }}" data-original-title="" title="Download File">
                                <i class="material-icons">cloud_download</i>
                                <div class="ripple-container"></div>
                              </a>
                            </td>
                          @endif
                        @endif
                        @if($event->status == 0)
                          <td class="text-warning">
                            {{ __('Pending. Wait a purchase or approval') }}
                          </td>
                        @else
                          <td class="text-success">
                            {{ __('Successful joined') }}
                          </td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div> -->
            </div>
          </div>
        </div>
        @endif
      </div>

      <!-- <div class="row">
      @foreach($events as $event)
          <div class="col-sm-3 ">
              <div class="card-columns-fluid">
                  <div class="card  bg-dark">
                      <img class="card-img-top"  src=" data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22286%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20286%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17b2384db09%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17b2384db09%22%3E%3Crect%20width%3D%22286%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22107.1875%22%20y%3D%2296.2015625%22%3E286x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" alt="Card image cap">

                      <div class="card-body">
                          <h5 class="card-title"><b>{{ $event->event_name }}</b></h5>
                          <p class="card-text ev-cat"><b>{{ $event->event_category }}</b></p>
                          <p class="card-text ev-price">
                            @if(auth()->user()->position == 'MEMBER')
                              {{ __('Rp. '.number_format($event->price_int)) }}
                            @else
                              {{ __('Rp. '.number_format($event->price_ext)) }}
                            @endif
                          </p>
                          <span>  
                            <i class="material-icons">schedule</i>
                          </span>
                            <p class="card-text">{{ date('d-m-Y H:i', strtotime($event->event_start)) }}</p>
                          <p class="card-text">{{ date('d-m-Y H:i', strtotime($event->event_end)) }}</p>
                          <p class="card-text"></p>
                          <p class="card-text"></p>
                          <a href="#" class="btn btn-primary">Full Details</a>
                      </div>
                  </div>
              </div>
          </div>
      @endforeach
      </div> -->

    </div>
  </div>
@endsection