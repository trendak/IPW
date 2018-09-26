@extends('master')
@section('content')
<div class="videos-header card">
    <h2>{{ $category->name }}</h2>
</div>

<div class="row">


	@foreach($items as $item)
    <!-- Single video -->
	    <div class="col-xs-12 col-md-6 col-lg-4 single-video">
	        <div class="card">
	        
	            <div class="embed-responsive embed-responsive-4by3">
                    <div class="smaller image">
                        <a target="_blank" href="{{ action('ItemsController@edit', $item->id)}}"><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" /></a>
                    </div>
                </div>

	            <div class="card-content">
	                <a href="{{ url('items', $item->id) }}">
	                    <h4>{{ $item->title }}</h4>
	                </a>
	                <p>{{ str_limit($item->description, $limit=80) }}</p>
	                <span class="upper-label">Dodał</span>
	                <span class="video-author">{{ $item->name }}</span>
	            </div>
	            
	        </div>
	    </div>
    @endforeach

</div>
@stop