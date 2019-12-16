@extends('layouts.app')

@section('content')
  <!--Main layout-->

      @if($article->exists)
      <form method="POST" action="{{ route('article.edit', $article->id) }}" enctype="multipart/form-data">
        @method('PATCH')

    @else   
      <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">

    @endif 


   
@csrf
    <div class="container-fluid mt-5">
      <!-- SideNav slide-out button -->
     <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <div class="md-form mt-3 w-100">
              <input type="text" id="blogtitle" name="title" class="form-control" required="true" value="{{ old('title', $article->title) }}">
              <label for="title">Article Title</label>
              @if($errors->has('title'))
                <div class="alert alert-danger">
                    {{ $errors->first('title') }}
                </div>
              @endif
            
            </div>

        </div>

      </div>
      <!-- Heading -->


      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">
            	 <textarea id="content-tincy" name="content" placeholder="Awesome article">{!! old('content', $article->content) !!}</textarea>
              @if($errors->has('content'))
               <div class="alert alert-danger">
                   {{ $errors->first('content') }}
               </div>
            @endif
             </div>

      			</div>

            </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
   
      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

  					<div class="md-form mb-4 pink-textarea active-pink-textarea">
					  <textarea id="summarybox" name="summary" class="md-textarea form-control" rows="3" maxlength="200" required>{{ old('summary', $article->meta_description) }}</textarea>
					  <label for="form18">Summarize your article in 200 characters</label>
          
            @if($errors->has('summary'))
            <div class="alert alert-danger">
                {{ $errors->first('summary') }}
            </div>
            @endif  
            </div>
				  	<div id="textarea_feedback"></div>
            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
     		 <div class="card mb-4 card-cascade narrower">

            <!-- Card header -->
           <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="mb-0 font-weight-500">Tags</h4>
              </div>

            <!--Card content-->
            <div class="card-body">

              {!! Form::label('tags', 'Tags'.'', ['class' => 'control-label']) !!}
              {!! Form::select('tags[]', $tags, old('tags'), ['class' => 'js-example-basic-multiple w-100', 'multiple' => 'multiple','required']) !!}
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
        <div class="col-md-3 mb-4">

          <!--Card-->
              <div class="card mb-4">

            <!-- Card header -->
            <div class="card-header text-center">
              Cover Image
            </div>

            <!--Card content-->
            <div class="card-body">
            		
        		<div class="file-field md-form">
				    <div class="btn btn-primary btn-sm float-left">
				    <span>Choose file</span>
				     <input type="file" name="page_image">
				    </div>
				    <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload your file">
              <input type="hidden" name="page_image_max_size" value="5" />
              <input type="hidden" name="page_image_max_width" value="4096" />
              <input type="hidden" name="page_image_max_height" value="4096" />

				    </div>
            </div> 	
            @if($errors->has('page_image'))
            <div class="alert alert-danger">
                {{ $errors->first('page_image') }}
            </div>
            @endif  
                </div>
            </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
              <div class="col-md-3 mb-4">

          <!--Card-->
              <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header text-center">
                  Status
                </div>
                <!--Card content-->
                <div class="card-body">
                
                  <select class="mdb-select md-form" name="status">
                      <option value="" disabled selected>Choose your option</option>
                      @foreach($status as $key => $value)
                        <option value="{{$key}}" {{ (collect(old('status'))->contains($key)) ? 'selected':'' }}>{{$value}}</option>
                      @endforeach
                </select>
                </div>
            </div>
          <!--/.Card-->
        </div>
      </div>
      <!--Grid row-->
      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
          <button type="submit" class="btn btn-primary btn-lg">Add</button>
      </div>
  </form>
    </div>
   
  <!--Main layout-->

 
@endsection