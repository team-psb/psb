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
                      @if (isset($tahap1) && $tahap1->status == null || isset($tahap2) && $tahap2->status == null || isset($tahap4) && $tahap4->status == null )
                        bg-warning                      
                      @endif
                      @if (isset($tahap1) && $tahap1->status == 'lolos' || isset($tahap2) && $tahap2->status == 'lolos' || isset($tahap4) && $tahap4->status == 'lolos')
                        bg-success
                      @elseif (empty($tahap1) || empty($tahap2) || empty($tahap4))
                        bg-info
                      @endif
                      @if (isset($tahap1) && $tahap1->status == 'tidak' || isset($tahap2) && $tahap2->status == 'tidak' || isset($tahap4) && $tahap4->status == 'tidak' )
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
              @elseif(!empty($tahap4) && isset($tahap4) && $tahap4->status == null) 
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
                @elseif($tahap2->status == 'lolos' && !isset($tahap4->status))
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
                  <p class="lead">untuk melakukan tes <strong class="font-weight-bold">Tahap Keempat</strong> silahkan anda klik tombol di bawah ini.</p>

                  <div class="mt-4">
                    <a href="{{ route('user-fourth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                  </div>
                @elseif($tahap4->status == 'lolos' && !isset($tahap5->status))
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos Ketahap Berikutnya</strong></p>
                  <p class="lead">untuk  tes <strong class="font-weight-bold">Tahap Kelima</strong> anda akan kami hubungi untuk melakukan tes wawancara</p>
                  <div class="mt-4">
                    <a href="{{ route('user-fifth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes wawancara</a>
                  </div>
                @elseif( isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'lolos')
                  <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
                  <p class="lead">untuk informasi selanjutnya akan di infokan melalui whatsapp
                  </p>
                @elseif( isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'tidak')
                  <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Tidak Lolos sebagai calon santri Pondok Informatika-Almadinah</strong></p>
                
                @elseif( isset($biodata1->status) == 'tidak' || isset($tahap2->status) == 'tidak' || isset($tahap4->status) == 'tidak')
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
    {{-- Dekstop --}}
      <div class="col-lg-4 col-md-6 col-12 d-none d-sm-block">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Informasi</h4>
            </div>
            <div class="card-body">
              {{ $schdules->count() }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-sm-block">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-question-circle"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Q&A</h4>
            </div>
            <div class="card-body">
              {{ $qna->count(); }}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-sm-block">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendaftar</h4>
            </div>
            <div class="card-body">
              {{ Auth::user()->count(); }}
            </div>
          </div>
        </div>
      </div>

      {{-- Mobile --}}
      <div class="col-lg-4 col-md-6 col-sm-6 d-xl-none d-md-none d-lg-block">
        <a href="{{ route('user-profile') }}">
          <div class="card card-statistic-1 d-flex flex-row align-items-center">
            <div class="card-icon bg-primary">
              <i class="fas fa-user"></i>
            </div>
            <p href="" class="h1 text-primary font-weight-bold"><u>Profile</u></p>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 d-xl-none d-md-none d-lg-block">
        <a href="{{ route('user-qna') }}">
          <div class="card card-statistic-1 d-flex flex-row align-items-center">
            <div class="card-icon bg-success">
              <i class="fas fa-question-circle"></i>
            </div>
            <p href="" class="h1 text-success font-weight-bold"><u>Q & A</u></p>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 d-xl-none d-md-none d-lg-block">
        <a href="{{ route('user-informasi') }}">
          <div class="card card-statistic-1 d-flex flex-row align-items-center">
            <div class="card-icon bg-warning">
              <i class="fas fa-leaf"></i>
            </div>
            <p href="" class="h1 text-warning font-weight-bold"><u>Informasi</u></p>
          </div>
        </a>
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
                  @if ($biodata1->count() > 0 )
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Tes</th>
                      <th>Status</th>
                      <th>Status Pengerjaan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        1
                      </td>
                      <td>Tes tahap pertama</td>
                      <td>
                        @if (empty($tahap1))
                          <div class="badge badge-warning">
                            Belum mengikuti tes
                          </div>
                        @elseif($tahap1->status == "tidak")
                          <div class="badge badge-danger">
                            Tidak Lolos
                          </div>
                        @elseif($tahap1->status == "lolos")
                          <div class="badge badge-success">
                            Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                            Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if (empty($tahap1))
                          <a href="{{ route('user-first-tes') }}" class="btn btn-primary">Ikuti Tes</a>
                        @else
                          <span class="badge badge-primary">Selesai tes</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        2
                      </td>
                      <td>Tes tahap Kedua dan Ketiga</td>
                      <td>
                        @if (empty($tahap2))
                          <div class="badge badge-warning">
                            Belum mengikuti tes
                          </div>
                        @elseif($tahap2->status == "tidak")
                          <div class="badge badge-danger">
                            Tidak Lolos
                          </div>
                        @elseif($tahap2->status == "lolos")
                          <div class="badge badge-success">
                            Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                            Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if (empty($tahap1));
                          <span></span>
                        @elseif ($tahap1->status == 'lolos' && empty($tahap2))
                          <a href="{{ route('user-second-tes') }}" class="btn btn-primary">Ikuti Tes</a>
                        @elseif ($tahap1->status == null && empty($tahap2))
                          <span></span>
                        @else
                          <span class="badge badge-primary">Selesai tes</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        3
                      </td>
                      <td>Tes tahap Keempat</td>
                      <td>
                        @if (empty($tahap4))
                          <div class="badge badge-warning">
                            Belum mengikuti tes
                          </div>
                        @elseif($tahap4->status == "tidak")
                          <div class="badge badge-danger">
                            Tidak Lolos
                          </div>
                        @elseif($tahap4->status == "lolos")
                          <div class="badge badge-success">
                            Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                            Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if (empty($tahap2))
                          <span></span>
                        @elseif ($tahap2->status == 'lolos' && empty($tahap4))
                          <a href="{{ route('user-fourth-tes') }}" class="btn btn-primary">Ikuti Tes</a>
                        @elseif ($tahap2->status == null && empty($tahap4))
                          <span></span>
                        @else
                          <span class="badge badge-primary">Selesai tes</span>
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>
                        4
                      </td>
                      <td>Tes tahap Kelima</td>
                      <td>
                        @if (empty($tahap5))
                          <div class="badge badge-warning">
                            Belum mengikuti tes
                          </div>
                        @elseif($tahap5->status == "tidak")
                          <div class="badge badge-danger">
                            Tidak Lolos
                          </div>
                        @elseif($tahap5->status == "lolos")
                          <div class="badge badge-success">
                            Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                            Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                      <td class="align-middle">
                        @if (empty($tahap4))
                          <span></span>
                        @elseif ($tahap4->status == 'lolos' && empty($tahap5))
                          <a href="{{ route('user-fifth-tes') }}" class="btn btn-primary">Ikuti Tes</a>
                        @elseif ($tahap4->status == null  && empty($tahap5))
                          <span></span>
                        @else
                          <span class="badge badge-primary">Selesai tes</span>
                        @endif
                      </td>
                    </tr>
                  </tbody>
                  @endif
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
      @forelse ($schdules->take(3) as $schdule)
      <div class="col-12 col-sm-6 col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted">{{ $schdule->created_at->format('d-m-Y') }}</p>
              <div class="card-header-action">
                <a href="{{ route('user-informasi-detail', $schdule->id) }}" class="btn btn-outline-success">View All</a>
              </div>
            </div>
            <div class="chocolat-parent">
              <a href="{{ asset('/storage/'.$schdule->image) }}" class="chocolat-image" title="Just an example">
                <div>
                  <img alt="image" src="{{ asset('/storage/'.$schdule->image) }}" class="img-fluid">
                </div>
              </a>
            </div>
          </div>
          <div class="card-header d-flex flex-column">
            <h5 class="text-dark">{{ $schdule->title }}</h5>
            <p>{{ Str::limit($schdule->content, 200, '...') }}</p>
          </div>
        </div>
      </div>
      @empty
          
      @endforelse
  </section>
</div>
@endsection
