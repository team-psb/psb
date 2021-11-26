@extends('front.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="col-12 mb-4">
      <div class="hero bg-success text-white">
        <div class="hero-inner text-center">
          <h2>Welcome, Bujang!</h2>
          <p class="lead">You almost arrived, complete the information about your account to complete registration.
            Untuk melakukan tes Tahap Ke-2 anda, Silahkan klik tombol di bawah ini !!!
          </p>
          <p class="lead"></p>
          <div class="mt-4">
            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Setup Account</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Admin</h4>
            </div>
            <div class="card-body">
              10
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>News</h4>
            </div>
            <div class="card-body">
              42
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Reports</h4>
            </div>
            <div class="card-body">
              1,201
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Online Users</h4>
            </div>
            <div class="card-body">
              47
            </div>
          </div>
        </div>
      </div>
    </div>

    <h1 class="text-dark mt-5 mb-0">INFORMASI</h1>
    <div class="informasi mb-4"></div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted">1-Jan-2022</p>
              <div class="card-header-action">
                <a href="#" class="btn btn-outline-primary">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ 'stisla/assets/img/example-image.jpg' }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ 'stisla/assets/img/example-image.jpg' }}" class="img-fluid">
                </div>
              </a>
            </div>
          </div>
          <div class="card-header d-flex flex-column">
            <h5 class="text-dark">Title</h5>
            <p>Click the picture below to see the magic!Click the picture below to see the magic!Click the picture below to see the magic!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted">1-Jan-2022</p>
              <div class="card-header-action">
                <a href="#" class="btn btn-outline-primary">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ 'stisla/assets/img/example-image.jpg' }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ 'stisla/assets/img/example-image.jpg' }}" class="img-fluid">
                </div>
              </a>
            </div>
          </div>
          <div class="card-header d-flex flex-column">
            <h5 class="text-dark">Title</h5>
            <p>Click the picture below to see the magic!Click the picture below to see the magic!Click the picture below to see the magic!</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted">1-Jan-2022</p>
              <div class="card-header-action">
                <a href="#" class="btn btn-outline-primary">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ 'stisla/assets/img/example-image.jpg' }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ 'stisla/assets/img/example-image.jpg' }}" class="img-fluid">
                </div>
              </a>
            </div>
          </div>
          <div class="card-header d-flex flex-column">
            <h5 class="text-dark">Title</h5>
            <p>Click the picture below to see the magic!Click the picture below to see the magic!Click the picture below to see the magic!</p>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection