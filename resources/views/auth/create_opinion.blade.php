@extends('master')

@section('content')

<div class="videos-header card">
    <h2>Wystaw opinie użytkownikowi</h2>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="card">
            <div class="panel-body">
            <!-- Formularz -->
           
                    {!! Form::open(['url'=>'opinions','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
                    
                    {!! Form::hidden('id_exchange', $id ,['class'=>'form-control', 'type' => 'hidden' ]) !!}
                      <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('satisfaction','Oceń uzytkownika:') !!}
                        </div>
                        <div class="col-md-6">
                          <i  value="1" class="fa fa-thumbs-up satisfaction"></i>
                          {{ Form::hidden('satisfaction', '1', array('id' => 'satisfaction')) }}
                        </div>
                    </div>
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
<script>

$(".satisfaction").click(function(){
  $(".satisfaction").toggleClass( "fa-thumbs-down") ;
  if ($("#satisfaction").val() == 1){
    $("#satisfaction").val(0)
  }
  else{
    $("#satisfaction").val(1)
  }
})
</script>
@stop