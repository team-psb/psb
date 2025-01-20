@extends('front.layouts.menu')

@section('title', 'Informasi')

{{-- @push('end-style')
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
@endpush --}}

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="card-body">
                <div class="col-12">
                    @php
                      $aos_delay = 0;
                    @endphp
                    @forelse ($informations as $information)
                    <a  href="{{ route('user-informasi-detail', $information->id) }}"
                        class="text-decoration-none"
                    >
                      <div  class="card mb-3 shadow-sm"
                            style="color:#707070;"
                            data-aos="fade-up"
                            data-aos-delay="{{ $aos_delay += 200 }}"
                            data-aos-duration="1000"
                      >
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{ asset('/storage/'.$information->image) }}" class="card-img" alt="Tidak ada gambar">
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="card-body">
                              <h5 class="card-title">{{ $information->title }}</h5>
                              <p class="card-text">{!! Str::limit($information->content, 100, '...') !!}</p>
                              <p class="card-text">Dibuat pada : <small class="text-muted">{{ $information->created_at->format('d-m-Y') }}</small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                    @empty
                    <div class="d-flex justify-content-center align-items-center" style="height: 400px">
                      <div class="alert alert-has-icon text-muted">
                          <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                          <div class="alert-body">
                            <div class="alert-title">Oops!</div>
                              Belum ada informasi
                          </div>
                      </div>
                    </div>
                    @endforelse
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection

{{-- @push('end-script')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
@endpush --}}
