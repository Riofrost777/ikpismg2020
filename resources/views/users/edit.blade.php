@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit User') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Work Address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('work_address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('work_address') ? ' is-invalid' : '' }}" name="work_address" id="input-work_address" type="text" placeholder="{{ __('Work Address') }}" value="{{ old('work_address', $user->work_address) }}" formnovalidate/>
                      @if ($errors->has('work_address'))
                        <span id="work_address-error" class="error text-danger" for="input-work_address">{{ $errors->first('work_address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Work Phone Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('work_phonenumber') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('work_phonenumber') ? ' is-invalid' : '' }}" name="work_phonenumber" id="input-work_phonenumber" type="text" placeholder="{{ __('Work Phone Number') }}" value="{{ old('work_phonenumber', $user->work_phonenumber) }}" formnovalidate/>
                      @if ($errors->has('work_phonenumber'))
                        <span id="work_phonenumber-error" class="error text-danger" for="input-work_phonenumber">{{ $errors->first('work_phonenumber') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Home Address') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('home_address') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('home_address') ? ' is-invalid' : '' }}" name="home_address" id="input-home_address" type="text" placeholder="{{ __('Home Address') }}" value="{{ old('home_address', $user->home_address) }}" formnovalidate/>
                      @if ($errors->has('home_address'))
                        <span id="home_address-error" class="error text-danger" for="input-home_address">{{ $errors->first('home_address') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Home Phone Number') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('home_phonenumber') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('home_phonenumber') ? ' is-invalid' : '' }}" name="home_phonenumber" id="input-home_phonenumber" type="text" placeholder="{{ __('Home Phone Number') }}" value="{{ old('home_phonenumber', $user->home_phonenumber) }}" formnovalidate/>
                      @if ($errors->has('home_phonenumber'))
                        <span id="home_phonenumber-error" class="error text-danger" for="input-home_phonenumber">{{ $errors->first('home_phonenumber') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Nomor Ijin Praktek') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('no_ijin_praktek') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('no_ijin_praktek') ? ' is-invalid' : '' }}" name="no_ijin_praktek" id="input-no_ijin_praktek" type="text" placeholder="{{ __('Nomor Ijin Praktek') }}" value="{{ old('no_ijin_praktek', $user->no_ijin_praktek) }}" formnovalidate/>
                      @if ($errors->has('no_ijin_praktek'))
                        <span id="no_ijin_praktek-error" class="error text-danger" for="input-no_ijin_praktek">{{ $errors->first('no_ijin_praktek') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('NPWP') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('NPWP') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('NPWP') ? ' is-invalid' : '' }}" name="NPWP" id="input-NPWP" type="text" placeholder="{{ __('NPWP') }}" value="{{ old('NPWP', $user->NPWP) }}" formnovalidate/>
                      @if ($errors->has('NPWP'))
                        <span id="NPWP-error" class="error text-danger" for="input-NPWP">{{ $errors->first('NPWP') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Birthdate') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                      <input class="date-pickers form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="input-birthdate" type="text" placeholder="{{ __('Birthdate') }}" value="{{ old('birthdate', $user->birthdate) }}" formnovalidate/>
                      @if ($errors->has('birthdate'))
                        <span id="birthdate-error" class="error text-danger" for="input-birthdate">{{ $errors->first('birthdate') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Year') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" id="input-year" type="text" placeholder="{{ __('Year') }}" value="{{ old('year', $user->year) }}" formnovalidate/>
                      @if ($errors->has('year'))
                        <span id="year-error" class="error text-danger" for="input-year">{{ $errors->first('year') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Status') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('brevet') ? ' is-invalid' : '' }}" name="brevet" id="input-brevet">
                        @if( Auth::user()->status == NULL)
                          @foreach(["" => "--SELECT STATUS--","TETAP" => "TETAP","TIDAK TETAP" => "TIDAK TETAP"] AS $status => $statuslabel)
                          <option value="{{$status}}" {{ old("status", $user->status) == $status ? "selected" : "" }} >{{ $statuslabel }}</option>
                          @endforeach
                        @else
                          @foreach(["TETAP" => "TETAP","TIDAK TETAP" => "TIDAK TETAP"] AS $status => $statuslabel)
                          <option value="{{$status}}" {{ old("status", $user->status) == $status ? "selected" : "" }} >{{ $statuslabel }}</option>
                          @endforeach
                        @endif
                      </select>
                      <!-- <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status" type="text" placeholder="{{ __('Status') }}" value="{{ old('status', $user->status) }}" required="true" aria-required="true"/> -->
                      @if ($errors->has('status'))
                        <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Brevet') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('brevet') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('brevet') ? ' is-invalid' : '' }}" name="brevet" id="input-brevet">
                        @if( Auth::user()->brevet == NULL)
                          @foreach(["" => "--SELECT BREVET--","A" => "A","B" => "B","C" => "C"] AS $brevet => $brevetLabel)
                          <option value="{{$brevet}}" {{ old("brevet", $user->brevet) == $brevet ? "selected" : "" }} >{{ $brevetLabel }}</option>
                          @endforeach
                        @else
                          @foreach(["A" => "A","B" => "B","C" => "C"] AS $brevet => $brevetLabel)
                          <option value="{{$brevet}}" {{ old("brevet", $user->brevet) == $brevet ? "selected" : "" }} >{{ $brevetLabel }}</option>
                          @endforeach
                        @endif
                      </select>
                      <!-- <input class="form-control{{ $errors->has('brevet') ? ' is-invalid' : '' }}" name="brevet" id="input-brevet" type="text" placeholder="{{ __('Brevet') }}" value="{{ old('brevet', $user->brevet) }}" required="true" aria-required="true"/> -->
                      @if ($errors->has('brevet'))
                        <span id="brevet-error" class="error text-danger" for="input-brevet">{{ $errors->first('brevet') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Whatsapp') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('whatsapp') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp" id="input-whatsapp" type="text" placeholder="{{ __('Whatsapp') }}" value="{{ old('whatsapp', $user->whatsapp) }}" formnovalidate/>
                      @if ($errors->has('whatsapp'))
                        <span id="whatsapp-error" class="error text-danger" for="input-whatsapp">{{ $errors->first('whatsapp') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Facebook') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('facebook') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" id="input-facebook" type="text" placeholder="{{ __('Facebook') }}" value="{{ old('facebook', $user->facebook) }}" formnovalidate/>
                      @if ($errors->has('facebook'))
                        <span id="facebook-error" class="error text-danger" for="input-facebook">{{ $errors->first('facebook') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Twitter') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('twitter') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" id="input-twitter" type="text" placeholder="{{ __('Twitter') }}" value="{{ old('twitter', $user->twitter) }}" formnovalidate/>
                      @if ($errors->has('twitter'))
                        <span id="twitter-error" class="error text-danger" for="input-twitter">{{ $errors->first('twitter') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Instagram') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('instagram') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" id="input-instagram" type="text" placeholder="{{ __('Instagram') }}" value="{{ old('instagram', $user->instagram) }}" formnovalidate/>
                      @if ($errors->has('instagram'))
                        <span id="instagram-error" class="error text-danger" for="input-instagram">{{ $errors->first('instagram') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('Linkedin') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('linkedin') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" id="input-linkedin" type="text" placeholder="{{ __('Linkedin') }}" value="{{ old('linkedin', $user->linkedin) }}" formnovalidate/>
                      @if ($errors->has('linkedin'))
                        <span id="linkedin-error" class="error text-danger" for="input-linkedin">{{ $errors->first('linkedin') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection