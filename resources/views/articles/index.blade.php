@extends('layouts.app', ['activePage' => 'article-management', 'titlePage' => __('Article Management')])
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
                <h4 class="card-title ">{{ __('Articles') }}</h4>
                <p class="card-category"> {{ __('Here you can articles in homepage') }}</p>
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
                    <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-newspaper-o"></i> {{ __('Add new article') }}</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered display nowrap" id="article-table" width="100%">
                    <thead class=" text-primary thead-light text-center">
                      <th>
                        {{ __('No') }}
                      </th>
                      <th>
                        {{ __('Title') }}
                      </th>
                      <th>
                        {{ __('Photo') }}
                      </th>
                      <th>
                        {{ __('Short Description') }}
                      </th>
                      <th class="text-right">
                        {{ __('Actions') }}
                      </th>
                    </thead>
                    <tbody>
                      @php
                      $i = 1
                      @endphp
                      @foreach($articles as $article)
                        <tr>
                          <td>
                            {{ $i++ }}
                          </td>
                          <td>
                            {{ $article->title }}
                          </td>
                          <td>
                          	<button class="btn btn-primary" onclick="
                                Swal.fire({
                                  title: '{{ $article->title }}',
                                  imageUrl: '{{ asset('storage/article/'.$article->photo) }}',
                                  imageHeight: 360,
                                  imageAlt: 'Photo Article'
                                })
                              ">See photo</button>
                            <!-- {{ $article->photo }} -->
                          </td>
                          <td>
                            {{ $article->short_description }}
                          </td>
                          <td class="td-actions text-right">
	                          <form action="{{ route('articles.destroy', $article->id) }}" method="post">
	                              @csrf
	                              @method('delete')
	                          
	                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('articles.edit', $article->id) }}" data-original-title="" title="edit">
	                                <i class="material-icons">edit</i>
	                                <div class="ripple-container"></div>
	                              </a>
	                              <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="delete" onclick="confirm('{{ __("Are you sure you want to delete this article?") }}') ? this.parentElement.submit() : ''">
	                                  <i class="material-icons">delete_outline</i>
	                                  <div class="ripple-container"></div>
	                              </button>
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


<!-- <a href="{{route('articles.create')}}">Add New Article</a>

@foreach($articles as $article)
<img src="{{url('images')}}/{{$article->photo}}" alt="{{$article->title}}" width="250" height="150"> <br />
@endforeach -->