@extends('master')
@section('content')
<div class="col-xs-12 videos-header card">
    <h2>Skrzynka odbiorcza</h2>
</div>
@if (Session::has('message_created'))
<div class="alert alert-success card">
	{{ Session::get('message_created')}}
</div>
@endif
<div class="row">
<div class="col-lg-8 col-lg-offset-2 ">
	<table class="table">
		<tr>
	<th scope="col">Z:</th><th scope="col">Tytuł:</th><th scope="col"></th>
</tr>
	@foreach( $conversations as $conversation)
	<tr>
<td>
	@if($conversation->sender->id == Auth::user()->id)
	{{ $conversation->reciepient->name }}
	@else
	{{ $conversation->sender->name }}
@endif
</td><td>{{ $conversation->title }}</td><td><a href="{{ action('MessagesController@show', $conversation->id)}}" class="btn btn-primary">Przeczytaj</a></td>
</tr>
@endforeach
</table>
</div>


</div>
@stop