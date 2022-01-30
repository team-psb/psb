@extends('front.layouts.app')

@section('title', 'Profile')

@push('end-style')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('content')
<div class="main-content">
    @isset($profile->user->biodataTwo)
    <section class="section">
      <div class="section-body mb-5">
          <div class="col-12 d-xl-none">
            <div class="btn text-white" onclick="history.back()"><i class="fas fa-chevron-left"></i> Back</div>
            <a href="{{ route('user-dashboard') }}" class="btn text-white"><i class="fas fa-home"></i> Home</a>
          </div>
          <div class="row mt-5">
            <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="200"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Biodata</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{ $profile->full_name }}</td>
                  </tr>
                  <tr>
                    <th>Umur</th>
                    <td>{{ $profile->age }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td>{{ $profile->birth_date }}</td>
                  </tr>
                  <tr>
                    <th>Hobi</th>
                    <td>{{ $profile->user->biodataTwo->hobby }}</td>
                  </tr>
                  <tr>
                    <th>Cita-cita</th>
                    <td>{{ $profile->user->biodataTwo->goal }}</td>
                  </tr>
                  <tr>
                    <th>Pendidikan Terakhir</th>
                    <td>{{ $profile->user->biodataTwo->last_education }}</td>
                  </tr>
                  <tr>
                    <th>Asal Sekolah</th>
                    <td>{{ $profile->user->biodataTwo->name_school }}</td>
                  </tr>
                  <tr>
                    <th>Jurusan</th>
                    <td>{{ $profile->user->biodataTwo->major }}</td>
                  </tr>
                  <tr>
                    <th>Prestasi</th>
                    <td>{{ $profile->user->biodataTwo->achievment }}</td>
                  </tr>
                  <tr>
                    <th>Pengalaman Organisasi</th>
                    <td>{{ $profile->user->biodataTwo->organization }}</td>
                  </tr>
                  <tr>
                    <th>Alamat Lengkap</th>
                    <td>{{ $profile->user->biodataTwo->address }}</td>
                  </tr>
                  <tr>
                    <th>Kabupaten</th>
                    <td>{{ $profile->user->biodataTwo->city->name }}</td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td>{{ $profile->user->biodataTwo->provincy->name }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="400"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Biodata Orang Tua</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Orang Tua</th>
                    <td>{{ $profile->user->biodataTwo->parent }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ayah</th>
                    <td>{{ $profile->user->biodataTwo->father }}</td>
                  </tr>
                  <tr>
                    <th>NIK Ayah</th>
                    <td>{{ $profile->user->biodataTwo->father_id }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ibu</th>
                    <td>{{ $profile->user->biodataTwo->mother }}</td>
                  </tr>
                  <tr>
                    <th>NIK Ibu</th>
                    <td>{{ $profile->user->biodataTwo->mother_id }}</td>
                  </tr>
                  <tr>
                    <th>Kondisi Keluarga</th>
                    <td>{{ $profile->user->biodataOne->family }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ayah</th>
                    <td>{{ $profile->user->biodataTwo->father_work }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ibu</th>
                    <td>{{ $profile->user->biodataTwo->mother_work }}</td>
                  </tr>
                  <tr>
                    <th>Penghasilan Orang Tua</th>
                    <td>{{ $profile->user->biodataTwo->parent_income }}</td>
                  </tr>
                  <tr>
                    <th>Wali</th>
                    <td>{{ $profile->user->biodataTwo->choose_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Nama Wali</th>
                    <td>{{ $profile->user->biodataTwo->guardian ? $profile->user->biodataTwo->guardian : '-'  }}</td>
                  </tr>
                  <tr>
                    <th>Kontak Wali</th>
                    <td>{{ $profile->user->biodataTwo->no_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Saudara</th>
                    <td>{{ $profile->user->biodataTwo->brother }}</td>
                  </tr>
                  <tr>
                    <th>Anak Ke-</th>
                    <td>{{ $profile->user->biodataTwo->child_to }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="200"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover" id="nilai">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Nilai dan Video</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if (isset($profile->user->scoreIq))
                    <tr>
                      <th>Tes IQ</th>
                      <td>{{ $profile->user->scoreIq->score_question_iq }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes IQ</th>
                      <td>-</td>
                    </tr>
                  @endif
                  @if (isset($profile->user->scorePersonal))
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td>{{ $profile->user->scorePersonal->score_question_personal }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td>-</td>
                    </tr>
                  @endif
                    
                  @if (isset($profile->user->video))
                    <tr>
                      <th>Url Video Youtube</th>
                      <td>
                          <a target="_blank" href="{{ $profile->user->video->url }}">{{ $profile->user->video->url }}</a>
                      </td>
                    </tr>
                  @else
                    <tr>
                      <th>Url Video Youtube</th>
                      <td>-</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
            <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="400"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Social Media</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Whatsapp</th>
                    <td>{{ $profile->user->phone }}</td>
                  </tr>
                  <tr>
                    <th>Facebook</th>
                    <td>
                      <a target="_blank" href="{{ $profile->user->biodataTwo->facebook }}">{{ $profile->user->biodataTwo->facebook }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Instagram</th>
                    <td>
                      <a target="_blank" href="{{ $profile->user->biodataTwo->instagram }}">{{ $profile->user->biodataTwo->instagram }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Tiktok</th>
                    <td>
                      <a target="_blank" href="{{ $profile->user->biodataTwo->tiktok }}">{{ $profile->user->biodataTwo->tiktok }}</a>
                    </td>
                </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="200"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Pertanyaan Pertama - 1</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Jumlah Hafalan</th>
                    <td>{{ $profile->user->biodataTwo->memorization }}</td>
                  </tr>
                  <tr>
                    <th>Ustadz Idola</th>
                    <td>{{ $profile->user->biodataTwo->chaplain_idol }}</td>
                  </tr>
                  <tr>
                    <th>Tokoh Idola</th>
                    <td>{{ $profile->user->biodataTwo->figure_idol }}</td>
                  </tr>
                  <tr>
                    <th>Dimana Allah?</th>
                    <td>{{ $profile->user->biodataTwo->tauhid }}</td>
                  </tr>
                  <tr>
                    <th>Kajian yang sering dihadiri</th>
                    <td>{{ $profile->user->biodataTwo->study_islamic }}</td>
                  </tr>
                  <tr>
                    <th>Buku bacaan favorit</th>
                    <td>{{ $profile->user->biodataTwo->read_book }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="400"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Pertanyaan Kedua - 2</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th>Merokok</th>
                    <td>{{ $profile->user->biodataTwo->smoker }}</td>
                  </tr>
                  <tr>
                    <th>Bangun sholat subuh</th>
                    <td>{{ $profile->user->biodataTwo->pray }}</td>
                  </tr>
                  <tr>
                    <th>Punya pacar?</th>
                    <td>{{ $profile->user->biodataTwo->girlfriend }}</td>
                  </tr>
                  <tr>
                    <th>Punya tato?</th>
                    <td>{{ $profile->user->biodataTwo->tattoed }}</td>
                  </tr>
                  <tr>
                    <th>Suka game?</th>
                    <td>{{ $profile->user->biodataTwo->gamer }}</td>
                  </tr>
                  @if ($profile->user->biodataTwo->gamer == 'iya')
                  <tr>
                    <th>Nama game</th>
                    <td>{{ $profile->user->biodataTwo->game_name }}</td>
                  </tr>
                  <tr>
                    <th>Durasi main game</th>
                    <td>{{ $profile->user->biodataTwo->game_duration }}</td>
                  </tr>
                  @endif
                  <tr>
                    <th>Punya laptop?</th>
                    <td>{{ $profile->user->biodataTwo->have_laptop }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6"
                  data-aos="fade-up"
                  data-aos-delay="200"
                  data-aos-duration="1000"
            >
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th colspan="2">
                      <h2 class="section-title">Pertanyaan Ketiga - 3</h2>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <th>Alasan Mendaftar</th>
                      <td>{{ $profile->user->biodataTwo->reason_registration }}</td>
                  </tr>
                  <tr>
                      <th>Kegiatan Dari Bangun Sampai Tidur</th>
                      <td>{{ $profile->user->biodataTwo->activity }}</td>
                  </tr>
                  <tr>
                      <th>Kepribadian</th>
                      <td>{{ $profile->user->biodataTwo->personal }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          @else
          <div class="col-12 d-xl-none">
            <div class="btn text-white" onclick="history.back()"><i class="fas fa-chevron-left"></i> Back</div>
            <a href="{{ route('user-dashboard') }}" class="btn text-white"><i class="fas fa-home"></i> Home</a>
          </div>
            <div class="text-center min-vh-100 pt-5">
              <div class="mt-5 pt-5">
                  <i>Tidak ada data yang ditampilkan <br> Anda belum mengisi biodata</i><br>
                  <a href="{{ route('user-first-tes') }}" class="btn btn-sm btn-info px-4 my-4"><i class="fas fa-arrow-left"></i> ikuti tes sekarang</a>
              </div>
            </div>
          </div>
      </div>
    </section>
    @endisset
</div>
@endsection

@push('end-script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
@endpush