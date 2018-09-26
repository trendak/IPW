@extends('adminpanel')
@section('content')
<div class="wrap">
	<div class="videos-header card">
    <h2>Użytkownicy </h2>
</div>
</div>
<div class="row">
	<div class="col-lg-9">
		<table class="table">
		<tr>
			<th>Nick</th>
			<th>email</th>
			<th></th>
			<th></th>
		</tr>
			@foreach( $users as $user)
			<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td><button type="button" class="btn btn-danger">Usuń</button></td>
			<td><button type="button" class="btn btn btn-success">Profil</button></td>
		</tr>
			@endforeach
		</table>
	</div>
	    {{$users->links()}}
</div>
@stop