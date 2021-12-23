@extends('front.layouts.exam')

@section('title', 'Tes IQ')

@section('content')
            <div class="container py-5">
                <div class="my-4">
                  <div class="row justify-content-center px-4">
                    <div class="col-md-10 col-sm-12 title">
                      <h5>
                        <strong> <i class="fa fa-book ico"></i> Tes IQ</strong>
                      </h5>
                      
                      <p class="card-text">Silahkan Jawab Soal-Soal Dibawah Ini !</p>
                      <div class="card text-left" >
                        <form method="POST" action="{{ route('second-tes.store') }}">
                          @csrf 
                          @foreach ($question_iq as $index =>$item)
                                <div class="col-md-12 col-sm-12">
                                  <div class="card-body mb-1">
                                    <div class="card text-left">
                                      <div class="card-body">
                                        <div class="soal">
                                          <div class="row">
                                            <div class="col-md-12">
                                              <p>
                                                <b class="title text-dark">{{ $index+1 }}</b>. 
                                                @if (isset($item->image))
                                                  <br>
                                                  <a href="{{ Storage::url($item->image) }}" target="blank">
                                                    <img id="myImg" src="{{ Storage::url($item->image) }}" alt="" class="w-50 d-none d-md-block"><br>
                                                    <img id="myImg" src="{{ Storage::url($item->image) }}" alt="" class="w-100 d-sm-block d-md-none"><br>
                                                  </a>
                                                @endif

                                                {{ $item->question }}
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
                                                  id="pilihan{{ $item->id }}a"
                                                  name="pilihan[{{ $item->id }}]"
                                                  class="custom-control-input"
                                                  value="a"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihan{{ $item->id }}a"
                                                  > <strong>A .</strong> {{ $item->a }}  
                                                </label>
                                              </div>
                                              <!-- jawaban 2 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihan{{ $item->id }}b"
                                                  name="pilihan[{{ $item->id }}]"
                                                  class="custom-control-input"
                                                  value="b"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihan{{ $item->id }}b"
                                                  ><strong>B .</strong>{{ $item->b }}
                                                </label>
                                              </div>
                                              <!-- jawaban 3 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihan{{ $item->id }}c"
                                                  name="pilihan[{{ $item->id }}]"
                                                  class="custom-control-input"
                                                  value="c"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihan{{ $item->id }}c"
                                                  ><strong>C .</strong>
                                                    {{ $item->c }}  
                                                </label>
                                              </div>
                                              <!-- jawaban 4 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihan{{ $item->id }}d"
                                                  name="pilihan[{{ $item->id }}]"
                                                  class="custom-control-input"
                                                  value="d"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihan{{ $item->id }}d"
                                                  ><strong>D .</strong>
                                                  {{ $item->d }}
                                                </label>
                                              </div>
                                              <!-- jawaban 5 -->
                                              <div
                                                class="custom-control custom-radio d-block custom-control-inline my-2"
                                              >
                                                <input
                                                  type="radio"
                                                  id="pilihan{{ $item->id }}e"
                                                  name="pilihan[{{ $item->id }}]"
                                                  class="custom-control-input"
                                                  value="e"
                                                />
                                                <label
                                                  class="custom-control-label"
                                                  for="pilihan{{ $item->id }}e"
                                                  ><strong>E .</strong>
                                                  {{ $item->e }}  
                                                </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                                <div class="text-center">
                                  <small class="text-muted">Jika sudah selesai mengerjakan silahkan tekan tombol selesai</small>
                                </div>
                                <div class="d-flex flex-wrap justify-content-between m-3">
                                  <div>
                                    {{ $question_iq->links() }}
                                  </div>
                                  <div>
                                    <button
                                      type="submit"
                                      class="btn btn-primary float-right px-3"
                                    >
                                      Selesai
                                    </button>
                                  </div>
                                </div>
                        </form>

                        {{-- {{ $question_iq->currentPage() }}
                        {{ $question_iq->total() }} --}}
                        {{-- {{ $question_iq->perPage() }} --}}
                        {{-- {{ (request()->is('dashboard/class*')) ? 'active' : '' }} --}}
                        {{-- {{ route('interviews.status', $interview->id) }}?status=lolos --}}
                        {{-- {{ $question_iq->lastPage() }} --}}
                        {{-- <div class="d-flex justify-content-end">
                          <div class="m-2">
                            {{ $question_iq->links() }}
                            @if (URL::current().'?page='.$question_iq->lastPage() == $a )
                              <button
                              type="submit"
                              class="btn btn-primary float-right px-3"
                            >
                              Selesai
                            </button>
                            @endif
                          </div>
                        </div> --}}
                       <div>
                    </div>
                  </div>
                </div>
@endsection
