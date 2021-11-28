@extends('front.layouts.app')

@section('title', 'Biodata')

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
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
                  <p class="card-text">Silahkan isi form dibawah ini</p>
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
                      <form id="multi-form" class="needs-validation" novalidate="" method="POST" action="">
                        @csrf

                        {{-- step-1 --}}
                        <div x-show="form_1">

                          <div class="form-group">
                            <label for="exampleInputPassword1"
                              >Tempat Lahir<b>*</b></label
                            >
                            <input
                              type="text"
                              name="tempat_lahir"
                              class="form-control"
                              id="exampleInputPassword1"
                              {{-- x-model="tempat_lahir" --}}
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1"
                              >Alamat Lengkap<b>*</b></label
                            >
                            <textarea
                              name="alamt_lengkap"
                              class="form-control h-100"
                              id="exampleInputPassword1"
                              required
                            ></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Provinsi<b>*</b></label>
                            <select name="indonesia_provinces_id" class="custom-select" x-on:change="getKabupaten(provin_id)" x-model="provin_id">
                              <option value="">a</option>
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
                            required
                          />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Instagram<b>*</b></label>
                            <input
                              type="text"
                              class="form-control"
                              id="exampleInputPassword1"
                              name="instagram"
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
                            <select name="pendidikan_terakhir" class="custom-select">
                                <option value="SD" >SD SEDERAJAT</option>
                                <option value="SMP" >SMP SEDERAJAT</option>
                                <option value="SMA" >SMA SEDERAJAT</option>
                            </select>
                          </div>

                          <div class="form-group">
                          <label for="asal_sekolah">Asal Sekolah<b>*</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="asal_sekolah"
                            name="asal_sekolah"
                            required
                          />
                          </div>
                          <div class="form-group">
                          <label for="jurusan">Jurusan<b>*</b></label>
                          <input
                            type="text"
                            class="form-control"
                            id="jurusan"
                            name="jurusan"
                          />
                          </div>
                          <div class="form-group">
                            <label for="pengalaman_organisasi">Pengalaman Organisasi<b>*</b></label>
                            <textarea name="pengalaman_organisasi" id="" class="form-control h-50"  required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="prestasi">Prestasi<b>*</b></label>
                            <textarea name="prestasi" id="" class="form-control h-50"  required></textarea>
                            <small>di isi 'tidak ada' jika tidak ada </small>
                          </div>
                          <div class="form-group">
                            <label for="Hobi">Hobi<b>*</b></label>
                            <textarea name="hobi" id="" class="form-control h-50"  required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="cita-cita">Cita-Cita<b>*</b></label>
                            <textarea name="cita_cita" id="" class="form-control h-50"  required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="skill"
                              >Skill/Kelebihan<b>*</b></label
                            >
                            <textarea name="skill" id="" class="form-control h-50"  required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="jumlah_hafalan"
                              >Jumlah Hafalan Al Qur'an<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="jumlah_hafalan"
                              name="jumlah_hafalan"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="tokoh_idola"
                              >Tokoh Idola<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="tokoh_idola"
                              name="tokoh_idola"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="ustad_idola"
                              >Ustadz/Ulama Yang Disukai ?<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="ustad_idola"
                              name="ustadz_idola"
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
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="pengajian_hadiri"
                              >Pengajian Yang Sering Dihadiri ?<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="pengajian_hadiri"
                              name="kajian"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="bukusuka"
                              >Buku Bacaan Yang Disukai?<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="bukusuka"
                              name="buku"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="">Merokok Atau Tidak ? <b>*</b></label>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="perokok"
                                id="perokok1"
                                value="iya"
                                required
                              />
                              <label class="form-check-label" for="perokok1">
                                Iya
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="perokok"
                                id="perokok2"
                                value="tidak"
                                required
                              />
                              <label class="form-check-label" for="perokok2">
                                Tidak
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Punya Pacar Atau Tidak ?<b>*</b></label>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="punya_pacar"
                                id="pacar1"
                                value="iya"
                                required
                              />
                              <label class="form-check-label" for="pacar1">
                                Punya
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="punya_pacar"
                                id="pacar2"
                                value="tidak"
                                required
                              />
                              <label class="form-check-label" for="pacar2">
                                Tidak
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Suka Game Atau Tidak? <b>*</b></label>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="suka_game"
                                id="sukagame1"
                                value="iya"
                                required
                                x-on:click="gamer(true)"
                              />
                              <label class="form-check-label" for="sukagame1">
                                suka
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="suka_game"
                                id="sukagame2"
                                value="tidak"
                                x-on:click="gamer(false)"
                                required
                              />
                              <label class="form-check-label" for="sukagame2">
                                tidak
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
                                name="nama_game"
                              />
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1"
                                >Berapa Jam Yang Dihabiskan Untuk Main game</label
                              >
                              <input
                                type="text"
                                class="form-control"
                                id="exampleInputPassword1"
                                name="waktu_game"
                              />
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1"
                              >Alasan Mendaftar <b>*</b></label
                            >
                            <textarea name="alasan_mendaftar" id="" class="form-control h-50" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1"
                              >Ceritakan Kegiatan Anda Dari Pagi Sampai Malam
                              <b>*</b></label
                            >
                            <textarea name="kegiatan" id="" class="form-control h-50" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1"
                              >Ceritakan Dengan Singkat Kepribadian Anda <b>*</b></label
                            >
                            <textarea name="kepribadian" id="" class="form-control h-50"  required></textarea>
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
                          <select name="orang_tua" class="custom-select">
                                <option value="lengkap" >LENGKAP</option>
                                <option value="ayah" >PIATU</option>
                                <option value="ibu" >YATIM</option>
                                <option value="yatim-piatu" >YATIM-PIATU</option>
                          </select>
                          </div>
                          <div class="form-group">
                            <label for="nama_ayah">Nama Ayah<b>*</b></label>
                            <input
                              type="text"
                              class="form-control"
                              id="nama_ayah"
                              name="nama_ayah"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="pekerjaan_ayah"
                              >Pekerjaan Ayah<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="pekerjaan_ayah"
                              name="pekerjaan_ayah"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="nama_ibu">Nama Ibu<b>*</b></label>
                            <input
                              type="text"
                              class="form-control"
                              id="nama_ibu"
                              name="nama_ibu"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="pekerjaanibu"
                              >Pekerjaan Ibu<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="pekerjaanibu"
                              name="pekerjaan_ibu"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="penghasilan_ortu"
                              >Total Penghasilan Orang Tua Perbulan<b>*</b></label
                            >
                            <input
                              type="number"
                              class="form-control"
                              id="penghasilan_ortu"
                              name="penghasilan_ortu"
                              required
                            />
                            <p>di isi dengan bilangan bulat contoh 1000000.</p>
                          </div>
                          <div class="form-group">
                            <label for="anak_ke">Anak Ke ?<b>*</b></label>
                            <input
                              type="text"
                              class="form-control"
                              id="anak_ke"
                              name="anak_ke"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="saudara"
                              >Jumlah Saudara ?<b>*</b></label
                            >
                            <input
                              type="number"
                              class="form-control"
                              id="saudara"
                              name="saudara"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="kontak_wali"
                              >Nomor Kontak Orang Tua Wali ?<b>*</b></label
                            >
                            <input
                              type="text"
                              class="form-control"
                              id="kontak_wali"
                              name="no_wali"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="keterangan"
                              >Tambah Keterangan Jika Ada</label
                            >
                            <textarea
                              type="text"
                              class="form-control"
                              id="kerangan"
                              name="keterangan"
                              
                            ></textarea>
                          </div>
                          <div class="form-group">
                            <label for="">Izin Orang Tua Atau TIdak ?<b>*</b></label>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="izin_ortu"
                                id="izinortu1"
                                value="iya"
                                required
                              />
                              <label class="form-check-label" for="izinortu1">
                                Iya
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="izin_ortu"
                                id="izinortu2"
                                value="tidak"
                                required
                              />
                              <label class="form-check-label" for="izinortu2">
                                Tidak
                              </label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="">Punya Laptop Atau Tidak ?<b>*</b></label>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="punya_laptop"
                                id="punyalaptop1"
                                value="iya"
                                required
                                
                              />
                              <label class="form-check-label" for="punyalaptop1">
                                Iya
                              </label>
                            </div>
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="radio"
                                name="punya_laptop"
                                id="punyalaptop2"
                                required
                                value="tidak"
                              />
                              <label class="form-check-label" for="punyalaptop2">
                                Tidak
                              </label>
                            </div>
                          </div>
                          <div class="form-group mt-4">
                            <label for=""
                              >Demi Allah , Saya Bersumpah Semua Informasi Ini Benar
                              <b>*</b></label
                            >
                            <div class="form-check">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                value="1"
                                name="setuju"
                                id="defaultCheck1"
                                required
                              />
                              <label class="form-check-label" for="defaultCheck1">
                                Semua Informasi Ini Adalah Benar
                              </label>
                            </div>
                          </div>
                          <div class="my-5">
                            <b>*</b>
                            <small
                              >Periksa sekali lagi bahwa data yang anda masukkan sudah
                              benar dan sesuai, Setelah anda mengirim data tersebut anda
                              tidak bisa lagi melakukan perubahan terhadap data yang
                              anda kirim .</small
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
      </div>
  </section>
</div>
@endsection

@push('end-script')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>

  <script>
    function formdata(){
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
        }
			}
    }
  </script>  
@endpush