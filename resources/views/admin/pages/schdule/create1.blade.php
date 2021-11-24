@push('after-style')
    <div class=""></div>
@endpush
<form class="forms-sample" action="{{ route('schdules.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label>Gambar Informasi</label>
        <div class="col-sm-6 mb-1">
            <img src="https://placehold.it/100x100" id="preview" class="img-thumbnail" style="width: 307px ;height: 200px;">
        </div>
        <input type="file" name="image">
        {{-- <input type="file" name="image" class="file-upload-default"> --}}
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
        <textarea name="editor1 content" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>

@push('after-script')
    <script src="{{ asset('template/js/file-upload.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endpush