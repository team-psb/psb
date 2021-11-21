@extends('admin.layouts.app')

@section('title', 'Video Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Video Pendaftar</h4>
                        <p class="card-description">
                        Daftar Video Pendaftar
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Link Video</th>
                                        <th>Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jacob</td>
                                        <td class="text-success"> <a href="https://youtu.be/Yjwvi6R4yNw">https://youtu.be/Yjwvi6R4yNw</a></td>
                                        <td><label class="badge badge-success">Lolos</label></td>
                                        <td>
                                            <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
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