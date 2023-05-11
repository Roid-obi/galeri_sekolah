@extends('layouts.app')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item text-primary">Dashboard</li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

<!-- Profile Image -->
<div class="card card-info card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{ asset('images/doktah.jpg') }}"
             alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

      <p class="text-muted text-center">{{ Auth::user()->role }}</p>

      <ul class="list-group list-group-flush mb-2">
        <li class="list-group-item">
          <b>ID</b> <a class="float-right text-decoration-none">{{ Auth::user()->id }}</a>
       </li>
        <li class="list-group-item">
           <b>Email</b> <a class="float-right text-decoration-none">{{ Auth::user()->email }}</a>
        </li>
        <li class="list-group-item">
          <b>Kelas</b> <a class="float-right text-decoration-none">{{ Auth::user()->kelas }}</a>
        </li>
      </ul>

      <a href="#" class="btn btn-info btn-block text-white mb-1"><b>Edit Profile</b></a>
      <div class="">
        <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
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