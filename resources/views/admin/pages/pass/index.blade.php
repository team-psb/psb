@extends('admin.layouts.app')

@section('title', 'Calon Santri Baru')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Calon Santri Baru</h4>
                        <p class="card-description">
                            Daftar Calon Santri Baru
                        </p>
                        <div class="row mb-4 ">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                    Hapus Semua
                                </button>
                                <div class="btn-group dropleft d-inline float-right">
                                    <a href="" class="btn btn-primary">
                                    Export Excel
                                    </a>
                                    <button class="btn btn-info ml-2">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Umur</th>
                                        <th>Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jacob</td>
                                        <td>20</td>
                                        <td>Sleman</td>
                                        <td>Yoygakarta</td>
                                        <td>
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</a>
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