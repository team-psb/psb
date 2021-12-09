@extends('front.layouts.app')

@section('title', 'Detail Informasi '. $information->title)

@section('content')
<div class="main-content">
  <section class="section">
      <div class="section-body">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="card-body">
                <img src="{{ asset('/storage/'.$information->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $information->title }}</h5>
                  <p class="card-text">{!! $information->content !!}</p>
                  <p class="card-text">Dibuat pada : <small class="text-muted">{{ $information->created_at->format('d-m-Y') }}</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</div>
@endsection