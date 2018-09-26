@extends('master')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
           
                    {!! Form::open(['url'=>'violation','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
                    {!! Form::hidden('item_id', $item->id ,['class'=>'form-control', 'type' => 'hidden' ]) !!}
                 
                    <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('description','Opis:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::textarea('description', null,['class'=>'form-control']) !!}
                        </div>
                    </div>



            
                         <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                             {!! Form::submit('Wyślij',['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop