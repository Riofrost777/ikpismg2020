@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('IKPI Semarang'), 'titlePage' => 'IKPI'])

@section('content')
<div class="container" style="height: auto;">
  	<div class="row justify-content-center">
      	<div class="col-lg-7 col-md-8">
          	<h1 class="text-white text-center">{{ __('Welcome to IKPI Semarang') }}</h1>
      	</div>
  	</div>
  	<!--Start slide--> 
  	@php
  		$countArticle = DB::table('articles')
  			->count();
  	@endphp
  	@if($countArticle > 0)
    <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
	    <div class="carousel-inner">
	    	@foreach($articles as $article)
		      	<div class="carousel-item {{ $loop->first ? ' active' : '' }}">
			        <div class="mask flex-center">
			          	<div class="container">
			            	<div class="row align-items-center">
			              		<div class="col-md-7 col-12 order-md-1 order-2">
					                <h4>{{ $article->title }}</h4>
					                <p>{{ $article->short_description }}</p>
					                <a href="#">Read More</a>
				            	</div>
			              	<div class="col-md-5 col-12 order-md-2 order-1">
			              		<img src="{{ asset('storage/article/'.$article->photo) }}" class="mx-auto" alt="slide" style="margin-top: 5%;">
			              	</div>
			            	</div>
			          	</div>
			        </div>
		      	</div>
		    @endforeach
	    </div>
    	<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span>
    	</a>
    	<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span>
    	</a>
    </div>
    @endif
  	<!--slide end--> 
</div>
@endsection
