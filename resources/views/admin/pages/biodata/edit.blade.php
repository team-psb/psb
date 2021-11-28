@extends('admin.layouts.app')

@section('title', 'Edit Biodata Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Biodata Pendaftar</h4>
                        <form x-data="formdata()" method="POST" action="{{ route('biodata.update', $biodata->id) }}">
                          @csrf
                          @method('POST')
                          {{-- colom pertama --}}
                          <input type="hidden" name="biodataOne_id" value="{{ $biodata->user->biodataOne->id }}">
                          <div class="row">
                            <div class="col-md-5">
                              
                              {{-- nama --}}
                              <div class="form-ggroup mb-3">
                                <label for="">Nama</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="full_name"
                                    name="full_name"
                                    value="{{ $biodata->user->biodataOne->full_name }}"
                                    required
                                />
                              </div>
                              {{-- umur --}}
                              <div class="form-group mb-3">
                                <label for="">Umur</label>
                                <input
                                  type="number"
                                  class="form-control"
                                  value="{{ $biodata->user->biodataOne->age }}"
                                  name="age"
                                  aria-describedby="emailHelp"
                                  required
                                />
                              </div>
                              {{-- tanggal lahit --}}
                              <div class="form-group mb-3">
                                <label for="">Tanggal Lahir</label>
                                <input
                                  type="date"
                                  class="form-control"
                                  value="{{ $biodata->user->biodataOne->birth_date }}"
                                  name="birth_date"
                                  aria-describedby="emailHelp"
                                  required
                                />
                              </div>
                              {{-- hobi --}}
                              <div class="form-group mb-3">
                                <label for="">Hobi</label>
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
                                <label for="">Skill</label>
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
                                <label for="">Cita Cita</label>
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
                                <label for="">Pendidikan Terakhir</label>
                                <select name="last_education" class="custom-select">
                                  <option value="SD" {{ $biodata->last_education == 'SD' ? 'selected' :'' }}>SD SEDERAJAT</option>
                                  <option value="SMP" {{ $biodata->last_education == 'SMP' ? 'selected' :'' }}>SMP SEDERAJAT</option>
                                  <option value="SMA" {{ $biodata->last_education == 'SMA' ? 'selected' :'' }}>SMA SEDERAJAT</option>
                                </select>
                              </div>
                              {{-- asal sekolah --}}
                              <div class="form-group mb-3">
                                <label for="">Asal Sekolah</label>
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
                                <label for="">Jurusan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->major }}"
                                    name="major"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- prestasi --}}
                              <div class="form-group mb-3">
                                <label for="">Prestasi</label>
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
                                <label for="">Pengalaman Organisasi</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->organization }}"
                                    name="organization"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- @php
                                $provinsi=App\Models\IndonesiaProvince::all();
                                //dd($biodata->provinsi->name);
                              @endphp --}}
                              {{-- provinsi --}}
                              {{-- <div class="form-group mb-3">
                                <label for="">Provinsi</label>
                                <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                                    <option value="{{ $biodata->indonesia_provinces_id }}">{{ $biodata->provinsi->name }}</option>
                                    @foreach ($provinsi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                              </div> --}}
                              {{-- kabupaten --}}
                              {{-- <div class="form-group mb-3">
                                <select name="indonesia_cities_id" class="custom-select" >
                                    <option value="{{ $biodata->indonesia_cities_id }}">{{ $biodata->kabupaten->name }}</option>
                                    <template x-for="an in kabupatenids">
                                        <option :value="an.id"><span x-html="an.name"></span></option>
                                    </template>											
                                </select>
                              </div> --}}
                              {{-- alamat lengkap --}}
                              <div class="form-group mb-3">
                                <label for="">Alamat Lengkap</label>
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
                                <label for="">No Whatsapp</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->user->biodataOne->no_wa }}"
                                    name="no_wa"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- facebook --}}
                              <div class="form-group mb-3">
                                <label for="">Facebook</label>
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
                              <div class="fomr-group mb-3">
                                <label for="">Instagram</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->instagram }}"
                                    name="instagram"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- orang tua --}}
                              <div class="form-group mb-3">
                                <label for="">Orang Tua</label>
                                <select name="parent" class="custom-select">
                                    <option value="lengkap" {{ $biodata->parent == 'lengkap' ? 'selected' :'' }}>LENGKAP</option>
                                    <option value="ayah" {{ $biodata->parent == 'ayah' ? 'selected' :'' }}>AYAH</option>
                                    <option value="ibu" {{ $biodata->parent == 'ibu' ? 'selected' :'' }}>IBU</option>
                                    <option value="yatim-piatu" {{ $biodata->parent == 'yatim-piatu' ? 'selected' :'' }}>YATIM-PIATU</option>
                                </select>
                              </div>
                              {{-- nama ayah --}}
                              <div class="form-group mb-3">
                                <label for="">Nama Ayah</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->father }}"
                                    name="father"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- nama ibu --}}
                              <div class="form-group mb-3">
                                <label for="">Nama Ibu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->mother }}"
                                    name="mother"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- pekerjaan Ayah --}}
                              <div class="form-group mb-3">
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
                                <label for="">Pekerjaan Ibu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->mother_work }}"
                                    name="mother_work"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- penghasilan orangtua --}}
                              {{-- <div class="form-group mb-3">
                                <label for="">Penghasilan orang TUa</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->penghasilan_ortu }}"
                                    name="penghasilan_ortu"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div> --}}
                              {{-- jumlah saudara --}}
                              {{-- <div class="form-group mb-3">
                                <label for="">jumlah Saudara</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    value="{{ $biodata->saudara }}"
                                    name="saudara"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div> --}}
                              {{-- anak ke --}}
                              {{-- <div class="form-group mb-3">
                                <label for="">Anak Ke</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->anak_ke }}"
                                    name="anak_ke"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div> --}}
                              {{-- no hp wali --}}
                              {{-- <div class="form-group mb-3">
                                <label for="">No Hp Wali</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->no_wali }}"
                                    name="no_wali"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                               --}}
                            </div>
                          
                          {{-- colom kedua --}}
                            <div class="col-md-5">
                              {{-- kondisi keluarga --}}
                              <div class="form-group mb-3">
                                <h6>Kondisi Keluarga</h6>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="family"
                                      id="sangat-mampu"
                                      value="sangat-mampu"
                                      {{ $biodata->user->biodataOne->family == 'sangat-mampu' ? 'checked' : '' }}
                                      required
                                  />
                                  <label class="form-check-label" for="sangat-mampu">
                                  sangat-mampu
                                  </label>
                                </span>
                                <span class="form-check d-inline mr-5">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="family"
                                        id="mampu"
                                        value="mampu"
                                        {{ $biodata->user->biodataOne->family == 'mampu' ? 'checked' : '' }}
                                        required
                                    />
                                    <label class="form-check-label" for="mampu">
                                    mampu
                                    </label>
                                </span>
                                <span class="form-check d-inline" >
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="family"
                                        id="tidak_mampu"
                                        value="tidak-mampu"
                                        required
                                        {{ $biodata->user->biodataOne->family = 'tidak-mampu' ? 'checked' : '' }}
                                    />
                                    <label class="form-check-label" for="tidak_mampu">
                                    tidak-mampu
                                    </label>
                                </span>
                              </div>
                              {{-- penghasilan orangtua --}}
                              <div class="form-group mb-3">
                                <label for="">Penghasilan orang Tua</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->parent_income }}"
                                    name="parent_income"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- jumlah saudara --}}
                              <div class="form-group mb-3">
                                <label for="">jumlah Saudara</label>
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
                                <label for="">Anak Ke</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->child_to }}"
                                    name="child_to"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- no hp wali --}}
                              <div class="form-group mb-3">
                                <label for="">No Hp Wali</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->no_guardian }}"
                                    name="no_guardian"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- jumlah hafalan --}}
                              <div class="form-group mb-3">
                                <label for="">Jumlah Hafalan</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->memorization }}"
                                    name="memorization"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- tokh idola --}}
                              <div class="form-group mb-3">
                                <label for="">Tokoh Idola</label>
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
                                <label for="">Ustadz Idola</label>
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
                                <label for="">Dimana Allah</label>
                                <textarea
                                    class="form-control h-50"
                                    name="tauhid"
                                    aria-describedby="emailHelp"
                                    required
                                >
                                  {{ $biodata->tauhid }}
                                </textarea>
                              </div>
                              {{-- Kajian Yang Sering Di Hadiri --}}
                              <div class="form-group mb-3">
                                <label for="">Kajian Yang Sering Di Hadiri</label>
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
                                <label for="">Buku Bacaan Favorit</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="{{ $biodata->read_book }}"
                                    name="read_book"
                                    aria-describedby="emailHelp"
                                    required
                                />
                              </div>
                              {{-- perokok --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Perokok</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="perokok"
                                      id="smoker_yes"
                                      value="iya"
                                      {{ $biodata->smoker == 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="smoker_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="perokok"
                                      id="smoker_no"
                                      value="tidak"
                                      {{ $biodata->smoker != 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="smoker_no">
                                   Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- punya pacar --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Punya Pacar?</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="punya_pacar"
                                      id="girlfriend_yes"
                                      value="iya"
                                      {{ $biodata->girlfriend == 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="girlfriend_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="punya_pacar"
                                      id="girlfriend_no"
                                      value="tidak"
                                      {{ $biodata->girlfriend != 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="girlfriend_no">
                                   Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- suka game --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Suka Game</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="gamer"
                                      id="gamer_yes"
                                      value="iya"
                                      {{ $biodata->gamer == 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="gamer_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="gamer"
                                      id="gamer_no"
                                      value="tidak"
                                      {{ $biodata->gamer != 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="gamer_no">
                                   Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- jika suka --}}
                              @if ($biodata->suka_game == 'iya')
                                <div class="form-group mb-3">
                                  <label for="">Nama Game</label>
                                  <input
                                      type="text"
                                      class="form-control"
                                      value="{{ $biodata->game_name }}"
                                      name="game_name"
                                      aria-describedby="emailHelp"
                                      required
                                  />
                                </div>
                                <div class="form-group mb-3">
                                  <label for="">Durasi Main Game</label>
                                  <input
                                      type="text"
                                      class="form-control"
                                      value="{{ $biodata->game_duration }}"
                                      name="game_duration"
                                      aria-describedby="emailHelp"
                                      required
                                  />
                                </div>
                              @endif
                              {{-- Punya Laptop --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Punya Laptop</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="have_laptop"
                                      id="have_laptop_yes"
                                      value="iya"
                                      {{ $biodata->have_laptop == 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="have_laptop_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="have_laptop"
                                      id="have_laptop_no"
                                      value="tidak"
                                      {{ $biodata->have_laptop != 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="have_laptop_no">
                                   Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- izin Orang  tua --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Izin Orang Tua</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="permission_parent"
                                      id="permission_parent_yes"
                                      value="iya"
                                      {{ $biodata->permission_parent == 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="permission_parent_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="permission_parent"
                                      id="permission_parent_no"
                                      value="tidak"
                                      {{ $biodata->permission_parent != 'iya' ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="permission_parent_no">
                                   Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- setuju --}}
                              <div class="form-group mb-3">
                                <label for="" class="d-block">Setuju Dengan Ketetuan</label>
                                <span class="form-check d-inline mr-5">
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="agree"
                                      id="agree_yes"
                                      value="1"
                                      {{ $biodata->agree == 1 ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="agree_yes">
                                   Iya
                                  </label>
                                </span>
                                <span class="form-check d-inline" >
                                  <input
                                      class="form-check-input"
                                      type="radio"
                                      name="agree"
                                      id="agree_no"
                                      value="tidak"
                                      {{ $biodata->agree != 1 ? 'checked' :'' }}
                                      required
                                  />
                                  <label class="form-check-label" for="agree_no">
                                    Tidak
                                  </label>
                                </span>
                              </div>
                              {{-- alasan mendaftar --}}
                              <div class="form-group mb-3">
                                <label for="">Alasan Mendaftar</label>
                                <Textarea 
                                  style="height: 150px;"
                                  type="text"
                                  class="form-control"
                                  name="reason_registration" >
                                  {{ $biodata->reason_registration }}
                                </Textarea>
                              </div>
                              {{-- kegiatan dari bangun sampai tidur --}}
                              <div class="form-group mb-3">
                                <label for="">Kegiatan Bangun Sampai TIdur</label>
                                <textarea
                                  style="height: 150px;"
                                  type="text"
                                  class="form-control"
                                  name="activity"
                                >
                                {{ $biodata->activity }}
                                </textarea>
                              </div>
                              {{-- kepribadian --}}
                              <div class="form-group mb-3">
                                <label for="">Ceritakan Kepribadian</label>
                                <textarea
                                    style="height: 150px;"
                                    type="text"
                                    class="form-control"
                                    name="personal"  
                                >
                                    {{ $biodata->personal }}
                                </textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
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


{{-- @push('end-script') --}}
{{-- @php
  $kabupaten=App\Models\IndonesiaCity::all();
@endphp --}}
{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<script>
function formdata(){
   const kabupatens=@json($kabupaten);
   return{
       // data
           provin_id:null,
           kabupatenids:[],                            
       // method
       getKabupaten(id){
           const dataKabupaten = kabupatens.filter((kabupaten) => kabupaten.province_id == id);
           this.kabupatenids=dataKabupaten;
           }
       
       }
   }
</script>  
@endpush --}}
                            
                                