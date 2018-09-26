@extends('master')
@section('content')
<div class="row">
<div class="videos-header card">
    <h2>Przedmioty użytkownika </h2>
</div>
</div>
@if (Session::has('item_created'))
<div class="alert alert-success card">
    {{ Session::get('item_created')}}
</div>
@endif
<div class="row">

<div class="col-lg-12">

    @foreach($items as $item)
    @if($item->status == 1)
    <!-- Single video -->
        <div class="row">
            <div class="card item_main">
            
                <div class="col-lg-3">
                    <div class="small-image">
                        <a target="_blank" href="{{ action('ItemsController@show', $item->id)}}"><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" /></a>
                    </div>
                </div>
<div class="col-lg-3">   <a href="{{ url('items', $item->id) }}">
                        <h4>{{ $item->title }}</h4>
                    </a></div>
               
                 
                 {{--    <p>{{ str_limit($item->description, $limit=80) }}</p> --}}
                 <div class="col-lg-3">      <span class="">Dodał</span><br>
                    <span class="video-author">{{ $item->user->name }}</span><br>
                <span>Kategorie:</span><br>
                  @foreach($item->categories as $category)
               <a href="">{{ $category->name }}&nbsp;</a>
               @endforeach


                </div>
              
            
                    <div class="col-lg-3 col-lg-offset-1">
                    <a href="{{ action('ItemsController@exchange', $item->id)}}" class="btn btn-info btn-lg btn-index">
                        Zaproponuj wymianę
                    </a>
                    <br>
               
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
<br><br>


<div class="row">
<div class="videos-header card">
    <h2>Oceny użytkownika </h2>
</div>
</div>
@foreach($opinions as $opinion)
<div class="card opinion  col-lg-12">
    <div>
        <i class="fa {{$opinion->satisfaction == 1 ? 'fa-thumbs-up' : 'fa-thumbs-down'}} satisfaction"></i>
    </div>
<div class="description">
<span class="video-author">Od: <a href="/profile/{{$opinion->from_user->id}}">{{ $opinion->from_user->name }}</a></span> <span style="float: right;">{{$opinion->created_at}}</span>
<p>{{ $opinion->description }}</p>
</div>
</div>
 @endforeach

  
@stop