@extends('front.layouts.exam')

@section('title','Tes Tahap Pertama')

@section('content')
    <style>
      b{
        color: red;
      }
    </style>
    <div class="container py-5">
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
                          >Tempat Lahir<b>*</b></label
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
                          >Alamat Lengkap<b>*</b></label
                        >
                        <textarea
                          name="address"
                          class="form-control h-100"
                          id="exampleInputPassword1"
                          required
                        >{{ old('address') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Provinsi<b>*</b></label>
                        <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                          @foreach ($provinsi as $provin)
                              <option value="{{ $provin->code }}" >{{ $provin->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Kota<b>*</b></label>
                        <select name="indonesia_cities_id" class="custom-select" >
                          <template x-for="an in kabupatenids">
                            <option :value="an.id"><span x-html="an.name"></span></option>
                          </template>
                        </select>
                      </div>
                      <button type="button" x-on:click="form1Button()" class="btn btn-primary float-right px-3">
                        Selanjutnya
                      </button>
                    </div>
                    {{-- step 2 --}}
                    <div x-show="form_2">
                      <div class="form-group">
                      <label for="exampleInputPassword1">Facebook<b>*</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="exampleInputPassword1"
                        name="facebook"
                        value="{{ old('facebook') }}"
                        placeholder="Masukkan link/alamat profile facebook"
                        required
                      />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword2">Instagram<b>*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="exampleInputPassword2"
                          name="instagram"
                          value="{{ old('instagram') }}"
                          placeholder="Masukkan link/alamat profile instagram"
                          required
                        />
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
                        <label for="exampleInputPassword1">Pendidikan Terakhir<b>*</b></label>
                        <select name="last_education" class="custom-select">
                            <option value="" disabled selected>-- Pilih --</option>
                            <option value="SD" >SD SEDERAJAT</option>
                            <option value="SMP" >SMP SEDERAJAT</option>
                            <option value="SMA" >SMA SEDERAJAT</option>
                        </select>
                      </div>

                      <div class="form-group">
                      <label for="name_school">Asal Sekolah<b>*</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="name_school"
                        name="name_school"
                        value="{{ old('name_school') }}"
                        required
                      />
                      </div>
                      <div class="form-group">
                      <label for="major">Jurusan<b>*</b></label>
                      <input
                        type="text"
                        class="form-control"
                        id="major"
                        name="major"
                        value="{{ old('major') }}"
                      />
                      </div>
                      <div class="form-group">
                        <label for="organization">Pengalaman Organisasi<b>*</b></label>
                        <textarea name="organization" id="" class="form-control h-50"  required>{{ old('organization') }}</textarea>
                        <small>di isi 'Tidak Ada' jika tidak ada. </small>
                      </div>
                      <div class="form-group">
                        <label for="achievment">Prestasi<b>*</b></label>
                        <textarea name="achievment" id="" class="form-control h-50"  required>{{ old('achievment') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="hobby">Hobi<b>*</b></label>
                        <textarea name="hobby" id="" class="form-control h-50"  required>{{ old('hobby') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="goal">Cita-Cita<b>*</b></label>
                        <textarea name="goal" id="" class="form-control h-50"  required>{{ old('goal') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="skill"
                          >Skill/Kelebihan<b>*</b></label
                        >
                        <textarea name="skill" id="" class="form-control h-50"  required>{{ old('skill') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="memorization"
                          >Jumlah hafalan Al-Qur'an yang pernah disetorkan<b>*</b></label
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
                                <option value="{{ $i }} JUZ">{{ $i }} JUZ</option>
                            @endfor
                          </select>
                          <div class="input-group-append">
                            <button class="btn btn-danger" id="modal-1"><i class="fas fa-exclamation-circle"></i></button>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="figure_idol"
                          >Tokoh Idola<b>*</b></label
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
                          >Ustadz/Ulama Yang Disukai ?<b>*</b></label
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
                          >Dimana Allah ?<b>*</b></label
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
                          >Pengajian yang sering dihadiri ?<b>*</b></label
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
                          >Buku Bacaan Yang Disukai?<b>*</b></label
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
                        <label for="">Merokok atau Tidak ? <b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="smoker"
                            id="smoker1"
                            value="iya"
                            required
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
                          />
                          <label class="form-check-label" for="smoker2">
                            Tidak
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Punya Tato atau Tidak ? <b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="tattoed"
                            id="tattoed1"
                            value="iya"
                            required
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
                          />
                          <label class="form-check-label" for="tattoed2">
                            Tidak punya
                          </label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Punya Pacar atau Tidak ?<b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="girlfriend"
                            id="girlfriend1"
                            value="iya"
                            required
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
                          />
                          <label class="form-check-label" for="girlfriend2">
                            Tidak punya
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Suka Game atau Tidak? <b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="gamer"
                            id="gamer1"
                            value="iya"
                            required
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
                            <option value="" disabled selected>-- Pilih --</option>
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
                          >Alasan Mendaftar <b>*</b></label
                        >
                        <textarea name="reason_registration" id="" class="form-control h-50" required>{{ old('reason_registration') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Ceritakan kegiatan Anda dari Pagi sampai Malam
                          <b>*</b></label
                        >
                        <textarea name="activity" id="" class="form-control h-50" required>{{ old('activity') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1"
                          >Ceritakan dengan singkat kepribadian Anda <b>*</b></label
                        >
                        <textarea name="personal" id="" class="form-control h-50"  required>{{ old('personal') }}</textarea>
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
                      <label for="">Orang Tua<b>*</b></label>
                      <select name="parent" class="custom-select">
                            <option value="lengkap" >LENGKAP</option>
                            <option value="ayah" >PIATU</option>
                            <option value="ibu" >YATIM</option>
                            <option value="yatim-piatu" >YATIM-PIATU</option>
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="father">Nama Ayah<b>*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="father"
                          name="father"
                          value="{{ old('father') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="father_work"
                          >Pekerjaan Ayah<b>*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="father_work"
                          name="father_work"
                          value="{{ old('father_work') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="mother">Nama Ibu<b>*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="mother"
                          name="mother"
                          value="{{ old('mother') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="mother_work"
                          >Pekerjaan Ibu<b>*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="mother_work"
                          name="mother_work"
                          value="{{ old('mother_work') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="parent_income"
                          >Total Penghasilan Orang Tua Perbulan<b>*</b></label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="parent_income"
                          name="parent_income"
                          value="{{ old('parent_income') }}"
                          required
                        />
                        <p>di isi dengan bilangan bulat contoh 1000000.</p>
                      </div>
                      <div class="form-group">
                        <label for="child_to">Anak Ke ?<b>*</b></label>
                        <input
                          type="text"
                          class="form-control"
                          id="child_to"
                          name="child_to"
                          value="{{ old('child_to') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="brother"
                          >Jumlah Saudara ?<b>*</b></label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="brother"
                          name="brother"
                          value="{{ old('brother') }}"
                          min="0"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="no_guardian"
                          >Nomor Kontak Orang Tua/Wali ?<b>*</b></label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="no_guardian"
                          name="no_guardian"
                          value="{{ old('no_guardian') }}"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <label for="description_guardian"
                          >Tambah Keterangan Jika Ada</label
                        >
                        <textarea
                          type="text"
                          class="form-control"
                          id="description_guardian"
                          name="description_guardian"
                        >{{ old('description_guardian') }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="">Izin Orang Tua atau Tidak ?<b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="permission_parent"
                            id="permission_parent1"
                            value="iya"
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
                            required
                          />
                          <label class="form-check-label" for="permission_parent2">
                            Tidak
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="">Punya Laptop atau Tidak ?<b>*</b></label>
                        <div class="form-check">
                          <input
                            class="form-check-input"
                            type="radio"
                            name="have_laptop"
                            id="have_laptop1"
                            value="iya"
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
                            required
                            value="tidak"
                          />
                          <label class="form-check-label" for="have_laptop2">
                            Tidak
                          </label>
                        </div>
                      </div>
                      <div class="form-group mt-4">
                        <label for=""
                          >Demi Allah, Saya bersumpah semua informasi ini benar.
                          <b>*</b></label
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
                        <b>*</b>
                        <small
                          >Tolong periksa sekali lagi data yang Anda masukkan, Apakah sudah
                          benar dan sesuai ? Karena setelah Anda mengirim data tersebut, Anda
                          tidak bisa lagi melakukan perubahan terhadap data yang sudah Anda kirim.</small
                        >
                      </div>
                      <div class="mt-4">
                        <button
                          type="button"
                          class="btn btn-primary float-left px-3"
                          x-on:click="form3ButtonBack()"
                        >
                          Sebelumnya
                        </button>
                        <button
                          type="submit"
                          class="btn btn-primary float-right px-3"
                        >
                          Kirim Data
                        </button>
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
  <script src="{{ asset('stisla/node_modules/prismjs/prism.js') }}"></script>
  <script src="{{ asset('stisla/assets/js/page/bootstrap-modal.js') }}"></script>

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

        // method
        gamer(param){
          this.gamer_in=param;
        },
				form1Button(){
          this.form_1=null;
          this.form_3=null;
          this.form_4=null;
          this.form_2=true;
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
          this.form_4= null;
          this.form_3=true;
          window.scrollTo(0, 0);
        },
        form2ButtonBack(){
          this.form_1= null;
          this.form_4= null;
          this.form_2= true;
          this.form_3=null;
          window.scrollTo(0, 0);
        },
        form3Button(){
          this.form_1= null;
          this.form_2= null;
          this.form_3=null;
          this.form_4=true;
          window.scrollTo(0, 0);
        },
        form3ButtonBack(){
          this.form_1=null;
          this.form_2=null;
          this.form_3=true;
          this.form_4=null;
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
