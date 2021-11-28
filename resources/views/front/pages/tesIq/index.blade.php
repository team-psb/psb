@extends('front.layouts.app')

@section('title', 'Tes IQ')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="container py-5">
                <div class="my-4">
                  <div class="row justify-content-center px-4">
                    <div class="col-md-10 col-sm-12 title">
                      <h5>
                        <strong> <i class="fa fa-book ico"></i> Tes IQ</strong>
                      </h5>
                      
                      <p class="card-text">Silahkan Jawab Soal-Soal Dibawah Ini !</p>
                      <div class="card text-left" >
                        <form method="POST" action="">
                          @csrf 
                          <div x-data="soal()">
                            {{-- page 1--}}
                            <div class="row" x-show="soal_1">
                              
                                <div class="col-md-12 col-sm-12">
                                  <div class="card-body mb-1">
                                    <div class="card text-left">
                                      <div class="card-body">
                                        <div class="soal">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <p>
                                                <b class="title">1</b>
                                                <br>
        
                                                <a href="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" target="blank">
                                                  <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-50 d-none d-md-block"><br>
                                                  <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-100 d-sm-block d-md-none"><br>
                                                </a>
        
                                                Sebuah pesawat terbang berangkat dari kota Kupang menuju kota Jakarta pukul 7 pagi dan perjalanan ke Jakarta selama 4 jam. Transit di Denpasar selama 30 menit. Pada pukul berapa pesawat tersebut tiba di Jakarta?
                                              </p>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="jawaban">
                                          <div class="row">
                                            <div class="col">
                                              <!-- jawaban 1 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihana"
                                                  name="pilihan"
                                                  class="custom-control-input"
                                                  value="a"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihana"
                                                  > <strong>A .</strong> a
                                                </label>
                                              </div>
                                              <!-- jawaban 2 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihanb"
                                                  name="pilihan"
                                                  class="custom-control-input"
                                                  value="b"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihanb"
                                                  ><strong>B .</strong>b
                                                </label>
                                              </div>
                                              <!-- jawaban 3 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihanc"
                                                  name="pilihan"
                                                  class="custom-control-input"
                                                  value="c"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihanc"
                                                  ><strong>C .</strong>
                                                    c
                                                </label>
                                              </div>
                                              <!-- jawaban 4 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihand"
                                                  name="pilihan"
                                                  class="custom-control-input"
                                                  value="d"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihand"
                                                  ><strong>D .</strong>
                                                  d
                                                </label>
                                              </div>
                                              <!-- jawaban 5 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihane"
                                                  name="pilihan"
                                                  class="custom-control-input"
                                                  value="e"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihane"
                                                  ><strong>E .</strong>
                                                  e
                                                </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                                <div class="pb-3 m-5 d-block">
                                    <button
                                        type="button"
                                        class="btn btn-primary float-right px-3"
                                        x-on:click="soal1()"
                                    >
                                        Lanjut
                                    </button>
                                </div>
                            </div>
                            {{-- page 2 --}}
                            <div x-show="soal_2">
                              
                                <div class="card-body mb-1">
                                  <div class="card text-left">
                                    <div class="card-body">
                                      <div class="soal">
                                        <div class="row">
                                          <div class="col">
                                            <p>
                                              <b class="title">2</b>
                                              <a href="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" target="blank">
                                                <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-50 d-none d-md-block"><br>
                                                <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-100 d-sm-block d-md-none">
                                              </a>
                                              <br>
                                              Sebuah pesawat terbang berangkat dari kota Kupang menuju kota Jakarta pukul 7 pagi dan perjalanan ke Jakarta selama 4 jam. Transit di Denpasar selama 30 menit. Pada pukul berapa pesawat tersebut tiba di Jakarta?
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="jawaban">
                                        <div class="row">
                                          <div class="col">
                                            <!-- jawaban 1 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihana"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="a"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihana"
                                                > <strong>A .</strong> a
                                              </label>
                                            </div>
                                            <!-- jawaban 2 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihanb"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="b"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihanb"
                                                ><strong>B .</strong>b
                                              </label>
                                            </div>
                                            <!-- jawaban 3 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihanc"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="c"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihanc"
                                                ><strong>C .</strong>
                                                  c
                                              </label>
                                            </div>
                                            <!-- jawaban 4 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihand"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="d"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihand"
                                                ><strong>D .</strong>
                                                d
                                              </label>
                                            </div>
                                            <!-- jawaban 5 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihane"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="e"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihane"
                                                ><strong>E .</strong>
                                                e
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                              <div class="pb-3 m-5">
                                <button
                                  type="button"
                                  class="btn btn-primary float-left px-3"
                                  x-on:click="soal2back()"
                                >
                                  Kembali
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-primary float-right px-3"
                                  x-on:click="soal2()"
                                >
                                  Lanjut
                                </button>
                              </div>
                            </div>
                            {{-- page 5 --}}
                            <div x-show="soal_5">
                              
                                <div class="card-body mb-1">
                                  <div class="card text-left">
                                    <div class="card-body">
                                      <div class="soal">
                                        <div class="row">
                                          <div class="col">
                                            <p>
                                              <b class="title">5</b>
                                              <a href="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" target="blank">
                                                <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-50 d-none d-md-block"><br>
                                                <img id="myImg" src="https://pondokinformatika.xyz/storage/img/cEMoOxMiyR3FnO8fP6mTo6TjLye3QOzPeL4bpUvv.jpeg" alt="" class="w-100 d-sm-block d-md-none">
                                              </a>
                                              <br>
                                              Sebuah pesawat terbang berangkat dari kota Kupang menuju kota Jakarta pukul 7 pagi dan perjalanan ke Jakarta selama 4 jam. Transit di Denpasar selama 30 menit. Pada pukul berapa pesawat tersebut tiba di Jakarta?
                                            </p>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="jawaban">
                                        <div class="row">
                                          <div class="col">
                                            <!-- jawaban 1 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihana"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="a"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihana"
                                                > <strong>A .</strong> a
                                              </label>
                                            </div>
                                            <!-- jawaban 2 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihanb"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="b"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihanb"
                                                ><strong>B .</strong>b
                                              </label>
                                            </div>
                                            <!-- jawaban 3 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihanc"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="c"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihanc"
                                                ><strong>C .</strong>
                                                  c
                                              </label>
                                            </div>
                                            <!-- jawaban 4 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihand"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="d"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihand"
                                                ><strong>D .</strong>
                                                d
                                              </label>
                                            </div>
                                            <!-- jawaban 5 -->
                                            <div
                                              class="custom-control custom-radio d-block custom-control-inline my-2"
                                            >
                                              <input
                                                type="radio"
                                                id="pilihane"
                                                name="pilihan"
                                                class="custom-control-input"
                                                value="e"
                                              />
                                              <label
                                                class="custom-control-label"
                                                for="pilihane"
                                                ><strong>E .</strong>
                                                e
                                              </label>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              
                              <div class="pb-3 m-5">
                                <button
                                  type="button"
                                  class="btn btn-primary float-left px-3"
                                  x-on:click="soal5back()"
                                >
                                  Kembali
                                </button>
                                <button
                                  type="submit"
                                  class="btn btn-primary float-right px-3"
                                >
                                  Selesai
                                </button>
                              </div>
                            </div>
                          </div>
                        </form>
                       <div>
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
      function soal(){
        return{
          // data
          soal_1:true,
          soal_2:false,
          soal_3:false,
          soal_4:false,
          soal_5:false,
          // method
          soal1(){
            this.soal_1=false;
            this.soal_2=true;
            window.scrollTo(0, 0); 
          },
          soal2back(){
            this.soal_1=true;
            this.soal_2=false;
            window.scrollTo(0, 0); 
          },
          soal2(){
            this.soal_1=false;
            this.soal_2=false;
            this.soal_3=true;
            window.scrollTo(0, 0); 
          },
          soal3back(){
            this.soal_1=false;
            this.soal_2=true;
            this.soal_3=false;
            window.scrollTo(0, 0); 
          },
          soal3(){
            this.soal_1=false;
            this.soal_2=false;
            this.soal_3=false;
            this.soal_4=true;
            window.scrollTo(0, 0); 
          },
          soal4back(){
            this.soal_1=false;
            this.soal_2=false;
            this.soal_3=true;
            this.soal_4=false;
            window.scrollTo(0, 0); 
          },
          soal4(){
            this.soal_1=false;
            this.soal_2=false;
            this.soal_3=false;
            this.soal_4=false;
            this.soal_5=true;
            window.scrollTo(0, 0); 
          },
          soal5back(){
            this.soal_1=false;
            this.soal_2=false;
            this.soal_3=false;
            this.soal_4=true;
            this.soal_5=false;
            window.scrollTo(0, 0); 
          }
        }
      }
    </script>
@endpush