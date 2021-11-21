@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Biodata Pendaftar</h4>
                        <p class="card-description">
                        Daftar Biodata Pendaftar
                        </p>
                        <div class="table-responsive">
                        <table id="myTable" class="table table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>No WA</th>
                                <th>Umur</th>
                                <th>Pendidikan</th>
                                <th>Hafalan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Jacob</td>
                                <td>Jacob</td>
                                <td>Jacob</td>
                                <td>Jacob</td>
                                <td>Photoshop</td>
                                <td class="text-danger"> 28.76% <i class="ti-arrow-down"></i></td>
                                <td><label class="badge badge-danger">Pending</label></td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class="mdi mdi-eye"></i></a>
                                    <a href="#" class="btn btn-success btn-sm"><i class="mdi mdi-pencil"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></a>
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