@extends('admin.layouts.app')

@section('title', 'Nilai Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Nilai Pendaftar</h4>
                        <p class="card-description">
                        Daftar Nilai Pendaftar
                        </p>
                        <div class="row mb-4 ">
                            <div class="d-flex justify-content-between">
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle text-white" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi Masal
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                                        <a class="dropdown-item" href="#">Lolos</a>
                                        <a class="dropdown-item" href="#">Tidak Lolos</a>
                                        <a class="dropdown-item" href="#">Hapus</a>
                                    </div>
                                </div>
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
                                        <th>Nilai Iq</th>
                                        <th>Nilai Kepribadian</th>
                                        <th>Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jacob</td>
                                        <td class="text-success"> 73 <i class="ti-arrow-up"></i></td>
                                        <td class="text-success"> 183 <i class="ti-arrow-up"></i></td>
                                        <td><label class="badge badge-success">Lolos</label></td>
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