@extends('master')
@section('content')
<div class="videos-header card">
    <h2>Wymiany</h2>
</div>
@if (Session::has('offer_exchange'))
<div class="alert alert-success card">
	{{ Session::get('offer_exchange')}}
</div>
@endif
<div class="row">
<h3>Zaproponowane przedmioty do wymiany</h3>
</div>
<div class="row">
	<table class="table">
		<th>Twój przedmiot</th>
		
		<th>Proponowany przedmiot</th>
		
		<th></th>
		<th></th>
	@foreach($items as $item)
	
	@if($item->status == 0)
	<tr>
		<td>
		<img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" / style="width: 150px;"> <b> {{$item->title}}</b></td>

		@foreach($items2 as $item2)
@if($item2->id == $item->id && $item2->status == 0)
		<td><img src="{{asset('storage/userdata')}}/{{$item2->image_url}}" alt="test" / style="width: 150px;"> <b> {{$item2->title}}</b></td>
		 @endif
		@endforeach
 <td><a href="/offer_exchange/{{$item->id}}" class="btn btn-primary btn-lg">
                        Wymień
                    </a></td>
                    <td>
                    <a href="/offer_exchange/{{$item->id}}" class="btn btn-danger btn-lg">
                        Odmów
                    </a>
                </td>
	<tr>
	@endif
	
	@endforeach
</table>

</div>
<div class="row">
<h3>Wymienione przedmioty</h3>
</div>
<div class="row">
	
		<table class="table">
			<tr><th>Twój przedmiot</th><th>Przedmiot wymiany</th><th>Status Wymiany</th><th></th> </tr>


	@foreach($items as $item)
	@if($item->status == 1 && $item->user_id==Auth::user()->id)
	<tr>
		<td>	
		<img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" / style="max-width: 150px; max-height: 100px;"> <b> {{$item->title}}</b>
</td>
	@foreach($items2 as $item2)
	@if($item->id == $item2->id )
		<td>	
		<img src="{{asset('storage/userdata')}}/{{$item2->image_url}}" alt="test" / style="max-width: 150px; max-height: 100px;"> <b> {{$item2->title}}</b>
</td>
@endif
	@endforeach
	<td><button class="btn btn-info btn-lg">
		@if( $item->item_status == 3 && $item->prop_item_status == 3)
		Zakończono
		@else
		W trakcie
		@endif
	</button>
	</td>
	<td><a  href="/offer_exchange/status/{{$item->id}}" class="btn btn-primary btn-lg">Więcej</a></td>	

	@else
	@foreach($items2 as $item2)
		<tr>
				
	@if($item->id == $item2->id && $item2->user_id==Auth::user()->id)
		<td>	
		<img src="{{asset('storage/userdata')}}/{{$item2->image_url}}" alt="test" / style="max-width: 150px; max-height: 100px;"> <b>{{$item2->title}}</b>
</td>
		<td>	
		<img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" / style="max-width: 150px; max-height: 100px;"> <b>{{$item->title}}</b>
</td>


	
	<td><button class="btn btn-info btn-lg">
		@if( $item2->item_status == 3 && $item2->prop_item_status == 3)
		Zakończono
		@else
		W trakcie
		@endif
	</button>
	</td>
	<td><a  href="/offer_exchange/status/{{$item->id}}" class="btn btn-primary btn-lg">Więcej</a></td>	
	
	@endif
		@endforeach
	@endif
</tr>
	@endforeach

</table>
</div>
	
@stop