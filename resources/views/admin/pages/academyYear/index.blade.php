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
                            <div class="d-flex justify-content-between">
                                <div class="dropdown">
                                    <button class="btn btn-danger dropdown-toggle text-white" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi Masal
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                                        <a class="dropdown-item" href="#">Lolos</a>
                                        <a class="dropdown-item" href="#">Tidak Lolos</a>
                                        <a class="dropdown-item" href="#">Hapus</a>
                                    </div>
                                </div>
                                <div class="btn-group dropleft d-inline float-right">
                                    {{-- <a href="" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="icon-plus"></i> Buat Data
                                    </a> --}}
                                    <a href="#mymodal"
                                        data-remote="{{ route('academies.create') }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        data-title="Buat Tahun Ajaran" 
                                        class="btn btn-info">
                                        <i class="icon-plus"></i> Buat Data
                                    </a>
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
                                    <th width="20">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($academies as $academy)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-danger">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked>
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $academy->id }}</td>
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
                                        {{-- <div class="btn-wrapper">
                                            <a href="#" class="btn btn-success align-items-center  py-2"><i class="icon-check"></i> Aktif</a>
                                            <a href="#" class="btn btn-warning align-items-center  py-2"><i class="icon-close"></i> Non Aktif</a>
                                            <a href="#" class="btn btn-primary  py-2"><i class="icon-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</a>
                                        </div> --}}
                                        <div class="d-flex">
                                            <a href="#mymodal"
                                                data-remote="{{ route('academies.edit', $academy->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Edit Tahun Ajaran {{ $academy->year }}" 
                                                class="btn ms-1 btn-primary  py-2"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                <i class="icon-pencil"></i> Edit
                                            </a>
                                            <form action="{{ route('academies.destroy', $academy->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn ms-1 btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</button>
                                            </form>
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

    {{-- <!-- Modal -->
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
    </div> --}}
@endsection