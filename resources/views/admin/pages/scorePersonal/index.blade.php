@extends('admin.layouts.app')

@section('title', 'Nilai Tes Kepribadian Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Nilai Pendaftar</h4>
                        <p class="card-description">
                        Daftar Nilai Pendaftar
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
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle text-white p-2" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi Masal
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                                        <a class="dropdown-item" href="#" id="lolos">Lolos</a>
                                        <a class="dropdown-item" href="#" id="no-lolos">Tidak Lolos</a>
                                        <a class="dropdown-item" href="#" id="del">Hapus</a>
                                    </div>
                                </div>
                                <div class="btn-group dropleft d-inline float-right">
                                    <a href="{{ route('scorePersonal.export') }}" class="btn btn-primary btn-icon-text p-2">
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
                            <button class="d-none" formaction="{{ route('scorePersonal.passAll') }}" id="lolos2"></button>
                            <button class="d-none" formaction="{{ route('scorePersonal.nonpassAll') }}" id="no-lolos2"></button>
                            <button class="d-none" formaction="{{ route('scorePersonal.deleteAll') }}" id="del2"></button>
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
                                            {{-- <th>Nilai Iq</th> --}}
                                            <th>Nilai Kepribadian</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($scores as $score)
                                        <tr class="
                                            {{ $score->status == null ? 'text-warning' : '' }}
                                            {{ $score->status == 'lolos' ? 'text-success' : '' }}
                                            {{ $score->status == 'tidak' ? 'text-danger' : '' }}
                                            fw-bold
                                        " >
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $score->id }}]" value="{{ $score->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a 
                                                    href="#mymodal"
                                                    data-remote="{{ route('biodatas.show', $score->user->biodataTwo->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Data" 
                                                    class="badge text-decoration-none fw-bold
                                                        {{ $score->status == null ? 'text-warning badge-opacity-warning' : '' }}
                                                        {{ $score->status == 'lolos' ? 'text-success badge-opacity-success' : '' }}
                                                        {{ $score->status == 'tidak' ? 'text-danger badge-opacity-danger' : '' }}"
                                                >
                                                    @if ($score->user->biodataOne->family == 'sangat-mampu')
                                                        <i class="ti-star text-warning"></i>
                                                    @endif
                                                    {{ $score->user->biodataOne->full_name }}
                                                </a>
                                            </td>
                                            {{-- <td class="text-success"> {{ $score->score_question_iq }}</td> --}}
                                            <td class="text-success"> {{ $score->score_question_personal }}</td>
                                            <td>
                                                <span class="badge badge-{{ $score->status == 'lolos' ? 'success':'' }}{{ $score->status == 'tidak' ? 'danger':'' }}">{{ $score->status }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    @if ($score->status == null)
                                                        <a href="{{ route('scorePersonal.status', $score->id) }}?status=lolos"
                                                            class="btn btn-success btn-icon-text p-2">
                                                                <i class="icon-check btn-icon-prepend"></i> Lolos
                                                        </a>
                                                        <a href="{{ route('scorePersonal.status', $score->id) }}?status=tidak"
                                                            class="btn btn-warning mx-1 btn-icon-text p-2">
                                                                <i class="icon-close btn-icon-prepend"></i> Tidak Lolos
                                                        </a>
                                                    @endif
                                                    <button formaction="{{ route('scorePersonal.delete', $score->id) }}" class="btn ms-1 btn-danger btn-icon-text text-white p-2"><i class="icon-trash btn-icon-prepend"></i> Hapus</button>
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
            <h5 class="modal-title" id="exampleModalLabel">-- Filter Score Kepribadian --</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET">
            
                    <div class="row">
                        {{-- <div class="col">
                            <div class="row">
                                <div class="col">
                                    <label>Nilai Tes Iq</label>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="number" class="form-control" name="score_test_iq_min" placeholder="MIN" value="{{ request()->get('score_test_iq_min') }}">
                                        </div>
                                    </div> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Maksimal</label>
                                            <input type="number" class="form-control" name="score_test_iq_max" placeholder="MAX" value="{{ request()->get('score_test_iq_max') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label>Nilai Tes Kepribadian</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                        <label>Minimal</label>
                                        <input type="number" class="form-control" name="score_test_personal_min" placeholder="MIN" value="{{ request()->get('score_test_personal_min') }}">
                                        </div>
                                    </div> 
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Maksimal</label>
                                            <input type="number" class="form-control" name="score_test_personal_max" placeholder="MAX" value="{{ request()->get('score_test_personal_max') }}">
                                        </div>
                                    </div>
                                </div>
                    
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
                            
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" formaction="{{ route('scorePersonal.filter-reset') }}" class="btn btn-danger">Atur Ulang</button>
                            <button type="submit" formaction="{{ route('scorePersonal.index') }}" class="btn btn-primary">Terapkan</button>
                        </div>
                        
                </form>
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