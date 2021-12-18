@extends('admin.layouts.app')

@section('title', 'Data Informasi')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Informasi</h4>
                            <div class="row mb-4 ">
                                {{-- feedback message --}}
                                @if (session('success-create'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body fw-bold">
                                            <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                            </button>
                                            {{ session('success-create') }}
                                        </div>
                                    </div>
                                @elseif(session('success-delete'))
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body fw-bold">
                                            <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                            </button>
                                            {{ session('success-delete') }}
                                        </div>
                                    </div>
                                @elseif(session('success-edit'))
                                    <div class="alert alert-warning alert-dismissible show fade">
                                        <div class="alert-body fw-bold">
                                            <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                            </button>
                                            {{ session('success-edit') }}
                                        </div>
                                    </div>
                                @else
                                @endif
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger btn-icon-text p-2" id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-trash btn-icon-perpend"></i> Hapus Semua
                                    </button>
                                    <div>
                                        {{-- <a href="#mymodal"
                                            data-remote="{{ route('schdules.create') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Informasi" 
                                            class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buat Data">
                                            Buat Data
                                        </a> --}}
                                        <a href="{{ route('schdules.create') }}" class="btn btn-info btn-icon-text p-2">
                                            <i class="ti-plus btn-icon-prepend"></i> Buat Data</a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <form method="POST">
                                    @csrf
                                    <button class="d-none" formaction="{{ route('schdules.deleteAll') }}" id="del2"></button>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check form-check-success">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input" id="checkall">
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Konten</th>
                                                <th width="10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($schdules as $schdule)
                                                <tr>
                                                    <td>
                                                        <div class="form-check form-check-success">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $schdule->id }}]" value="{{ $schdule->id }}">
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ Str::limit($schdule->title, 50, '...') }}</td>
                                                    <td>{!! Str::limit($schdule->content, 50, '...') !!}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="#mymodal"
                                                                data-remote="{{ route('schdules.show', $schdule->id) }}"
                                                                data-toggle="modal"
                                                                data-target="#mymodal"
                                                                data-title="Detail Informasi {{ $loop->iteration }}" 
                                                                class="btn btn-success btn-icon-text p-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                                <i class="icon-eye btn-icon-prepend"></i> Detail
                                                            </a>
                                                            {{-- <a href="#mymodal"
                                                                data-remote="{{ route('schdules.edit', $schdule->id) }}"
                                                                data-toggle="modal"
                                                                data-target="#mymodal"
                                                                data-title="Edit Informasi {{ $loop->iteration }}" 
                                                                class="btn ms-1 btn-primary  btn-icon-text p-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                                <i class="icon-pencil btn-icon-prepend"></i> Edit
                                                            </a> --}}

                                                            <a href="{{ route('schdules.edit', $schdule->id) }}"  class="btn ms-1 btn-primary  btn-icon-text p-2">
                                                                <i class="icon-pencil btn-icon-prepend"></i> Edit
                                                            </a>
                                                            <button formaction="{{ route('schdules.delete', $schdule->id) }}" class="btn ms-1 btn-danger  me-0  btn-icon-text p-2">
                                                                <i class="icon-trash btn-icon-prepend"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4 class="card-title">Buat Informasi</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label>Gambar Informasi</label>
                            <div class="d-flex">
                                <div class="col-sm-6 mb-1">
                                    <img src="https://placehold.it/100x100" id="preview" class="img-thumbnail" style="width: 320px ;height: 200px;">
                                </div>
                                <div class="">
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary py-2" type="button">Upload</button>
                                        </span>
                                    </div>
                                    {{-- <input type="file" name="" id=""> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword4">Judul</label>
                            <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Judul">
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Konten</label>
                            <textarea name="editor1" class="form-control p-2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="{{ asset('template/js/file-upload.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    {{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> --}}
    {{-- <script>
        CKEDITOR.replace( 'editor1' );
    </script> --}}
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>

    <script>
        $('#del1').click(function(){
            $('#del2').click();
        })
    </script>
@endpush