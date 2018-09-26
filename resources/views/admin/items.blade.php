@extends('adminpanel')
@section('content')
<div class="wrap">
	<div class="videos-header card">
    <h2>Przedmioty </h2>
</div>
</div>
<div class="row">
	<div class="col-lg-9">
		<table class="table">
		<tr>
			<th>Obraz</th>
			<th>tytuł</th>
			<th>Użytkownik</th>
			<th></th>
			<th></th>
		</tr>
			@foreach( $items as $item)
			<tr>
			<td><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" style="width: 100px;"alt="test" /></td>
			<td>{{ $item->title }}</td>
			<td>{{ $item->user->name }}</td>
			<td><button type="button" class="btn btn-danger">Usuń</button></td>
			<td><a href="/items/edit/{{$item->id}}" class="btn btn btn-success">Edytuj</a></td>
		</tr>
			@endforeach
		</table>
	</div>
	    {{$items->links()}}
</div>
@stop