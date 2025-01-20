<div class="container">
    @if ($data != null)
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
                    <td>{{ $data->hobby }}</td>
                </tr>
                <tr>
                    <td>cita-cita</td>
                    <td>{{ $data->goal }}</td>
                </tr>
                <tr>
                    <td>Pendidikan Terakhir</td>
                    <td>{{ $data->last_education }}</td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>{{ $data->name_school }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $data->major }}</td>
                </tr>
                <tr>
                    <td>Prestasi</td>
                    <td>{{ $data->achievment }}</td>
                </tr>
                <tr>
                    <td>Pengalaman Organisai</td>
                    <td>{{ $data->organization }}</td>
                </tr>
                <tr>
                    <td>Kabupaten</td>
                    <td>{{ $data->city->name }}</td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>{{ $data->provincy->name }}</td>
                </tr>
                <tr>
                    <td>Alamat Lengkap</td>
                    <td>{{ $data->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if ($data->user->score->where('academy_year_id', $tahun_ajaran)->first() != null || $data->user->video != null)
        <div class="row mt-4">
            <div class="col">
            <h6 class="fw-bold">Nilai</h6>
                <table cellpadding="5">
                    <tr>
                        <td style="width: 280px;">Nilai Tes Iq</td>
                        <td>{{ $data->user->scoreIq->where('academy_year_id', $tahun_ajaran)->first()->score_question_iq }}</td>
                    </tr>
                    <tr>
                        <td style="width: 280px;">Nilai Tes Kepribadian</td>
                        <td>{{ $data->user->scorePersonal->where('academy_year_id', $tahun_ajaran)->first()->score_question_personal }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if ($data->user->video->where('academy_year_id', $tahun_ajaran)->first() != null)
            <div class="row mt-4">
                <div class="col">
                <h6 class="fw-bold">Video</h6>
                    <table cellpadding="5">
                        <tr>
                            <td style="width: 280px;">Link Viedo</td>
                            <td><a target="blank" href="{{ $data->user->video->where('academy_year_id', $tahun_ajaran)->first()->url }}">{{ $data->user->video->where('academy_year_id', $tahun_ajaran)->first()->url }}</a></td>
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
                    <td>{{ $data->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}</td>
                </tr>
                <tr>
                    <td>Facebook</td>
                    <td><a href="{{ $data->facebook }}" target="_blank">{{ $data->facebook }}</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td><a href="{{ $data->instagram }}" target="_blank">{{ $data->instagram }}</a></td>
                </tr>
                <tr>
                    <td>Tiktok</td>
                    <td><a href="{{ $data->tiktok }}" target="_blank">{{ $data->tiktok }}</a></td>
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
                    <td>{{ $data->parent}}</td>
                </tr>
                <tr>
                    <td >Nama Ayah</td>
                    <td>{{ $data->father }}</td>
                </tr>
                <tr>
                    <td >No Whatsapp Ayah</td>
                    <td>{{ $data->father_id }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu</td>
                    <td>{{ $data->mother }}</td>
                </tr>
                <tr>
                    <td>No Whatsapp Ibu</td>
                    <td>{{ $data->mother_id }}</td>
                </tr>
                <tr>
                    <td>Kondidi Keluarga</td>
                    <td>{{ $data->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ayah</td>
                    <td>{{ $data->father_work }}</td>
                </tr>
                <tr>
                    <td>Pekerjaan Ibu</td>
                    <td>{{ $data->mother_work }}</td>
                </tr>
                <tr>
                    <td>Penghasilan Ortu</td>
                    <td>{{ $data->parent_income }}</td>
                </tr>
                <tr>
                    <td>Jumlah Saudara</td>
                    <td>{{ $data->brother }}</td>
                </tr>
                <tr>
                    <td>Anak Ke</td>
                    <td>{{ $data->child_to }}</td>
                </tr>
                <tr>
                    <td>Wali/Orang tua</td>
                    <td>{{ $data->choose_guardian }}</td>
                </tr>
                <tr>
                    <td>Nama Wali</td>
                    <td>
                        @if ($data->choose_guardian == 'ayah')
                            {{ $data->father }}
                        @elseif ($data->choose_guardian == 'ibu')
                            {{ $data->mother }}
                        @elseif ($data->choose_guardian == 'selain-orang-tua')
                            {{ $data->guardian }}
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>No Hp Wali</td>
                    <td>{{ $data->no_guardian }}</td>
                </tr>
                <tr>
                    <td>Keterangan Wali</td>
                    <td>{{ $data->description_guardian }}</td>
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
                    <td>{{ $data->memorization }}</td>
                </tr>
                <tr>
                    <td>Tokoh Idola</td>
                    <td>{{ $data->figure_idol }}</td>
                </tr>
                <tr>
                    <td>Ustadz Idola</td>
                    <td>{{ $data->chaplain_idol }}</td>
                </tr>
                <tr>
                    <td>Dimana Allah ?</td>
                    <td>{{ $data->tauhid }}</td>
                </tr>
                <tr>
                    <td>Kajian Yang Sering Di Hadiri</td>
                    <td>{{ $data->study_islamic }}</td>
                </tr>
                <tr>
                    <td>Buku Bacaan Favorit</td>
                    <td>{{ $data->read_book }}</td>
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
                    <td>{{ $data->tattoed }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Perokok</td>
                    <td>{{ $data->smoker }}</td>
                </tr>
                <tr>
                    <td style="width: 280px;">Bangun Sholat Subuh</td>
                    <td>{{ $data->pray }}</td>
                </tr>
                <tr>
                    <td>Punya Pacar</td>
                    <td>{{ $data->girlfriend }}</td>
                </tr>
                <tr>
                    <td>Suka Game ?</td>
                    <td>{{ $data->gamer }}</td>
                </tr>
                @if ($data->gamer == 'iya')
                    <tr>
                        <td>Nama Game</td>
                        <td>{{ $data->game_name }}</td>
                    </tr>
                    <tr>
                        <td>Durasi Main Game</td>
                        <td>{{ $data->game_duration }} &nbsp;Jam</td>
                    </tr>
                @endif
                <tr>
                    <td>Punya Laptop</td>
                    <td>{{ $data->have_laptop }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="mt-4">
        <h6 class="fw-bold">Pertanyaan 3</h6>
        <div class="px-1">
            <div class="">
                <h6 class="text-bold">Alasan Mendaftar :</h6>
                <p style="font-size: 14px;">{{ $data->reason_registration }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kegiatan Dari Bangun Sampai Tidur :</h6>
                <p style="font-size: 14px;">{{ $data->activity }}</p>
            </div>
            <div class="">
                <h6 class="text-bold">Kepribadian :</h6>
                <p style="font-size: 14px;">{{ $data->personal }}</p>
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
