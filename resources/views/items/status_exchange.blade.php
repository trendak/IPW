@extends('master')
@section('content')
<div class="videos-header card">
    <h2>Szczegóły wymiany</h2>
</div>
<div>
	<div class = "row">
	@if($exchange->prop_item_status != 3 && $exchange->item_status != 3)
		 {!! Form::model($exchange, ['class'=>'form-horizontal form-inline', 
 					'action'=>['ItemsController@itemsent', $exchange->id]]) !!}
 					<button type="button" class="btn btn-info">Przedmiot został wysłany</button>
		{!! Form::close() !!}
	
		{!! Form::model($exchange, ['class'=>'form-horizontal form-inline', 
 					'action'=>['ItemsController@item_received', $exchange->id]]) !!}
 					<button class="btn btn-success">Przedmiot został odebrany</button>
		{!! Form::close() !!}
	@endif
		<a href="{{ action('ItemsController@violation_exchange', $exchange->id)}}" class="form-horizontal form-inline"><button class="btn btn-danger">Zgłoś naruszenie wymiany</button></a>
		<a href="{{ action('MessagesController@show', $exchange->id)}}" class="form-horizontal form-inline"><button class="btn btn-success">Napisz wiadomość</button></a>
		@if($exchange->prop_item_status == 3 && $exchange->item_status == 3)
		<a href="/opinions/create/{{$exchange->id}}" class="form-horizontal form-inline"><button class="btn btn-success">Wystaw opinie</button></a>
		@endif
	</div>
	</div>
	
		
		
	<div class="col-lg-4 card nopadding col-lg-offset-1">
		<p>Status wysyłki: {{$exchange->itemstatus->name}}</p>
		<p>Rodzaj wysyłki: {{$exchange->item->shippingname->name}}</p>
		<h2 class="text-center">{{$exchange->item->title}}</h2>	
		<img class="img-responsive" src="{{asset('storage/userdata')}}/{{$exchange->item->image_url}}" alt="">
	<p>{{$exchange->item->description}}</p>
	@if(Auth::user()->id == $exchange->prop_item->id)
		<h3>Dane odbiorcy</h3>
		{{ $user->first_name }}
		{{ $user->last_name }}<br>
		{{ $user->city }}
		{{ $user->streat }}
		{{ $user->postcode }}
		{{ $user->number }}

		@endif
	</div>
	<div class="col-lg-4 col-lg-offset-2 card nopadding">
		<p>Status wysyłki: {{$exchange->prop_itemstatus->name}}</p>
		<p>Rodzaj wysyłki: {{$exchange->prop_item->shippingname->name}}</p>
		<h2 class="text-center">{{$exchange->prop_item->title}}</h2>
		<img class="img-responsive" src="{{asset('storage/userdata')}}/{{$exchange->prop_item->image_url}}" alt="">
		{{$exchange->prop_item->description}}
		@if(Auth::user()->id == $exchange->item->id)
		<h3>Dane odbiorcy</h3>
		{{ $user->first_name }}
		{{ $user->last_name }}<br>
		{{ $user->city }}
		{{ $user->streat }}
		{{ $user->postcode }}
		{{ $user->number }}

		@endif
	</div>

@stop