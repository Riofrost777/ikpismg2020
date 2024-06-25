@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12" id="userImageProfile">
          <form method="post" action="{{ route('profile.update_avatar', [ 'user_id' => auth()->user()->id]) }}" class="form-horizontal" enctype="multipart/form-data" onsubmit="return checkCoords();">
            @csrf

            <div class="card ">
              <div class="card-header card-header-warning">
                <h4 class="card-title">{{ __('Profile Picture') }}</h4>
                <p class="card-category">{{ __('Update Your Profile Picture') }}</p>
              </div>
              <div class="card-body ">
                @if ($message = Session::get('success'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <!-- <span>{{ session('status_avatar') }}</span> -->
                        <strong>{{ $message }}</strong>
                      </div>
                    </div>
                  </div>
                @endif
                @if (count($errors) > 0)
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <!-- <span>{{ __('Upload Profile Picture Failed') }}</span> -->
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row justify-content-center">
                  <div class="profile-header-container">
                      <div class="profile-header-img">
                          @if(auth()->user()->avatar == NULL)
                          <img class="rounded-circle border-3 border-warning" src="{{ asset('storage/user.jpg')}}" style="height: 100px; margin-bottom: 20px" />
                          @else
                          <img class="rounded-circle border-3 border-warning" src="{{ asset(''.auth()->user()->avatar) }}" style="height: 100px; margin-bottom: 20px" />
                          @endif
                          <!-- badge -->
                          <!-- <div class="rank-label-container">
                              <span class="label label-primary rank-label">{{auth()->user()->name}}</span>
                          </div> -->
                      </div>
                  </div>

                </div>
                <div class="row justify-content-center">
                    <input id="fileInput" class="avatar" type="file" name="avatar" accept="image/jpeg">
                </div>
                <div class="row justify-content-center">
                    <small id="fileHelp" class="row justify-content-center form-text text-muted">Preview Image:</small>
                    <br>

                    <p><img id="filePreview" style="display:none; max-width: 50%; margin-top: 15px; margin-left: 25%; margin-right: 25%"/></p>
                    <input type="hidden" id="x" placeholder="x" name="x" />
                    <input type="hidden" id="y" placeholder="y" name="y" />
                    <input type="hidden" id="w" placeholder="w" name="w" />
                    <input type="hidden" id="h" placeholder="h" name="h" />
                    <input type="hidden" id="sw" placeholder="sw" name="sw" />
                    <input type="hidden" id="sh" placeholder="sh" name="sh" />
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-warning">{{ __('Upload Picture') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id="userProfile">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
              </div>
              <div class="card-body ">
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
                  <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required="true" aria-required="true"/>
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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
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
                      <input class="form-control{{ $errors->has('work_address') ? ' is-invalid' : '' }}" name="work_address" id="input-work_address" type="text" placeholder="{{ __('Work Address') }}" value="{{ old('work_address', auth()->user()->work_address) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('work_phonenumber') ? ' is-invalid' : '' }}" name="work_phonenumber" id="input-work_phonenumber" type="text" placeholder="{{ __('Work Phone Number') }}" value="{{ old('work_phonenumber', auth()->user()->work_phonenumber) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('home_address') ? ' is-invalid' : '' }}" name="home_address" id="input-home_address" type="text" placeholder="{{ __('Home Address') }}" value="{{ old('home_address', auth()->user()->home_address) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('home_phonenumber') ? ' is-invalid' : '' }}" name="home_phonenumber" id="input-home_phonenumber" type="text" placeholder="{{ __('Home Phone Number') }}" value="{{ old('home_phonenumber', auth()->user()->home_phonenumber) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('no_ijin_praktek') ? ' is-invalid' : '' }}" name="no_ijin_praktek" id="input-no_ijin_praktek" type="text" placeholder="{{ __('Nomor Ijin Praktek') }}" value="{{ old('no_ijin_praktek', auth()->user()->no_ijin_praktek) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('NPWP') ? ' is-invalid' : '' }}" name="NPWP" id="input-NPWP" type="text" placeholder="{{ __('NPWP') }}" value="{{ old('NPWP', auth()->user()->NPWP) }}" formnovalidate/>
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
                      <input class="date-pickers form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="input-birthdate" type="text" placeholder="{{ __('Birthdate') }}" value="{{ old('birthdate', auth()->user()->birthdate) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" id="input-year" type="text" placeholder="{{ __('Year') }}" value="{{ old('year', auth()->user()->year) }}" formnovalidate/>
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
                          <option value="{{$status}}" {{ old("status", auth()->user()->status) == $status ? "selected" : "" }} >{{ $statuslabel }}</option>
                          @endforeach
                        @else
                          @foreach(["TETAP" => "TETAP","TIDAK TETAP" => "TIDAK TETAP"] AS $status => $statuslabel)
                          <option value="{{$status}}" {{ old("status", auth()->user()->status) == $status ? "selected" : "" }} >{{ $statuslabel }}</option>
                          @endforeach
                        @endif
                      </select>
                      <!-- <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status" type="text" placeholder="{{ __('Status') }}" value="{{ old('status', auth()->user()->status) }}" required="true" aria-required="true"/> -->
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
                          <option value="{{$brevet}}" {{ old("brevet", auth()->user()->brevet) == $brevet ? "selected" : "" }} >{{ $brevetLabel }}</option>
                          @endforeach
                        @else
                          @foreach(["A" => "A","B" => "B","C" => "C"] AS $brevet => $brevetLabel)
                          <option value="{{$brevet}}" {{ old("brevet", auth()->user()->brevet) == $brevet ? "selected" : "" }} >{{ $brevetLabel }}</option>
                          @endforeach
                        @endif
                      </select>
                      <!-- <input class="form-control{{ $errors->has('brevet') ? ' is-invalid' : '' }}" name="brevet" id="input-brevet" type="text" placeholder="{{ __('Brevet') }}" value="{{ old('brevet', auth()->user()->brevet) }}" required="true" aria-required="true"/> -->
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
                      <input class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}" name="whatsapp" id="input-whatsapp" type="text" placeholder="{{ __('Whatsapp') }}" value="{{ old('whatsapp', auth()->user()->whatsapp) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" id="input-facebook" type="text" placeholder="{{ __('Facebook') }}" value="{{ old('facebook', auth()->user()->facebook) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" id="input-twitter" type="text" placeholder="{{ __('Twitter') }}" value="{{ old('twitter', auth()->user()->twitter) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" id="input-instagram" type="text" placeholder="{{ __('Instagram') }}" value="{{ old('instagram', auth()->user()->instagram) }}" formnovalidate/>
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
                      <input class="form-control{{ $errors->has('linkedin') ? ' is-invalid' : '' }}" name="linkedin" id="input-linkedin" type="text" placeholder="{{ __('Linkedin') }}" value="{{ old('linkedin', auth()->user()->linkedin) }}" formnovalidate/>
                      @if ($errors->has('linkedin'))
                        <span id="linkedin-error" class="error text-danger" for="input-linkedin">{{ $errors->first('linkedin') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save ') }}<i class="material-icons">save</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12" id="userPasswordProfile">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Password Management') }}</h4>
                <p class="card-category">{{ __('Change Password') }}</p>
              </div>
              <div class="card-body ">
                @if (session('status_password'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status_password') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                      @if ($errors->has('password'))
                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Change password ') }}<i class="material-icons">vpn_key</i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection