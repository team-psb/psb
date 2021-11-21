@extends('admin.layouts.app')

@section('title', 'Category')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Category</h4>
                        <p class="card-description">
                            Daftar Data Category
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete-forever"></i>Hapus Semua</a>
                                </div>
                            </div>
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    {{-- <a href="#" class="btn btn-primary text-white me-0"><i class="mdi mdi-database-plus"></i>Tambah data</a> --}}
                                    <button type="button" class="btn btn-primary btn-icon text-white me-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="mdi mdi-database-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-success text-white me-0"><i class="mdi mdi-file-export"></i>Export</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-hover" id="myTable">
                            <thead>
                            <tr>
                                <th>
                                    No
                                </th>
                                <th>Category</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tidak Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sangat Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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
                <h4 class="card-title">Buat Kategori Keluarga</h4>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <div class="input-group">
                                <input type="text" name="tahun" class="form-control phone-number" placeholder="contoh : mampu">
                            </div>
                        </div>
            
                        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
                        </div>
                    </form>
            </div>
        </div>
        </div>
    </div>
@endsection