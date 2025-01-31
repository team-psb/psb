@extends('admin.layouts.app')

@section('title', 'Buat Informasi')

@push('after-style')
    <style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    </style>
@endpush

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card  card-rounded">
                        <div class="card-body">
                            <h4 class="card-title">Buat Informasi</h4>
                            <form class="forms-sample" action="{{ route('schdules.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label class="fw-bold fs-6">Gambar Informasi</label>
                                    <div class="row">
                                        <div class="col-sm-4 mb-1">
                                            <img src="https://placehold.it/100x100" id="preview" class="img-fluid">
                                        </div>
                                        <div class="col-sm-8 mb-1">
                                            <div class="form-group">
                                                <div class="fw-bold pb-2">Pilih Thumbnail</div>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="form-group">
                                                <label class="fw-bold fs-6" for="exampleInputPassword4">Judul</label>
                                                <input type="text" name="title" class="form-control" id="exampleInputPassword4" placeholder="Judul">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="input-group col-xs-12 w-25">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary py-2" type="button">Upload</button>
                                        </span>
                                    </div> --}}
                                </div>

                                <div class="form-group">
                                    <label class="fw-bold fs-6" for="exampleTextarea1">Code Video Youtube <span class="text-danger" style="font-size: 12px;">*Optional, Input URL video example : https://www.youtube.com/embed/<span class="text-success">RkRdR-LYC_E</span></span></label>
                                    {{-- <textarea name="video" class="form-control" style="height: 150px;"></textarea> --}}
                                    <input type="text" class="form-control" name="video" value="https://www.youtube.com/embed/...">

                                </div>
                                <div class="form-group">
                                    <label class="fw-bold fs-6" for="exampleTextarea1">Konten</label>
                                    <textarea name="content" id="editor" class="form-control" style="height: 150px;"></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ url()->previous() }}" class="btn btn-md btn-danger mx-3 my-5">Back</a>
                                    <button class="btn btn-md btn-primary mx-3 my-5">Create</button>
                                </div>
                            </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="{{ asset('template/js/file-upload.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        var editors = [];
        function createEditor( elementId, data ) {
            return ClassicEditor
                .create( document.querySelector( '#' + elementId ) )
                .then( editor => {
                editors[ elementId ] = editor;
                editor.setData( data ); // You should set editor data here
            } )
                .catch( err => console.error( err ) );
        }

        $(document).ready( function() {
            createEditor( 'editor', 'test' );
            createEditor( 'director1', 'test' );
        });
    </script> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.25.0/ckeditor.js" integrity="sha512-BmPSKm+8FYKMlrIpuWJqTRPMPDI+2Ea55rS3g4EVP+Grh2GaP1e9MFjUNOLPasnOfq6puWIlqmAFllMxuE52Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        // CKEDITOR.replace( 'content' );
        ClassicEditor
          .create( document.querySelector( '#editor' ))
          .then( editor => {
                console.log( editor );
          } )
          .catch( error => {
                console.error( error );
          } );
    </script>
    {{-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
    </script> --}}

    <script>
        $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("preview").src = e.target.result;
        };
        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
        });
    </script>
@endpush
