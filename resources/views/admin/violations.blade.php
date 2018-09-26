@extends('adminpanel')
@section('content')
<div class="wrap">
	<div class="videos-header card">
    <h2>Zgłoszenia przedmiotów </h2>
</div>
</div>
<div class="row">
	<div class="col-lg-9">
		<table class="table">
		<tr>
			<th>Obraz</th>
			<th>tytuł</th>
			<th>Użytkownik</th>
			<th>opis</th>
			<th></th>
			<th></th>
		</tr>
			@foreach( $violations_items as $violation_items)
			<tr>
			<td><img src="{{asset('storage/userdata')}}/{{$violation_items->item->image_url}}" style="width: 100px;"alt="test" /></td>
			<td>{{ $violation_items->item->title }}</td>
			<td>{{ $violation_items->item->user->name }}</td>
			<td>{{str_limit($violation_items->description, 30) }}</td>
			<td><button type="button" class="btn btn-danger">Usuń</button></td>
			<td><button type="button" class="btn btn-primary">Przeczytaj</button></td>
		
		</tr>
			@endforeach
		</table>
	</div>

</div>
@stop