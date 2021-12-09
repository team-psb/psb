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
                <div class="col-12">
                    @forelse ($informations as $information)
                    <a href="{{ route('user-informasi-detail', $information->id) }}" class="text-decoration-none " style="color:#707070;">
                      <div class="card mb-3 shadow-sm">
                        <div class="row no-gutters">
                          <div class="col-md-4">
                            <img src="{{ asset('/storage/'.$information->image) }}" class="card-img" alt="...">
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
                      <p>Belum ada informasi tersedia!</p>
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