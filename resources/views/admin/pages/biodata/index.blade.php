@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Biodata Pendaftar</h4>
                        <p class="card-description">
                        Daftar Biodata Pendaftar
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
                                <th>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="checkall">
                                        </label>
                                    </div>
                                </th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No WA</th>
                                <th>Umur</th>
                                <th>Pendidikan</th>
                                <th>Hafalan</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input checkbox">
                                        </label>
                                    </div>
                                </td>
                                <td>1</td>
                                <td>Jacob</td>
                                <td>Jacob</td>
                                <td>Jacob</td>
                                <td>Photoshop</td>
                                <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-danger">Tidak Lolos</label></td>
                                <td>
                                    <div class="btn-wrapper">
                                        <a href="#" class="btn btn-success align-items-center  py-2"><i class="icon-eye"></i> Detail</a>
                                        <a href="#" class="btn btn-primary  py-2"><i class="icon-pencil"></i> Edit</a>
                                        <a href="#" class="btn btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            
                            {{-- <tr>
                                <td>Messsy</td>
                                <td>Flash</td>
                                <td class="text-danger"> 21.06% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-warning">In progress</label></td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>Premier</td>
                                <td class="text-danger"> 35.00% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-info">Fixed</label></td>
                            </tr>
                            <tr>
                                <td>Peter</td>
                                <td>After effects</td>
                                <td class="text-success"> 82.00% <i class="ti-arrow-up"></i></td>
                                <td><label class="badge badge-success">Completed</label></td>
                            </tr>
                            <tr>
                                <td>Dave</td>
                                <td>53275535</td>
                                <td class="text-success"> 98.05% <i class="ti-arrow-up"></i></td>
                                <td><label class="badge badge-warning">In progress</label></td>
                            </tr> --}}
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
