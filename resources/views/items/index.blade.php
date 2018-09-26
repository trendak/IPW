@extends('master')
@section('content')
<div class="row">
<div class="videos-header card">
    <h2>Najnowsze przedmioty</h2>
</div>
</div>
@if (Session::has('item_created'))
<div class="alert alert-success card">
	{{ Session::get('item_created')}}
</div>
@endif
<div class="row ">
	<div class="col-lg-2 card"><h3>Kategorie:</h3>
<ul>
@foreach($categories as $category)
	<li><a href="categories/{{$category->id}}">{{ $category->name}}</a></li>
@endforeach
</ul>
	</div>
<div class="col-lg-10">

	@foreach($items as $item)
	@if($item->status == 1)
    <!-- Single video -->
	    <div class="">
	        <div class="card item_main">
	        
	            <div class="col-lg-3" style="padding-left: 0">
                    <div class="small-image">
                        <a target="_blank" href="{{ action('ItemsController@show', $item->id)}}"><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" /></a>
                    </div>
                </div>
<div class="col-lg-3">   <a href="{{ url('items', $item->id) }}">
	                    <h4>{{ $item->title }}</h4>
	                </a></div>
	           
	             
	             {{--    <p>{{ str_limit($item->description, $limit=80) }}</p> --}}
	             <div class="col-lg-2">      <span class="">Dodał</span><br>
	                <a href="/profile/{{$item->user_id}}"><span class="video-author">{{ $item->user->name }}</span></a><br>
				<span>Kategorie:</span><br>
				  @foreach($item->categories as $category)
               <a href="">{{ $category->name }}&nbsp;</a>
               @endforeach


	            </div>
	          
	        
	                <div class="col-lg-3 col-lg-offset-1" >
	                	@if(Auth::User())
	                @if(Auth::User()->id != $item->user_id)
                    <a href="{{ action('ItemsController@exchange', $item->id)}}" class="btn btn-info btn-lg btn-index">
                        Zaproponuj wymianę
                    </a>
                    <br>
               		@endif
               		@endif
                    <span>Sposób wysyłki:</span><br>
                    	<span>
					{{$item->shippingname->name}}
				</span>
					</div>
				
	           
	        </div>
	    </div>
	    @endif
    @endforeach
</div>

</div>
    {{$items->links()}}
@stop