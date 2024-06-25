@extends('layouts.app', ['activePage' => 'PPL', 'titlePage' => __('PPL Report')])
@if(Auth::user()->position != 'MEMBER')
  <script>
  window.location = "/home";
  </script>
@else
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title" id="ppls">{{ __('PPL Terstruktur') }}</h4>
                <p class="card-category"> {{ __('Here you can view your structured PPL report') }}</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="user-ppls-table" width="100%">
                    <thead class=" text-primary thead-light text-center">
                      <th>
                        {{ __('No') }}
                      </th>
                      <th>
                        {{ __('Event Name') }}
                      </th>
                      <th>
                        {{ __('Date') }}
                      </th>
                      <th>
                        {{ __('Place') }}
                      </th>
                      <th>
                        {{ __('SKPPL Point') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $i = 1;
                      $PPL_total = 0;
                      @endphp
                      @foreach($events as $event)
                        @if($event->SKPPL_type == 1 && $event->status == 1)
                        <tr>
                          <td>
                            {{ $i++ }}
                          </td>
                          <td>
                            {{ $event->event_name }}
                          </td>
                          <td>
                            {{ date('j F Y', strtotime($event->event_start)) }}
                          </td>
                          <td>
                            {{ $event->place }}
                          </td>
                          <td>
                            {{ $event->SKPPL }}
                          </td>
                        </tr>
                        @php
                          $PPL_total += $event->SKPPL;
                        @endphp
                        @endif
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center font-weight-bold">
                          {{ __('Structured SKPPL Point TOTAL') }}
                        </td>
                        <td class="font-weight-bold">
                          {{ $PPL_total }}
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-warning">
                <h4 class="card-title" id="pplus">{{ __('PPL Tidak Terstruktur') }}</h4>
                <p class="card-category"> {{ __('Here you can view your unstructured PPL report') }}</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="user-pplus-table" width="100%">
                    <thead class=" text-primary thead-light text-center">
                      <th>
                        {{ __('No') }}
                      </th>
                      <th>
                        {{ __('Event Name') }}
                      </th>
                      <th>
                        {{ __('Date') }}
                      </th>
                      <th>
                        {{ __('Place') }}
                      </th>
                      <th>
                        {{ __('SKPPL Point') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $i = 1;
                      $PPL_total = 0;
                      @endphp
                      @foreach($events as $event)
                        @if($event->SKPPL_type == 0 && $event->status == 1)
                        <tr>
                          <td>
                            {{ $i++ }}
                          </td>
                          <td>
                            {{ $event->event_name }}
                          </td>
                          <td>
                            {{ date('j F Y', strtotime($event->event_start)) }}
                          </td>
                          <td>
                            {{ $event->place }}
                          </td>
                          <td>
                            {{ $event->SKPPL }}
                          </td>
                        </tr>
                        @php
                          $PPL_total += $event->SKPPL;
                        @endphp
                        @endif
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center font-weight-bold">
                          {{ __('Unstructured SKPPL Point TOTAL') }}
                        </td>
                        <td class="font-weight-bold">
                          {{ $PPL_total }}
                        </td>
                      </tr>
                    </tfoot>
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