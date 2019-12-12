@extends('layouts.app')

@section('content')
  <!--Main layout-->


   <form method="POST" name="frmCompose" action="{{ route('storeArticle') }}" enctype="multipart/form-data">
@csrf
    <div class="container-fluid mt-5">
      <!-- SideNav slide-out button -->
     <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <div class="md-form mt-3 w-100">
                <input type="text" id="blogtitle" name="title" class="form-control" required="true">
                <label for="materialContactFormName">Article Title</label>
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
            	 <textarea id="content-tincy" name="content" placeholder="Awesome article"></textarea>
   			     </div>

			</div>

            </div>

        
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
         
          <!--/.Card-->




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
					  <textarea id="summarybox" name="summary" class="md-textarea form-control" rows="3" maxlength="200" required></textarea>
					  <label for="form18">Summarize your article in 200 characters</label>
					
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

         	<select class="js-example-basic-multiple w-100" name="tags[]" multiple="multiple" required>
               @foreach($tags as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
			

				</select>
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
				    </div>
  					</div> 	
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


              <option value="{{$key}}">{{$value}}</option>
          @endforeach
      
        </select>
                </div>
            </div>
          <!--/.Card-->

        </div>


      </div>
      <!--Grid row-->
      <input type="hidden" name="uid" value="{{auth()->user()->id }}">

      
      <button type="submit" class="btn btn-primary btn-lg">Add</button>
    </div>
  </form>
    </div>
   
  <!--Main layout-->

 
@endsection