@extends('admin.layouts.app')

@section('title', 'Tahun Ajaran')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Tahun Ajaran</h4>
                        <div class="d-flex justify-content-between">
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle text-white" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Aksi Masal
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                                            <a class="dropdown-item" href="#">Aktif</a>
                                            <a class="dropdown-item" href="#">Tidak Aktif</a>
                                            <a class="dropdown-item" href="#">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="home-tab">
                                <button type="button" class="btn btn-primary btn-icon text-white me-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="mdi mdi-database-plus"></i>
                                </button>
                            </div>
                            <div class="home-tab">
                                <div class="btn-wrapper">
                                    <a href="#" class="btn btn-success text-white me-0"><i class="mdi mdi-file-export"></i>Export</a>
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
                                    <th>Tahun Ajaran</th>
                                    <th>Gelombang</th>
                                    <th>Status</th>
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
                                    <td>2022</td>
                                    <td>Gel-1</td>
                                    <td><label class="badge badge-success">Aktif</label></td>
                                    <td class="d-flex">
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-success text-white me-0"><i class="mdi mdi-check"></i> Aktif</a>
                                            </div>
                                        </div>
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-info text-white me-0"><i class="mdi mdi-close"></i> Non-Aktif</a>
                                            </div>
                                        </div>
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-warning text-white me-0"><i class="mdi mdi-pencil"></i> Edit</a>
                                            </div>
                                        </div>
                                        <div class="home-tab">
                                            <div class="btn-wrapper">
                                                <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete"></i> Hapus</a>
                                            </div>
                                        </div>
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
                                <td>2022</td>
                                <td>Gel-2</td>
                                <td><label class="badge badge-warning">Tidak Aktif</label></td>
                                <td class="d-flex">
                                    <div class="home-tab">
                                        <div class="btn-wrapper">
                                            <a href="#" class="btn btn-success text-white me-0"><i class="mdi mdi-check"></i> Aktif</a>
                                        </div>
                                    </div>
                                    <div class="home-tab">
                                        <div class="btn-wrapper">
                                            <a href="#" class="btn btn-info text-white me-0"><i class="mdi mdi-close"></i> Non-Aktif</a>
                                        </div>
                                    </div>
                                    <div class="home-tab">
                                        <div class="btn-wrapper">
                                            <a href="#" class="btn btn-warning text-white me-0"><i class="mdi mdi-pencil"></i> Edit</a>
                                        </div>
                                    </div>
                                    <div class="home-tab">
                                        <div class="btn-wrapper">
                                            <a href="#" class="btn btn-danger text-white me-0"><i class="mdi mdi-delete"></i> Hapus</a>
                                        </div>
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
                <h4 class="card-title">Buat Tahun Ajaran</h4>
                <form action="" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Tahun ajaran</label>
                            <div class="input-group">
                                <input type="number" name="tahun" class="form-control phone-number" placeholder="contoh : 2020">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Gelomabang</label>
                            <select class="form-control select2" name="gelombang">
                                <option value="gel-1" >Gelomabang 1</option>
                                <option value="gel-2">Gelomabang 2</option>
                                <option value="gel-3">Gelomabang 3</option>
                                <option value="gel-4" >Gelomabang 4</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Status</label>
                            <div class="ps-4">
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="aktif"
                                >
                                <label class="form-check-label" for="inlineRadio1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="tidak-aktif"
                                >
                                <label class="form-check-label" for="inlineRadio2"
                                >Tidak Aktif</label>
                                </div>
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