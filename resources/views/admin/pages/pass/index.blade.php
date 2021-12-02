@extends('admin.layouts.app')

@section('title', 'Calon Santri Baru')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Calon Santri Baru</h4>
                        <p class="card-description">
                            Daftar Calon Santri Baru
                        </p>
                        <div class="row mb-4 ">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-danger btn-icon-text p-2" id="del" type="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti-trash  btn-icon-prepend"></i> Hapus Semua
                                </button>
                                <div class="btn-group dropleft d-inline float-right">
                                    <a href="{{ route('passes.export') }}" class="btn btn-primary btn-icon-text p-2">
                                        <i class="ti-export btn-icon-prepend"></i> Export Excel
                                    </a>
                                    <button type="button" class="btn btn-info btn-icon-text p-2" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter Data">
                                        <i class="ti-filter  btn-icon-prepend"></i> Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                        <form method="POST">
                            @csrf
                            <button class="d-none" formaction="{{ route('passes.deleteAll') }}" id="del2"></button>
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
                                        <th>Umur</th>
                                        <th>Kabupaten</th>
                                        <th>Provinsi</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($passes as $pass)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $pass->id }}]" value="{{ $pass->id }}">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pass->user->biodataOne->full_name }}</td>
                                        <td>{{ $pass->user->biodataOne->age }}</td>
                                        <td>Sleman</td>
                                        <td>Yoygakarta</td>
                                        <td>
                                            <div class="btn-wrapper">
                                                <button formaction="{{ route('passes.delete', $pass->id) }}" class="btn ms-1 btn-danger btn-icon-text text-white p-2"><i class="icon-trash btn-icon-prepend"></i> Hapus</button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  Filter Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">-- Filter Data Penduduk --</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET">
                    @method("GET")
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Pilih Gelombang</label>
                                    <select name="stage_id" class="form-select">
                                        <option value="" >-- Pilih Gelombang --</option>
                                        @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                        </div>
                            
                        <div class="d-flex justify-content-between">
                            <button type="submit" formaction="{{ route('passes.index') }}" class="btn btn-primary">Terapkan</button>
                            <button type="submit" formaction="{{ route('passes.filter-reset') }}" class="btn btn-primary">Atur Ulang</button>
                        </div>
                        
                </form>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    $('#del').click(function(){
        $('#del2').click();
    });
</script>
@endpush