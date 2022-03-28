@extends('front.layouts.exam')

@section('title', 'Tes IQ')

@section('content')
    <div id="initiated" class="container py-5">
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
                                                        {{-- <a href="{{ Storage::url($item->image) }}" target="blank">
                                                            <img id="myImg" src="{{ Storage::url($item->image) }}" alt="" class="w-50 d-none d-md-block"><br>
                                                            <img id="myImg" src="{{ Storage::url($item->image) }}" alt="" class="w-100 d-sm-block d-md-none"><br>
                                                        </a> --}}
                                                        <div class="chocolat-parent">
                                                            <a href="{{ asset('/storage/'.$item->image) }}" class="chocolat-image" title="Gambar Soal">
                                                                <div class="">
                                                                    <img alt="image" src="{{ asset('/storage/'.$item->image) }}" class="img-fluid">
                                                                </div>
                                                            </a>
                                                        </div>
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
                                                        {{ old('pilihan[$item->id]') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                        class="custom-control-label"
                                                        for="pilihan{{ $item->id }}a"
                                                        > <strong>A.</strong> {{ $item->a }}  
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
                                                        {{ old('pilihan[$item->id]') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                        class="custom-control-label"
                                                        for="pilihan{{ $item->id }}b"
                                                        ><strong>B.</strong> {{ $item->b }}
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
                                                        {{ old('pilihan[$item->id]') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                        class="custom-control-label"
                                                        for="pilihan{{ $item->id }}c"
                                                        ><strong>C.</strong> {{ $item->c }}  
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
                                                        {{ old('pilihan[$item->id]') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                        class="custom-control-label"
                                                        for="pilihan{{ $item->id }}d"
                                                        ><strong>D.</strong> {{ $item->d }}
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
                                                        {{ old('pilihan[$item->id]') ? 'checked' : '' }}
                                                        />
                                                        <label
                                                        class="custom-control-label"
                                                        for="pilihan{{ $item->id }}e"
                                                        ><strong>E.</strong> {{ $item->e }}  
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
                                <p class="text-success"><i class="fas fa-info"></i> Jika sudah selesai mengerjakan silahkan tekan tombol selesai</p>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between m-3">
                                <div>
                                    {{ $question_iq->links() }}
                                    {{-- {{ $question_iq->appends(array_merge(request()->all()))->links() }}  --}}
                                </div>
                                <div class="">
                                    <input type="button" id="btn-ok" value="Selesai" class="btn btn-primary float-right px-3 accept"/>
                                </div>
                            </div>
                    </form>
                <div>
            </div>
        </div>
    </div>
@endsection

@push('end-script')
  <!-- Sweetalert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.6/dist/sweetalert2.all.min.js"></script>
  
  <script>
    $(document).ready(function() {
    $('form #btn-ok').click(function(e) {
        let $form = $(this).closest('form');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({
            title: 'Apakah sudah Yakin?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                swalWithBootstrapButtons.fire(
                        'Selesai dikerjakan!',
                        'Data berhasil disimpan',
                    );                     
                $form.submit();
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Dibatalkan !',
                    'Silahkan dikerjakan kembali :'
                );
            }
        });
      });
    });
  </script>

    <script>
        $('.pagination a').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $('#initiated').load(url + ' div#initiated');
        });

        function ajaxPaging() {
            $('.pagination a').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $('#initiated').load(url + ' div#initiated', null, ajaxPaging); // re-run on complete
            });
        }
        ajaxPaging();
    </script>
@endpush