@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
           
 					{!! Form::open(['url'=>'my_messages/create','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        <div for="" class="col-md-3 control-label">
                            {!!Form::label('id_user_to_send','Do użytkownika:') !!}
                        </div>
                        <div class="col-md-7">
                            {!! Form::text('id_user_to_send_name', $user->name ,['class'=>'form-control', 'disabled' => 'disabled' ]) !!}
                             {!! Form::hidden('id_user_to_send', $user->id ,['class'=>'form-control', 'type' => 'hidden' ]) !!}
                        </div>


                    </div>
            		<div class="form-group">
                        <div for="" class="col-md-3 control-label">
                            {!!Form::label('title','Tytuł:') !!}
                        </div>
                        <div class="col-md-7">
                            {!! Form::text('title', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                      <div class="form-group">
                        <div for="" class="col-md-3 control-label">
                            {!!Form::label('text','Treść:') !!}
                        </div>
                        <div class="col-md-7">
                            {!! Form::textarea('text', null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-7 col-md-offset-3">
                             {!! Form::submit('Wyśli wiadomość',['class'=>'btn btn-primary']) !!}
                        </div>
            		
					{!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop