@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('User Management')])
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
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Users') }}</h4>
                <p class="card-category"> {{ __('Here you can manage users') }}</p>
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
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary"><i class="material-icons">person_add</i> {{ __('Add user') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="user-table" width="100%">
                    <thead class=" text-primary thead-light text-center">
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
                        {{ __('Photo') }}
                      </th>
                      <th>
                        {{ __('Work Address') }}
                      </th>
                      <th>
                        {{ __('Work Phone Number') }}
                      </th>
                      <th>
                        {{ __('Home Address') }}
                      </th>
                      <th>
                        {{ __('Home Phone Number') }}
                      </th>
                      <th>
                        {{ __('No. Ijin Praktek') }}
                      </th>
                      <th>
                        {{ __('NPWP') }}
                      </th>
                      <th>
                        {{ __('Brevet') }}
                      </th>
                      <th>
                        {{ __('Social Media') }}
                      </th>
                      <th>
                        {{ __('Membership') }}
                      </th>
                      <th>
                        {{ __('Creation date') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $i = 1
                      @endphp
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $i++ }}
                            <!-- {{ $user->id }} -->
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
                          @if($user->avatar)
                          <td>
                            <button class="btn btn-primary" onclick="
                                Swal.fire({
                                  title: '{{ $user->name }}',
                                  imageUrl: '{{ asset($user->avatar) }}',
                                  imageHeight: 240
                                })
                              ">See photo</button>
                          </td>
                          @else
                            <td class="text-primary">
                              {{ __('No photo available') }}
                            </td>
                          @endif
                          <td>
                            {{ $user->work_address }}
                          </td>
                          <td>
                            {{ $user->work_phonenumber }}
                          </td>
                          <td>
                            {{ $user->home_address }}
                          </td>
                          <td>
                            {{ $user->home_phonenumber }}
                          </td>
                          <td>
                            {{ $user->no_ijin_praktek }}
                          </td>
                          <td>
                            {{ $user->NPWP }}
                          </td>
                          <td>
                            {{ $user->brevet }}
                          </td>
                          @if($user->whatsapp || $user->facebook || $user->twitter || $user->instagram || $user->linkedin)
                            <td class="td-actions text-right">
                            @if($user->whatsapp)
                              <a rel="tooltip" class="btn btn-link" href="https://wa.me/{{$user->whatsapp}}" target="_blank" data-original-title="" title="whatsapp" style="color: #075E54">
                                <i class="fa fa-whatsapp"></i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            @if($user->facebook)
                              <a rel="tooltip" class="btn btn-link" href="https://facebook.com/{{$user->facebook}}" target="_blank" data-original-title="" title="facebook" style="color: #3B5998">
                                <i class="fa fa-facebook-square"></i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            @if($user->twitter)
                              <a rel="tooltip" class="btn btn-link" href="https://twitter.com/{{$user->twitter}}" target="_blank" data-original-title="" title="twitter" style="color: #00ACEE">
                                <i class="fa fa-twitter"></i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            @if($user->instagram)
                              <a rel="tooltip" class="btn btn-link" href="https://www.instagram.com/{{$user->instagram}}" target="_blank" data-original-title="" title="instagram" style="color:  #E1306C">
                                <i class="fa fa-instagram"></i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            @if($user->linkedin)
                              <a rel="tooltip" class="btn btn-link" href="https://{{$user->linkedin}}" target="_blank" data-original-title="" title="linkedin" style="color: #0E76A8">
                                <i class="fa fa-linkedin-square"></i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
                            </td>
                          @else
                            <td class="text-primary">
                              {{ __('No Social Media') }}
                            </td>
                          @endif
                          <td>
                            {{ $user->position }}
                          </td>
                          <td>
                            {{ $user->created_at }}
                          </td>
                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="edit">
                                    <i class="material-icons">edit</i>
                                    <div class="ripple-container"></div>
                                  </a>
                                  <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="delete" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                      <i class="material-icons">delete_outline</i>
                                      <div class="ripple-container"></div>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="edit">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container"></div>
                              </a>
                            @endif
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