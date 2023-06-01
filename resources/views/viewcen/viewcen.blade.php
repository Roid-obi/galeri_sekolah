<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Muh1s | Welcome</title>

    <link rel="icon" href="{{ asset('images/SMKlogo.webp') }}" type="image/x-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    

    <link href=" {!! asset('../assets/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
   
    <link rel="stylesheet" href="{!! asset('css/carousel.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/carousel.rtl.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">

  </head>
  <body>

    
    
<header >
  <nav id="navbarwel" class="navbar navbar-expand-md navbar-dark fixed-top bg-black" style="">
    <div class="container container-fluid">
      <img src="{{ asset('images/SMKlogo.webp') }}" alt="Muh1h" width="40px" class="brand-image me-1" style="opacity: .8">
      <a class="navbar-brand" href="{{ url('/') }}">SMK Mutuharjo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        @if (Route::has('login'))
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            @auth
            <li class="nav-item">
              <a href="{{ url('/') }}" class="active text-sm" >Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('posts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Posts</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('dashboard/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Dashboard</a>
            </li>
            
            @else
            <li class="nav-item">
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
            </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                </li>
                @endif
            @endauth
          </ul>
    @endif
        
      </div>
    </div>
  </nav>
</header>





<main>
@if($title != 'Categories' && $title != 'Tags')
  {{-- slide show --}}
 
  <div class="ban-slideshow" style="margin-top: -47px;" style="height: 70%">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
      {{-- <div class="carousel-indicators">
        @foreach ($posts->where('is_pinned', true) as $index => $post)
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $index }}" class="@if ($loop->first) active @endif" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
      </div> --}}
    
      <div class="carousel-inner" >
        {{-- hanya post yang memiliki is_panned=true yang diloop --}}
        @foreach ($posts->where('is_pinned', true) as $index => $post) 
        <div class="carousel-item @if ($loop->first) active @endif">
          
          <img  width="100%" src="{{ asset('/storage/images/'.$post->image) }}" alt="">
          <div class="container">
            <div class="carousel-caption text-center">
              <h1>{{ $post->title }}</h1>
              <p>{!! $post->content !!}</p>
              <p><a class="butn-crl btn-lg btn-dark" href="/posts/{{ $post->slug }}">Read More...</a></p>
            </div>
          </div>
        </div>
    @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>



  <div class="container marketing">


@endif


    {{-- posts --}}
    <hr class="featurette-divider">
    
<main>

  <section class="py-5 text-center container">
    
        <h1 class="fw-light">{{ $title }}</h1>
      
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        @if ($posts->where('is_pinned', false)->isEmpty())
            <p class="ms-5">Belum ada postingan...</p>
        @else
      @foreach ($posts->where('is_pinned', false) as $post)
          <div class="kartu-posting">
            <div class="col">
              <div class="card">
                {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> --}}
              <div class="imagecard overflow-hidden">
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{ asset('/storage/images/'.$post->image) }}" alt="" style="border-radius: 0px; object-fit: cover;">
              </div>
                <div class="card-body">


                  <h4 class="card-text">{{ $post->title }}</h4>

                  <div class="d-flex justify-content-end">
                  @foreach($post->categories as $category)
                      <div class="namacatego btn-outline-secondary btn-sm">
                          <a class="text-decoration-none" href="{{ route('post.category', $category->id) }}">
                              {{ $category->name }}
                          </a>
                      </div>
                  @endforeach
                  </div>
                  <div class="d-flex justify-content-end">
                  @foreach($post->tags as $tag)
                      <div class="namatag btn-outline-secondary btn-sm" >
                          <a class="text-decoration-none text-info" href="{{ route('post.tag', $tag->id) }}">
                              #{{ $tag->name }}
                          </a>
                      </div>
                  @endforeach
                  </div>


                    <p>Views: {{ $post->views }}</p>
                            
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="/posts/{{ $post->slug }}">
                        <button   type="button" class="btn btn-sm btn-outline-secondary mt-3">View</button>
                      </a>
                    

                      {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                    </div>
                    <small class="text-muted">{{ $post->updated_at }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endforeach
      @endif

        

      </div>
    </div>
  </div>

</main>



@if($title != 'Categories' && $title != 'Tags')
    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="waifu/zeta_kya.jpg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" style="border-radius: 50%" src="waifu/hutao-lev.webp" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">


      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
        {{-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg> --}}
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" style="border-radius: 50%" src="waifu/skadi-boba.png" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">

      </div>
    </div>
@endif
    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2023 SMK Mutuharjo, Mr &middot; <a href="#">Roid</a></p>
  </footer>
</main>





    <script src="{{ asset('../assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      
  </body>
</html>
