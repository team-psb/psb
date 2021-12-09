@extends('front.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">
  <section class="section">
    <div class="col-12 mb-4">
      {{-- @if (session('gagal_tes'))
        <div class="row">
          <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert" aria-label="Close">
                <span>&times;</span>
              </button>
              <h1><b>PENTING !</b></h1>
              mohon maaf atas ketidaknyamanannya bagi yang gagal submit data pada tes seleksi tahap pertama, Silahkan anda coba kembali dan jika masih ada kendala silahkan hunbunggi kami melalui chat yang tersedia atau melalui media sosial kami.
            </div>
          </div>
        </div>
      @endif --}}
      <div class="row">
      <div class="col-12 mb-4">
          <div class="hero text-white text-center
                      @if (isset($tahap1) && $tahap1->status == null || isset($tahap2) && $tahap2->status == null || isset($tahap3) && $tahap3->status == null )
                        bg-warning                      
                      @endif
                      @if (isset($tahap1) && $tahap1->status == 'lolos' || isset($tahap2) && $tahap2->status == 'lolos' || isset($tahap3) && $tahap3->status == 'lolos')
                        bg-success
                      @elseif (empty($tahap1) || empty($tahap2) || empty($tahap3))
                        bg-info
                      @endif
                      @if (isset($tahap1) && $tahap1->status == 'tidak' || isset($tahap2) && $tahap2->status == 'tidak' || isset($tahap3) && $tahap3->status == 'tidak' )
                        bg-danger                      
                      @endif"
          >
              @if(empty($tahap1) && isset($biodata1))
                <div class="hero-inner">
                  <h2 class="poppins">Halo Selamat datang, {{ Auth::user()->name }}</h2>
                  <p class="lead">untuk melakukan seleksi <strong class="font-weight-bold">Tahap Pertama</strong> anda silahkan klik tombol di bawah ini</p>
                  <div class="mt-4">
                    <a href="{{ route('user-first-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                  </div>
                </div>
              @elseif(!empty($tahap1) && isset($biodata1) && $tahap1->status == null) 
                <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                <p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Pertama</strong>,Anda bisa lanjut <br>mengikuti tes tahap kedua jika dinyatakan lolos di tes tahap pertama</p>
              @elseif(!empty($tahap2) && isset($tahap1) && $tahap2->status == null) 
                <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                <p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Kedua & Ketiga</strong>,Anda bisa lanjut <br>mengikuti tes tahap Keempat jika dinyatakan lolos di tes tahap Kedua & Ketiga</p>
              @elseif(!empty($tahap3) && isset($tahap3) && $tahap3->status == null) 
                <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                <p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Keempat</strong>,Anda bisa lanjut <br>mengikuti tes tahap Kelima jika dinyatakan lolos di tes tahap Keempat</p>
              @elseif(!empty($tahap1) && $tahap1->status == 'lolos')
                @if ($tahap1->status == 'lolos' && !isset($tahap2->status) )
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
                  <p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Kedua dan Ketiga</strong> anda silahkan klik tombol di bawah ini</p>

                  <div class="mt-4">
                    <a href="{{ route('user-second-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                  </div>
                @elseif($tahap2->status == 'lolos' && !isset($tahap3->status))
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
                  <p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Keempat</strong> silahkan anda klik tombol di bawah ini.</p>

                  <div class="mt-4">
                    <a href="{{ route('user-fourth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                  </div>
                @elseif($tahap3->status == 'lolos' && !isset($tahap4->status))
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
                  <p class="lead">untuk  tes <strong class="font-weight-bold">Tahap Kelima</strong> anda akan kami hubungi untuk melakukan tes wawancara</p>
                  <div class="mt-4">
                    <a href="{{ route('user-fifth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes wawancara</a>
                  </div>
                @elseif( isset($tahap3->status) && isset($tahap4->status) && $tahap4->status == 'lolos')
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
                  <p class="lead">untuk informasi selanjutnya akan di infokan melalui whatsapp
                  </p>
                @elseif( isset($tahap3->status) && isset($tahap4->status) && $tahap4->status == 'tidak')
                  <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Tidak Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
                
                @elseif( isset($biodata1->status) == 'tidak' || isset($tahap2->status) == 'tidak' || isset($tahap3->status) == 'tidak')
                  <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
                  </p>				
                @endif
              @else
                <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                <p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
                </p>
              @endif
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

    <div class="section-body">
      <h1 class="text-dark mt-5 mb-0 poppins">TES</h1>
      <div class="informasi mb-4 col-12 col-lg-1"></div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Daftar tes yang telah di ikuti</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Tes</th>
                      <th>Status Pengerjaan</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Create a mobile app</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                          <div class="progress-bar bg-success" data-width="100%"></div>
                        </div>
                      </td>
                      <td><div class="badge badge-success">Completed</div></td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>Redesign homepage</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                          <div class="progress-bar" data-width="0"></div>
                        </div>
                      </td>
                      <td><div class="badge badge-info">Todo</div></td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>Backup database</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                          <div class="progress-bar bg-warning" data-width="70%"></div>
                        </div>
                      </td>
                      <td><div class="badge badge-warning">In Progress</div></td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>Input data</td>
                      <td class="align-middle">
                        <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                          <div class="progress-bar bg-success" data-width="100%"></div>
                        </div>
                      </td>
                      <td><div class="badge badge-success">Completed</div></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <h1 class="text-dark mt-5 mb-0 poppins">INFORMASI</h1>
    <div class="informasi mb-4 col-12 col-lg-2"></div>
    <div class="row">
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted">1-Jan-2022</p>
              <div class="card-header-action">
                <a href="#" class="btn btn-outline-success">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="img-fluid">
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
                <a href="#" class="btn btn-outline-success">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="img-fluid">
                </div>
              </a>
            </div>
          </div>
          <div class="card-header d-flex flex-column">
            <h5 class="text-dark">Title Click the picture below to see the magic!</h5>
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
                <a href="#" class="btn btn-outline-success">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="img-fluid">
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
