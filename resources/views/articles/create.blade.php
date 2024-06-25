@extends('layouts.app', ['activePage' => 'article-management', 'titlePage' => __('Create New Article')])

@if(Auth::user()->position != 'ADMIN')
  <script>
  window.location = "/home";
  </script>
@else
@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('articles.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add Article') }}</h4>
                <p class="card-category"></p>
              </div>
              <div class="card-body ">
                <div class="row">
                  <div class="col-md-12 text-right">
                      <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary"><i class="material-icons">keyboard_return</i>{{ __(' Back to list') }}</a>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Title') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="input-title" type="text" placeholder="{{ __('Type article title here') }}" value="{{ old('title') }}" required="true" aria-required="true"/>
                      @if ($errors->has('title'))
                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Short Description') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('short_description') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('short_description') ? ' is-invalid' : '' }}" name="short_description" id="input-short_description" type="text" placeholder="{{ __('Input Short Description') }}" value="{{ old('short_description') }}" required />
                      @if ($errors->has('short_description'))
                        <span id="short_description-error" class="error text-danger" for="input-short_description">{{ $errors->first('short_description') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Photo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                      <input id="input-photo" type="file" name="photo" accept="image/*" hidden>
                      <a rel="tooltip" id="article-upload" class="btn btn-primary btn-outline-primary btn-link" data-original-title="" title="Upload Article Photo File">
                        <i class="material-icons">cloud_upload</i>
                        <div class="ripple-container"></div>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Photo') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" id="input-photo" type="file" placeholder="{{ __('Name') }}" value="{{ old('photo') }}" required="true" aria-required="true" accept="image/*"/>
                      @if ($errors->has('photo'))
                        <span id="photo-error" class="error text-danger" for="input-photo">{{ $errors->first('photo') }}</span>
                      @endif
                    </div>
                  </div>
                </div> -->
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Add Article') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@endif