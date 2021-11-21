@extends('admin.layouts.app')

@section('title', 'Category')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Category</h4>
                        <p class="card-description">
                            Daftar Data Category
                        </p>
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
                                    No
                                </th>
                                <th>Category</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Tidak Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sangat Mampu</td>
                                <td>
                                    <span>
                                        <a href="#" class="btn py-2 btn-primary"><i class="mdi mdi-eye"></i></a>
                                        <a href="#" class="btn py-2 btn-success"><i class="mdi mdi-pencil"></i></a>
                                        <a href="#" class="btn py-2 btn-danger"><i class="mdi mdi-delete"></i></a>
                                    </span>
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