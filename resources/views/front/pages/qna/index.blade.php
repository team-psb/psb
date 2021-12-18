@extends('front.layouts.app')

@section('title', 'Q & A')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                      <div class="card-header d-flex flex-column text-center">
                        <i class="fas fa-question-circle text-success" style="font-size: 48px;"></i>
                        <h1 class="text-success poppins">Question & Answer</h1>
                        <p class="text-muted">Berikut adalah pertanyaan yang paling sering ditanyakan oleh calon santri, Beserta jawabannya.</p>
                        <p class="text-dark"><b>Silahkan manfaatkan fitur ini sebelum bertanya di whatsapp!</b></p>
                      </div>
                      <div class="card-body">
                        <div id="accordion">
                          @foreach ($qna as $index => $item)
                          <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-{{ $item->id }}" aria-expanded="true" aria-controls="collapse{{ $item->id }}">
                              <h4 class="text-uppercase">{{ $item->question }}</h4>
                            </div>
                            <div class="accordion-body collapse {{ $index == 0 ? 'show' : '' }}" id="panel-body-{{ $item->id }}" data-parent="#accordion">
                              <p class="mb-0">{{$item->answer}}</p>
                            </div>
                          </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection