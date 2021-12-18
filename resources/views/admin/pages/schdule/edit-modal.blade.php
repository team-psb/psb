<form class="forms-sample" action="{{ route('schdules.update', $schdule->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="fs-6">Gambar Informasi</label>
        <div class="row">
            <div class="col-sm-6 mb-1">
                <img src="{{ asset('/storage/'.$schdule->image) }}" id="preview" class="img-fluid">
            </div>
            <div class="col-sm-6 mb-1">
                <div class="form-group">
                    <div class="pb-2">Pilih Thumbnail</div>
                    <input type="file" name="image">
                </div>
                <div class="form-group">
                    <label class="fs-6" for="exampleInputPassword4">Judul</label>
                    <input type="text" name="title" class="form-control" id="exampleInputPassword4" value="{{ $schdule->title }}">
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
        <label class="fs-6" for="exampleTextarea1">video</label>
        <textarea name="video" class="form-control" style="height: 150px;">{!! $schdule->video !!}</textarea>
    </div>
    <div class="form-group">
        <label class="fs-6" for="exampleTextarea1">Konten</label>
        <textarea name="content" id="editor" class="form-control" style="height: 150px;">{!! $schdule->content !!}</textarea>
    </div>
    <button type="submit" class="btn btn-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
</form>