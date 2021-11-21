@extends('admin.layouts.app')

@section('title', 'Data Informasi')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Informasi</h4>
                        <div class="d-flex justify-content-between">
                            <div class="home-tab">
                                <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-danger text-white"><i class="mdi mdi-delete-forever"></i>Hapus Semua</a>
                                </div>
                            </div>
                            </div>
                            <div class="home-tab">
                                {{-- <div class="btn-wrapper">
                                    <a href="/information/create" class="btn btn-primary text-white me-0"><i class="mdi mdi-database-plus"></i>Tambah data</a>
                                </div> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-icon text-white me-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="mdi mdi-database-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked>
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
                                <tr>
                                    <td>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>1</td>
                                    <td>Cara Mengikuti Tes Tahap 1 </td>
                                    <td>Berikut ini cara mengubah password jika ada lupa atau ingin ganti.</td>
                                    <td class="d-flex">
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-info text-white me-2"><i class="mdi mdi-eye"></i> Detail</a>
                                            </div>
                                        </div>
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-warning text-white me-2"><i class="mdi mdi-pencil"></i> Edit</a>
                                            </div>
                                        </div>
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete"></i> Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                                    <img src="https://placehold.it/100x100" id="preview" class="img-thumbnail" style="width: 200px ;height: 160px;">
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
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endpush