@extends('front.layouts.exam')

@section('title','Tes Tahap Keempat')

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
    
@section('content')
  <div class="container py-5">
    <div class="my-4">
      <div class="row justify-content-center">
        <div class="col-md-10 col-sm-12 title">
          <h5>
            <strong> <i class="fa fa-link ico"></i> Link Video</strong>
          </h5>
          <p class="card-text">
            Silahkan kirim Link Video Melalui Form Dibawah Ini !
          </p>

          <div class="card text-left overflow-auto">
            <div class="card-body">

              <h5>Video cara mengirimkan link video</h5>
              <p>bagi yang kesulitan mangikuti tes tahap ini bisa simak video di bawah ini</p>
              <div class="row">
                <div class="col m-auto ">
                  {{-- responsive iframa --}}
                  <div class="responsive">
                    <iframe class="responsive-iframe" src="https://www.youtube.com/embed/_ZJLc9FgvSM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                </div>
              </div>

              <hr class="mb-4 pb-4">

              <form method="POST" action="{{ route('fourth-tes.store') }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Link Video <b>*</b> </label>
                  <input
                    type="text"
                    required
                    class="form-control @error('url') is-invalid @enderror"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="https://www.youtube.com/watch?v=mbyC-4ufrG4"
                    name="url"
                  />
                  <small class="form-text text-muted">
                    contoh: https://www.youtube.com/watch?v=mbyC-4ufrG4 <br>
                  </small>
                  @error('url')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <!-- <button class="btn btn-primary mx-3 float-right mb-3" type="submit">
                  Kirim
                </button> -->
                <input type="button" id="btn-ok" value="Selesai" class="btn btn-primary float-right px-3 accept"/>
              </form>
            </div>              
          </div>
        </div>
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
                    'Silahkan dikerjakan kembali :')
                ;
            }
        });
      });
    });
  </script>
@endpush