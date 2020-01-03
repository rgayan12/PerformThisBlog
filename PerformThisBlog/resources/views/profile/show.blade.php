@extends('layouts.app')

@section('content')
<style>
    html,
    body,
    header,
    .jarallax {
      height: 600px;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .jarallax {
        height: 100vh;
      }
    }

     @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .jarallax {
        height: 100vh;
      }
    }

    @media (min-width: 560px) and (max-width: 660px) {
      header .jarallax h5 {
        display: none !important;
      }
    }

    .page-footer {
      margin-top: 0px;
      padding-top: 0px;
    }

  </style>
 <header>
    <!-- Intro Section -->
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient3.png); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="mask rgba-indigo-slight">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row pt-5 mt-3">
            <div class="col-md-12 mb-3">
              <div class="intro-info-content text-center">
                <h1 class="display-3 blue-text mb-5 wow fadeInDown" data-wow-delay="0.3s">ABOUT
                  <a class="blue-text font-weight-bold">ME</a>
                </h1>
                <h5 class="text-uppercase blue-text mb-5 mt-1 font-weight-bold wow fadeInDown" data-wow-delay="0.3s">Connect with Me</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</header>
<main class="p-0">

    <div class="container-fluid">

      <!--Section: Team v.1-->
      <section class="text-center team-section">

        <!--Grid row-->
        <div class="row text-center">

          <!--Grid column-->
          <div class="col-md-12 mb-4" style="margin-top: -100px;">

            <div class="avatar mx-auto">
            
            <img class="img-fluid rounded-circle z-depth-1" src="{{ env('AWS_URL') . $profile->user_id. '/avatar/'.$profile->avatar }}" alt="Profile Image">
              
            </div>
            <h3 class="my-3 font-weight-bold">
              <strong>{{ $profile->first_name .' '. $profile->last_name }}</strong>
            </h3>
            <h6 class="font-weight-bold teal-text mb-4">Writer</h6>

            <!--Facebook-->
            <a class="p-2 m-2 fa-lg fb-ic" href="https://linkedin.com/{{ $profile->linkedin }}" target="_blank">
              <i class="fab fa-linkedin grey-text"> </i>
            </a>
            <!--Twitter-->
            <a class="p-2 m-2 fa-lg tw-ic" href="https://linkedin.com/{{ $profile->twitter }}" target="_blank">
              <i class="fab fa-twitter grey-text"> </i>
            </a>
          
            @if($user->id == $profile->user->id)
            <a href="{{route('article.index')}}">Go Back </a>
            @endif
            <p class="mt-5">{!! $profile->summary !!}</p>

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Team v.1-->

      <!--Section: Tabs-->
      <section>

        <ul class="nav md-pills pills-default d-flex justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel11" role="tab" aria-selected="true">
              <strong>My Portfolio</strong>
            </a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">

          <!--Panel 1-->
          <div class="tab-pane fade  show active" id="panel11" role="tabpanel">
            <br>

            <!--Grid row-->
            <div class="row">

              <!--Grid column-->
              <div class="col-md-12">

                <!--Projects section v.4-->
                <section class="text-center mb-5">

                  <!--Grid row-->
                  <div class="row mb-4">
                    @if(count($myarticles) > 0)
                    @foreach($myarticles as $article)

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                      <div class="card card-image" style="background-image: url('{{ env('AWS_URL') .'thumbnails/thumbnail'.$article->page_image }}');">

                        <!-- Content -->
                        <div class="text-left text-white d-flex rgba-blue-strong py-5 px-4">
                          <div>
                            <h3 class="mb-4 mt-4 font-weight-bold">
                              <strong>{{ $article->title }}</strong>
                            </h3>
                              
                                {{ str_limit(strip_tags($article->content),100) }}
                                
                            <a class="btn btn-outline-white btn-sm">
                              <i class="fas fa-clone left"></i> Read article</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--Grid column-->
                    @endforeach
                    @else 

                    <div class="container h-100 d-flex justify-content-center align-items-center">
                    <h2>There are no items at the moment</h2>
                    </div>
                    @endif
                   
                  </div>
                  <!--Grid row-->
                </section>
                <!--Projects section v.4-->

              </div>
              <!--Grid column-->

            </div>
            <!--Grid row-->

          </div>
          <!--/.Panel 1-->

      

      

        </div>

      </section>
      <!--Section: Tabs-->

    </div>

  </main>
  <!--Main Layout-->
  
  @include('layouts.footer')

@endsection