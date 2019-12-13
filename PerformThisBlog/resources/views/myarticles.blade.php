@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
 <div class="row">   
@foreach ($myarticles as $article)
<div class="col-md-4">  
<!-- Card Regular -->
<div class="card card-cascade">

        <!-- Card image -->
        <div class="view view-cascade overlay">
          <img class="card-img-top" src="{{ env('AWS_URL') . $article->page_image }}" alt="Card image cap">
          
          <a>
            <div class="mask rgba-white-slight"></div>
          </a>
        </div>
      
        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">
      
          <!-- Title -->
          <h4 class="card-title"><strong>{{$article->title}}</strong></h4>
          <!-- Subtitle -->
          <!-- Text -->
          <p class="card-text">
              {{ strip_tags(str_limit($article->content, $limit=150, $end = '....')) }}
          </p>
      
          <!-- Twitter -->
        <a type="button" class="btn-floating btn-small btn-tw"><i class="fab fa-twitter"></i></a>
          <!-- Google + -->
          <a type="button" class="btn-floating btn-small btn-dribbble" href="{{ route('article.edit', $article->id )}}"><i class="fas fa-pencil-alt"></i></a>
      
        </div>
      
      </div>
      <!-- Card Regular -->
    
        </div>
@endforeach
</div>
</div>
@endsection

