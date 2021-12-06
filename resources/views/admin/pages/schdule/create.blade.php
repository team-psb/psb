@extends('admin.layouts.app')

@section('title', 'Buat Informasi')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Buat Informasi</h4>
                            <form class="forms-sample" action="{{ route('schdules.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label>Gambar Informasi</label>
                                    <div class="col-sm-6 mb-1">
                                        <img src="https://placehold.it/100x100" id="preview" class="img-thumbnail" style="width: 307px ;height: 200px;">
                                    </div>
                                    <input type="file" name="image">
                                    {{-- <div class="input-group col-xs-12 w-25">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary py-2" type="button">Upload</button>
                                        </span>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Judul</label>
                                    <input type="text" name="title" class="form-control" id="exampleInputPassword4" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Konten</label>
                                    <textarea name="content" class="form-control" style="height: 150px;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
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
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
    </script> --}}
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