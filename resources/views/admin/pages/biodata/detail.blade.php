<div class="container">
    @if ($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first() != null)
    <div class="row">
        <div class="col">
        <h6 class="fw-bold">Biodata</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;" >Nama</td>
                    <td>{{ $biodata->full_name }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>{{ $biodata->age }} Tahun</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $biodata->birth_date }}</td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->hobby }}</td>
                </tr>
                <tr>
                    <td>cita-cita</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->goal }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->last_education }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->name_school }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->major }}</td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->achievment }}</td>
                </tr>
                <tr>
                    <td>Pengalaman Organisai</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->organization }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->city->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->provincy->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if (isset($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->score) || isset($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->video))
        <div class="row mt-4">
            <div class="col">
            <h6 class="fw-bold">Nilai</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Nilai Tes Iq</td>
                        <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->scoreIq->score_question_iq }}</td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nilai Tes Kepribadian</td>
                        <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->scorePersonal->score_question_personal }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if (isset($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->video))
            <div class="row mt-4">
                <div class="col">
                <h6 class="fw-bold">Video</h6>
                    <table cellpadding="5">
                        <tr>
                            <td style="width: 280px;">Link Viedo</td>
                            <td><a target="blank" href="{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->video->url }}">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->video->url }}</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        @endif
    @endif
    <div class="row mt-4">
        <div class="col">
        <h6 class="fw-bold">Contact</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">No WhatsApp</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->biodataOne->no_wa }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><a href="{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->facebook }}" target="_blank">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->facebook }}</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><a href="{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->instagram }}" target="_blank">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->instagram }}</a></td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td><a href="{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->tiktok }}" target="_blank">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->tiktok }}</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
        <h6 class="fw-bold">Biodata Orang Tua</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">Orang Tua</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->parent}}</td>
                </tr>
                <tr>
                    <td >Nama Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->father }}</td>
                </tr>
                <tr>
                    <td >No Whatsapp Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->father_id }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->mother }}</td>
                </tr>
                <tr>
                    <td>No Whatsapp Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->mother_id }}</td>
                </tr>
                <tr>
                    <td>Kondidi Keluarga</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->user->biodataOne->family }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->father_work }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->mother_work }}</td>
                </tr>
                <tr>
                    <td>Penghasilan Ortu</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->parent_income }}</td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->brother }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->child_to }}</td>
                </tr>
                <tr>
                    <td>Wali/Orang tua</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->choose_guardian }}</td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td>
                        @if ($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->choose_guardian == 'ayah')
                            {{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->father }}
                        @elseif ($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->choose_guardian == 'ibu')
                            {{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->mother }}
                        @elseif ($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->choose_guardian == 'selain-orang-tua')
                            {{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->guardian }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>No Hp Wali</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->no_guardian }}</td>
                </tr>
                <tr>
                    <td>Keterangan Wali</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->description_guardian }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
        <h6 class="fw-bold">Pertanyaan 1</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">Jumlah Hafalan</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->memorization }}</td>
                </tr>
                <tr>
                    <td>Tokoh Idola</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->figure_idol }}</td>
                </tr>
                <tr>
                    <td>Ustadz Idola</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->chaplain_idol }}</td>
                </tr>
                <tr>
                    <td>Dimana Allah ?</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->tauhid }}</td>
                </tr>
                <tr>
                    <td>Kajian Yang Sering Di Hadiri</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->study_islamic }}</td>
                </tr>
                <tr>
                    <td>Buku Bacaan Favorit</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->read_book }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
        <h6 class="fw-bold">Pertanyaan 2</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">Bertato</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->tattoed }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Perokok</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->smoker }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Bangun Sholat Subuh</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->pray }}</td>
                </tr>
                <tr>
                    <td>Punya Pacar</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->girlfriend }}</td>
                </tr>
                <tr>
                    <td>Suka Game ?</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->gamer }}</td>
                </tr>
                @if ($biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->gamer == 'iya')
                    <tr>
                        <td>Nama Game</td>
                        <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->game_name }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Main Game</td>
                        <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->game_duration }} &nbsp;Jam</td>
                    </tr>
                @endif
                <tr>
                    <td>Punya Laptop</td>
                    <td>{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->have_laptop }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="mt-4">
        <h6 class="fw-bold">Pertanyaan 3</h6>
        <div class="px-1">
            <div class="">
                <h6 class="text-bold">Alasan Mendaftar :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->reason_registration }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kegiatan Dari Bangun Sampai Tidur :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->activity }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kepribadian :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->where('academy_year', $tahun_ajaran)->first()->personal }}</p>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
        <h6 class="fw-bold">Biodata</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;" >Nama</td>
                    <td>{{ $biodata->full_name }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>{{ $biodata->age }} Tahun</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $biodata->birth_date }}</td>
                </tr>
                <tr>
                    <td>Kondisi Keluarga</td>
                    <td>{{ $biodata->family }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">No WhatsApp</td>
                    <td>{{ $biodata->no_wa }}</td>
                </tr>
            </table>
        </div>
    </div>
    @endif
</div>
