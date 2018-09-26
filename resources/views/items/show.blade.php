@extends('master')
@section('content')
<div class="col-xs-12 videos-header card">
    <h2>{{ $item->title }}</h2>
</div>

<div class="row">

    <!-- left col. -->
    <div class="col-xs-12 col-md-10 col-md-offset-1 single-video-left">

        <div class="card">

            <div class="embed-responsive embed-responsive-16by9">
                 <a target="_blank" href="{{ action('ItemsController@edit', $item->id)}}"><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" /></a>
            </div>
        
            <div class="single-video-content">
                <div class="categories">
               <h4>Kategorie</h4>
               @foreach($item->categories as $category)
               <a href="">{{ $category->name }}&nbsp;</a>
               @endforeach
                </div>
                <h4>Pełny opis</h4>
                <p>{{ $item->description }}</p>
                <span class="upper-label">Dodał</span>
                <span class="video-author">{{ $item->user->name }}</span>
                  <span class="upper-label">Sposób wysyłki</span>
                  <p>{{$item->shippingname->name}}</p>
    @if(Auth::user())          
    @if(Auth::user()->id == $item->user_id)
                <div class="edit-button">
                    <a href="{{ action('ItemsController@edit', $item->id)}}" class="btn btn-primary btn-lg">
                        Edytuj Przedmiot
                    </a>

               
    @else           <br>
                      <a href="{{ action('ItemsController@violation', $item->id)}}" class="btn btn-danger btn-lg">
                            Zgłoś przedmiot
                        </a>
                    <a href="{{ action('ItemsController@exchange', $item->id)}}" class="btn btn btn-info btn-lg">
                        Zaproponuj wymianę
                    </a>
                 
    @endif
        @endif
               </div>    
            
        </div>
        
    </div>
</div>

    <!-- right col. -->


</div>
@stop