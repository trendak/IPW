@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
           @include('items.form_errors')
 					{!! Form::open(['url'=>'items','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
            		
            		@include('items.form',['buttonText'=>'Dodaj przedmiot'])
					{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop