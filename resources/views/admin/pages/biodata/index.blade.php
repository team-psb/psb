@extends('admin.layouts.app')

@section('title', 'Biodata Pendaftar')

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
                                        <a class="dropdown-item" href="#" id="lolos">Lolos</a>
                                        <a class="dropdown-item" href="#" id="no-lolos">Tidak Lolos</a>
                                        <a class="dropdown-item" href="#" id="del">Hapus</a>
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
                        <form method="POST">
                            @csrf
                            <button class="d-none" formaction="{{ route('biodatas.passAll') }}" id="lolos2"></button>
                            <button class="d-none" formaction="{{ route('biodatas.nonpassAll') }}" id="no-lolos2"></button>
                            <button class="d-none" formaction="{{ route('biodatas.deleteAll') }}" id="del2"></button>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-success">
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
                                        @foreach ($biodatas as $biodata)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $biodata->id }}]" value="{{ $biodata->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $biodata->user->biodataOne->full_name }}</td>
                                            <td>{{ $biodata->user->biodataOne->no_wa }}</td>
                                            <td>{{ $biodata->user->biodataOne->age }}</td>
                                            <td>{{ $biodata->last_education }}</td>
                                            <td>{{ $biodata->memorization }}</td>
                                            <td>
                                                <span class="badge badge-{{ $biodata->status == 'lolos' ? 'success':'' }}{{ $biodata->status == 'tidak' ? 'danger':'' }}">{{ $biodata->status }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('biodatas.show', $biodata->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Detail Biodata {{ $loop->iteration }}" 
                                                        class="btn btn-success align-items-center  py-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                        <i class="icon-eye"></i> Detail
                                                    </a>
                                                    <a href="{{ route('biodatas.edit', $biodata->id) }}"
                                                        class="btn ms-1 btn-primary  py-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil"></i> Edit
                                                    </a>
                                                    <button formaction="{{ route('biodatas.delete', $biodata->id) }}" class="btn ms-1 btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <script>
        $('#lolos').click(function(){
            $('#lolos2').click();
        });
        $('#no-lolos').click(function(){
            $('#no-lolos2').click();
        });
        $('#del').click(function(){
            $('#del2').click();
        });
    </script>
@endpush