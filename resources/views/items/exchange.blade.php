@extends('master')
@section('content')
<div class="row">
<div class="col-xs-12 videos-header card">
    <h2>{{ $item->title }}</h2>
</div>
</div>
<div class="row">

    <!-- left col. -->
    <div class="col-xs-12 col-md-9 single-video-left" style="background: white;">

        <div class="card">
<div class="col-md-6">
            <img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" style="max-width: 300px;" />
        </div>
            <div class="single-video-content col-md-6">
                <div class="categories ">
               <h4>Kategorie</h4>
               @foreach($item->categories as $category)
               <a href="">{{ $category->name }}&nbsp;</a>
               @endforeach
                </div>
                <h4>Pełny opis</h4>
                <p>{{ $item->description }}</p>
                 <h4>Sposób wysyłki</h4>
                <p>{{ $item->shippingname->name }}</p>
                <span class="upper-label">Dodał</span>
                <span class="video-author">{{ $item->user->name }}</span>
             
            </div>
            
        </div>
        
    </div>
   </div>
    <h2>Wybierz przedmiot do wymiany:</h2>
     <div class="col-xs-12 col-md-8 single-video-left">
        <table class="table">
        @foreach($loggeditems as $loggeditem)
        <tr>
        <td style="width: 120px;">
            <img src="{{asset('storage/userdata')}}/{{$loggeditem->image_url}}" alt="test" style="max-width: 100px;" />
        </td>
        <td>
             <b>{{$loggeditem->title}}</b>
        </td>
        <td>
               <a href="/exchangesave/{{$item->id}}/{{$loggeditem->id}}" class="btn btn-primary btn-lg">
                        wybierz
                    </a>
        </td>
        </tr>
       
        @endforeach
         </table>
    </div>

</div>
@stop