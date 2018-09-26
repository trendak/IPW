@extends('master')
@section('content')
<div class="videos-header card">
    <h2>kategorie</h2>
</div>

<div class="row">


	@foreach($categories as $category)
    <!-- Single video -->
	    <div class="col-xs-12 col-md-6 col-lg-12">
	       
	        
	           

	           
	                <a href="{{ url('categories', $category->id) }}">
	                    <h4>{{ $category->name }}</h4>
	                </a>
	              
	            
	      
	    </div>
    @endforeach

</div>
@stop