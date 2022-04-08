<div class="container">
    @if ($biodata->user->biodataTwo != null)
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
                    <td>{{ $biodata->user->biodataTwo->hobby }}</td>
                </tr>
                <tr>
                    <td>cita-cita</td>
                    <td>{{ $biodata->user->biodataTwo->goal }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $biodata->user->biodataTwo->last_education }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>{{ $biodata->user->biodataTwo->name_school }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $biodata->user->biodataTwo->major }}</td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>{{ $biodata->user->biodataTwo->achievment }}</td>
                </tr>
                <tr>
                    <td>Pengalaman Organisai</td>
                    <td>{{ $biodata->user->biodataTwo->organization }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>{{ $biodata->user->biodataTwo->city->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $biodata->user->biodataTwo->provincy->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>{{ $biodata->user->biodataTwo->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if (isset($biodata->user->biodataTwo->user->score) || isset($biodata->user->biodataTwo->user->video))
        <div class="row mt-4">
            <div class="col">
            <h6 class="fw-bold">Nilai</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Nilai Tes Iq</td>
                        <td>{{ $biodata->user->biodataTwo->user->scoreIq->score_question_iq }}</td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nilai Tes Kepribadian</td>
                        <td>{{ $biodata->user->biodataTwo->user->scorePersonal->score_question_personal }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if (isset($biodata->user->biodataTwo->user->video))
            <div class="row mt-4">
                <div class="col">
                <h6 class="fw-bold">Video</h6>
                    <table cellpadding="5">
                        <tr>
                            <td style="width: 280px;">Link Viedo</td>
                            <td><a target="blank" href="{{ $biodata->user->biodataTwo->user->video->url }}">{{ $biodata->user->biodataTwo->user->video->url }}</a></td>
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
                    <td>{{ $biodata->user->biodataTwo->user->biodataOne->no_wa }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><a href="{{ $biodata->user->biodataTwo->facebook }}" target="_blank">{{ $biodata->user->biodataTwo->facebook }}</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><a href="{{ $biodata->user->biodataTwo->instagram }}" target="_blank">{{ $biodata->user->biodataTwo->instagram }}</a></td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td><a href="{{ $biodata->user->biodataTwo->tiktok }}" target="_blank">{{ $biodata->user->biodataTwo->tiktok }}</a></td>
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
                    <td>{{ $biodata->user->biodataTwo->parent}}</td>
                </tr>
                <tr>
                    <td >Nama Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->father }}</td>
                </tr>
                <tr>
                    <td >NIK Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->father_id }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->mother }}</td>
                </tr>
                <tr>
                    <td>NIK Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->mother_id }}</td>
                </tr>
                <tr>
                    <td>Kondidi Keluarga</td>
                    <td>{{ $biodata->user->biodataTwo->user->biodataOne->family }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $biodata->user->biodataTwo->father_work }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $biodata->user->biodataTwo->mother_work }}</td>
                </tr>
                <tr>
                    <td>Penghasilan Ortu</td>
                    <td>{{ $biodata->user->biodataTwo->parent_income }}</td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>{{ $biodata->user->biodataTwo->brother }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>{{ $biodata->user->biodataTwo->child_to }}</td>
                </tr>
                <tr>
                    <td>Wali</td>
                    <td>{{ $biodata->user->biodataTwo->choose_guardian }}</td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td>
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
                    <td>No Hp Wali</td>
                    <td>{{ $biodata->user->biodataTwo->no_guardian }}</td>
                </tr>
                <tr>
                    <td>Keterangan Wali</td>
                    <td>{{ $biodata->user->biodataTwo->description_guardian }}</td>
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
                    <td>{{ $biodata->user->biodataTwo->memorization }}</td>
                </tr>
                <tr>
                    <td>Tokoh Idola</td>
                    <td>{{ $biodata->user->biodataTwo->figure_idol }}</td>
                </tr>
                <tr>
                    <td>Ustadz Idola</td>
                    <td>{{ $biodata->user->biodataTwo->chaplain_idol }}</td>
                </tr>
                <tr>
                    <td>Dimana Allah ?</td>
                    <td>{{ $biodata->user->biodataTwo->tauhid }}</td>
                </tr>
                <tr>
                    <td>Kajian Yang Sering Di Hadiri</td>
                    <td>{{ $biodata->user->biodataTwo->study_islamic }}</td>
                </tr>
                <tr>
                    <td>Buku Bacaan Favorit</td>
                    <td>{{ $biodata->user->biodataTwo->read_book }}</td>
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
                    <td>{{ $biodata->user->biodataTwo->tattoed }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Perokok</td>
                    <td>{{ $biodata->user->biodataTwo->smoker }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Bangun Sholat Subuh</td>
                    <td>{{ $biodata->user->biodataTwo->pray }}</td>
                </tr>
                <tr>
                    <td>Punya Pacar</td>
                    <td>{{ $biodata->user->biodataTwo->girlfriend }}</td>
                </tr>
                <tr>
                    <td>Suka Game ?</td>
                    <td>{{ $biodata->user->biodataTwo->gamer }}</td>
                </tr>
                @if ($biodata->user->biodataTwo->gamer == 'iya')
                    <tr>
                        <td>Nama Game</td>
                        <td>{{ $biodata->user->biodataTwo->game_name }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Main Game</td>
                        <td>{{ $biodata->user->biodataTwo->game_duration }} &nbsp;Jam</td>
                    </tr>
                @endif
                <tr>
                    <td>Punya Laptop</td>
                    <td>{{ $biodata->user->biodataTwo->have_laptop }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="mt-4">
        <h6 class="fw-bold">Pertanyaan 3</h6>
        <div class="px-1">
            <div class="">
                <h6 class="text-bold">Alasan Mendaftar :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->reason_registration }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kegiatan Dari Bangun Sampai Tidur :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->activity }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kepribadian :</h6>
                <p style="font-size: 14px;">{{ $biodata->user->biodataTwo->personal }}</p>
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
