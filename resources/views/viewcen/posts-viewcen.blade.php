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
    <link rel="stylesheet" href="{!! asset('css/welcome.css') !!}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  </head>
  <body>

    
    
<header >
  <nav id="navbarwel" class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" style="height: 60px">
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
              <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline" >Home</a>
            </li>
            <li class="nav-item">
                <a href="{{ url('posts') }}" class="text-sm text-white" >Posts</a>
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



    {{-- posts --}}
    <hr class="featurette-divider">
    
<main>

  <section class="py-5 mt-5 text-center container">
    
        <h1 class="fw-light">{{ $title }}</h1>
      
  </section>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <form action="{{ route('welcome.posts') }}" method="GET" class="form-inline">
          <div class="input-group input-group-md">
            <input class="form-control form-control-navbar" type="search" placeholder="Cari" name="search" value="{{ request('search') }}">
              <button type="submit" class="btn btn-outline-secondary">
                <i class="fa fa-search"></i>
              </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  {{-- <div class="input-group mb-3"> 
    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
  </div> --}}
  
  

  <div class="album py-5">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      @foreach ($posts as $post)
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
                    {{-- <i class="fas fa-tags"></i> --}}
                      @foreach($post->tags as $tag)
                          <div class="namatag btn-outline-secondary btn-sm">
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
                        <button   type="button" class="butn-view-post btn btn-sm btn-outline-secondary mt-3">View</button>
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

        

      </div>
    </div>
  </div>

</main>




    <hr class="featurette-divider">


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a class="text-decoration-none text-danger-emphasis" href="#">Back to top</a></p>
    <p>&copy; 2023 SMK Mutuharjo, Mr &middot; <a class="text-decoration-none" href="#">Roid</a></p>
  </footer>
</main>





    <script src="{{ asset('../assets/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      
  </body>
</html>
