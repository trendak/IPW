@extends('master')
@section('content')
<div class="col-lg-12">
@foreach($messages as $message)
<div class="{{ $message->sender->id == Auth::user()->id ? 'darker message' : 'message' }}">
	<div class="autor">
  <img src="{{asset('storage/userdata')}}/cat.jpg" alt="Avatar"><br>
  <p>{{$message->sender->name}}</p>
  </div>
  <p class="text">{{ $message->text }}</p>
  <br>
  <p class="time-right">{{ $message->created_at }}</p>
</div>
@endforeach
</div>

<div class="col-lg-12">
{!! Form::open(['url'=>'my_messages','class'=>'form-horizontal', 'file' => true, 'enctype' => 'multipart/form-data']) !!}
               	<div class="form-group">
                        <div for="" class="col-md-12 control-label">
                            {!!Form::label('text','Odpisz:') !!}
                        </div>
                        <div class="col-md-12">
                            {!! Form::textarea('text', null,['class'=>'form-control', 'rows'=>'5']) !!}
                        </div>
                          {!! Form::hidden('id_conversation', $conversation->id ,['class'=>'form-control', 'type' => 'hidden' ]) !!}

                         <div class="col-md-2 col-md-offset-5 top-margin ">
                             {!! Form::submit('Wyśli wiadomość',['class'=>'btn btn-primary ']) !!}
                        </div>
                    </div>
            		
					{!! Form::close() !!}

</div>
@stop