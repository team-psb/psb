@extends('front.layouts.menu')

@section('title', 'Profile')

@push('end-style')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush

@section('content')
<div class="main-content">
    @isset($profile->user->biodataTwo)
    <section class="section">
      <div class="section-body mb-5">
          <div class="col-12 d-xl-none"></div>
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
                    <th>Nama</th>
                    <td class="text-break">{{ $profile->full_name }}</td>
                  </tr>
                  <tr>
                    <th>Umur</th>
                    <td class="text-break">{{ $profile->age }}</td>
                  </tr>
                  <tr>
                    <th>Tanggal Lahir</th>
                    <td class="text-break">{{ $profile->birth_date }}</td>
                  </tr>
                  <tr>
                    <th>Hobi</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->hobby }}</td>
                  </tr>
                  <tr>
                    <th>Cita-cita</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->goal }}</td>
                  </tr>
                  <tr>
                    <th>Pendidikan Terakhir</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->last_education }}</td>
                  </tr>
                  <tr>
                    <th>Asal Sekolah</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->name_school }}</td>
                  </tr>
                  <tr>
                    <th>Jurusan</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->major }}</td>
                  </tr>
                  <tr>
                    <th>Prestasi</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->achievment }}</td>
                  </tr>
                  <tr>
                    <th>Pengalaman Organisasi</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->organization }}</td>
                  </tr>
                  <tr>
                    <th>Alamat Lengkap</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->address }}</td>
                  </tr>
                  <tr>
                    <th>Kabupaten</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->city->name }}</td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->provincy->name }}</td>
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
                    <td class="text-break">{{ $profile->user->biodataTwo->parent }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ayah</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->father }}</td>
                  </tr>
                  <tr>
                    <th>NIK Ayah</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->father_id }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ibu</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->mother }}</td>
                  </tr>
                  <tr>
                    <th>NIK Ibu</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->mother_id }}</td>
                  </tr>
                  <tr>
                    <th>Kondisi Keluarga</th>
                    <td class="text-break">{{ $profile->user->biodataOne->family }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ayah</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->father_work }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ibu</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->mother_work }}</td>
                  </tr>
                  <tr>
                    <th>Penghasilan Orang Tua</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->parent_income }}</td>
                  </tr>
                  <tr>
                    <th>Wali</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->choose_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Nama Wali</th>
                    <td class="text-break">
                      @if ($profile->user->biodataTwo->choose_guardian == 'ayah')
                        {{ $profile->user->biodataTwo->father }}
                      @elseif ($profile->user->biodataTwo->choose_guardian == 'ibu')
                        {{ $profile->user->biodataTwo->mother }}
                      @elseif ($profile->user->biodataTwo->choose_guardian == 'selain-orang-tua')
                        {{ $profile->user->biodataTwo->guardian }}
                      @else
                        -
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Kontak Wali</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->no_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Saudara</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->brother }}</td>
                  </tr>
                  <tr>
                    <th>Anak Ke-</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->child_to }}</td>
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
                      <td class="text-break">{{ $profile->user->scoreIq->score_question_iq }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes IQ</th>
                      <td class="text-break">-</td>
                    </tr>
                  @endif
                  @if (isset($profile->user->scorePersonal))
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td class="text-break">{{ $profile->user->scorePersonal->score_question_personal }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td class="text-break">-</td>
                    </tr>
                  @endif
                    
                  @if (isset($profile->user->video))
                    <tr>
                      <th>Url Video Youtube</th>
                      <td class="text-break">
                          <a target="_blank" href="{{ $profile->user->video->url }}">{{ $profile->user->video->url }}</a>
                      </td>
                    </tr>
                  @else
                    <tr>
                      <th>Url Video Youtube</th>
                      <td class="text-break">-</td>
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
                    <td class="text-break">{{ $profile->user->phone }}</td>
                  </tr>
                  <tr>
                    <th>Facebook</th>
                    <td class="text-break">
                      <a target="_blank" href="{{ $profile->user->biodataTwo->facebook }}">{{ $profile->user->biodataTwo->facebook }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Instagram</th>
                    <td class="text-break">
                      <a target="_blank" href="{{ $profile->user->biodataTwo->instagram }}">{{ $profile->user->biodataTwo->instagram }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Tiktok</th>
                    <td class="text-break">
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
                    <td class="text-break">{{ $profile->user->biodataTwo->memorization }}</td>
                  </tr>
                  <tr>
                    <th>Ustadz Idola</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->chaplain_idol }}</td>
                  </tr>
                  <tr>
                    <th>Tokoh Idola</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->figure_idol }}</td>
                  </tr>
                  <tr>
                    <th>Dimana Allah?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->tauhid }}</td>
                  </tr>
                  <tr>
                    <th>Kajian yang sering dihadiri</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->study_islamic }}</td>
                  </tr>
                  <tr>
                    <th>Buku bacaan favorit</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->read_book }}</td>
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
                    <th>Merokok?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->smoker }}</td>
                  </tr>
                  <tr>
                    <th>Bangun sholat subuh?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->pray }}</td>
                  </tr>
                  <tr>
                    <th>Punya pacar?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->girlfriend }}</td>
                  </tr>
                  <tr>
                    <th>Punya tato?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->tattoed }}</td>
                  </tr>
                  <tr>
                    <th>Suka game?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->gamer }}</td>
                  </tr>
                  @if ($profile->user->biodataTwo->gamer == 'iya')
                  <tr>
                    <th>Nama game</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->game_name }}</td>
                  </tr>
                  <tr>
                    <th>Durasi main game</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->game_duration }} &nbsp;Jam</td>
                  </tr>
                  @endif
                  <tr>
                    <th>Punya laptop?</th>
                    <td class="text-break">{{ $profile->user->biodataTwo->have_laptop }}</td>
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
                    <td class="text-break">
                      <h6 style="font-size: 14px">Alasan Mendaftar?</h6>
                      <p class="mb-0">{{ $profile->user->biodataTwo->reason_registration }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-break">
                      <h6 style="font-size: 14px">Kegiatan Dari Bangun Sampai Tidur?</h6>
                      <p class="mb-0">{{ $profile->user->biodataTwo->activity }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-break">
                      <h6 style="font-size: 14px">Kepribadian?</h6>
                      <p class="mb-0">{{ $profile->user->biodataTwo->personal }}</p>
                    </td>
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