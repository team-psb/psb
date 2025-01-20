@extends('front.layouts.menu')

@section('title', 'Profile')

{{-- @push('end-style')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush --}}

@section('content')
<div class="main-content">
    @isset($tahap1)
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
                    <td class="text-break">{{ $tahap1->hobby }}</td>
                  </tr>
                  <tr>
                    <th>Cita-cita</th>
                    <td class="text-break">{{ $tahap1->goal }}</td>
                  </tr>
                  <tr>
                    <th>Pendidikan Terakhir</th>
                    <td class="text-break">{{ $tahap1->last_education }}</td>
                  </tr>
                  <tr>
                    <th>Asal Sekolah</th>
                    <td class="text-break">{{ $tahap1->name_school }}</td>
                  </tr>
                  <tr>
                    <th>Jurusan</th>
                    <td class="text-break">{{ $tahap1->major }}</td>
                  </tr>
                  <tr>
                    <th>Prestasi</th>
                    <td class="text-break">{{ $tahap1->achievment }}</td>
                  </tr>
                  <tr>
                    <th>Pengalaman Organisasi</th>
                    <td class="text-break">{{ $tahap1->organization }}</td>
                  </tr>
                  <tr>
                    <th>Alamat Lengkap</th>
                    <td class="text-break">{{ $tahap1->address }}</td>
                  </tr>
                  <tr>
                    <th>Kabupaten</th>
                    <td class="text-break">{{ $tahap1->city->name }}</td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td class="text-break">{{ $tahap1->provincy->name }}</td>
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
                    <td class="text-break">{{ $tahap1->parent }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ayah</th>
                    <td class="text-break">{{ $tahap1->father }}</td>
                  </tr>
                  <tr>
                    <th>No Whatsapp Ayah</th>
                    <td class="text-break">{{ $tahap1->father_id }}</td>
                  </tr>
                  <tr>
                    <th>Nama Ibu</th>
                    <td class="text-break">{{ $tahap1->mother }}</td>
                  </tr>
                  <tr>
                    <th>No Whatsapp Ibu</th>
                    <td class="text-break">{{ $tahap1->mother_id }}</td>
                  </tr>
                  <tr>
                    <th>Kondisi Keluarga</th>
                    <td class="text-break">{{ $tahap1->family }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ayah</th>
                    <td class="text-break">{{ $tahap1->father_work }}</td>
                  </tr>
                  <tr>
                    <th>Pekerjaan Ibu</th>
                    <td class="text-break">{{ $tahap1->mother_work }}</td>
                  </tr>
                  <tr>
                    <th>Penghasilan Orang Tua</th>
                    <td class="text-break">{{ $tahap1->parent_income }}</td>
                  </tr>
                  <tr>
                    <th>Wali / Orang Tua</th>
                    <td class="text-break">{{ $tahap1->choose_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Nama Wali / Orang Tua</th>
                    <td class="text-break">
                      @if ($tahap1->choose_guardian == 'ayah')
                        {{ $tahap1->father }}
                      @elseif ($tahap1->choose_guardian == 'ibu')
                        {{ $tahap1->mother }}
                      @elseif ($tahap1->choose_guardian == 'selain-orang-tua')
                        {{ $tahap1->guardian }}
                      @else
                        -
                      @endif
                    </td>
                  </tr>
                  <tr>
                    <th>Kontak Wali / Orang Tua</th>
                    <td class="text-break">{{ $tahap1->no_guardian }}</td>
                  </tr>
                  <tr>
                    <th>Jumlah Saudara</th>
                    <td class="text-break">{{ $tahap1->brother }}</td>
                  </tr>
                  <tr>
                    <th>Anak Ke-</th>
                    <td class="text-break">{{ $tahap1->child_to }}</td>
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
                  @if ($profile->user->scoreIq->where('academy_year_id', $tahun_ajaran)->first() != null)
                    <tr>
                      <th>Tes IQ</th>
                      <td class="text-break">{{ $profile->user->scoreIq->where('academy_year_id', $tahun_ajaran)->first()->score_question_iq }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes IQ</th>
                      <td class="text-break">-</td>
                    </tr>
                  @endif
                  @if ($profile->user->scorePersonal->where('academy_year_id', $tahun_ajaran)->first() != null)
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td class="text-break">{{ $profile->user->scorePersonal->where('academy_year_id', $tahun_ajaran)->first()->score_question_personal }}</td>
                    </tr>
                  @else
                    <tr>
                      <th>Tes Kepribadian</th>
                      <td class="text-break">-</td>
                    </tr>
                  @endif

                  @if ($profile->user->video->where('academy_year_id', $tahun_ajaran)->first() != null)
                    <tr>
                      <th>Url Video Youtube</th>
                      <td class="text-break">
                          <a target="_blank" href="{{ $profile->user->video->where('academy_year_id', $tahun_ajaran)->first()->url }}">{{ $profile->user->video->where('academy_year_id', $tahun_ajaran)->first()->url }}</a>
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
                      <a target="_blank" href="{{ $tahap1->facebook }}">{{ $tahap1->facebook }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Instagram</th>
                    <td class="text-break">
                      <a target="_blank" href="{{ $tahap1->instagram }}">{{ $tahap1->instagram }}</a>
                    </td>
                  </tr>
                  <tr>
                    <th>Tiktok</th>
                    <td class="text-break">
                      <a target="_blank" href="{{ $tahap1->tiktok }}">{{ $tahap1->tiktok }}</a>
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
                    <td class="text-break">{{ $tahap1->memorization }}</td>
                  </tr>
                  <tr>
                    <th>Ustadz Idola</th>
                    <td class="text-break">{{ $tahap1->chaplain_idol }}</td>
                  </tr>
                  <tr>
                    <th>Tokoh Idola</th>
                    <td class="text-break">{{ $tahap1->figure_idol }}</td>
                  </tr>
                  <tr>
                    <th>Dimana Allah?</th>
                    <td class="text-break">{{ $tahap1->tauhid }}</td>
                  </tr>
                  <tr>
                    <th>Kajian yang sering dihadiri</th>
                    <td class="text-break">{{ $tahap1->study_islamic }}</td>
                  </tr>
                  <tr>
                    <th>Buku bacaan favorit</th>
                    <td class="text-break">{{ $tahap1->read_book }}</td>
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
                    <td class="text-break">{{ $tahap1->smoker }}</td>
                  </tr>
                  <tr>
                    <th>Bangun sholat subuh?</th>
                    <td class="text-break">{{ $tahap1->pray }}</td>
                  </tr>
                  <tr>
                    <th>Punya pacar?</th>
                    <td class="text-break">{{ $tahap1->girlfriend }}</td>
                  </tr>
                  <tr>
                    <th>Punya tato?</th>
                    <td class="text-break">{{ $tahap1->tattoed }}</td>
                  </tr>
                  <tr>
                    <th>Suka game?</th>
                    <td class="text-break">{{ $tahap1->gamer }}</td>
                  </tr>
                  @if ($tahap1->gamer == 'iya')
                  <tr>
                    <th>Nama game</th>
                    <td class="text-break">{{ $tahap1->game_name }}</td>
                  </tr>
                  <tr>
                    <th>Durasi main game</th>
                    <td class="text-break">{{ $tahap1->game_duration }} &nbsp;Jam</td>
                  </tr>
                  @endif
                  <tr>
                    <th>Punya laptop?</th>
                    <td class="text-break">{{ $tahap1->have_laptop }}</td>
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
                    <td class="text-break py-3">
                      <h6 style="font-size: 14px">Alasan Mendaftar?</h6>
                      <p class="mb-0">{{ $tahap1->reason_registration }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-break py-3">
                      <h6 style="font-size: 14px">Kegiatan Dari Bangun Sampai Tidur?</h6>
                      <p class="mb-0">{{ $tahap1->activity }}</p>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-break py-3">
                      <h6 style="font-size: 14px">Kepribadian?</h6>
                      <p class="mb-0">{{ $tahap1->personal }}</p>
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

{{-- @push('end-script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
@endpush --}}
