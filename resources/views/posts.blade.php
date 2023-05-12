@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-primary">Dashboard</li>
            <li class="breadcrumb-item active">Posts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Semua Post</h3>
                        <form action="{{ route('post.index') }}" method="GET" class="form-inline ml-auto">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Cari" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#createModal">Create post</button>
                <table id="example1" class="table table-bordered table-striped">
                    
                    
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>image</th>
                            <th>title</th>
                            <th>content</th>
                            <th>Create by</th>
                            <th>views</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->image }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>{{ $post->created_by }}</td>
                            <td>{{ $post->views }}</td>
                            <td>
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal{{ $post->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $post->id }}">Delete</button>
                            </td>
                        </tr>
                         <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Post</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="title">Title:</label>
                                                <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                                            </div>
                                            {{-- image --}}
                                            <div class="form-groub">
                                                <label
                                                    for="image"
                                                >{{ __('Image') }}</label>
                                                <img src="{{ asset('/storage/images/'.$post->image) }}" class="outimgd d-block mb-2" width="200" src="" id="output"> {{-- output --}}
                                                <div class="">
                                                    <div class="input-group">
                                                        <div>
                                                            <input
                                                                name="image"
                                                                class="form-control @error('image') is-invalid @enderror"
                                                                value="{{ $post->image }}"
                                                                type="file"
                                                                accept="image/*"
                                                                id="formFile"
                                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"
                                                                onchange="loadFile(event)"
                                                            >
                                                            <small
                                                                for="formFile"
                                                                class="form-label"
                                                            >Silahkan Upload Foto Anda</small>
                                                        </div>
                                                    </div>
                                                    @error('image')
                                                        <span
                                                            class="invalid-feedback"
                                                            role="alert"
                                                        >
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="content">Content:</label>
                                                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="is_pinned">Is Pinned:</label>
                                                <select name="is_pinned" class="form-control">
                                                    <option value="1" {{ $post->is_pinned == 1 ? 'selected' : '' }}>Di Pin</option>
                                                    <option value="0" {{ $post->is_pinned == 0 ? 'selected' : '' }}>Tidak Di Pin</option>
                                                </select>
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete {{ $post->title }}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </tbody>
                   
                </table>
                    <!-- menampilkan pagination links -->
                    <div class="d-flex justify-content-end mt-3">
                        {{ $posts->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
                <!-- /.card-body -->

                <!-- Modal Create -->
                <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="createModalLabel">Buat Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="image">{{ __('Image') }}</label>
                                        <img class="outimgd d-block" width="200" src="" id="createOutput">
                                        <div>
                                            <input
                                                name="image"
                                                class="form-control @error('image') is-invalid @enderror"
                                                type="file"
                                                accept="image/*"
                                                id="createImageInput"
                                            >
                                            <small class="form-text text-muted">Silahkan Upload Foto Anda</small>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea name="content" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_pinned">Is Pinned:</label>
                                        <select name="is_pinned" class="form-control">
                                            <option value="1">Di Pin</option>
                                            <option value="0">Tidak Di Pin</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal create --}}
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>

  <script>
    // Function to preview image in create post modal
function createPreviewImage(input) {
    var createOutput = document.getElementById('createOutput');
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            createOutput.setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

// Event listener for create post image input
var createImageInput = document.getElementById('createImageInput');
createImageInput.addEventListener('change', function() {
    createPreviewImage(this);
    // Add style to the preview image
    var createOutput = document.getElementById('createOutput');
    createOutput.style.marginBottom = '10px';
});

</script>
@endsection