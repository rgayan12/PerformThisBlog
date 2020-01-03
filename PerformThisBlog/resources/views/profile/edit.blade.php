@extends('layouts.app')

@section('content')
   @include('layouts.navbar')

   
         <main class="pt-5 mx-lg-5">
          @if(session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h2>Profile Updated</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
     @endif
 
  <!--Main layout-->
      {!! Form::model($profile, ['method' => 'PUT', 'route' => ['profile.update', $profile->id ], 'files' => true,] ) !!}

   <div class="card mb-4 wow fadeIn">
    <!--Card content-->
    <div class="card-body justify-content-between">
	
		<div class="row">	
			<div class="col-md-6">
		      <div class="md-form mt-3 w-100">
		        {!! Form::label('first_name', trans('First Name').'', ['class' => 'control-label']) !!}
		        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => '','required']) !!}
		        @if($errors->has('first_name'))
		            <p class="help-block">
		                {{ $errors->first('first_name') }}
		            </p>
		        @endif
		      </div>
		  </div>
			<div class="col-md-6">
		      <div class="md-form mt-3 w-100">
		        {!! Form::label('last_name', trans('Last Name').'', ['class' => 'control-label']) !!}
		        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => '','required']) !!}
		        @if($errors->has('last_name'))
		            <p class="help-block">
		                {{ $errors->first('last_name') }}
		            </p>
		        @endif
		      </div>
		  </div>

    </div>
</div>
</div>
          <!--Grid row-->
          <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-8 mb-4">
        
                  <!--Card-->
                  <div class="card">
        
                    <!--Card content-->
                    <div class="card-body">

                    {!! Form::label('summary', trans('Summary').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('summary', old('summary'), ['class' => 'form-control ', 'placeholder' => '', 'id' => 'content-tincy']) !!}
                    @if($errors->has('summary'))
                        <p class="help-block">
                            {{ $errors->first('summary') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
 
                <!--Grid column-->
                <div class="col-md-4 mb-4">

                  <div class="row">

                    <div class="col-md-12">
                  <!--Card-->
                  <div class="card">
                    <!--Card content-->
                    <div class="card-body">
                    	<!-- Material input -->
		<div class="md-form">
		<i class="fab fa-twitter prefix"></i>
		{!! Form::label('twitter', trans('Twitter').'', ['class' => 'control-label']) !!}
		{!! Form::text('twitter', old('twitter'), ['class' => 'form-control', 'placeholder' => '']) !!}
		@if($errors->has('twitter'))
		    <p class="help-block">
		        {{ $errors->first('twitter') }}
		    </p>
		@endif
		</div> 
		<div class="md-form">
		<i class="fab fa-linkedin prefix"></i>
		{!! Form::label('linkedin', trans('LinkedIn').'', ['class' => 'control-label']) !!}
		{!! Form::text('linkedin', old('linkedin'), ['class' => 'form-control', 'placeholder' => '']) !!}
		@if($errors->has('linkedin'))
		    <p class="help-block">
		        {{ $errors->first('linkedin') }}
		    </p>
		@endif
		</div> 
        	
		    	</div>
		    </div>
                        </div>

                   
                    <!--/.Card-->
          
                 
                <div class="col-md-12 mt-4">
    
                        <!--Card-->
                            <div class="card mb-4 card-cascade narrower mt-4">
              
                          <!-- Card header -->
                         <div class="view view-cascade gradient-card-header blue-gradient">
                              <h4 class="mb-0 font-weight-500">Interests</h4>
                            </div>
              
                          <!--Card content-->
                          <div class="card-body">
                              
                                {!! Form::select('tags[]', $tags, old('tags'), ['class' => 'js-example-basic-multiple w-100', 'multiple' => 'multiple']) !!}
                                <p class="help-block"></p>
                                @if($errors->has('tags'))
                                    <p class="help-block">
                                        {{ $errors->first('tags') }}
                                    </p>
                                @endif
                            </div>

                        </div>
                        <!--/.Card-->
              
                      </div>
                      <!--Grid column-->
              
                              <!--Grid column-->
                        <div class="col-md-12">
              
                        <!--Card-->
                            <div class="card mb-4">
              
                          <!-- Card header -->
                          <div class="card-header text-center">
                            Avatar (Profile Image)
                          </div>
              
                          <!--Card content-->
                          <div class="card-body">
                         
                             
                                <div class="file-field md-form">
                                        <div class="btn btn-primary btn-sm float-left">
                                                <span>Choose file</span>
                                                <input type="file" name="avatar">
                                        </div>
                                        <div class="file-path-wrapper">
                                         <input class="file-path validate" type="text" placeholder="Upload your file">
                                        </div>
                                 </div> 
                                 @if($errors->has('avatar'))
                                        <p class="help-block">
                                            {{ $errors->first('avatar') }}
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
                </div>

      
      {!! Form::submit(trans('Update'), ['class' => 'btn btn-warning']) !!}
      {!! Form::close() !!}
    </main>
      @endsection