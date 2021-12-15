@extends('front.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="main-content">
    @isset($profile->user->biodataTwo)
    <section class="section">
      <div class="section-body">
          <div class="row mt-5">
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Biodata</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Biodata anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>Name</th>
                        <td>{{ $profile->name }}</td>
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
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Biodata Orang Tua</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Biodata Orang Tua Anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>Orang Tua</th>
                        <td>{{ $profile->user->biodataTwo->parent }}</td>
                      </tr>
                      <tr>
                        <th>Nama Ayah</th>
                        <td>{{ $profile->user->biodataTwo->father }}</td>
                      </tr>
                      <tr>
                        <th>Nama Ibu</th>
                        <td>{{ $profile->user->biodataTwo->mother }}</td>
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
                        <td>Rp. {{ number_format($profile->user->biodataTwo->parent_income) }}</td>
                      </tr>
                      <tr>
                        <th>Jumlah Saudara</th>
                        <td>{{ $profile->user->biodataTwo->brother }}</td>
                      </tr>
                      <tr>
                        <th>Anak Ke-</th>
                        <td>{{ $profile->user->biodataTwo->child_to }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Nilai & Video</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Nilai</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      @if (isset($profile->user->score))
                        <tr>
                          <th>Tes IQ</th>
                          <td>{{ $profile->user->score->score_question_iq }}</td>
                        </tr>
                        <tr>
                          <th>Tes Kepribadian</th>
                          <td>{{ $profile->user->score->score_question_personal }}</td>
                        </tr>
                      @endif
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header">
                  <h4>Video Youtube</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      @if (isset($profile->user->video))
                        <tr>
                          <th>Url Video Youtube</th>
                          <td>{{ $profile->user->video->url }}</td>
                        </tr>
                      @endif
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Kontak</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kontak</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                          <th>Whatsapp</th>
                          <td>{{ $profile->user->phone }}</td>
                      </tr>
                      <tr>
                          <th>Link Facebook</th>
                          <td>{{ $profile->user->biodataTwo->facebook }}</td>
                      </tr>
                      <tr>
                          <th>Instagram</th>
                          <td>{{ $profile->user->biodataTwo->instagram }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Pertanyaan-1</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Pertanyaan-1 anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
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
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
              <h2 class="section-title">Pertanyaan-2</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Pertanyaan-2 anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
                      <tr>
                        <th>Merokok</th>
                        <td>{{ $profile->user->biodataTwo->smoker }}</td>
                      </tr>
                      <tr>
                        <th>Punya pacar?</th>
                        <td>{{ $profile->user->biodataTwo->girlfriend }}</td>
                      </tr>
                      <tr>
                        <th>Suka game?</th>
                        <td>{{ $profile->user->biodataTwo->gamer }}</td>
                      </tr>
                      @if ($profile->user->biodataOne->gemer == 'iya')
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
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <h2 class="section-title">Pertanyaan-3</h2>
              <p class="section-lead">Silahkan periksa kembali semua data!</p>
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Pertanyaan ke-3 Anda</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-md">
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
                    </table>
                  </div>
                </div>
            </div>
          @else
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