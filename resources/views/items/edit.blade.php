@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
        @include('items.form_errors')
 					{!! Form::model($item, ['method'=>'PATCH','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data', 
 					'action'=>['ItemsController@update', $item->id]]) !!}
            		
            		@include('items.form',['buttonText'=>'Zaktualizuj'])
					{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop