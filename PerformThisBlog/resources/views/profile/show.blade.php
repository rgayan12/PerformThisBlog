@extends('layouts.app')

@section('content')
<style>
    html,
    body,
    header,
    .jarallax {
      height: 700px;
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
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(10).jpg" class="img-fluid rounded-circle z-depth-1"
                alt="First sample avatar image">
            </div>
            <h3 class="my-3 font-weight-bold">
              <strong>{{ $profile->first_name .' '. $profile->last_name }}</strong>
            </h3>
            <h6 class="font-weight-bold teal-text mb-4">Writer @ Daily Mail</h6>

            <!--Facebook-->
            <a class="p-2 m-2 fa-lg fb-ic" href="https://linkedin.com/{{ $profile->linkedin }}">
              <i class="fab fa-linkedin grey-text"> </i>
            </a>
            <!--Twitter-->
            <a class="p-2 m-2 fa-lg tw-ic" href="https://linkedin.com/{{ $profile->twitter }}">
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
              <strong>My Articles</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel12" role="tab">
              <strong>My team</strong>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel13" role="tab">
              <strong>Portfolio</strong>
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
                    @foreach($myarticles as $article)
                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                      <div class="card card-image" style="background-image: url('{{ env('AWS_URL') .'thumbnails/thumbnail'.$article->page_image }}');">

                        <!-- Content -->
                        <div class="text-white text-center d-flex align-items-center rgba-blue-strong py-5 px-4">
                          <div>
                            <h3 class="mb-4 mt-4 font-weight-bold">
                              <strong>{{ $article->title }}</strong>
                            </h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat fugiat, laboriosam,
                              voluptatem,
                              optio vero odio nam sit officia accusamus minus error nisi architecto nulla ipsum
                              dignissimos.
                              Odit sed qui, dolorum!.</p>
                            <a class="btn btn-outline-white btn-sm">
                              <i class="fas fa-clone left"></i> Read article</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Grid column-->
                    @endforeach
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

          <!--Panel 2-->
          <div class="tab-pane fade" id="panel12" role="tabpanel">
            <br>

            <!-- Section: Team v.3 -->
            <section id="team" class="section team-section pb-4">

              <!-- Section heading -->
              <h2 class="font-weight-bold text-center h1 my-5">Our amazing team</h2>
              <!-- Section description -->
              <p class="text-center grey-text mb-5 mx-auto w-responsive">Lorem ipsum dolor sit amet, consectetur
                adipisicing elit. Fugit, error amet numquam iure provident voluptate esse quasi, veritatis totam
                voluptas nostrum quisquam eum porro a pariatur accusamus veniam.</p>

              <!-- Grid row -->
              <div class="row mb-lg-4 text-center text-md-left">

                <!-- Grid column -->
                <div class="col-lg-6 col-md-12 mb-4">

                  <div class="col-md-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-3">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" class="z-depth-1" alt="First sample avatar image">
                    </div>
                  </div>

                  <div class="col-md-6 float-right">
                    <h4><strong>John Doe</strong></h4>
                    <h6 class="font-weight-bold grey-text mb-4">Web Designer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis
                      hic tenetur.</p>

                    <!-- Facebook -->
                    <a class="p-2 m-2 fa-lg fb-ic"><i class="fab fa-facebook-f"> </i></a>
                    <!-- Twitter -->
                    <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter"> </i></a>
                    <!-- Dribbble -->
                    <a class="p-2 m-2 fa-lg dribbble-ic"><i class="fab fa-dribbble"> </i></a>
                  </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-6 col-md-12 mb-4">

                  <div class="col-md-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-3">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="z-depth-1" alt="Second sample avatar image">
                    </div>
                  </div>

                  <div class="col-md-6 float-right">
                    <h4><strong>Maria Kate</strong></h4>
                    <h6 class="font-weight-bold grey-text mb-4">Photographer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis
                      hic tenetur.</p>

                    <!-- Facebook -->
                    <a class="p-2 m-2 fa-lg fb-ic"><i class="fab fa-facebook-f"> </i></a>
                    <!-- YouTube -->
                    <a class="p-2 m-2 fa-lg yt-ic"><i class="fab fa-youtube"> </i></a>
                    <!-- Instagram -->
                    <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram"> </i></a>
                  </div>

                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

              <!-- Grid row -->
              <div class="row text-center text-md-left">

                <!-- Grid column -->
                <div class="col-lg-6 col-md-12 mb-4">

                  <div class="col-md-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-3">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(26).jpg" class="z-depth-1" alt="Fourth sample avatar image">
                    </div>
                  </div>

                  <div class="col-md-6 float-right">
                    <h4><strong>Anna Deynah</strong></h4>
                    <h6 class="font-weight-bold grey-text mb-4">Web Developer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis
                      hic tenetur.</p>

                    <!-- Facebook -->
                    <a class="p-2 m-2 fa-lg fb-ic"><i class="fab fa-facebook-f"> </i></a>
                    <!-- Twitter -->
                    <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter"> </i></a>
                    <!-- GitHub -->
                    <a class="p-2 m-2 fa-lg git-ic"><i class="fab fa-github"> </i></a>
                  </div>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-lg-6 col-md-12 mb-4">
                  <div class="col-md-6 float-left">
                    <div class="avatar mx-auto mb-md-0 mb-3">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(29).jpg" class="z-depth-1" alt="Fifth sample avatar image">
                    </div>
                  </div>

                  <div class="col-md-6 float-right">
                    <h4><strong>Sarah Melyah</strong></h4>
                    <h6 class="font-weight-bold grey-text mb-4">Front-end Developer</h6>
                    <p class="grey-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis
                      hic tenetur.</p>

                    <!-- Google + -->
                    <a class="p-2 m-2 fa-lg gplus-ic"><i class="fab fa-google-plus-g"> </i></a>
                    <!-- LinkedIn -->
                    <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in"> </i></a>
                    <!-- Email -->
                    <a class="p-2 m-2 fa-lg email-ic"><i class="fas fa-envelope"> </i></a>
                  </div>

                </div>
                <!-- Grid column -->

              </div>
              <!-- Grid row -->

            </section>
            <!-- Section: Team v.3 -->
          </div>
          <!--/.Panel 2-->

          <!--Panel 3-->
          <div class="tab-pane fade" id="panel13" role="tabpanel">
            <br>

            <div class="row d-flex justify-content-center">
              <div class="col-md-12">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox no-gutters">

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(71).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(71).jpg" class="img-fluid">
                    </a>
                  </figure>

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(65).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(65).jpg" class="img-fluid" />
                    </a>
                  </figure>

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(84).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(84).jpg" class="img-fluid" />
                    </a>
                  </figure>

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(88).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(88).jpg" class="img-fluid" />
                    </a>
                  </figure>

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(79).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(79).jpg" class="img-fluid" />
                    </a>
                  </figure>

                  <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(81).jpg" data-size="1600x1067">
                      <img src="https://mdbootstrap.com/img/Mockups/Lightbox/Thumbnail/img%20(81).jpg" class="img-fluid" />
                    </a>
                  </figure>

                </div>

              </div>
            </div>

          </div>
          <!--/.Panel 3-->

          <!--Panel 4-->
          <div class="tab-pane fade" id="panel14" role="tabpanel">
            <br>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
              reiciendis
              molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro
              voluptate
              odit minima.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil odit magnam minima, soluta doloribus
              reiciendis
              molestiae placeat unde eos molestias. Quisquam aperiam, pariatur. Tempora, placeat ratione porro
              voluptate
              odit minima.</p>

          </div>
          <!--/.Panel 4-->

        </div>

      </section>
      <!--Section: Tabs-->

    </div>

  </main>
  <!--Main Layout-->

  <!--Footer-->
  <footer class="page-footer mdb-color lighten-3 text-center text-md-left">

    <!--Footer Links-->
    <div class="container">

      <!--First row-->
      <div class="row">
        <div class="col-md-12">

          <h5 class="my-5 d-flex justify-content-center">If you want to cooperate with me just send me a message at
            office@mdbootstrap.com</h5>
        </div>
      </div>
      <!--/First row-->
    </div>
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright text-center py-3 wow fadeIn" data-wow-delay="0.3s">
      <div class="container-fluid">
        &copy; 2019 Copyright:
        <a href="https://mdbootstrap.com/docs/jquery/"> MDBootstrap.com </a>
      </div>
    </div>
    <!--/Copyright-->

  </footer>
  <!--/Footer-->


@endsection