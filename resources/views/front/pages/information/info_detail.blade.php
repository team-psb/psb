@extends('front.layouts.app')

@section('title', 'Detail Informasi '. $information->title)

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div class="col-12 d-xl-none">
          <div class="btn text-white" onclick="history.back()"><i class="fas fa-chevron-left"></i> Back</div>
          <a href="{{ route('user-dashboard') }}" class="btn text-white"><i class="fas fa-home"></i> Home</a>
        </div>
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="card-body">
                  <div class="vh-100">
                    @if ($information->video == null)
                    <img src="{{ asset('/storage/'.$information->image) }}" class="card-img-top" alt="...">
                    @else
                    <iframe class="w-100 h-100" src="{{ $information->video ? $information->video : '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                  </div>
                  <h5 class="card-title mt-2">{{ $information->title }}</h5>
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