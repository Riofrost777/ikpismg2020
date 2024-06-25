@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Event List')])

@if(Auth::user()->position != 'ADMIN')
  <script>window.location = "/home";</script>
@else
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Event') }}</h4>
                <p class="card-category"> {{ __('Here you can manage events') }}</p>
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
                    <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary"><i class="material-icons">event</i> {{ __('Add Event') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="event-table" width="100%">
                    <thead class=" text-primary thead-light text-center">
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
                        {{ __('Place') }}
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
                        {{ __('Event Start') }}
                      </th>
                      <th>
                        {{ __('Event End') }}
                      </th>
                      <th>
                        {{ __('SKPPL Type') }}
                      </th>
                      <th>
                        {{ __('SKPPL Point') }}
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
                          {{ $event->place }}
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
                          {{ date('d-m-Y H:i', strtotime($event->event_start)) }}
                        </td>
                        <td>
                          {{ date('d-m-Y H:i', strtotime($event->event_end)) }}
                        </td>
                        @if($event->SKPPL_type == NULL)
                          <td class="text-danger">
                            {{ __('Type not yet set') }}
                          </td>
                        @elseif($event->SKPPL_type == 0)
                          <td>
                            {{ __('Tidak Terstruktur') }}
                          </td>
                        @else
                          <td>
                            {{ __('Terstruktur') }}
                          </td>
                        @endif
                        @if($event->SKPPL == NULL)
                          <td class="text-danger">
                            {{ __('Point not set') }}
                          </td>
                        @else
                          <td>
                            {{ $event->SKPPL }}
                          </td>
                        @endif
                        <td>
                          {{ $event->description }}
                        </td>
                        <td class="td-actions text-right">
                              <form id="event-{{$event->id}}" action="{{ route('event.destroy', $event) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('event.edit', $event) }}" data-original-title="" title="edit">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  @if($count == 0)
                                  <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="delete" onclick="confirm('{{ __("Are you sure you want to delete this event?") }}') ? this.parentElement.submit() : ''">
                                  <!-- onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''" -->
                                      <i class="material-icons">delete_outline</i>
                                      <div class="ripple-container"></div>
                                  </button>
                                  @else
                                  
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
@endif