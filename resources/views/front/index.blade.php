@extends('front.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">

  {{-- News Dashboard Card & Hero--}}
  <section class="section">
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

      {{-- Hero --}}
      <div class="section-body">
        <div class="row">
          <div class="d-none d-lg-inline">
            <img
                src="{{ asset('assets/logo-bg.png') }}"
                alt="logo"
                class="position-absolute img-fluid"
                width="1100"
                style="z-index: -1; top: 0px; right: 600px"
            />
          </div>
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
                  <p class="lead">Anda Dapat Melihat <strong class="font-weight-bold" >Nilai Hasil Tes IQ dan Kepribadian</strong> <a class="font-weight-bold text-primary" href="{{ route('user-profile','#nilai') }}">Disini</a></p>
                @elseif(!empty($tahap4) && isset($tahap4) && $tahap4->status == null) 
                  <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                  <p class="lead">Anda Telah Melaksanakan tes <strong class="font-weight-bold">Tahap Keempat</strong>,Anda bisa lanjut <br>mengikuti tes tahap Kelima jika dinyatakan lolos di tes tahap Keempat</p>
                @elseif(!empty($tahap1) && $tahap1->status == 'lolos')
                  @if ($tahap1->status == 'lolos' && !isset($tahap2->status))
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
                    <p class="lead">untuk  tes <strong class="font-weight-bold">Tahap Kelima</strong> anda akan kami hubungi untuke melakukan tes wawancara</p>
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
                  @elseif( isset($tahap1->status) == 'tidak' || isset($tahap2->status) == 'tidak' || isset($tahap4->status) == 'tidak')
                    <h2>Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                    <p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya
                    </p>				
                  @endif
                @else
                  <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}! .</h2>
                  <p><strong>Anda Dinyatakan Tidak Lolos ke tahap selanjutnya</p>
                @endif
              </div>
          </div>
        </div>
      </div>

      {{-- News Dashboard Card--}}
      <div class="row">
        {{-- Dekstop --}}
        <div class="col-lg-4 col-md-6 col-12 d-none d-md-none d-lg-block">
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
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-md-none d-lg-block">
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
        <div class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-md-none d-lg-block">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pendaftar</h4>
              </div>
              <div class="card-body">
                {{ $data->count() }}
              </div>
            </div>
          </div>
        </div>

        {{-- Mobile --}}
        <div class="col-lg-4 col-md-6 col-sm-6 d-lg-none d-xl-none">
          <a href="{{ route('user-profile') }}">
            <div class="card card-statistic-1 d-flex flex-row align-items-center">
              <div class="card-icon bg-primary">
                <i class="fas fa-user"></i>
              </div>
              <p href="" class="h1 text-primary font-weight-bold"><u>Profile</u></p>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 d-lg-none d-xl-none">
          <a href="{{ route('user-qna') }}">
            <div class="card card-statistic-1 d-flex flex-row align-items-center">
              <div class="card-icon bg-success">
                <i class="fas fa-question-circle"></i>
              </div>
              <p href="" class="h1 text-success font-weight-bold"><u>Q & A</u></p>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 d-lg-none d-xl-none">
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
  </section>

  {{-- Progress Tes Table --}}
  <section class="section mt-5 pt-5">
    <div class="section-body">
      <h1 class="px-0 mb-3 poppins pb-2 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 rounded informasi"><i class="fa fa-book ico"></i> Tes Anda</h1>
      <div class="row">
        <div class="col-12">
          @if ($biodata1->count() > 0 )
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Tahap</th>
                <th>Pengerjaan Tes</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              {{-- 1 --}}
              <tr>
                <th>1</th>
                <td>
                  @if (empty($tahap1))
                    <a href="{{ route('user-first-tes') }}" class="btn btn-success">IkutTes</a>
                  @else
                    <span class="badge badge-primary">Selesai Tes</span>
                  @endif
                </td>
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
              </tr>
              
              {{-- 2 & 3 --}}
              @if (!empty($tahap1) && $tahap1->status == "lolos")
              <tr>
                <th>2 & 3</th>
                <td>
                  @if (empty($tahap2))
                    <a href="{{ route('user-second-tes') }}" class="btn btn-success">Ikuti Tes</a>
                  @elseif($tahap2->nilai_tes_iq != 0 && $tahap2->nilai_tes_kepribadian == 0)
                    <a href="{{ route('user-second-personal') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
                  @else
                    <span class="badge badge-primary">Selesai Tes</span>
                  @endif
                </td>
                <td>
                  @if (empty($tahap2))
                    <div class="badge badge-warning">
                    Belum mengikuti tes
                    </div>
                  @elseif ($tahap2->nilai_tes_iq != null && $tahap2->nilai_tes_kepribadian != null && $tahap2->status == null)
                    <div class="badge badge-info">
                    Sudah mengikuti tes 
                    </div>
                  @elseif($tahap2->status == 'lolos')
                    <div class="badge badge-success">
                    Lolos
                    </div>
                  @elseif($tahap2->status == 'tidak')
                    <div class="badge badge-danger">
                    tidak
                    </div>
                  @else
                    <div class="badge badge-info">
                      Menunggu hasil tes
                    </div>
                  @endif
                </td>
              </tr>
              @endif
              <tr>

              {{-- 4 --}}
              @if (!empty($tahap2) && $tahap2->status == "lolos")
              <tr>
                <th>4</th>
                <td>
                  @if (empty($tahap4))
                    <a href="{{ route('user-fourth-tes') }}" class="btn btn-success">Ikuti Tes</a>
                  @elseif($tahap2->nilai_tes_iq != 0 && $tahap2->nilai_tes_kepribadian == 0)
                    <a href="{{ route('tahap-ketiga-kepribadian') }}" class="btn btn-primary">Ikuti Tes Kepribadian</a>
                  @else
                    <span class="badge badge-primary">Selesai Tes</span>
                  @endif
                </td>
                <td>
                  @if (empty($tahap4))
                    <div class="badge badge-warning">
                    Belum mengikuti tes 
                    </div>
                  @elseif($tahap4->status == null && $tahap4->link != null)
                    <div class="badge badge-info">
                    Sudah Kirim Link Video
                    </div>
                  @elseif($tahap4->status == 'lolos')
                    <div class="badge badge-success">
                    Lolos
                    </div>
                  @elseif($tahap4->status == 'tidak')
                    <div class="badge badge-danger">
                    tidak
                    </div>
                  @else
                    <div class="badge badge-info">
                      Menunggu hasil tes
                    </div>
                  @endif
                </td>
              </tr>
              @endif

              {{-- 5 --}}
              @if (!empty($tahap4) && $tahap4->status == "lolos")
              <tr>
                <th>5</th>
                <td>
                  @isset($tahap5)
                  @if ($tahap5->status == null)
                    <a href="{{ route('user-fifth-tes') }}" class="btn btn-primary">Info Wawancara</a>
                  @else
                    <span class="badge badge-primary">Selesai Tes</span>
                  @endif
                  @endisset
                </td>
                <td>
                  @isset($tahap5)
                  @if ($tahap5->status == null)
                    <div class="badge badge-info">
                    Menunggu Di Hubunggi
                    </div>
                  @elseif($tahap5->status == 'lolos')
                    <div class="badge badge-success">
                    Lolos
                    </div>
                  @elseif($tahap5->status == 'tidak')
                    <div class="badge badge-danger">
                    tidak
                    </div>
                  @else
                  @endif
                  @endisset
                </td>
              </tr>
              @endif
            </tbody>
            <thead>
              {{-- selamat --}}
              <tr>
                @if (!empty($tahap5) && $tahap5->status == "lolos")
                  <th class="text-success"><i class="fas fa-th"></i></th>
                  <th colspan="2">
                      <div class="col-md-11 text-success"><smal><strong><i>Selamat! Anda Lolos Seleksi, Unuk Info Selanjutnya Akan Diasampaikan Melalui WhatsApp</i></strong></smal></div>
                  </th>
                @elseif(!empty($tahap5) && $tahap5->status == "tidak")
                  <th class="text-danger"><i class="fas fa-th"></i></th>
                  <th colspan="2">
                      <div class="col-md-11 text-danger"><smal><strong><i>Mohon Maaf, Anda Tidak Lolos Tes Seleksi</i></strong></smal></div>
                  </th>
                @endif
              </tr>
            </thead>
          </table>
          @endif
        </div>
      </div>
    </div>
  </section>

  {{-- Information Card --}}
  <section class="section mt-5 pt-5">
    <div class="section-body">
      <h1 class="px-0 mb-3 poppins pb-2 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 rounded informasi"><i class="fas fa-newspaper" style="font-size: 40px;"></i> Informasi</h1>
        <div class="row">
            <div class="d-none d-lg-inline">
              <img
                  src="{{ asset('assets/logo-bg.png') }}"
                  alt="logo"
                  class="position-absolute img-fluid"
                  width="1100"
                  style="z-index: -1; top: 0px; right: 600px"
              />
            </div>
            @forelse ($schdules->take(3) as $schdule)
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card">
                <div class="card-body"> 
                  <div class="d-flex justify-content-between mb-2">
                    <p class="text-muted poppins font-italic">{{ $schdule->created_at->format('d-m-Y') }}</p>
                    <div class="card-header-action">
                      <a href="{{ route('user-informasi-detail', $schdule->id) }}" class="btn btn-outline-success">View All</a>
                    </div>
                  </div>
                  <div class="chocolat-parent" style="border: 0.1px solid #e0e2e5;">
                    <a href="{{ asset('/storage/'.$schdule->image) }}" class="chocolat-image" title="Pondok Informatika Al-Madinah">
                      <div class="d-flex justify-content-center align-items-center">
                        <img alt="image" src="{{ asset('/storage/'.$schdule->image) }}" class="img-fluid">
                      </div>
                    </a>
                  </div>
                </div>
                <div class="card-header d-flex flex-column">
                  <h5 class="text-dark poppins">{{ $schdule->title }}</h5>
                  <p>{!! Str::limit($schdule->content, 200, '...') !!}</p>
                </div>
              </div>
            </div>
            @empty
                
            @endforelse
        </div>
    </div>
  </section>
</div>
@endsection