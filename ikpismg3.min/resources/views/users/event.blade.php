@extends('layouts.app', ['activePage' => 'memberEvent', 'titlePage' => __('Event List')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Event') }}</h4>
                <p class="card-category"> {{ __('Here you can select events') }}</p>
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
                @elseif(session('statuserror'))
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
                  <table class="table table-striped table-hover table-bordered display nowrap" id="event-table" width="100%">
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
                        {{ __('Price') }}
                      </th>
                      <th>
                        {{ __('Quota') }}
                      </th>
                      <th>
                        {{ __('Remaining') }}
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
                        {{ __('Status') }}
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
                                   ->where('status', 1)
                                   ->count();

                          $isreg = DB::table('joinedevents')
                                   ->where('event_id', $event->id)
                                   ->where('user_id', auth()->user()->id)
                                   ->count();

                          $attend = DB::table('joinedevents')
                                   ->where('event_id', $event->id)
                                   ->where('user_id', auth()->user()->id)
                                   ->get(array(
                                      'invoice',
                                      'status'
                                   ));
                        @endphp
                        <tr>
                          <td>
                            {{ $i++ }}
                          </td>
                          <td>
                            {{ $event->event_name}}
                          </td>
                          <td>
                            {{ $event->event_category}}
                          </td>
                          <td>
                            @if(auth()->user()->position == 'MEMBER')
                              {{ __('Rp. '.number_format($event->price_int)) }}
                            @else
                              {{ __('Rp. '.number_format($event->price_ext)) }}
                            @endif
                          </td>
                          <td>
                            {{ $event->quota }}
                          </td>
                          <td>
                            {{ ($event->quota - $count) }}
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
                          <td>
                            @if($isreg >= 1)
                              @foreach($attend as $att)
                                @if($att->invoice == NULL)
                                  <p class="text-warning text-center">Please upload proof</p>
                                @elseif($att->invoice == 0)
                                  <p class="text-primary text-center">Waiting approval</p>
                                @elseif($att->status == 1)
                                  <p class="text-info text-center">You have registered</p>
                                @else
                                  <p class="text-primary text-center">Waiting approval</p>
                                @endif
                              @endforeach
                            @elseif($count >= $event->quota)
                                <p class="text-danger text-center">Quota run out</p>
                            @else
                                <p class="text-success text-center">Available</p>
                            @endif
                          </td>
                          <td class="td-actions text-right">
                              <form id="invoice-form" action="{{ route('user.event.invoice', [ 'user_id' => auth()->user()->id ,'event_id' => $event->id]) }}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  @method('post')
                                  
                                  @if($isreg >= 1)
                                    @foreach($attend as $att)
                                      @if($att->status == 0)
                                        @if($att->invoice != NULL)
                                          <input id="invoice" type="file" name="invoice" accept="image/*" hidden>
                                          <a rel="tooltip" id="invoice-upload" class="btn btn-warning btn-link" data-original-title="" title="Re-Upload Invoice File">
                                            <i class="material-icons">cloud_upload</i>
                                            <div class="ripple-container"></div>
                                          </a>
                                        @else
                                          <input id="invoice" type="file" name="invoice" accept="image/*" hidden>
                                          <a rel="tooltip" id="invoice-upload" class="btn btn-warning btn-link" data-original-title="" title="Upload Invoice File">
                                            <i class="material-icons">cloud_upload</i>
                                            <div class="ripple-container"></div>
                                          </a>
                                        @endif
                                      @else
                                        <a rel="tooltip" class="btn btn-success btn-link"data-original-title="" title="success">
                                          <i class="material-icons">check</i>
                                          <div class="ripple-container"></div>
                                        </a>
                                      @endif
                                    @endforeach
                                  @elseif($count >= $event->quota)
                                    <a>
                                      <i class="text-danger material-icons">report_problem</i>
                                    </a>
                                  @else
                                    <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.event.add',[ 'user_id' => auth()->user()->id ,'event_id' => $event]) }}" data-original-title="" title="add">
                                      <i class="material-icons">add</i>
                                      <div class="ripple-container"></div>
                                    </a>
                                  @endif
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