@extends('front.layouts.app')

@section('title','Tes Tahap Kelima')
    
@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div style="background-color: #fff">
          <div class="container py-5">
            <div class="my-4">
              <div class="row justify-content-center px-4">
                <div class="col-md-10 col-sm-12 title">
                  <div class="success">
                    <div class="row">
                      <div class="col-md-7 m-auto col-sm-6 text-center title">
                        <i class="fas fa-microphone" style="font-size: 5em;"></i>
                        <h4 class="my-3">
                          <strong>Selamat <span class="text-uppercase">{{ Auth::user()->name }}</span> </strong>
                          <strong>Anda Akan Kami Hubungi Untuk Melakukan Wawancara</strong>
                        </h4>
                        <strong class="d-block my-3">Pastikan no wa yang ada di profil anda <br> sudah benar dan bisa kami hubunggi.</strong>
                        <a  href="" class="btn btn-primary px-3">Kembali Ke Dashboard</a>
                      </div>
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