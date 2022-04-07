@extends('front.layouts.exam')

@section('title','Tes Tahap Pertama')

@section('content')
    <style>
      #required{
        color: red;
      }

      #clockdiv > div > span {
        font-size: 20px;
      }
    </style>
    <div class="container py-5">
    <div id="clockdiv" class="d-flex justify-content-end mb-5 sticky-top">
        <!-- <div>
            <p class="d-block mobile-text" id="countdown">Sisa Waktu :</p>
            <div class="text-center">
                <span class="d-block mobile-text" id="resend"></span>
            </div>
        </div> -->
    </div>
      <div class="my-4">
        <div class="row justify-content-center px-4">
          <div class="col-md-10 col-sm-12 title">
            <div x-data="formdata()">
              <!-- step wizard -->
              <div class="stepwizard mb-5">
                <div class="stepwizard-row setup-panel" >
                  <div class="stepwizard-step" x-on:click="form1ButtonBack()">
                    <a
                      href="#step-1"
                      type="button"
                      :class="{ 'btn btn-primary btn-circle'  : form_1 === true }"
                      >1</a
                    >
                    <p>Step 1</p>
                  </div>
                  <div class="stepwizard-step" x-on:click="form1Button()">
                    <a
                      href="#step-2"
                      type="button"
                      :class="{ 'btn btn-primary btn-circle' : form_2 === true }"
                      disabled="disabled"
                      >2</a
                    >
                    <p>Step 2</p>
                  </div>
                  <div class="stepwizard-step" x-on:click="form2Button()">
                    <a
                      href="#step-3"
                      type="button"
                      :class="{ 'btn btn-primary btn-circle' : form_3 === true }"
                      disabled="disabled"
                      >3</a
                    >
                    <p>Step 3</p>
                  </div>
                  <div class="stepwizard-step" x-on:click="form3Button()">
                    <a
                      href="#step-3"
                      type="button"
                      :class="{ 'btn btn-primary btn-circle' : form_4 === true }"
                      disabled="disabled"
                      >4</a
                    >
                    <p>Step 4</p>
                  </div>
                </div>
              </div>
              <!-- end step wizard -->
              <p class="card-text">Silahkan isi form dibawah ini!</p>
              <div class="card text-left">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                  <form id="multi-form" class="needs-validation" novalidate="" method="POST" action="{{ route('first-tes.store') }}">
                    @csrf
                    @method("POST")
                    {{-- step-1 --}}
                    <div x-show="form_1">

                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Tempat Lahir<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          name="birth_place"
                          class="form-control"
                          id="exampleInputPassword1"
                          {{-- x-model="tempat_lahir" --}}
                          value="{{ old('birth_place') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Alamat Lengkap<b id="required">*</b></label
                        >
                        <textarea
                          name="address"
                          class="form-control h-100"
                          id="exampleInputPassword1"
                          required
                        >{{ old('address') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Provinsi<b id="required">*</b></label>
                        <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                            <option value="" hidden>Pilih Provinsi</option>
                          @foreach ($provinsi as $provin)
                              <option value="{{ $provin->code }}">{{ $provin->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kabupaten/Kota<b id="required">*</b></label>
                        <select name="indonesia_cities_id" class="custom-select" >
                          <template x-for="an in kabupatenids">
                            <option :value="an.id"><span x-html="an.name"></span></option>
                          </template>
                        </select>
                      </div>
                      <div class="my-3">
                        <small>
                          <b id="required">*</b>) Wajib diisi!
                        </small>
                      </div>
                      <button type="button" x-on:click="form1Button()" class="btn btn-primary float-right px-3">
                        Selanjutnya
                      </button>
                    </div>
                    {{-- step 2 --}}
                    <div x-show="form_2">
                      <div class="form-group">
                      <label for="exampleInputPassword1">Facebook<b id="required">*</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputPassword1"
                        name="facebook"
                        value="{{ old('facebook') }}"
                        placeholder="https://facebook.com/PondokInformatikaAlmadinah"
                        required
                      />
                      <small class="form-text text-muted">
                        Isi 'tidak ada' jika tidak punya
                      </small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2">Instagram<b id="required">*</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputPassword2"
                            name="instagram"
                            value="{{ old('instagram') }}"
                            placeholder="https://instagram.com/pondokinformatika"
                            required
                          />
                        <small>Isi "tidak ada" jika tidak punya</small>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword3">Tiktok<b id="required">*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputPassword3"
                          name="tiktok"
                          value="{{ old('tiktok') }}"
                          placeholder="https://tiktok.com/pondokinformatika"
                          required
                        />
                        <small class="form-text text-muted">
                          Isi 'tidak ada' jika tidak punya
                        </small>
                      </div>
                      <div class="my-3">
                        <small>
                          <b id="required">*</b>) Wajib diisi!
                        </small>
                      </div>
                      <div class="mt-4">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="form1ButtonBack()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="form2Button()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- step 3 --}}
                    <div x-show="form_3">
                      <div class="form-group">
                        <label for="">Pendidikan Terakhir ?<b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="last_education"
                            id="education1"
                            value="tidak-ada"
                            required
                            {{ old('last_education') == 'tidak-ada' ? 'checked' : '' }}
                            x-on:click="education(false)"
                          />
                          <label class="form-check-label" for="education1">
                            Tidak ada
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="last_education"
                            id="education2"
                            value="SD"
                            required
                            {{ old('last_education') == 'SD' ? 'checked' : '' }}
                            x-on:click="education(false)"
                          />
                          <label class="form-check-label" for="education2">
                            SD
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="last_education"
                            id="education3"
                            value="SMP"
                            required
                            {{ old('last_education') == 'SMP' ? 'checked' : '' }}
                            x-on:click="education(false)"
                          />
                          <label class="form-check-label" for="education3">
                            SMP
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="last_education"
                            id="education4"
                            value="SMA"
                            required
                            {{ old('last_education') == 'SMA' ? 'checked' : '' }}
                            x-on:click="education(true)"
                          />
                          <label class="form-check-label" for="education4">
                            SMA/SMK
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                      <label for="name_school">Asal Sekolah<b id="required">*</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="name_school"
                        name="name_school"
                        value="{{ old('name_school') }}"
                        required
                      />
                      <small>Isi "tidak ada" jika tidak sekolah</small>
                      </div>

                      <div x-show="education_sma">
                        <div class="form-group">
                          <label for="major">Jurusan<b id="required">*</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="major"
                            name="major"
                            value="{{ old('major') }}"
                            required
                          />
                      </div>
                      </div>

                      <div class="form-group">
                        <label for="organization">Pengalaman Organisasi<b id="required">*</b></label>
                        <textarea name="organization" id="" class="form-control h-50"  required>{{ old('organization') }}</textarea>
                        <small>Isi "tidak ada" jika tidak ada organisasi</small>
                      </div>
                      <div class="form-group">
                        <label for="achievment">Prestasi<b id="required">*</b></label>
                        <textarea name="achievment" id="" class="form-control h-50"  required>{{ old('achievment') }}</textarea>
                        <small>Isi "tidak ada" jika tidak ada prestasi</small>
                      </div>
                      <div class="form-group">
                        <label for="hobby">Hobi<b id="required">*</b></label>
                        <textarea name="hobby" id="" class="form-control h-50"  required>{{ old('hobby') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="goal">Cita-Cita<b id="required">*</b></label>
                        <textarea name="goal" id="" class="form-control h-50"  required>{{ old('goal') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="skill"
                          >Skill/Kelebihan<b id="required">*</b></label
                        >
                        <textarea name="skill" id="" class="form-control h-50"  required>{{ old('skill') }}</textarea>
                        <small>Isi "tidak ada" jika tidak ada skill</small>
                      </div>
                      <div class="form-group">
                        <label for="memorization"
                          >Jumlah hafalan Al-Qur'an yang pernah disetorkan<b id="required">*</b></label
                        >
                        <div class="input-group mb-3">
                          <select
                            class="custom-select"
                            id="memorization"
                            name="memorization"
                            value="{{ old('memorization') }}"
                            required
                          >
                            @for ($i = 0; $i <= 30; $i++)
                                <option value="{{ $i }} JUZ" {{ old('memorization') == $i ? 'selected' : '' }}>{{ $i }} JUZ</option>
                            @endfor
                          </select>
                          <div class="input-group-append">
                            <button button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-exclamation-circle"></i></button>
                          </div>
                        </div>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title text-dark fw-bold" id="exampleModalLabel">Perhatian !</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <span style="font-size: 16px;"><b id="required">Silahkan isi hafalan dengan pembulatan</b></span> <br>
                              <span class="text-dark" style="font-size: 16px; font-weight: bold;">Contoh :</span> <br>
                              Jika hafalanmu 1 Juz 9 lembar dan belum mencapai 2 juz<br>
                              Maka = dibulatkan menjadi 1 juz 

                              <br>
                              <br>

                              Jika hafalan dibawah 1 juz <br>
                              Isi 0 juz
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="figure_idol"
                          >Tokoh Idola<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="figure_idol"
                          name="figure_idol"
                          value="{{ old('figure_idol') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="chaplain_idol"
                          >Ustadz/Ulama yang disukai ?<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="chaplain_idol"
                          name="chaplain_idol"
                          value="{{ old('chaplain_idol') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="tauhid"
                          >Dimana Allah ?<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="tauhid"
                          name="tauhid"
                          value="{{ old('tauhid') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="study_islamic"
                          >Pengajian yang sering dihadiri ?<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="study_islamic"
                          name="study_islamic"
                          value="{{ old('study_islamic') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="read_book"
                          >Buku bacaan yang disukai?<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="read_book"
                          name="read_book"
                          value="{{ old('read_book') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="">Merokok atau Tidak ? <b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="smoker"
                            id="smoker1"
                            value="iya"
                            required
                            {{ old('smoker') == 'iya' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="smoker1">
                            Iya
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="smoker"
                            id="smoker2"
                            value="tidak"
                            required
                            {{ old('smoker') == 'tidak' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="smoker2">
                            Tidak
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Punya Tato atau Tidak ? <b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="tattoed"
                            id="tattoed1"
                            value="iya"
                            required
                            {{ old('tattoed') == 'iya' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="tattoed1">
                            Iya
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="tattoed"
                            id="tattoed2"
                            value="tidak"
                            required
                            {{ old('tattoed') == 'tidak' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="tattoed2">
                            Tidak punya
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Bangun Sholat Subuh ? <b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="pray"
                            id="pray1"
                            value="bangun-sendiri"
                            required
                            {{ old('pray') == 'bangun-sendiri' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="pray1">
                            Bangun Sendiri
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="pray"
                            id="pray2"
                            value="dibangunkan"
                            required
                            {{ old('pray') == 'dibangunkan' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="pray2">
                            Dibangunkan
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Punya Pacar atau Tidak ?<b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="girlfriend"
                            id="girlfriend1"
                            value="iya"
                            required
                            {{ old('girlfriend') == 'iya' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="girlfriend1">
                            Punya
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="girlfriend"
                            id="girlfriend2"
                            value="tidak"
                            required
                            {{ old('girlfriend') == 'tidak' ? 'checked' : '' }}
                          />
                          <label class="form-check-label" for="girlfriend2">
                            Tidak punya
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Suka Game atau Tidak? <b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="gamer"
                            id="gamer1"
                            value="iya"
                            required
                            {{ old('gamer') == 'iya' ? 'checked' : '' }}
                            x-on:click="gamer(true)"
                          />
                          <label class="form-check-label" for="gamer1">
                            Suka
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="gamer"
                            id="gamer2"
                            value="tidak"
                            {{ old('gamer') == 'tidak' ? 'checked' : '' }}
                            x-on:click="gamer(false)"
                            required
                          />
                          <label class="form-check-label" for="gamer2">
                            Tidak suka
                          </label>
                        </div>
                      </div>
                      <div x-show="gamer_in">
                        <div class="form-group">
                          <label for="exampleInputPassword1"
                            >Nama Game Kesukaan</label
                          >
                          <input
                            type="text"
                            class="form-control"
                            id="exampleInputPassword1"
                            name="game_name"
                            value="{{ old('game_name') }}"
                          />
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1"
                            >Berapa jam yang dihabiskan untuk Main Game dalam sehari ?</label
                          >
                          <select
                            class="custom-select"
                            id="game_duration"
                            name="game_duration"
                            value="{{ old('game_duration') }}"
                          >
                            <option value="" hidden>-- Pilih --</option>
                            <option value="kurang dari 1">kurang dari 1 jam</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }} jam</option>
                                @endfor
                            <option value="lebih dari 10">lebih dari 10 jam</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Alasan Mendaftar <b id="required">*</b></label
                        >
                        <textarea name="reason_registration" id="" class="form-control h-50" required>{{ old('reason_registration') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Ceritakan kegiatan Anda dari Pagi sampai Malam
                          <b id="required">*</b></label
                        >
                        <textarea name="activity" id="" class="form-control h-50" required>{{ old('activity') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Ceritakan dengan singkat kepribadian Anda <b id="required">*</b></label
                        >
                        <textarea name="personal" id="" class="form-control h-50"  required>{{ old('personal') }}</textarea>
                      </div>
                      <div class="my-3">
                        <small>
                          <b id="required">*</b>) Wajib diisi!
                        </small>
                      </div>
                      <div class="mt-4">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="form2ButtonBack()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary float-right px-3"
                          x-on:click="form3Button()"
                        >
                          Selanjutnya
                        </button>
                      </div>
                    </div>
                    {{-- step 4 --}}
                    <div x-show="form_4">
                      <div class="form-group">
                        <label for="">Status Kelengkapan Orang Tua<b id="required">*</b></label>
                        <select name="parent" class="custom-select">
                          <option value="" hidden>-- Pilih --</option>
                          <option value="lengkap" {{ old('parent') == 'lengkap' ? 'selected' : '' }}>Lengkap</option>
                          <option value="ayah" {{ old('parent') == 'ayah' ? 'selected' : '' }}>Ayah</option>
                          <option value="ibu" {{ old('parent') == 'ibu' ? 'selected' : '' }}>Ibu</option>
                          <option value="yatim-piatu" {{ old('parent') == 'yatim-piatu' ? 'selected' : '' }}>Yatim-Piatu</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="father">Nama Ayah<b id="required">*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="father"
                          name="father"
                          value="{{ old('father') }}"
                          required
                        />
                        <small class="form-text text-muted">Isi "tidak ada"</b> jika yatim</small>
                      </div>
                      <div class="form-group">
                        <label for="father_work"
                          >Pekerjaan Ayah<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="father_work"
                          name="father_work"
                          value="{{ old('father_work') }}"
                          required
                        />
                        <small class="form-text text-muted">Isi "tidak ada"</b> jika yatim</small>
                      </div>
                      <div class="form-group">
                        <label for="father_id"
                          >NIK Ayah<b id="required">*</b></label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="father_id"
                          name="father_id"
                          value="{{ old('father_id') }}"
                          required
                          placeholder="32010204040000000"
                          oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          maxlength="20"
                        />
                        <small class="form-text text-muted">Isi minimal 16 karakter</small>
                        <small class="form-text text-muted">Isi "0"</b> jika yatim</small>
                      </div>
                      <div class="form-group">
                        <label for="mother">Nama Ibu<b id="required">*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="mother"
                          name="mother"
                          value="{{ old('mother') }}"
                          required
                        />
                        <small class="form-text text-muted">Isi "tidak ada"</b> jika piatu</small>
                      </div>
                      <div class="form-group">
                        <label for="mother_work"
                          >Pekerjaan Ibu<b id="required">*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="mother_work"
                          name="mother_work"
                          value="{{ old('mother_work') }}"
                          required
                        />
                        <small class="form-text text-muted">Isi "tidak ada"</b> jika piatu</small>
                      </div>
                      <div class="form-group">
                          <label for="mother_id"
                            >NIK Ibu<b id="required">*</b></label
                          >
                          <input
                            type="number"
                            class="form-control"
                            id="mother_id"
                            name="mother_id"
                            value="{{ old('mother_id') }}"
                            required
                            placeholder="32010204040000000"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="20"
                          />
                        <small class="form-text text-muted">Isi minimal 16 karakter</small>
                        <small class="form-text text-muted">Isi "0"</b> jika piatu</small>
                      </div>
                      <div class="form-group">
                        <label for="parent_income"
                          >Total Penghasilan Orang Tua Perbulan<b id="required">*</b></label
                        >
                        <select name="parent_income" class="custom-select">
                          <option value="" hidden>-- Pilih --</option>
                          <option value="Kurang dari Rp 500.000" {{ old('parent_income') == 'Kurang dari Rp 500.000' ? 'selected' : '' }}>Kurang dari Rp 500.000</option>
                          <option value="Rp 500.000 - 1.000.000" {{ old('parent_income') == 'Rp 500.000 - 1.000.000' ? 'selected' : '' }}>Rp 500.000 - 1.000.000</option>
                          <option value="Rp 1.000.000 - 2.000.000" {{ old('parent_income') == 'Rp 1.000.000 - 2.000.000' ? 'selected' : '' }}>Rp 1.000.000 - 2.000.000</option>
                          <option value="Rp 2.000.000 - 3.000.000" {{ old('parent_income') == 'Rp 2.000.000 - 3.000.000' ? 'selected' : '' }}>Rp 2.000.000 - 3.000.000</option>
                          <option value="Rp 3.000.000 - 5.000.000" {{ old('parent_income') == 'Rp 3.000.000 - 5.000.000' ? 'selected' : '' }}>Rp 3.000.000 - 5.000.000</option>
                          <option value="Rp 5.000.000 - 10.000.000" {{ old('parent_income') == 'Rp 5.000.000 - 10.000.000' ? 'selected' : '' }}>Rp 5.000.000 - 10.000.000</option>
                          <option value="Lebih dari Rp 10.000.000" {{ old('parent_income') == 'Lebih dari Rp 10.000.000' ? 'selected' : '' }}>Lebih dari Rp 10.000.000</option>
                        </select>
                        {{-- <input
                          type="number"
                          class="form-control"
                          id="parent_income"
                          name="parent_income"
                          min="0"
                          value="{{ old('parent_income') }}"
                          required
                          onKeyDown="if(this.value.length==10 && event.keyCode>47 && event.keyCode < 58)return false;"
                        /> --}}
                      </div>
                      <div class="form-group">
                        <label for="child_to">Anak ke ?<b id="required">*</b></label>
                        <input
                          type="number"
                          class="form-control"
                          id="child_to"
                          name="child_to"
                          value="{{ old('child_to') }}"
                          min="0"
                          placeholder="1"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="brother"
                          >Jumlah saudara ?<b id="required">*</b></label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="brother"
                          name="brother"
                          value="{{ old('brother') }}"
                          min="0"
                          placeholder="1"
                          required
                        />
                        <small class="form-text text-muted">Isi "0"</b> jika tidak punya saudara</small>
                      </div>
                      <div class="form-group">
                        <label for="">Data Wali<b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="choose_guardian"
                            id="choose_guardian1"
                            value="ayah"
                            required
                            {{ old('choose_guardian') == 'ayah' ? 'checked' : '' }}
                            x-on:click="guardian(false)"
                          />
                          <label class="form-check-label" for="choose_guardian1">
                            Ayah
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="choose_guardian"
                            id="choose_guardian2"
                            value="ibu"
                            required
                            {{ old('choose_guardian') == 'ibu' ? 'checked' : '' }}
                            x-on:click="guardian(false)"
                          />
                          <label class="form-check-label" for="choose_guardian2">
                            Ibu
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="choose_guardian"
                            id="choose_guardian3"
                            value="tidak-ada"
                            required
                            {{ old('choose_guardian') == 'tidak-ada' ? 'checked' : '' }}
                            x-on:click="guardian(false)"
                          />
                          <label class="form-check-label" for="choose_guardian3">
                            Tidak ada wali
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="choose_guardian"
                            id="choose_guardian4"
                            value="selain-orang-tua"
                            required
                            {{ old('choose_guardian') == 'selain-orang-tua' ? 'checked' : '' }}
                            x-on:click="guardian(true)"
                          />
                          <label class="form-check-label" for="choose_guardian4">
                            Selain Orang Tua (Isikan di bawah)
                          </label>
                        </div>
                      </div>
                      <div x-show="guardian_choose">
                        <div class="form-group">
                          <label for="guardian">Nama Wali (Hubungan)<b id="required">*</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="guardian"
                            name="guardian"
                            value="{{ old('guardian') }}"
                            placeholder="Budi (Paman)"
                            required
                          />
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="no_guardian"
                          >Nomor Kontak Orang Tua/Wali ?<b id="required">*</b></label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="no_guardian"
                          name="no_guardian"
                          min="0"
                          value="{{ old('no_guardian') }}"
                          placeholder="08582375XXXX"
                          required
                        />
                        <small class="form-text text-muted">Isi "0"</b> jika tidak ada wali</small>

                      </div>
                      <div class="form-group">
                        <label for="description_guardian"
                          >Tambah keterangan jika ada</label
                        >
                        <textarea
                          type="text"
                          class="form-control"
                          id="description_guardian"
                          name="description_guardian"
                        >{{ old('description_guardian') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Izin Orang Tua atau Tidak ?<b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="permission_parent"
                            id="permission_parent1"
                            value="iya"
                            {{ old('permission_parent') == 'iya' ? 'checked' : '' }}
                            required
                          />
                          <label class="form-check-label" for="permission_parent1">
                            Iya
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="permission_parent"
                            id="permission_parent2"
                            value="tidak"
                            {{ old('permission_parent') == 'tidak' ? 'checked' : '' }}
                            required
                          />
                          <label class="form-check-label" for="permission_parent2">
                            Tidak
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Punya Laptop atau Tidak ?<b id="required">*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="have_laptop"
                            id="have_laptop1"
                            value="iya"
                            {{ old('have_laptop') == 'iya' ? 'checked' : '' }}
                            required
                          />
                          <label class="form-check-label" for="have_laptop1">
                            Iya
                          </label>
                        </div>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="have_laptop"
                            id="have_laptop2"
                            value="tidak"
                            {{ old('have_laptop') == 'tidak' ? 'checked' : '' }}
                            required
                          />
                          <label class="form-check-label" for="have_laptop2">
                            Tidak
                          </label>
                        </div>
                      </div>
                      <div class="form-group mt-4">
                        <label for=""
                          >Demi Allah, Saya bersumpah semua informasi ini benar.
                          <b id="required">*</b></label
                        >
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            value="1"
                            name="agree"
                            id="defaultCheck1"
                            required
                          />
                          <label class="form-check-label" for="defaultCheck1">
                            Semua informasi ini adalah benar.
                          </label>
                        </div>
                      </div>
                      <div class="my-5">
                        <small><b id="required">*</b>) Wajib diisi!</small>
                        <br>
                        <b id="required">*</b>
                        <small>
                          Silahkan periksa sekali lagi data yang Anda masukkan, Apakah sudah
                          benar dan sesuai? Karena setelah Anda mengirim data tersebut, Anda
                          tidak bisa lagi melakukan perubahan terhadap data yang sudah Anda kirim.
                        </small>
                      </div>
                      <div class="mt-4">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="form3ButtonBack()"
                        >
                          Sebelumnya
                        </button>
                        <!-- <button
                          type="submit"
                          id="swal-biodata"
                          class="btn btn-primary float-right px-3"
                        >
                          Kirim Data
                        </button> -->
                        <input type="button" id="btn-ok" value="Selesai" class="btn btn-primary float-right px-3 accept"/>
                      </div>
                    </div>
                    {{-- end --}}

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('end-script')
  <!-- Timer -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script>
      // Timer
      let timerOn = true;
      function timer(remaining){
          var m = Math.floor(remaining / 60);
          var s = remaining % 60;
          m = m < 10 ? '0' + m : m;
          s = s < 10 ? '0' + s : s;
          document.getElementById('countdown').innerHTML =
          'Sisa Waktu :' + ' ' + m + ':' + s;
          remaining -=1;
          if (remaining >= 0 && timerOn) {
              setTimeout( function() {
                  timer(remaining);
              }, 1000);
          document.getElementById('resend').innerHTML =
          '';
          return;
          }else{
          document.getElementById('countdown').innerHTML =
          '';
          }
          if (!timerOn) {
              return;
          }
      }
      timer(3600000);
  </script> --}}


  {{-- sweetalert2 --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>

  <script>
    $(document).ready(function() {
    $('form #btn-ok').click(function(e) {
        let $form = $(this).closest('form');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({
            title: 'Kamu Yakin?',
            text: "Data tidak dapat diubah, pastikan semua sudah benar",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                        'Finished',
                        'Success',
                        'success',
                    );
                $form.submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan !',
                    'Silahkan isi kembali dengan benar :')
                ;
            }
        });
      });
    });
  </script>

  <!-- Modal -->
  <script src="{{ asset('stisla/node_modules/prismjs/prism.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>

  <!-- Alpine -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
  <script>
    function formdata(){
			const kabupatens=@json($kabupaten);
			return{
				// data
					form_1:true,
					form_2:false,
					form_3:false,
					form_4:false,
					provin_id:null,
          kabupatenids:[],
          gamer_in:null,
          education_sma:null,
          guardian_choose:null,

        // method
        gamer(param){
          this.gamer_in=param;
        },
        education(parameter){
          this.education_sma=parameter;
        },
        guardian(par){
          this.guardian_choose=par;
        },
				form1Button(){
          this.form_1=null;
          this.form_2=true;
          this.form_3=null;
          this.form_4=null;
          window.scrollTo(0, 0);
        },
        form1ButtonBack(){
          this.form_1=true;
          this.form_2=null;
          this.form_3=null;
          this.form_4=null;
          window.scrollTo(0, 0);
        },
        form2Button(){
          this.form_1= null;
          this.form_2= null;
          this.form_3= true;
          this.form_4= null;
          window.scrollTo(0, 0);
        },
        form2ButtonBack(){
          this.form_1= null;
          this.form_2= true;
          this.form_3= null;
          this.form_4= null;
          window.scrollTo(0, 0);
        },
        form3Button(){
          this.form_1= null;
          this.form_2= null;
          this.form_3= null;
          this.form_4= true;
          window.scrollTo(0, 0);
        },
        form3ButtonBack(){
          this.form_1=  null;
          this.form_2=  null;
          this.form_3=  true;
          this.form_4=  null;
          window.scrollTo(0, 0);
        },
				getKabupaten(code){
					const dataKabupaten = kabupatens.filter((kabupaten) => kabupaten.province_code == code);
					this.kabupatenids=dataKabupaten;
				}
			}
    }
  </script>
@endpush
