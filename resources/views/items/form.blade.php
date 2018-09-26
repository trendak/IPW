<div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('title','Tytuł:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::text('title', null,['class'=>'form-control']) !!}
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
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('shipping_method','Sposób wysyłki:') !!}
                        </div>
                        <div class="col-md-6">
                               {!! Form::select('shipping', $shipping_method , null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                       
                        <div class="form-group">
                        <div for="" class="col-md-4 control-label">
                            {!!Form::label('CategoryList','Wybierz kategorie:') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::select('CategoryList[]', $categories , null, ['class'=>'form-control', 'multiple']) !!}
                        </div>
                    </div>
                       <div class="form-group">
                    <div class="col-md-4 control-label">
                        <input type="hidden" name="file" value="{{ csrf_token() }}">

                        {!! Form::label('image_url','Dodaj zdjęcie') !!}
                    </div>
                    
                    <div class="col-md-6">
                        
                        {!! Form::file('image_url',null,['class'=>'form-control']) !!}
                {{--          <div class="small image">
                            <br>
                                <a target="_blank" href="{{$item->image_url}}"><img src="{{asset('storage/userdata')}}/{{$item->image_url}}" alt="test" style="width: 200px;" /></a>
                            </div> --}}
                    </div>
</div>

                {{ Form::hidden('status', 'akt') }}
                         <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                             {!! Form::submit($buttonText,['class'=>'btn btn-primary']) !!}
                        </div>
                    </div>