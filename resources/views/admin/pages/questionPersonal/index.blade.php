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
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete-forever"></i>Hapus Semua</a>
                                </div>
                            </div>
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    {{-- <a href="#" class="btn btn-primary text-white me-0"><i class="mdi mdi-database-plus"></i>Tambah data</a> --}}
                                    <a href="#mymodal"
                                    data-toggle="modal"
                                    data-target="#mymodal"
                                    data-remote="/informasi/create" 
                                    data-remote="" 
                                    class="btn .btn-icon .icon-left btn-info ml-2"> <i class="fas fa-plus"></i> Buat Data</a>
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
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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
                                <td>Saya memperoleh tawaran untuk dapat melanjutkan pendidikan dari sekolah.</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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
                                <td>3</td>
                                <td>Seorang teman merasa sangat bangga karena sudah berhasil bertemu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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
                                <td>4</td>
                                <td>Saya melihat sebuah penerimaan santri baru yang sangatlah saya butuhkan</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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
                                <td>5</td>
                                <td>Saya menjadi target kemarahan guru terhadap kesalahan yang</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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

@push('after-script')
<script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
        var button=$(e.relatedTarget);
        var modal =$(this);

        modal.find('.modal-body').load(button.data('remote'));
        modal.find('.modal-title').html(button.data('title'));
        });
    });
</script>
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
    </div>
    <div class="modal-body">
        <i class="fas fa-spiner fa-spin"></i>
    </div>
    </div>
</div>
</div>
@endpush