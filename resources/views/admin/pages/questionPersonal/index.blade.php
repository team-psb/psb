@extends('admin.layouts.app')

@section('title', 'Tes Kepribadian')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Soal Tes Kepribadian</h4>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-danger btn-sm d-flex align-items-center">
                            <i class="mdi mdi-delete-forever"></i> &nbsp; Hapus Semua
                        </button>
                        <button type="button" class="btn btn-primary btn-sm d-flex align-items-center">
                            <i class="mdi mdi-database-plus"></i> &nbsp; Tambah data
                        </button>
                        <button type="button" class="btn btn-success btn-sm d-flex align-items-center">
                            <i class="mdi mdi-database-plus"></i> &nbsp; Export
                        </button>
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
                            <th>Soal</th>
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
                            <td>Karena ada agenda keluarga yang tiba-tiba, rekan belajar saya tidak masuk belajar selama beberapa hari.</td>
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
                            <td>1</td>
                            <td>Saya memperoleh tawaran untuk dapat melanjutkan pendidikan dari sekolah.</td>
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
                            <td>1</td>
                            <td>Seorang teman merasa sangat bangga karena sudah berhasil bertemu</td>
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
                            <td>1</td>
                            <td>Saya melihat sebuah penerimaan santri baru yang sangatlah saya butuhkan</td>
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
                            <td>1</td>
                            <td>Saya menjadi target kemarahan guru terhadap kesalahan yang</td>
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