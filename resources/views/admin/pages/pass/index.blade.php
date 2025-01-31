@extends('admin.layouts.app')

@section('title', 'Calon Santri Baru')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="border-bottom: 1px solid #c4c4c4;">
                            <h4 class="card-title pb-4">Calon Santri Baru</h4>
                            <div class="">
                                <span class="text-decoration-none fw-bold text-warning badge badge-warning"><i class="ti-star text-warning"></i>Sangat mampu</span>
                                <span class="text-decoration-none fw-bold text-warning badge badge-opacity-warning">Belum diseleksi</span>
                                <span class="text-decoration-none fw-bold text-success badge badge-opacity-success">Lolos</span>
                                <span class="text-decoration-none fw-bold text-danger badge badge-opacity-danger">Gagal</span>
                            </div>
                        </div>
                        <p class="card-description">
                            Daftar Calon Santri Baru
                        </p>
                        <div class="row mb-4 ">
                            {{-- message --}}
                            @if (session('success-create'))
                                <div class="alert alert-success alert-dismissible show fade">
                                    <div class="alert-body fw-bold">
                                        <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('success-create') }}
                                    </div>
                                </div>
                            @elseif(session('success-delete'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body fw-bold">
                                        <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('success-delete') }}
                                    </div>
                                </div>
                            @elseif(session('success-edit'))
                                <div class="alert alert-warning alert-dismissible show fade">
                                    <div class="alert-body fw-bold">
                                        <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                            <span>&times;</span>
                                        </button>
                                        {{ session('success-edit') }}
                                    </div>
                                </div>
                            @else
                            @endif
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
                                        <tr class="
                                            {{ $pass->status == null ? 'text-warning' : '' }}
                                            {{ $pass->status == 'lolos' ? 'text-success' : '' }}
                                            {{ $pass->status == 'tidak' ? 'text-danger' : '' }}
                                            fw-bold
                                        " >
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $pass->id }}]" value="{{ $pass->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a
                                                    href="#mymodal"
                                                    data-remote="{{ route('biodatas.show', $pass->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Data"
                                                    class="badge text-decoration-none fw-bold
                                                        {{ $pass->status == null ? 'text-warning badge-opacity-warning' : '' }}
                                                        {{ $pass->status == 'lolos' ? 'text-success badge-opacity-success' : '' }}
                                                        {{ $pass->status == 'tidak' ? 'text-danger badge-opacity-danger' : '' }}"
                                                >
                                                    @if ($pass->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family == 'sangat-mampu')
                                                        <i class="ti-star text-warning"></i>
                                                    @endif
                                                    {{ $pass->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}
                                                </a>
                                            </td>
                                            <td>{{ $pass->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->age }}</td>
                                            <td>{{ $pass->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->city->name }}</td>
                                            <td>{{ $pass->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->provincy->name }}</td>
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
                        </form>
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
            <h5 class="modal-title" id="exampleModalLabel">-- Filter Data Santri Lolos --</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET">
                    @method("GET")
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="fs-6">Pilih Gelombang</label>
                                    <select name="stage_id" class="form-select">
                                        <option value="" >-- pilih gelombang --</option>
                                        @foreach ($stages as $stage)
                                            <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                        @endforeach
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" formaction="{{ route('passes.filter-reset') }}" class="btn btn-danger">Atur Ulang</button>
                            <button type="submit" formaction="{{ route('passes.index') }}" class="btn btn-primary">Terapkan</button>
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

