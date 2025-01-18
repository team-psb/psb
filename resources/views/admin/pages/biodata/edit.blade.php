@extends('admin.layouts.app')

@section('title', 'Edit Biodata Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Biodata {{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}</h4>
                        <form x-data="formdata()" method="POST" action="{{ route('biodatas.update', $biodata->id) }}">
                            @csrf
                            @method('POST')
                            {{-- colom pertama --}}
                            <input type="hidden" name="biodataOne_id" value="{{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->id }}">
                            <div class="row">
                                <div class="col-md-6">

                                {{-- nama --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="name">Nama</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="full_name"
                                        value="{{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}"
                                        required
                                    />
                                </div>
                                {{-- umur --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Umur</label>
                                    <input
                                    type="number"
                                    class="form-control"
                                    value="{{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->age }}"
                                    name="age"
                                    aria-describedby="emailHelp"
                                    required
                                    />
                                </div>
                                {{-- tanggal lahir --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Tanggal Lahir</label>
                                    <input
                                    type="date"
                                    class="form-control"
                                    value="{{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->birth_date }}"
                                    name="birth_date"
                                    aria-describedby="emailHelp"
                                    required
                                    />
                                </div>
                                {{-- hobi --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Hobi</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->hobby }}"
                                        name="hobby"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- skill --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Skill</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->skill }}"
                                        name="skill"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- cita-cita --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Cita Cita</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->goal }}"
                                        name="goal"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- pendidikan terakhir --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Pendidikan Terakhir</label>
                                    <select name="last_education" class="form-select">
                                    <option value="SD" {{ $biodata->last_education == 'SD' ? 'selected' :'' }}>SD SEDERAJAT</option>
                                    <option value="SMP" {{ $biodata->last_education == 'SMP' ? 'selected' :'' }}>SMP SEDERAJAT</option>
                                    <option value="SMA" {{ $biodata->last_education == 'SMA' ? 'selected' :'' }}>SMA SEDERAJAT</option>
                                    </select>
                                </div>
                                {{-- asal sekolah --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Asal Sekolah</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->name_school }}"
                                        name="name_school"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- jurusan --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Jurusan</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->major }}"
                                        name="major"
                                        aria-describedby="emailHelp"
                                        {{-- required --}}
                                    />
                                </div>
                                {{-- prestasi --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Prestasi</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->achievment }}"
                                        name="achivement"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- pengalaman organisasi --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Pengalaman Organisasi</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->organization }}"
                                        name="organization"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                @php
                                    $provinsi =App\Models\IndonesiaProvince::all();
                                    $kabupaten =App\Models\IndonesiaCity::all();
                                @endphp
                                {{-- provinsi --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Provinsi</label>
                                    <select name="indonesia_provinces_id" class="form-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                                        <option value="{{ $biodata->indonesia_provinces_id }}">{{ $biodata->provincy->name }}</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->code }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- kabupaten --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold"  for="">Kabupaten</label>
                                    <select name="indonesia_cities_id" class="form-select" >
                                        <option value="{{ $biodata->indonesia_cities_id }}">{{ $biodata->city->name }}</option>
                                        <template x-for="an in kabupatenids">
                                            <option :value="an.id"><span x-html="an.name"></span></option>
                                        </template>
                                    </select>
                                </div>
                                {{-- alamat lengkap --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Alamat Lengkap</label>
                                    <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->address }}"
                                    name="address"
                                    aria-describedby="emailHelp"
                                    required
                                    />
                                </div>
                                {{-- no whatsapp --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">No Whatsapp</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}"
                                        name="no_wa"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- facebook --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Facebook</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->facebook }}"
                                        name="facebook"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- instagram --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Instagram</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->instagram }}"
                                        name="instagram"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- tiktok --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Tiktok</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->tiktok }}"
                                        name="tiktok"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- orang tua --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Orang Tua</label>
                                    <select name="parent" class="form-select">
                                        <option value="lengkap" {{ $biodata->parent == 'lengkap' ? 'selected' :'' }}>Lengkap</option>
                                        <option value="ayah" {{ $biodata->parent == 'ayah' ? 'selected' :'' }}>Ayah</option>
                                        <option value="ibu" {{ $biodata->parent == 'ibu' ? 'selected' :'' }}>Ibu</option>
                                        <option value="yatim-piatu" {{ $biodata->parent == 'yatim-piatu' ? 'selected' :'' }}>Yatim-Piatu</option>
                                    </select>
                                </div>
                                {{-- nama ayah --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Nama Ayah</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->father }}"
                                        name="father"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- nik ayah --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">No Whatsapp Ayah</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->father_id }}"
                                        name="father_id"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- nama ibu --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Nama Ibu</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->mother }}"
                                        name="mother"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- nik ibu --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">No Whatsapp Ibu</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->mother_id }}"
                                        name="mother_id"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- pekerjaan Ayah --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Pekerjaan Ayah</label></label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->father_work }}"
                                        name="father_work"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- pekerjaan ibu --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Pekerjaan Ibu</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->mother_work }}"
                                        name="mother_work"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- kondisi keluarga --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kondisi Keluarga</label>
                                    <div class="d-flex">
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="sangat-mampu">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="family"
                                            id="sangat-mampu"
                                            value="sangat-mampu"
                                            {{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family == 'sangat-mampu' ? 'checked' : '' }}
                                            required
                                        />
                                        sangat-mampu
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="mampu">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="family"
                                            id="mampu"
                                            value="mampu"
                                            {{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family == 'mampu' ? 'checked' : '' }}
                                            required
                                        />
                                        mampu
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="tidak-mampu">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="family"
                                            id="tidak-mampu"
                                            value="tidak-mampu"
                                            required
                                            {{ $biodata->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family == 'tidak-mampu' ? 'checked' : '' }}
                                        />
                                        tidak-mampu
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                {{-- penghasilan orangtua --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Penghasilan orang Tua</label>
                                    {{-- <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->parent_income }}"
                                        name="parent_income"
                                        aria-describedby="emailHelp"
                                        required
                                    /> --}}
                                    <select name="parent_income" class="form-select">
                                        <option value="" disabled selected>-- Pilih --</option>
                                        <option value="Kurang dari Rp 500.000" {{ $biodata->parent_income == 'Kurang dari Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                                        <option value="Rp 500.000 - 1.000.000" {{ $biodata->parent_income == 'Rp 500.000 - 1.000.000' ? 'selected' : '' }}>Rp 500.000 - 1.000.000</option>
                                        <option value="Rp 1.000.000 - 2.000.000" {{ $biodata->parent_income == 'Rp 1.000.000 - 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - 2.000.000</option>
                                        <option value="Rp 2.000.000 - 3.000.000" {{ $biodata->parent_income == 'Rp 2.000.000 - 3.000.000' ? 'selected' : '' }}>Rp 2.000.000 - 3.000.000</option>
                                        <option value="Rp 3.000.000 - 5.000.000" {{ $biodata->parent_income == 'Rp 3.000.000 - 5.000.000' ? 'selected' : '' }}>Rp 3.000.000 - 5.000.000</option>
                                        <option value="Rp 5.000.000 - 10.000.000" {{ $biodata->parent_income == 'Rp 5.000.000 - 10.000.000' ? 'selected' : '' }}>Rp 5.000.000 - 10.000.000</option>
                                        <option value="Lebih dari Rp 10.000.000" {{ $biodata->parent_income == 'Lebih dari Rp 10.000.000' ? 'selected' : '' }}>Lebih dari Rp 10.000.000</option>
                                    </select>
                                </div>
                                {{-- jumlah saudara --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Jumlah Saudara</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        value="{{ $biodata->brother }}"
                                        name="brother"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- anak ke --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Anak Ke</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->child_to }}"
                                        name="child_to"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                </div>

                            {{-- colom kedua --}}
                                <div class="col-md-6">
                                {{--  wali --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Wali / Orang Tua</label>
                                    <div class="d-flex">
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="ayah">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="choose_guardian"
                                            id="ayah"
                                            value="ayah"
                                            {{ $biodata->choose_guardian == 'ayah' ? 'checked' : '' }}
                                            required
                                        />
                                        ayah
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="ibu">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="choose_guardian"
                                            id="ibu"
                                            value="ibu"
                                            {{ $biodata->choose_guardian == 'ibu' ? 'checked' : '' }}
                                            required
                                        />
                                        ibu
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="tidak-ada">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="choose_guardian"
                                            id="tidak-ada"
                                            value="tidak-ada"
                                            required
                                            {{ $biodata->choose_guardian == 'tidak-ada' ? 'checked' : '' }}
                                        />
                                        tidak-ada
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <label class="form-check-label" for="selain-orang-tua">
                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="choose_guardian"
                                            id="selain-orang-tua"
                                            value="selain-orang-tua"
                                            required
                                            {{ $biodata->choose_guardian == 'selain-orang-tua' ? 'checked' : '' }}
                                        />
                                        selain-orang-tua
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                {{-- nama wali --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Nama Wali / Orang Tua</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->guardian }}"
                                        name="guardian"
                                        aria-describedby="emailHelp"
                                        {{-- required --}}
                                    />
                                </div>
                                {{-- no hp wali --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">No Hp Wali</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->no_guardian }}"
                                        name="no_guardian"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- keterangan wali --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Keterangan Wali</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->description_guardian }}"
                                        name="description_guardian"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- jumlah hafalan --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Jumlah Hafalan</label>
                                    <select
                                    class="form-select"
                                    id="memorization"
                                    name="memorization"
                                    value="{{ old('memorization') }}"
                                    required
                                    >
                                    <option value="{{ $biodata->memorization }}"  {{ $biodata->memorization ==  $biodata->memorization ?  'selected' : ' ' }} >{{ $biodata->memorization }}</option>
                                    @for ($i = 0; $i <= 30; $i++)
                                        <option value="{{ $i }} JUZ">{{ $i }} JUZ</option>
                                    @endfor
                                    </select>
                                </div>
                                {{-- tokh idola --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Tokoh Idola</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->figure_idol }}"
                                        name="figure_idol"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- ustad idola --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Ustadz Idola</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->chaplain_idol }}"
                                        name="chaplain_idol"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- dimana Allah --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Dimana Allah</label>
                                    <textarea
                                        class="form-control h-50"
                                        name="tauhid"
                                        aria-describedby="emailHelp"
                                        required
                                    >{{ $biodata->tauhid }}</textarea>
                                </div>
                                {{-- Kajian Yang Sering Di Hadiri --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Kajian Yang Sering Di Hadiri</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->study_islamic }}"
                                        name="study_islamic"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- Buku Bacaan Favorit --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Buku Bacaan Favorit</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->read_book }}"
                                        name="read_book"
                                        aria-describedby="emailHelp"
                                        required
                                    />
                                </div>
                                {{-- Tato --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Tato</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="tattoed_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="tattoed"
                                        id="tattoed_yes"
                                        value="iya"
                                        {{ $biodata->tattoed == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="tattoed_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="tattoed"
                                        id="tattoed_no"
                                        value="tidak"
                                        {{ $biodata->tattoed != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- perokok --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Perokok</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="smoker_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="perokok"
                                        id="smoker_yes"
                                        value="iya"
                                        {{ $biodata->smoker == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="smoker_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="perokok"
                                        id="smoker_no"
                                        value="tidak"
                                        {{ $biodata->smoker != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>

                                {{-- bangun subuh --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Bangun Sholat Subuh?</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="pray1">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="pray"
                                        id="pray1"
                                        value="bangun-sendiri"
                                        {{ $biodata->pray == 'bangun-sendiri' ? 'checked' :'' }}
                                        required
                                    />
                                    Bangun Sendiri
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="pray2">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="pray"
                                        id="pray2"
                                        value="dibangunkan"
                                        {{ $biodata->pray != 'bangun-sendiri' ? 'checked' :'' }}
                                        required
                                    />
                                    Dibangunkan
                                    </label>
                                    </div>
                                </div>

                                {{-- punya pacar --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Punya Pacar?</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="girlfriend_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="girlfrind"
                                        id="girlfriend_yes"
                                        value="iya"
                                        {{ $biodata->girlfriend == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="girlfriend_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="girlfrind"
                                        id="girlfriend_no"
                                        value="tidak"
                                        {{ $biodata->girlfriend != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- suka game --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Suka Game</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="gamer_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="gamer"
                                        id="gamer_yes"
                                        value="iya"
                                        {{ $biodata->gamer == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="gamer_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="gamer"
                                        id="gamer_no"
                                        value="tidak"
                                        {{ $biodata->gamer != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- jika suka --}}
                                @if ($biodata->gamer == 'iya')
                                    <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Nama Game</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->game_name }}"
                                        name="game_name"
                                        aria-describedby="emailHelp"
                                    />
                                    </div>
                                    <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Durasi Main Game</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        value="{{ $biodata->game_duration }}"
                                        name="game_duration"
                                        aria-describedby="emailHelp"
                                    />
                                    </div>
                                @endif
                                {{-- Punya Laptop --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Punya Laptop</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="have_laptop_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="have_laptop"
                                        id="have_laptop_yes"
                                        value="iya"
                                        {{ $biodata->have_laptop == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="have_laptop_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="have_laptop"
                                        id="have_laptop_no"
                                        value="tidak"
                                        {{ $biodata->have_laptop != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- izin Orang  tua --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Izin Orang Tua</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="permission_parent_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="permission_parent"
                                        id="permission_parent_yes"
                                        value="iya"
                                        {{ $biodata->permission_parent == 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="permission_parent_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="permission_parent"
                                        id="permission_parent_no"
                                        value="tidak"
                                        {{ $biodata->permission_parent != 'iya' ? 'checked' :'' }}
                                        required
                                    />
                                    Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- setuju --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="" class="d-block">Setuju Dengan Ketetuan</label>
                                    <div class="form-check">
                                    <label class="form-check-label" for="agree_yes">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="agree"
                                        id="agree_yes"
                                        value="1"
                                        {{ $biodata->agree == 1 ? 'checked' :'' }}
                                        required
                                    />
                                    Iya
                                    </label>
                                    </div>
                                    <div class="form-check" >
                                    <label class="form-check-label" for="agree_no">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="agree"
                                        id="agree_no"
                                        value="tidak"
                                        {{ $biodata->agree != 1 ? 'checked' :'' }}
                                        required
                                    />
                                        Tidak
                                    </label>
                                    </div>
                                </div>
                                {{-- alasan mendaftar --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Alasan Mendaftar</label>
                                    <Textarea
                                    style="height: 150px;"
                                    type="text"
                                    class="form-control"
                                    name="reason_registration" >{{ $biodata->reason_registration }}</Textarea>
                                </div>
                                {{-- kegiatan dari bangun sampai tidur --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Kegiatan Bangun Sampai TIdur</label>
                                    <textarea
                                    style="height: 150px;"
                                    type="text"
                                    class="form-control"
                                    name="activity"
                                    >{{ $biodata->activity }}</textarea>
                                </div>
                                {{-- kepribadian --}}
                                <div class="form-group mb-3">
                                    <label class="fw-bold" for="">Ceritakan Kepribadian</label>
                                    <textarea
                                        style="height: 150px;"
                                        type="text"
                                        class="form-control"
                                        name="personal"
                                    >{{ $biodata->personal }}</textarea>
                                </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ url()->previous() }}" class="btn btn-md btn-danger mx-3 my-5">Back</a>
                                <button class="btn btn-md btn-primary mx-3 my-5">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection


@push('after-script')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script>
    function formdata(){
    const kabupatens=@json($kabupaten);
    return{
        // data
            provin_id:null,
            kabupatenids:[],
        // method
        getKabupaten(code){
            const dataKabupaten = kabupatens.filter((kabupaten) => kabupaten.province_code == code);
            this.kabupatenids = dataKabupaten;
            }
        }
    }
</script>
@endpush
