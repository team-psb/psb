@extends('front.layouts.app')

@section('title', 'Informasi')

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="card-body">
                 <div class="col-md-10 col-12">
                    <a href="#" class="text-decoration-none " style="color:#707070;">
                      <div class="card mb-3 shadow-sm">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{ asset('stisla/assets/img/news/img02.jpg') }}" class="card-img" alt="...">
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="card-body">
                              <h5 class="card-title">Video tata cara pendaftaran santri</h5>
                              <p class="card-text">Berikut ini link video tata cara pendaftaran santri</p>
                              <p class="card-text"><small class="text-muted">2021-01-01</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection