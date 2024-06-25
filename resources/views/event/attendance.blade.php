@extends('layouts.app', ['activePage' => 'attendance', 'titlePage' => __('Event Attendance List')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">{{ __('Event Attendance') }}</h4>
              <p class="card-category"> {{ __('Here you can view member that attend the events') }}</p>
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
              <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered display nowrap" id="attendance-table" width="100%">
                  <thead class=" text-primary text-center">
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
                      {{ __('Price Internal') }}
                    </th>
                    <th>
                      {{ __('Price External') }}
                    </th>
                    <th>
                      {{ __('Quota') }}
                    </th>
                    <th>
                      {{ __('Registrant') }}
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
                    <th class="text-right">
                      {{ __('Actions') }}
                    </th>
                  </thead>
                  <tbody>
                    @php
                    $i = 1
                    @endphp
                    @foreach($events as $event)
                    @php
                      $count = DB::table('joinedevents')
                                 ->where('event_id', $event->id)
                                 ->count();
                    @endphp
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
                        {{ __('Rp. '.number_format($event->price_int)) }}
                      </td>
                      <td>
                        {{ __('Rp. '.number_format($event->price_ext)) }}
                      </td>
                      <td>
                        {{ $event->quota }}
                      </td>
                      <td>
                        {{ $count }}
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
                      <td class="td-actions text-right">
                        <form id="attachment-form" action="{{ route('user.event.attachment', [ 'event_id' => $event->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')

                            @if($count > 0)
                              <input id="attachment" type="file" name="attachment" accept="application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document,  application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-powerpoint, application/vnd.openxmlformats-officedocument.presentationml.presentation,
text/plain, application/pdf" hidden>
                              <a rel="tooltip" id="attachment-upload" class="btn btn-warning btn-link" data-original-title="" title="Upload Attachment File">
                                <i class="material-icons">cloud_upload</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('event.list', $event) }}" data-original-title="" title="view attendance">
                              <i class="material-icons">visibility</i>
                              <div class="ripple-container"></div>
                            </a>
                        </form>
                      </td>
                    </tr>
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