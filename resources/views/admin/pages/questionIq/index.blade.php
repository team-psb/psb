@extends('admin.layouts.app')

@section('title', 'Tes IQ')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Soal Tes IQ</h4>
                        <div class="row mb-4 ">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                    Hapus Semua
                                </button>
                                <div class="btn-group dropleft d-inline float-right">
                                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Buat Soal
                                    </a>
                                    <button class="btn btn-info ml-2">Impor Soal</button>
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
                                    <th>Kunci Jawaban</th>
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
                                    <td>a</td>
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
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Soal Tes IQ</h4>
                        <p class="card-description">
                            Silahkan lengkapi formulir untuk menambahkan data !
                        </p>
                        <form class="forms-sample">
                            <div class="form-group d-flex">
                                <div class="mx-2" style="width: 100%;">
                                    <label for="exampleTextarea1">Soal</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;"></textarea>    
                                </div>
                                <div class="mx-2" style="width: 100%;">
                                    <label>File upload</label>
                                    <img src="{{ asset('template/images/pita_avatar.png') }}" width="150px" alt="">
                                    <input type="file" name="img[]" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary py-2" type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <table class="w-100 mt-5" cellpadding="5" cellspacing="2">
                                <tr>
                                <th colspan="2">
                                    <h6>Jawaban</h6>
                                </th>
                                <th>
                                    <h6>Kunci Jawaban</h6>
                                </th>
                                </tr>
                                {{-- A --}}
                                <tr>
                                <td>
                                    <strong> A .</strong>
                                </td>
                                <td>
                                    <input type="text" style="height: 50px;" name="a" class="form-control"  value="">
                                    </input>
                                </td>
                                <td class="pl-5">
                                    <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="form-check-input" name="kunci_jawaban" value="a">
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                                    </label>
                                    </div>
                                </td>
                                </tr>
                                {{-- B --}}
                                <tr>
                                <td>
                                    <strong> B .</strong>
                                </td>
                                <td>
                                    <input type="text" style="height: 50px;" name="b" class="form-control"  value="">
                                    </input>
                                </td>
                                <td class="pl-5">
                                    <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="form-check-input" name="kunci_jawaban" value="b">
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                                    </label>
                                    </div>
                                </td>
                                </tr>
                                {{-- c --}}
                                <tr>
                                <td>
                                    <strong> C .</strong>
                                </td>
                                <td>
                                    <input type="text" style="height: 50px;" name="c" class="form-control"  value="">
                                    </input>
                                </td>
                                <td class="pl-5">
                                    <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="form-check-input" name="kunci_jawaban" value="c">
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                                    </label>
                                    </div>
                                </td>
                                </tr>
                                {{-- d --}}
                                <tr>
                                <td>
                                    <strong> D .</strong>
                                </td>
                                <td>
                                    <input type="text" style="height: 50px;" name="d" class="form-control"  value="">
                                    </input>
                                </td>
                                <td class="pl-5">
                                    <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="form-check-input" name="kunci_jawaban" value="d">
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                                    </label>
                                    </div>
                                </td>
                                </tr>
                                {{-- e --}}
                                <tr>
                                <td>
                                    <strong> E .</strong>
                                </td>
                                <td>
                                    <input type="text" style="height: 50px;" name="e" class="form-control"  value="">
                                    </input>
                                </td>
                                <td class="pl-5">
                                    <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                        <input type="radio" class="form-check-input" name="kunci_jawaban" value="e">
                                        <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                                    </label>
                                    </div>
                                </td>
                    
                                </tr>
                            </table>
                            <button type="submit" class="btn btn-primary me-2 mt-4">Kirimkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection