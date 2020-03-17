@extends('layouts.app')

@section('content')
   @include('layouts.navbar')

         <main class="pt-5 mx-lg-5">
          <div class="row">
            <div class="col-12">
              <div class="clearfix float-right">
                {{ Form::open(['method' => 'DELETE', 'route' => ['article.destroy',$article->id] ])}}
                 <button type="submit" class="btn btn-danger btn-lg btn-rounded text-lg"><i class="fas fa-trash fa-1x pr-2"
                aria-hidden="true"></i></button>
                {{ Form::close() }}
            </div>
            </div>
          </div>
      <!--Main layout-->
      {!! Form::model($article, ['method' => 'PUT', 'route' => ['article.update', $article->id], 'files' => true,]) !!}
      <div class="row">
      <div class="col-12">
     
      <div class="md-form mt-3 w-100">
      {!! Form::label('title', trans('Title').'', ['class' => 'control-label']) !!}
      {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '','required']) !!}
      @if($errors->has('title'))
      <p class="help-block">
      {{ $errors->first('title') }}
      </p>
      @endif
    
      </div>
      </div>
      </div>
          <div class="row">
                <div class="col-xl-8 mb-4">
        
                

                    {!! Form::label('content', trans('Article').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('content', old('content'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'content-tincy','required']) !!}
                    @if($errors->has('content'))
                        <p class="help-block">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
               
               {!! Form::submit(trans('Update'), ['class' => 'btn btn-warning']) !!}

                </div>
                <div class="col-xl-4">
                  <!--Card-->
                  <div class="card mb-4">
                    <!--Card content-->
                    <div class="card-body">
                      <div class="md-form mb-4 pink-textarea active-pink-textarea">
                                {!! Form::label('meta_description', trans('Summary').'', ['class' => 'control-label']) !!}
                                {!! Form::textarea ('meta_description', old('meta_description'), ['class' => 'md-textarea form-control', 'placeholder' => 'Please describe your article in 200 characters','maxlength' => '200','minlength' => '150','id'=>'summarybox','rows' => '3']) !!}
                                  @if($errors->has('meta_description'))
                                    <p class="help-block">
                                        {{ $errors->first('meta_description') }}
                                    </p>
                                @endif
                        </div>
                        <div id="textarea_feedback"></div>
                        </div>

                   </div>
                    <!--/.Card-->

                        <!--Card-->
                      <div class="card mb-4">
              
                          <!-- Card header -->
                          <div class="card-header text-center">
                               Cover Image
                          </div>

                          <!--Card content-->
                          <div class="card-body">
                            <img class="card-img-top" src="{{ env('AWS_URL') .'thumbnails/'.$article->page_image }}" alt="Card image cap" style="max-width: 50%"> 

                          <div class="file-field md-form">
                              <div class="btn btn-primary btn-sm float-left">
                              <span>Choose file</span>
                             <input type="file" name="page_image">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload your file">
                          </div>
                          </div> 
                          @if($errors->has('page_image'))
                          <p class="help-block">
                          {{ $errors->first('page_image') }}
                          </p>
                          @endif	
                          </div>
                        </div>
                              <!--/.Card-->
                    <!--Card-->
                    <div class="card mb-4">
              
                      <!-- Card header -->
                      <div class="card-header text-center">
                        Tags
                        </div>
          
                      <!--Card content-->
                      <div class="card-body">
                          
                            {!! Form::select('tags[]', $tags, old('tags'), ['class' => 'js-example-basic-multiple', 'multiple' => 'multiple','required']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('tags'))
                                <p class="help-block">
                                    {{ $errors->first('tags') }}
                                </p>
                            @endif
                        </div>
  
                      </div>
                    <!--/.Card-->
                    
                          <!--Card-->
                          <div class="card mb-4">

                            <!-- Card header -->
                            <div class="card-header text-center">
                            Status
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                            {!! Form::select('status', $status, old('status'), ['class' => 'mdb-select md-form"','required']) !!}
                            @if($errors->has('status'))
                            <p class="help-block">
                            {{ $errors->first('status') }}
                            </p>
                            @endif

                            </div>
                            </div>
                            <!--/.Card-->
                            </div>
                      </div>
                          <!--Grid row-->
                          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
               
                        </div>
                
      

      {!! Form::close() !!}
    </main>
      @endsection