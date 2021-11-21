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
                                <div class="btn-wrapper">
                                    <a href="/information/create" class="btn btn-primary text-white me-0"><i class="mdi mdi-database-plus"></i>Tambah data</a>
                                </div>
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
@endsection