<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Muh1s | Post Detail</title>

  <link rel="icon" href="{{ asset('images/SMKlogo.webp') }}" type="image/x-icon">

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


  <link href="{!! asset('../assets/dist/css/bootstrap.min.css') !!}" rel="stylesheet">

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

  <header>
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
              <a href="{{ url('/') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('posts') }}" class="text-sm text-white">Posts</a>
            </li>
            <li class="nav-item">
              <a href="{{ url('dashboard/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
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

  <hr class="featurette-divider">

  <main>
    

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card mb-5 mt-5">
            <div class="card-body">
              <div class="imagecard overflow-hidden mb-1">
                <img class="bd-placeholder-img card-img-top" width="100%" height="400" src="{{ asset('/storage/images/'.$post->image) }}" alt="" style="border-radius: 0px; object-fit: cover;">
              </div>
              <h2 class="fw-light">{{ $post->title }}</h2>
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
                    <div class="btn-group">
                      
                        <button class="btn btn-sm btn-outline-danger" href="{{ url('posts') }}" 
                        onclick="goBack()"
                        >
                        {{-- <a href="{{ url('posts') }}" class="text-decoration-none text-white" --}}
                        Back
                        {{-- </a> --}}
                        </button>
                      
  
                        {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                      </div>
                </div>
                <small class="text-muted">{{ $post->updated_at }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title">Comments</h5>
              <hr>
              <!-- Add your comment section here -->
 {{-- comment --}}
 <section style="margin-top: 30xp" class="content-item" id="comment">
  <div class="container">
      <div class="row">
          <div class="col-sm-8">
              @auth
              <form id="comment-form" action="{{route('comment',$post->slug)}}" method="POST" style="margin-bottom: 50px">
                  @csrf
                  {{-- <h3 style=" font-family: Neucha, sans-serif;" class="pull-left" >Comment</h3> --}}
                  <fieldset>
                      <div class="row">
                          {{-- <div class="col-sm-3 col-lg-2 hidden-xs">
                              @if (Auth::user()->image)
                                  <img class="imagecoms img-responsive" src="{{ asset('storage/images/user/' . Auth::user()->image) }}"
                                      width="100" alt="">
                              @else
                                  <img class="imagecoms img-responsive"
                                      src="{{ asset('gambar/npc.jpg') }}" width="100"
                                      alt="">
                              @endif
                          </div> --}}
                          <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                              <input type="hidden" name="post_id" value="{{ $post->id }}">  
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="parent_id" value="{{ $parent_id ?? null }}"> 

                              <textarea class="inputcom form-control" name="content" id="message" placeholder="Your message" required=""></textarea>
                              <button style="" type="submit" class="button-55 btn btn-normal pull-right" >Submit</button>
                          </div>
                      </div>
                  </fieldset>
              </form>
              @endauth
              @guest
                  <p>Silakan <a href="{{ route('login') }}">login</a> atau <a href="{{ route('register') }}">register</a> untuk
                      mengomentari.</p>
              @endguest
              <h3 style=" font-family: Neucha, sans-serif; ">{{$comments->count()}} Comments</h3>



              @foreach ($comments as $comment)
  {{-- {{ $comment }} --}}
      <div class="container__">
          @if ($comment->parent_id == null)
          <div class="comment__container opened" id="comment-{{ $comment->id }}">
              <div class="comment__card">
                  <div class="comment__title">
                      <span class="fs-5 fw-bold">
                          <img src="{{ ($comment->user->image == null) ? asset('gambar/npc.jpg') : asset('storage/images/user/'.$comment->user->image) }}" class="rounded-circle" width="5%"> 
                          &nbsp; {{ $comment->user->name }}
                      </span>
                      <span class="fs-6"> - {{ $comment->created_at->diffForHumans() }}
                      </span>
                  </div>
                  <p>{{ $comment->content }}</p>
                  <div class="comment__card-footer">
                      @auth
                      @if ($comment->user->nama == auth()->user()->nama)
                      <div data-bs-toggle="collapse" data-bs-target="#editComment{{ $comment->id }}" aria-expanded="false" aria-controls="editComment{{ $comment->id }}">
                          Edit
                      </div>
                      <div class="delete-button" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $comment->id }}').submit();">
                          Delete
                      </div>
                      <form id="delete-form-{{ $comment->id }}" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" method="POST" class="d-none">
                          @csrf
                          @method('DELETE')
                      </form>
                      @endif
                      <div data-bs-toggle="collapse" data-bs-target="#replyComment{{ $comment->id }}" aria-expanded="false" aria-controls="replyComment{{ $comment->id }}">
                          Reply
                      </div>
                      @endauth
                      <div class="show-replies">Show Reply</div>
                  </div>
                  <div class="collapse" id="editComment{{ $comment->id }}">
                      <form action="{{ route('comments.update', ['comment' => $comment->id]) }}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="mb-3">
                          <textarea 
                          class="form-control" 
                          id="content" 
                          name="content" 
                          class="form-control" 
                          maxlength="255"

                          oninput="document.getElementById('counter_update{{ $comment->id }}').textContent = (255 - this.value.length) + ' karakter tersisa'"
                          >{{ $comment->content }}</textarea>
                          <div id="counter_update{{ $comment->id }}"></div>
                      </div>
                      @error('content')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      @auth
                      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      @endauth
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                  </div>
{{-- input balas comen 1 --}}
                  <div class="collapse" id="replyComment{{ $comment->id }}">
                      <form action="{{ route('comment', ['post' => $post->slug]) }}" method="POST">
                      @csrf
                      @method('POST') {{-- menyesuaikan method router --}}
                      <div class="mb-3">
          
                          <textarea autofocus class="form-control" 
                          id="content" 
                          name="content"
                          maxlength="255"
                          oninput="document.getElementById('counter_reply_comment{{ $comment->id }}').textContent = (255 - this.value.length) + ' karakter tersisa'">{{ __('@:username ', ['username' => $comment->user->nama]) }}</textarea>
                          <div id="counter_reply_comment{{ $comment->id }}"></div>
                      </div>
                      @error('content')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      @auth
                      <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      @endauth
                      <input type="hidden" name="post_id" value="{{ $post->id }}">
                      <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                      <button type="submit" class="btn btn-primary">Send</button>
                      </form>
                  </div>
              </div>

              <div class="comment__container" dataset="comment-{{ $comment->id }}" id="reply-{{ $comment->id }}">
                  @if(count($comment->replies))
                  @foreach ($comment->replies as $reply)
                  <div class="comment__card">
                      <div class="comment__title">
                          <span class="fs-5 fw-bold">
                              <img src="{{ ($reply->user->gambar == null) ? asset('images/null.jfif') : asset('storage/images/'.$reply->user->gambar) }}" class="rounded-circle" width="5%"> 
                              &nbsp; {{ $reply->user->nama }}
                          </span> 
                          <span class="fs-6"> - {{ $reply->created_at->diffForHumans() }}</span>
                      </div>
                      <p>{{ $reply->content }}</p>
                      <div class="comment__card-footer">
                          @auth
                          @if ($reply->user->nama == auth()->user()->nama)
                          <div data-bs-toggle="collapse" data-bs-target="#editReplyComment{{ $reply->id }}" aria-expanded="false" aria-controls="editReplyComment{{ $reply->id }}">
                              Edit
                          </div>
                          <div class="delete-button" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $reply->id }}').submit();">
                              Delete
                          </div>
                          <form id="delete-form-{{ $reply->id }}" action="{{ route('comments.destroy', ['id' => $reply->id]) }}" method="POST" class="d-none">
                              @csrf
                              @method('DELETE')
                          </form>
                          @endif
                          <div data-bs-toggle="collapse" data-bs-target="#replyReplyComment{{ $reply->id }}" aria-expanded="false" aria-controls="replyReplyComment{{ $reply->id }}">
                              Reply
                          </div>
                          @endauth
                          <div class="show-replies">Show Reply</div>
                      </div>

                      <div class="collapse" id="editReplyComment{{ $reply->id }}">
                          <form action="{{ route('comments.update', ['comment' => $reply->id]) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="mb-3">
                              <textarea 
                              class="form-control" 
                              id="content" 
                              name="content" 
                              class="form-control" 
                              maxlength="255"
                              oninput="document.getElementById('reply_update{{ $comment->id }}').textContent = (255 - this.value.length) + ' karakter tersisa'"
                              >{{ $comment->content }}</textarea>
                              <div id="reply_update{{ $comment->id }}"></div>
                          </div>
                          @error('content')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          @auth
                          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          @endauth
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <button type="submit" class="btn btn-primary">Update</button>
                          </form>
                      </div>
{{-- input balas komen 2 --}}
                      <div class="collapse" id="replyReplyComment{{ $reply->id }}">
                          <form action="{{ route('comment', ['post' => $post->slug]) }}" method="POST">
                          @csrf
                          @method('POST')
                          <div class="mb-3">
                              <textarea autofocus class="form-control" 
                              id="content" 
                              name="content"
                              maxlength="255"
                              oninput="document.getElementById('reply_reply_comment{{ $comment->id }}').textContent = (255 - this.value.length) + ' karakter tersisa'">{{ __('@:username ', ['username' => $comment->user->nama]) }}</textarea>
                              <div id="reply_reply_comment{{ $comment->id }}"></div>
                          </div>
                          @error('content')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          @auth
                          <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                          @endauth
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                          <button type="submit" class="btn btn-primary">Send</button>
                          </form>
                      </div>
                  </div>

                  <div class="comment__container"  dataset="reply-{{ $comment->id }}" id="reply-reply-{{ $reply->id }}">
                  @if ($reply->replies)
                      @foreach ($reply->replies as $reply2)
                          <div class="comment__card">
                              <div class="comment__title">
                                  <span class="fs-5 fw-bold">
                                      <img src="{{ ($reply2->user->pp == null) ? asset('images/null.jfif') : asset('storage/images/'.$reply2->user->pp) }}" class="rounded-circle" width="5%"> 
                                      &nbsp; {{ $reply2->user->nama }}
                                  </span> 
                                  <span class="fs-6">
                                      - {{ $reply2->created_at->diffForHumans() }}
                                  </span>
                                  </div>
                              <p>{{ $reply2->content }}</p>
                              <div class="comment__card-footer">
                                  @auth
                                  @if ($reply2->user->nama == auth()->user()->nama)
                                  <div data-bs-toggle="collapse" data-bs-target="#editReplyReplyComment{{ $reply2->id }}" aria-expanded="false" aria-controls="editReplyReplyComment{{ $reply2->id }}">
                                      Edit
                                  </div>
                                  <div class="delete-button" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $reply2->id }}').submit();">
                                      Delete
                                  </div>
                                  <form id="delete-form-{{ $reply2->id }}" action="{{ route('comments.destroy', ['id' => $reply2->id]) }}" method="POST" class="d-none">
                                      @csrf
                                      @method('DELETE')
                                  </form>
                                  @endif
                                  @endauth
                              </div>
                              <div class="collapse" id="editReplyReplyComment{{ $reply2->id }}">
                                  <form action="{{ route('comments.update', ['comment' => $reply2->id]) }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="mb-3">
                                      <textarea 
                                      class="form-control" 
                                      id="content" 
                                      name="content" 
                                      class="form-control" 
                                      oninput="document.getElementById('reply_reply_update{{ $comment->id }}').textContent = (255 - this.value.length) + ' karakter tersisa'"
                                      >{{ $comment->content }}</textarea>
                                      <div id="reply_reply_update{{ $comment->id }}"></div>
                                  </div>
                                  @error('content')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  @auth
                                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                  @endauth
                                  <input type="hidden" name="post_id" value="{{ $post->id }}">
                                  <button type="submit" class="btn btn-primary">Update</button>
                                  </form>
                              </div>
                          </div>
                      @endforeach
                  @endif
                  </div>
                  @endforeach
                  @endif
              </div>
          </div>
          @endif
      </div>
  @endforeach
          

          </div>
      </div>
  </div>
</section>



            </div>
          </div>
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

  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  <script src="{{ asset('../assets/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
