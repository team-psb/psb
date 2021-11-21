@extends('admin.layouts.app')

@section('title', 'QnA')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Question & Answer</h4>
                        <div class="d-flex justify-content-between">
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete-forever"></i>Hapus Semua</a>
                                </div>
                            </div>
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-primary text-white me-0"><i class="mdi mdi-database-plus"></i>Tambah data</a>
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
                                <td class="qna">Karena ada agenda keluarga yang tiba-tiba, rekan belajar saya tidak masuk belajar selama beberapa hari?</td>
                                <td class="qna">Karena ada agenda keluarga yang tiba-tiba, rekan belajar saya tidak masuk belajar selama beberapa hari?</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check form-check-danger">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" checked>
                                        </label>
                                    </div>
                                </td>
                                <td>2</td>
                                <td class="qna">Karena ada agenda keluarga yang tiba-tiba, rekan belajar saya tidak masuk belajar selama beberapa hari?</td>
                                <td class="qna">Karena ada agenda keluarga yang tiba-tiba, rekan belajar saya tidak masuk belajar selama beberapa hari?</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-info btn-sm">
                                        <i class="mdi mdi-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <i class="mdi mdi-delete"></i>
                                    </button>
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