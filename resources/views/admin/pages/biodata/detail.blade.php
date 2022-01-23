<div class="container">
    <div class="row">
        <div class="col">
        <h6 class="fw-bold">Biodata</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;" >Nama</td>
                    <td>{{ $biodata->user->biodataOne->full_name }}</td>
                </tr>
                <tr>
                    <td>Umur</td>
                    <td>{{ $biodata->user->biodataOne->age }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>{{ $biodata->user->biodataOne->birth_date }}</td>
                </tr>
                <tr>
                    <td>Hobi</td>
                    <td>{{ $biodata->hobby }}</td>
                </tr>
                <tr>
                    <td>cita-cita</td>
                    <td>{{ $biodata->goal }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $biodata->last_education }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>{{ $biodata->name_school }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $biodata->major }}</td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>{{ $biodata->achievment }}</td>
                </tr>
                <tr>
                    <td>Pengalaman Organisai</td>
                    <td>{{ $biodata->organization }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>{{ $biodata->city->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $biodata->provincy->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>{{ $biodata->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if (isset($biodata->user->score) || isset($biodata->user->video))
        <div class="row mt-4">
            <div class="col">
            <h6 class="fw-bold">Nilai</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Nilai Tes Iq</td>
                        <td>{{ $biodata->user->scoreIq->score_question_iq }}</td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nilai Tes Kepribadian</td>
                        <td>{{ $biodata->user->scorePersonal->score_question_personal }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if (isset($biodata->user->video))
            <div class="row mt-4">
                <div class="col">
                <h6 class="fw-bold">Video</h6>
                    <table cellpadding="5">
                        <tr>
                            <td style="width: 280px;">Link Viedo</td>
                            <td><a target="blank" href="{{ $biodata->user->video->url }}">{{ $biodata->user->video->url }}</a></td>
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
                    <td>{{ $biodata->user->biodataOne->no_wa }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><a href="{{ $biodata->facebook }}" target="_blank">{{ $biodata->facebook }}</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><a href="{{ $biodata->instagram }}" target="_blank">{{ $biodata->instagram }}</a></td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td><a href="{{ $biodata->tiktok }}" target="_blank">{{ $biodata->tiktok }}</a></td>
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
                    <td>{{ $biodata->parent}}</td>
                </tr>
                <tr>
                    <td >Nama Ayah</td>
                    <td>{{ $biodata->father }}</td>
                </tr>
                <tr>
                    <td >NIK Ayah</td>
                    <td>{{ $biodata->father_id }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $biodata->mother }}</td>
                </tr>
                <tr>
                    <td>NIK Ibu</td>
                    <td>{{ $biodata->mother_id }}</td>
                </tr>
                <tr>
                    <td>Kondidi Keluarga</td>
                    <td>{{ $biodata->user->biodataOne->family }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $biodata->father_work }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $biodata->mother_work }}</td>
                </tr>
                <tr>
                    <td>Penghasilan Ortu</td>
                    <td>{{ $biodata->parent_income }}</td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>{{ $biodata->brother }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>{{ $biodata->child_to }}</td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td>{{ $biodata->guardian }}</td>
                </tr>
                <tr>
                    <td>No Hp Wali</td>
                    <td>{{ $biodata->no_guardian }}</td>
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
                    <td>{{ $biodata->memorization }}</td>
                </tr>
                <tr>
                    <td>Tokoh Idola</td>
                    <td>{{ $biodata->figure_idol }}</td>
                </tr>
                <tr>
                    <td>Ustadz Idola</td>
                    <td>{{ $biodata->chaplain_idol }}</td>
                </tr>
                <tr>
                    <td>Dimana Allah ?</td>
                    <td>{{ $biodata->tauhid }}</td>
                </tr>
                <tr>
                    <td>Kajian Yang Sering Di Hadiri</td>
                    <td>{{ $biodata->study_islamic }}</td>
                </tr>
                <tr>
                    <td>Buku Bacaan Favorit</td>
                    <td>{{ $biodata->read_book }}</td>
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
                    <td>{{ $biodata->tattoed }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Perokok</td>
                    <td>{{ $biodata->smoker }}</td>
                </tr>
                <tr>
                    <td>Punya Pacar</td>
                    <td>{{ $biodata->girlfriend }}</td>
                </tr>
                <tr>
                    <td>Suka Game ?</td>
                    <td>{{ $biodata->gamer }}</td>
                </tr>
                @if ($biodata->gamer == 'iya')
                    <tr>
                        <td>Nama Game</td>
                        <td>{{ $biodata->game_name }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Main Game</td>
                        <td>{{ $biodata->game_duration }} &nbsp; Jam</td>
                    </tr>
                @endif
                <tr>
                    <td>Punya Laptop</td>
                    <td>{{ $biodata->have_laptop }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col">
        <h6 class="fw-bold">Pertanyaan 3</h6>
            <table cellpadding="5">
                <tr>
                    <td style="width: 280px;">Alasan Mendaftar</td>
                    <td>{{ $biodata->reason_registration }}</td>
                </tr>
                <tr>
                    <td>Kegiatan Dari Bangun Sampai Tidur</td>
                    <td>{{ $biodata->activity }}</td>
                </tr>
                <tr>
                    <td>Kepribadian</td>
                    <td>{{ $biodata->personal }}</td>
                </tr>
            </table>
        </div>
    </div>

</div>
