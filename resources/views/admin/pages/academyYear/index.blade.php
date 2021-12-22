@extends('admin.layouts.app')

@section('title', 'Tahun Ajaran')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Tahun Ajaran</h4>
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
                                        <a class="dropdown-item cursor" href="#" id="aktif1">Aktif</a>
                                        <a class="dropdown-item cursor" href="#" id="non-aktif1">Tidak Aktif</a>
                                        <a class="dropdown-item cursor" href="#" id="del1">Hapus</a>
                                    </div>
                                </div>
                                <div class="btn-group dropleft d-inline float-right">
                                    <a href="#mymodal"
                                        data-remote="{{ route('academies.create') }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        data-title="Buat Tahun Ajaran" 
                                        class="btn btn-info btn-icon-text p-2">
                                        <i class="icon-plus btn-icon-prepend"></i> Buat Data
                                    </a>
                                </div>
                            </div>
                        </div>
                        <form method="POST">
                            @csrf
                            <button class="d-none" formaction="{{ route('academies.activeAll') }}" id="aktif2"></button>
                            <button class="d-none" formaction="{{ route('academies.nonActiveAll') }}" id="non-aktif2"></button>
                            <button class="d-none" formaction="{{ route('academies.allDelete') }}" id="del2"></button>
                            <div class="table-responsive">
                                <table class="table table-hover">
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
                                            <th>Tahun Ajaran</th>
                                            <th>Gelombang</th>
                                            <th>Status</th>
                                            <th width="20">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($academies as $academy)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $academy->id }}]" value="{{ $academy->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $academy->year }}</td>
                                            <td>{{ $academy->stage->name }}</td>
                                            <td>
                                                @if ($academy->is_active == true)
                                                    <label class="badge badge-success">Aktif</label>
                                                @else 
                                                    <label class="badge badge-danger">Tidak-Aktif</label>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('academies.status', $academy->id) }}?is_active=1"
                                                        class="btn btn-success btn-icon-text p-2">
                                                            <i class="icon-check btn-icon-prepend"></i> Aktif
                                                    </a>
                                                    <a href="{{ route('academies.status', $academy->id) }}?is_active=0"
                                                        class="btn btn-warning ms-1 btn-icon-text p-2">
                                                            <i class="icon-close btn-icon-prepend"></i> Non Aktif
                                                    </a>
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('academies.edit', $academy->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Edit Tahun Ajaran {{ $academy->year }}" 
                                                        class="btn ms-1 btn-primary  btn-icon-text p-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil btn-icon-prepend"></i> Edit
                                                    </a>
                                                    <button formaction="{{ route('academies.delete', $academy->id) }}" class="btn ms-1 btn-danger me-0  btn-icon-text p-2">
                                                        <i class="icon-trash btn-icon-prepend"></i> Hapus
                                                    </button>
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
        $("#del1").click(function(){
            $("#del2").click();
        });
        $("#aktif1").click(function(){
            $("#aktif2").click();
        });
        $("#non-aktif1").click(function(){
            $("#non-aktif2").click();
        });
    </script>
    <script>
        $(document).ready(function() {
            $(".mySelectClass").multiselect({
                includeSelectAllOption: true
            });
        });
    </script>    
@endpush