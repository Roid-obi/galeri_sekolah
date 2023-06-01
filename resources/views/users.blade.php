@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengguna</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-white">Dashboard</li>
            <li class="breadcrumb-item active">Pengguna</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Loading overlay start -->
  {{-- <div class="loding overlay" id="loading-overlay">
      <i class="fas fa-2x fa-sync-alt fa-spin"></i>
  </div> --}}
  <!-- Loading overlay end -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Daftar Semua Pengguna</h3>
                        <form action="{{ route('users') }}" method="GET" class="form-inline ml-auto">
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
                <table id="example1" class="table table-bordered table-striped table-dark table-hover" style="border: rgba(137, 43, 226, 0.643);">
                    
                    
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $index=1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                              <div class="text-center">
                                  @if($user->image)
                                      <img src="{{ asset('storage/images/user/' . $user->image) }}" class="profile-user-img img-fluid img-circle" alt="User profile picture" style="max-width: 50px; max-height: 50px;">
                                  @else
                                      <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/Default.svg.png') }}" alt="User profile picture default" style="max-width: 50px; max-height: 50px;">
                                  @endif  
                            </div>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->kelas }}</td>
                            <td>{{ $user->aksi }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
                 <!-- menampilkan pagination links -->
                  <div class="d-flex justify-content-end mt-3">
                    {{ $users->links('vendor.pagination.bootstrap-4') }}
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
@endsection