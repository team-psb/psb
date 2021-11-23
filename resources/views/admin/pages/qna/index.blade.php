@extends('admin.layouts.app')

@section('title', 'QnA')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Question & Answer</h4>
                        <div class="row mb-4 ">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                    Hapus Semua
                                </button>
                                <div>
                                    <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Buat Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Action</th>
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
                                        <td>Karena ada agenda keluarga yang tiba-tiba?</td>
                                        <td>Rekan belajar saya tidak masuk belajar selama beberapa hari?</td>
                                        <td>
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-success align-items-center  py-2"><i class="icon-eye"></i> Detail</a>
                                                <a href="#" class="btn btn-primary  py-2"><i class="icon-pencil"></i> Edit</a>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="card-title">Buat Pertanyaan & Jawaban</h4>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <div class="input-group">
                            <textarea name="pertanyaan" class="form-control" style="height: 150px;"></textarea>
                            </div>
                        </div>
            
                        <div class="form-group">
                            <label>Jawaban</label>
                            <div class="input-group">
                            <textarea name="jawaban" class="form-control" style="height: 150px;"></textarea>
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