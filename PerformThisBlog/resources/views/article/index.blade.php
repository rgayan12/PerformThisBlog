@extends('layouts.app')

@section('content')
         @include('layouts.navbar')

         <!--Main layout-->

<main class="pt-5 mx-lg-5">

<div class="container-fluid mt-5">
 <div class="row">   
@if(count($myarticles) > 0 )   
@foreach ($myarticles as $article)

<div class="col-md-3 mt-2">  
<!-- Card Regular -->
<div class="card card-cascade">

        <!-- Card image -->
        <div class="view view-cascade overlay">
          @if($article->page_image)   
          <img class="card-img-top img-thumbnail" src="{{ env('AWS_URL') .'thumbnails/'.$article->page_image }}" alt="Card image cap" style="max-height: 160px;">
          @endif
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
          <a type="button" class="btn-floating btn-small btn-tw" href="{{ env('BLOG_VIEW_URI') .'/'. $article->slug }}"><i class="fas fa-eye"></i></a>
          <!-- Google + -->
          <a type="button" class="btn-floating btn-small btn-dribbble" href="{{ route('article.edit', $article->id )}}"><i class="fas fa-pencil-alt"></i></a>
      
        </div>
      
      </div>
      <!-- Card Regular -->
    
        </div>
@endforeach
<div class="col-md-12 mt-3 d-flex justify-content-center"> 
  {{ $myarticles->links() }}
</div>
@else
<h2>You Have not Created any articles <a href="{{route('article.create') }} "> Click Here </a> to create your first article</h2>
@endif
</div>
</div>
</main>
@endsection

