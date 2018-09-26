@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
           
 					{!! Form::open(['url'=>'profile','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
            		<div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('first_name','Imię:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('first_name', null,['class'=>'form-control']) !!}
                        </div>
                    </div><div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('last_name','Nazwisko:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('last_name', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
            		<div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('city','Miasto:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('city', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('streat','Ulica:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('streat', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('postcode','Kod pocztowy:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('postcode', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('number','Telefon:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('number', null,['class'=>'form-control']) !!}
                        </div>
                    </div>



            
                         <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                             {!! Form::submit('Aktualizuj dane',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
					{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop