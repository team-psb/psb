@extends('front.layouts.app')

@section('title', 'Dashboard')

@push('end-style')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('hero')
    <div class="main-content">
        <div class="py-5">
            <section class="section container">
                {{-- @if (session('gagal_tes'))
                    <div class="row">
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert" aria-label="Close">
                                <span>&times;</span>
                            </button>
                            <h1><b>PENTING !</b></h1>
                            Mohon maaf atas ketidaknyamanannya bagi yang gagal submit data pada tes seleksi tahap pertama, Silahkan anda coba kembali dan jika masih ada kendala silahkan hunbunggi kami melalui chat yang tersedia atau melalui media sosial kami.
                            </div>
                        </div>
                    </div>
                @endif --}}

                {{-- Hero --}}
                <div class="section-body py-4">
                    <div class="row py-1">
                      <div class="col-12 mb-4">
                        @if (Auth::user()->biodataOne->family != 'sangat-mampu')
                            <div  data-aos="fade-up"
                                data-aos-duration="1000"
                                class="hero text-white text-center
                                @if (isset($tahap1) && $tahap1->status == null || isset($tahap2) && $tahap2->status == null || isset($tahap3) && $tahap3->status == null || isset($tahap4) && $tahap4->status == null )
                                bg-warning
                                @endif
                                @if (isset($tahap1) && $tahap1->status == 'lolos' || isset($tahap2) && $tahap2->status == 'lolos' || isset($tahap3) && $tahap3->status == 'lolos' || isset($tahap4) && $tahap4->status == 'lolos' || isset($tahap5) && $tahap5->status == 'lolos')
                                bg-success
                                @elseif (empty($tahap1) || empty($tahap2) || empty($tahap4))
                                bg-info
                                @endif
                                @if (isset($tahap1) && $tahap1->status == 'tidak' || isset($tahap2) && $tahap2->status == 'tidak' || isset($tahap3) && $tahap3->status == 'tidak' || isset($tahap4) && $tahap4->status == 'tidak' || isset($tahap5) && $tahap5->status == 'tidak' )
                                bg-danger
                                @endif"
                            >

                                @if(empty($tahap1) && isset($biodata1))
                                <div class="hero-inner">
                                        <i class="fas fa-laugh pb-3" style="font-size: 72px;"></i>
                                        <h2 class="poppins">Halo Selamat Datang {{ Auth::user()->name }}!</h2>
                                        <p class="lead">Untuk melakukan tes <strong class="font-weight-bold">Tahap Pertama</strong> silahkan Anda klik tombol di bawah ini.</p>
                                        <div class="mt-4">
                                            <a href="{{ route('user-first-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                                        </div>
                                    </div>
                                @elseif(!empty($tahap1) && isset($biodata1) && $tahap1->status == null)
                                    <i class="fas fa-hourglass-half pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                                    <p class="lead">Anda telah selesai melaksanakan tes <strong class="font-weight-bold">Tahap Pertama</strong>,<br>Anda bisa lanjut mengikuti tes Tahap Kedua jika dinyatakan lolos di tes Tahap Pertama.</p>
                                @elseif(!empty($tahap2) && isset($tahap1) && $tahap2->status == null)
                                    <i class="fas fa-hourglass-half pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                                    <p class="lead">Anda telah selesai melaksanakan tes <strong class="font-weight-bold">Tahap Kedua</strong>,<br>Anda bisa lanjut mengikuti tes Tahap Ketiga jika dinyatakan lolos di tes Tahap Kedua.</p>
                                @elseif(!empty($tahap3) && isset($tahap2) && $tahap3->status == null)
                                    <i class="fas fa-hourglass-half pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                                    <p class="lead">Anda telah selesai melaksanakan tes <strong class="font-weight-bold">Tahap Ketiga</strong>,<br>Anda bisa lanjut mengikuti tes Tahap Keempat jika dinyatakan lolos di tes Tahap Ketiga.</p>
                                @elseif(!empty($tahap4) && isset($tahap4) && $tahap4->status == null)
                                    <i class="fas fa-hourglass-half pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                                    <p class="lead">Anda telah selesai melaksanakan tes <strong class="font-weight-bold">Tahap Keempat</strong>,<br>Anda bisa lanjut mengikuti tes Tahap Kelima jika dinyatakan lolos di tes Tahap Keempat.</p>
                                @elseif(!empty($tahap1) && $tahap1->status == 'lolos')
                                  @if ($tahap1->status == 'lolos' && !isset($tahap2->status))
                                      <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos dan bisa lanjut ke Tahap berikutnya. </strong></p>
                                      <p class="lead">Untuk melakukan tes <strong class="font-weight-bold">Tahap Kedua</strong>, silahkan Anda klik tombol di bawah ini.</p>
                                      <div class="mt-4">
                                          <a href="{{ route('user-second-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                                      </div>
                                  @elseif(isset($tahap2->status) && $tahap2->status == 'lolos' && !isset($tahap3->status))
                                      <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos dan bisa lanjut ke Tahap berikutnya. </strong></p>
                                      <p class="lead">Untuk melakukan tes <strong class="font-weight-bold">Tahap Ketiga</strong>, silahkan Anda klik tombol di bawah ini.</p>
                                      <div class="mt-4">
                                          <a href="{{ route('user-third-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                                      </div>
                                  @elseif(isset($tahap3->status) && $tahap3->status == 'lolos' && !isset($tahap4->status))
                                      <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos dan bisa lanjut ke Tahap berikutnya. </strong></p>
                                      <p class="lead">Untuk melakukan tes <strong class="font-weight-bold">Tahap Keempat</strong>, silahkan Anda klik tombol di bawah ini.</p>
                                      <div class="mt-4">
                                          <a href="{{ route('user-fourth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                                      </div>
                                  @elseif( isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'lolos')
                                      <i class="fas fa-graduation-cap pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos sebagai Calon Santri Pondok Informatika Al Madinah. </strong></p>
                                      <p class="lead">Untuk informasi selanjutnya akan kami kirim melalui WhatsApp.</p>
                                  @elseif(isset($tahap4->status) && $tahap4->status == 'lolos' && !isset($tahap5->status))
                                      <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos dan bisa lanjut ke Tahap berikutnya. </strong></p>
                                      <p class="lead">Untuk tes <strong class="font-weight-bold">Tahap Kelima</strong>, Anda akan kami hubungi untuk melakukan Wawancara.</p>
                                      <div class="mt-4">
                                          <a href="{{ route('user-fifth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes Wawancara</a>
                                      </div>
                                  @elseif(isset($tahap4->status) && isset($tahap5->status) && $tahap5->status == 'tidak')
                                      <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Tidak Lolos sebagai Calon Santri Pondok Informatika Al Madinah.</strong></p>
                                  @elseif(isset($tahap1->status) == 'tidak' || isset($tahap2->status) == 'tidak' || isset($tahap4->status) == 'tidak')
                                      <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                      <h2>Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Tidak Lolos ke Tahap selanjutnya.</strong></p>
                                  @elseif($tahap4->status == 'lolos' && !isset($tahap5->status))
                                      <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                                      <p><strong>Anda dinyatakan Lolos Ketahap berikutnya.</strong></p>
                                      <p class="lead">untuk tes<strong class="font-weight-bold">Tahap Kelima</strong> anda akan kami hubungi untuk melakukan tes Wawancara.</p>
                                      <div class="mt-4">
                                          <a href="{{ route('user-fifth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes wawancara</a>
                                      </div>
                                  @endif
                                @else
                                    <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                    <p><strong>Anda dinyatakan Tidak Lolos ke Tahap selanjutnya</strong></p>
                                @endif
                            </div>
                        @else
                            <div  data-aos="fade-up"
                              data-aos-duration="1000"
                              class="hero text-white text-center
                              @if (isset($tahap1) && $tahap1->status == null )
                              bg-warning
                              @endif
                              @if (isset($tahap1) && $tahap1->status == 'lolos' || isset($tahap5) && $tahap5->status == 'lolos')
                              bg-success
                              @elseif (empty($tahap1))
                              bg-info
                              @endif
                              @if (isset($tahap1) && $tahap1->status == 'tidak' || isset($tahap5) && $tahap5->status == 'tidak' )
                              bg-danger
                              @endif"
                            >
                              @if(empty($tahap1) && isset($biodata1))
                                <div class="hero-inner">
                                    <i class="fas fa-laugh pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Halo Selamat Datang {{ Auth::user()->name }}!</h2>
                                    <p class="lead">Untuk melakukan tes <strong class="font-weight-bold">Biodata</strong> silahkan Anda klik tombol di bawah ini.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('user-first-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-book"></i> Ikuti Tes</a>
                                    </div>
                                </div>
                              @elseif(!empty($tahap1) && isset($biodata1) && $tahap1->status == null)
                                  <i class="fas fa-hourglass-half pb-3" style="font-size: 72px;"></i>
                                  <h2 class="poppins">Hallo, {{ Auth::user()->name }}!</h2>
                                  <p class="lead">Anda telah selesai melaksanakan tes <strong class="font-weight-bold">Biodata</strong>,<br>Anda bisa lanjut mengikuti tes Wawancara jika dinyatakan lolos di tes Biodata.</p>
                                @elseif(!empty($tahap1) && $tahap1->status == 'lolos')
                                  @if($tahap1->status == 'lolos' && !isset($tahap5->status))
                                    <i class="fas fa-check-circle	 pb-3" style="font-size: 72px;"></i>
                                    <h2 class="poppins">Selamat, {{ Auth::user()->name }}! .</h2>
                                    <p><strong>Anda dinyatakan Lolos Ketahap berikutnya.</strong></p>
                                    <p class="lead">untuk tes <strong class="font-weight-bold">Wawancara</strong> anda akan kami hubungi untuk melakukan tes Wawancara.</p>
                                    <div class="mt-4">
                                        <a href="{{ route('user-fifth-tes') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-microphone"></i> Info mengenai tes wawancara</a>
                                    </div>
                                  @elseif( isset($tahap5->status) && $tahap5->status == 'lolos')
                                      <i class="fas fa-graduation-cap pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Selamat, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Lolos sebagai Calon Santri Pondok Informatika Al Madinah. </strong></p>
                                      <p class="lead">Untuk informasi selanjutnya akan kami kirim melalui WhatsApp.</p>
                                  @elseif(isset($tahap5->status) && $tahap5->status == 'tidak')
                                      <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                      <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Tidak Lolos sebagai Calon Santri Pondok Informatika Al Madinah.</strong></p>
                                  @elseif(isset($tahap1->status) == 'tidak')
                                      <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                      <h2>Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                      <p><strong>Anda dinyatakan Tidak Lolos ke Tahap selanjutnya.</strong></p>
                                  @endif
                                @else
                                  <i class="fas fa-exclamation-triangle pb-3" style="font-size: 72px;"></i>
                                  <h2 class="poppins">Mohon Maaf, {{ Auth::user()->name }}!</h2>
                                  <p><strong>Anda dinyatakan Tidak Lolos ke Tahap selanjutnya</strong></p>
                              @endif
                            </div>
                        @endif
                      </div>
                        {{-- Dekstop --}}
                        <div  class="col-lg-4 col-md-6 col-12 d-none d-md-none d-lg-block"
                            data-aos="fade-up"
                            data-aos-offset="100"
                            data-aos-delay="400"
                            data-aos-duration="1000"
                        >
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Informasi</h4>
                            </div>
                            <div class="card-body">
                                {{ $schdules ? $schdules->count() : '0' }}
                            </div>
                            </div>
                        </div>
                        </div>
                        <div  class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-md-none d-lg-block"
                            data-aos="fade-up"
                            data-aos-offset="100"
                            data-aos-delay="600"
                            data-aos-duration="1000"
                        >
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                            <i class="fas fa-question-circle"></i>
                            </div>
                            <div class="card-wrap">
                            <div class="card-header">
                                <h4>Q&A</h4>
                            </div>
                            <div class="card-body">
                                {{ $qna ? $qna->count() : '0' }}
                            </div>
                            </div>
                        </div>
                        </div>
                        <div  class="col-lg-4 col-md-6 col-sm-6 col-12 d-none d-md-none d-lg-block"
                            data-aos="fade-up"
                            data-aos-offset="100"
                            data-aos-delay="800"
                            data-aos-duration="1000"
                        >
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
                            <p class="h1 text-warning font-weight-bold"><u>Informasi</u></p>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('content')
    {{-- Progress Tes Table --}}
    <div class="container">
      <section class="section mt-5 pt-5" >
        <div class="section-body">
          <h1 class="px-0 mb-3 poppins pb-2 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 rounded informasi"
              data-aos="fade-right"
              data-aos-offset="200"
              data-aos-delay="100"
              data-aos-duration="1000"
          >
            <i class="fa fa-book ico"></i>
            Tes Anda
          </h1>
          <div  class="row py-3"
                data-aos="fade-up"
                data-aos-offset="200"
                data-aos-delay="100"
                data-aos-duration="1000"
          >
            <div
                class="
                    col-md-12 col-sm-12
                    d-flex
                    align-items-center
                    justify-content-around
                    position-relative
                    "
                id="alur"
            >
                <div class="position-relative">
                    <p
                        class="
                            position-absolute
                            text-center
                            alur-text
                        "
                    >
                        1. Daftar Akun dan Mengisi Formulir Pendaftaran
                    </p>
                    <img
                        src="{{ asset('assets/img/daftar.png') }}"
                        alt="daftar"
                        width="90px"
                        class="img-fluid alur_image_1"
                    />
                </div>
                <div class="position-relative">
                    <p
                        class="
                            position-absolute
                            text-center
                            alur-text2
                        "
                    >
                        2. Melakukan Tes IQ dan Tes Kepribadian
                    </p>
                    <img
                        src="{{ asset('assets/img/tes.png') }}"
                        alt="tes"
                        width="90px"
                        class="img-fluid alur_image_2"
                    />
                </div>
                <div class="position-relative">
                    <p
                        class="
                            position-absolute
                            text-center
                            alur-text3
                        "
                    >
                        3. Membuat dan Upload Video
                    </p>
                    <img
                        src="{{ asset('assets/img/video.png') }}"
                        alt="daftar"
                        width="90px"
                        class="img-fluid alur_image_3"
                    />
                </div>
                <div class="position-relative">
                    <p
                        class="
                            position-absolute
                            text-center
                            alur-text4
                        "
                    >
                        4. Melakukan Tes Wawancara
                    </p>
                    <img
                        src="{{ asset('assets/img/wawancara.png') }}"
                        alt="tes"
                        width="90px"
                        class="img-fluid alur_image_4"
                    />
                </div>
                <div class="position-relative">
                    <p
                        class="
                            position-absolute
                            text-center
                            alur-text5
                        "
                    >
                        5. Tunggu konfirmasi dari
                        panitia dan Pengumuman
                    </p>
                    <img
                        src="{{ asset('assets/img/lolos.png') }}"
                        alt="daftar"
                        width="90px"
                        class="img-fluid alur_image_5"
                    />
                </div>
            </div>
          </div>
            <div  class="row"
                  data-aos="fade-up"
                  data-aos-offset="200"
                  data-aos-delay="100"
                  data-aos-duration="1000"
          >
            <div class="col-12">
              @if ($biodata1->count() > 0 )
              <table class="table table-bordered table-hover text-center">
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

                  @if (Auth::user()->biodataOne->family != 'sangat-mampu')
                      {{-- 2 --}}
                    @if (!empty($tahap1) && $tahap1->status == "lolos")
                    <tr>
                      <th>2</th>
                      <td>
                        @if (empty($tahap2))
                          <a href="{{ route('user-second-tes') }}" class="btn btn-success">Ikuti Tes</a>
                        @else
                          <span class="badge badge-primary">Selesai Tes</span>
                        @endif
                      </td>
                      <td>
                        @if (empty($tahap2))
                          <div class="badge badge-warning">
                              Belum mengikuti tes
                          </div>
                        @elseif ($tahap2->score_question_iq != null && $tahap2->status == null)
                          <div class="badge badge-info">
                              Sudah mengikuti tes
                          </div>
                        @elseif($tahap2->status == 'lolos')
                          <div class="badge badge-success">
                              Lolos
                          </div>
                        @elseif($tahap2->status == 'tidak')
                          <div class="badge badge-danger">
                              Tidak Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                            Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                    </tr>
                    @endif

                    {{-- 3 --}}
                    @if (!empty($tahap2) && $tahap2->status == "lolos")
                    <tr>
                      <th>3</th>
                      <td>
                        @if (empty($tahap3))
                          <a href="{{ route('user-third-tes') }}" class="btn btn-success">Ikuti Tes</a>
                        @else
                          <span class="badge badge-primary">Selesai Tes</span>
                        @endif
                      </td>
                      <td>
                        @if (empty($tahap3))
                          <div class="badge badge-warning">
                              Belum mengikuti tes
                          </div>
                        @elseif ($tahap3->score_question_personal != null && $tahap3->status == null)
                          <div class="badge badge-info">
                              Sudah mengikuti tes
                          </div>
                        @elseif($tahap3->status == 'lolos')
                          <div class="badge badge-success">
                              Lolos
                          </div>
                        @elseif($tahap3->status == 'tidak')
                          <div class="badge badge-danger">
                              Tidak Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                              Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                    </tr>
                    @endif

                    {{-- 4 --}}
                    @if (!empty($tahap3) && $tahap3->status == "lolos")
                    <tr>
                      <th>4</th>
                      <td>
                        @if (empty($tahap4))
                          <a href="{{ route('user-fourth-tes') }}" class="btn btn-success">Ikuti Tes</a>
                        @else
                          <span class="badge badge-primary">Selesai Tes</span>
                        @endif
                      </td>
                      <td>
                        @if (empty($tahap4))
                          <div class="badge badge-warning">
                              Belum Mengikuti Tes
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
                              Tidak Lolos
                          </div>
                        @else
                          <div class="badge badge-info">
                              Menunggu hasil tes
                          </div>
                        @endif
                      </td>
                    </tr>
                    @endif
                  @endif

                  {{-- 5 --}}
                  @if (Auth::user()->biodataOne->family != 'sangat-mampu')
                    @if (!empty($tahap4) && $tahap4->status == "lolos")
                    <tr>
                      <th>5</th>
                      <td>
                        @isset($tahap5)
                          @if ($tahap5->status == null)
                            <a href="{{ route('user-fifth-tes') }}" class="btn btn-success">Info</a>
                          @else
                            <span class="badge badge-primary">Selesai Tes</span>
                          @endif
                        @endisset
                      </td>
                      <td>
                        @isset($tahap5)
                          @if ($tahap5->status == null)
                            <div class="badge badge-info">
                            Menunggu dihubungi
                            </div>
                          @elseif($tahap5->status == 'lolos')
                            <div class="badge badge-success">
                            Lolos
                            </div>
                          @elseif($tahap5->status == 'tidak')
                            <div class="badge badge-danger">
                            Tidak Lolos
                            </div>
                          @else
                        @endif
                        @endisset
                      </td>
                    </tr>
                    @endif
                  @else
                    @if (!empty($tahap1) && $tahap1->status == "lolos")
                    <tr>
                      <th>5</th>
                      <td>
                        @isset($tahap5)
                          @if ($tahap5->status == null)
                            <a href="{{ route('user-fifth-tes') }}" class="btn btn-success">Info</a>
                          @else
                            <span class="badge badge-primary">Selesai Tes</span>
                          @endif
                        @endisset
                      </td>
                      <td>
                        @isset($tahap5)
                          @if ($tahap5->status == null)
                            <div class="badge badge-info">
                            Menunggu dihubungi
                            </div>
                          @elseif($tahap5->status == 'lolos')
                            <div class="badge badge-success">
                            Lolos
                            </div>
                          @elseif($tahap5->status == 'tidak')
                            <div class="badge badge-danger">
                            Tidak Lolos
                            </div>
                          @else
                        @endif
                        @endisset
                      </td>
                    </tr>
                    @endif
                  @endif
                  
                </tbody>
                <thead>
                  {{-- selamat --}}
                  <tr>
                    @if (!empty($tahap5) && $tahap5->status == "lolos")
                      <th class="text-success"><i class="fas fa-th"></i></th>
                      <th colspan="2">
                          <div class="col-md-11 text-success"><small><strong><i>Selamat! Anda Lolos Seleksi, untuk info selanjutnya akan disampaikan melalui WhatsApp.</i></strong></small></div>
                      </th>
                    @elseif(!empty($tahap5) && $tahap5->status == "tidak")
                      <th class="text-danger"><i class="fas fa-th"></i></th>
                      <th colspan="2">
                          <div class="col-md-11 text-danger"><small><strong><i>Mohon Maaf, Anda Tidak Lolos Tes Seleksi.</i></strong></small></div>
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
                <h1 class="px-0 mb-3 poppins pb-2 col-10 col-sm-6 col-md-5 col-lg-4 col-xl-3 rounded informasi"
                    data-aos="fade-right"
                    data-aos-offset="100"
                    data-aos-delay="100"
                    data-aos-duration="1000"
                    >
                    <i class="fas fa-newspaper" style="font-size: 40px;"></i>
                    Informasi
                </h1>
                <div class="row">
                    @php $aos_delay = 0; @endphp
                    @forelse ($schdules->take(3) as $schdule)
                        <div class="col-12 col-sm-6 col-lg-4">
                            <div  class="card"
                                    data-aos="fade-up"
                                    data-aos-offset="200"
                                    data-aos-delay="{{ $aos_delay+= 200 }}"
                                    data-aos-duration="1000">
                                <div  class="card-body">
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
                                <div class="card-body">
                                    <h5 class="text-dark poppins">{{ $schdule->title }}</h5>
                                    <p>{!! Str::limit($schdule->content, 200, '....') !!}</p>
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

@push('end-script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
    <script>
        //GSAP
        gsap.from(".alur_image_1", {
            delay: 4,
            duration: 2,
            y: -100,
            opacity: 0,
            ease: "bounce",
        });
        gsap.from(".alur_image_2", {
            delay: 4.5,
            duration: 2,
            y: 100,
            opacity: 0,
            ease: "bounce",
        });
        gsap.from(".alur_image_3", {
            delay: 5,
            duration: 2,
            y: -100,
            opacity: 0,
            ease: "bounce",
        });
        gsap.from(".alur_image_4", {
            delay: 5.5,
            duration: 2,
            y: 100,
            opacity: 0,
            ease: "bounce",
        });
        gsap.from(".alur_image_5", {
            delay: 6,
            duration: 2,
            y: -100,
            opacity: 0,
            ease: "bounce",
        });
        gsap.from(".alur-text", {
            delay: 7,
            duration: 1,
            scale: 0,
            opacity: 0,
        });
        gsap.from(".alur-text2", {
            delay: 7,
            duration: 1,
            scale: 0,
            opacity: 0,
        });
        gsap.from(".alur-text3", {
            delay: 7,
            duration: 1,
            scale: 0,
            opacity: 0,
        });
        gsap.from(".alur-text4", {
            delay: 7,
            duration: 1,
            scale: 0,
            opacity: 0,
        });
        gsap.from(".alur-text5", {
            delay: 7,
            duration: 1,
            scale: 0,
            opacity: 0,
        });
    </script>
@endpush
