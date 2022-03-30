@extends('front.layouts.menu')

@section('title', 'Detail Informasi '. $information->title)

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div class="col-12 d-xl-none"></div>
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="card-body">
                  @if ($information->video == null)
                    <img src="{{ asset('/storage/'.$information->image) }}" class="card-img-top" alt="...">
                  @else
                    <div class="responsive">
                      <iframe class="responsive-iframe" src="{{ $information->video ? $information->video : '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                  @endif
                  <h5 class="card-title mt-4">{{ $information->title }}</h5>
                  {{-- <h5 class="card-title">{!! $information->video !!}</h5> --}}
                  <p class="card-text">{!! $information->content !!}</p>
                  <p class="card-text">Dibuat pada : <small class="text-muted">{{ $information->created_at->format('d-m-Y') }}</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection

@push('end-style')
  <style>
    .responsive {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 62.5%;
    }

    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
  </style>
@endpush
