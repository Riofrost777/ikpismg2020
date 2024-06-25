@extends('layouts.app', ['activePage' => 'event', 'titlePage' => __('Event Management')])

@if(Auth::user()->position != 'ADMIN')
  <script>window.location = "/home";</script>
@else
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('event.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add New Event') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_return</i>{{ __(' Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Event Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('event_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('event_name') ? ' is-invalid' : '' }}" name="event_name" id="input-event_name" type="text" placeholder="{{ __('Event Name') }}" value="{{ old('event_name') }}" required="true" aria-required="true"/>
                      @if ($errors->has('event_name'))
                        <span id="event_name-error" class="error text-danger" for="input-event_name">{{ $errors->first('event_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Event Category') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('event_category') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('event_category') ? ' is-invalid' : '' }}" name="event_category" id="input-event_category">
                        @foreach(["" => "--SELECT CATEGORY--","Seminar" => "Seminar","Workshop" => "Workshop","Shortcourse" => "Shortcourse"] AS $event_category => $event_categoryLabel)
                        <option value="{{$event_category}}" {{ old("event_category", auth()->user()->event_category) == $event_category ? "selected" : "" }} >{{ $event_categoryLabel }}</option>
                        @endforeach
                      </select>
                      <!-- <input class="form-control{{ $errors->has('event_category') ? ' is-invalid' : '' }}" name="text" id="input-event_category" type="event_category" placeholder="{{ __('Event Category') }}" value="{{ old('event_category') }}" required /> -->
                      <!-- @if ($errors->has('event_category'))
                        <span id="event_category-error" class="error text-danger" for="input-event_category">{{ $errors->first('event_category') }}</span>
                      @endif -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Place') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('place') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('place') ? ' is-invalid' : '' }}" name="place" id="input-place" type="text" placeholder="{{ __('Place that event held') }}" value="{{ old('place') }}" required />
                      @if ($errors->has('place'))
                        <span id="place-error" class="error text-danger" for="input-place">{{ $errors->first('place') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Price Internal') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('price_int') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price_int') ? ' is-invalid' : '' }}" name="price_int" id="input-price_int" type="number" placeholder="{{ __('Price for Internal Member') }}" value="{{ old('price_int') }}" required />
                      @if ($errors->has('price_int'))
                        <span id="price_int-error" class="error text-danger" for="input-price_int">{{ $errors->first('price_int') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Price External') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('price_ext') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('price_ext') ? ' is-invalid' : '' }}" name="price_ext" id="input-price_ext" type="number" placeholder="{{ __('Price for Public Person') }}" value="{{ old('price_ext') }}" required />
                      @if ($errors->has('price_ext'))
                        <span id="price_ext-error" class="error text-danger" for="input-price_ext">{{ $errors->first('price_ext') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Quota') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('quota') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('quota') ? ' is-invalid' : '' }}" name="quota" id="input-quota" type="number" placeholder="{{ __('Set the Quota of Event') }}" value="{{ old('quota') }}" required />
                      @if ($errors->has('quota'))
                        <span id="quota-error" class="error text-danger" for="input-quota">{{ $errors->first('quota') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Event Start') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('event_start') ? ' has-danger' : '' }}">
                      <input class="date-pickers form-control{{ $errors->has('event_start') ? ' is-invalid' : '' }}" name="event_start" id="input-event_start" type="text" placeholder="{{ __('Set the Event Start Date') }}" value="{{ old('event_start') }}" required />
                      @if ($errors->has('event_start'))
                        <span id="event_start-error" class="error text-danger" for="input-event_start">{{ $errors->first('event_start') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Event End') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('event_end') ? ' has-danger' : '' }}">
                      <input class="date-pickers form-control{{ $errors->has('event_end') ? ' is-invalid' : '' }}" name="event_end" id="input-event_end" type="text" placeholder="{{ __('Set the Event End Date') }}" value="{{ old('event_end') }}" required />
                      @if ($errors->has('event_end'))
                        <span id="event_end-error" class="error text-danger" for="input-event_end">{{ $errors->first('event_end') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('SKPPL Type') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('SKPPL_type') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('SKPPL_type') ? ' is-invalid' : '' }}" name="SKPPL_type" id="input-SKPPL_type">
                        @foreach(["" => "--SELECT TYPE--", 0 => "TIDAK TERSTRUKTUR", 1 => "TERSTRUKTUR"] AS $SKPPL_type => $SKPPL_typeLabel)
                        <option value="{{$SKPPL_type}}" {{ old("SKPPL_type", auth()->user()->SKPPL_type) == $SKPPL_type ? "selected" : "" }} >{{ $SKPPL_typeLabel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('SKPPL Point') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('SKPPL') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('SKPPL') ? ' is-invalid' : '' }}" name="SKPPL" id="input-SKPPL" type="number" placeholder="{{ __('Set SKPPL Point') }}" value="{{ old('SKPPL') }}" required />
                      @if ($errors->has('SKPPL'))
                        <span id="SKPPL-error" class="error text-danger" for="input-SKPPL">{{ $errors->first('SKPPL') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="input-description" type="text" placeholder="{{ __('Add description for this event') }}" value="{{ old('description') }}" required />
                      @if ($errors->has('description'))
                        <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Create Event ') }}<i class="material-icons">send</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@endif