@foreach($events as $e)
  @extends('layouts.app', ['activePage' => 'attendance', 'titlePage' => __('"'.$e->event_name.'" Attendance List')])
@endforeach

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Member list attendance') }}</h4>
                <p class="card-category"> {{ __('Here you can view member that attend the events') }}</p>
              </div>
              <div class="card-body">
                @if (session('statusmember'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('statusmember') }}</span>
                      </div>
                    </div>
                  </div>
                @elseif(session('statusmembererror'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('statusmembererror') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('event.attendance') }}" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_return</i> {{ __('Back to List') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="list-attendance-table" width="100%">
                    <thead class=" text-primary text-center">
                      <th>
                        {{ __('No') }}
                      </th>
                      <th>
                        {{ __('NRA') }}
                      </th>
                      <th>
                        {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Status') }}
                      </th>
                      <th>
                        {{ __('Proof of transaction') }}
                      </th>
                      <th>
                        {{ __('Action') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                        $i = 1;
                        $st = 0;
                      @endphp
                      @foreach($users as $user)
                        @if($user->position == 'MEMBER')
                          <tr>
                            <td>
                              {{ $i++ }}
                            </td>
                            <td>
                              {{ $user->NRA }}
                            </td>
                            <td>
                              {{ $user->name }}
                            </td>
                            <td>
                              {{ $user->email }}
                            </td>
                            @if($user->status == 0)
                              <td class="text-warning">
                                {{ __('Pending') }}
                              </td>
                            @else
                              <td class="text-success">
                                {{ __('Approved') }}
                              </td>
                            @endif
                            <td>
                              @if($user->invoice)
                              <button class="btn btn-primary" onclick="
                                Swal.fire({
                                  title: 'Bukti transaksi',
                                  imageUrl: '{{ asset('storage/invoice/'.$user->invoice) }}',
                                  imageHeight: 480,
                                  imageAlt: 'Proof of transaction image'
                                })
                              ">See details</button>
                              @else
                                <p class="text-warning text-center">This user has not been upload invoice</p>
                              @endif
                            </td>
                            <td>
                              @if($user->status == 0)
                                @php
                                  $st = 1
                                @endphp
                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.event.update',[ 'user_id' => $user->user_id ,'event_id' => $user->event_id, 'status' => $st]) }}" data-original-title="" title="approve">
                                  <i class="material-icons">check</i>
                                  <div class="ripple-container"></div>
                                </a>
                              @else
                                @php
                                  $st = 0
                                @endphp
                                <form action="{{ route('user.event.destroy', [ 'user_id' => $user->user_id ,'event_id' => $user->event_id, 'invoice' => $user->invoice]) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.event.update',[ 'user_id' => $user->user_id ,'event_id' => $user->event_id, 'status' => $st]) }}" data-original-title="" title="unapprove">
                                    <i class="material-icons">close</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="delete" onclick="confirm('{{ __("Are you sure you want to delete this user from joining this event?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">delete</i>
                                      <div class="ripple-container"></div>
                                  </button>
                                </form>
                              @endif
                            </td>
                          </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Guest list attendance') }}</h4>
                <p class="card-category"> {{ __('Here you can view guest that attend the events') }}</p>
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
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="{{ route('event.attendance') }}" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_return</i> {{ __('Back to List') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="list-attendance-table2" width="100%">
                    <thead class=" text-primary text-center">
                      <th>
                        {{ __('No') }}
                      </th>
                      <th>
                        {{ __('NRA') }}
                      </th>
                      <th>
                        {{ __('Name') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $i = 1
                      @endphp
                      @foreach($users as $us)
                        @if($us->position == 'GUEST')
                        <tr>
                          <td>
                            {{ $i++ }}
                          </td>
                          <td>
                            {{ $us->NRA }}
                          </td>
                          <td>
                            {{ $us->name }}
                          </td>
                          <td>
                            {{ $us->email }}
                          </td>
                        </tr>
                        @endif
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection