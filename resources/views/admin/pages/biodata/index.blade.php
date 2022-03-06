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
                                    <button type="button" class="btn btn-success btn-icon-text p-2" data-toggle="modal" data-target="#exampleModalIn">
                                        <i class="ti-eye btn-icon-prepend"></i> View wide
                                    </button>
                                    <a href="{{ route('biodatas.export') }}" class="btn btn-primary btn-icon-text p-2">
                                        <i class="ti-export btn-icon-prepend"></i> Export Excel
                                    </a>
                                    <button type="button" class="btn btn-info btn-icon-text p-2" data-toggle="modal" data-target="#exampleModalOut"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Filter Data">
                                        <i class="ti-filter  btn-icon-prepend"></i> Filter
                                    </button>
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
                                            <th>Cita Cita</th>
                                            <th>Prestasi</th>
                                            <th>Skill</th>
                                            <th>Hafalan</th>
                                            <th>Gamer</th>
                                            <th>Keluarga</th>
                                            <th>Orang Tua</th>
                                            <th>Penghasilan Ortu</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($biodatas as $biodata)
                                        <tr class="
                                            {{ $biodata->status == null ? 'text-warning' : '' }}
                                            {{ $biodata->status == 'lolos' ? 'text-success' : '' }}
                                            {{ $biodata->status == 'tidak' ? 'text-danger' : '' }}
                                            fw-bold
                                            " >
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $biodata->id }}]" value="{{ $biodata->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a 
                                                    href="#mymodal"
                                                    data-remote="{{ route('biodatas.show', $biodata->user->biodataOne->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Data" 
                                                    class="badge text-decoration-none fw-bold
                                                        {{ $biodata->status == null ? 'text-warning badge-opacity-warning' : '' }}
                                                        {{ $biodata->status == 'lolos' ? 'text-success badge-opacity-success' : '' }}
                                                        {{ $biodata->status == 'tidak' ? 'text-danger badge-opacity-danger' : '' }}"
                                                >
                                                    @if ($biodata->user->biodataOne->family == 'sangat-mampu')
                                                        <i class="ti-star text-warning"></i>
                                                    @endif
                                                    {{ $biodata->user->biodataOne->full_name }}
                                                </a>
                                            </td>
                                            <td>{{ $biodata->user->biodataOne->no_wa }}</td>
                                            <td>{{ $biodata->user->biodataOne->age }}</td>
                                            <td>{{ $biodata->last_education }}</td>
                                            <td>{{ $biodata->goal }}</td>
                                            <td>{{ $biodata->achievment }}</td>
                                            <td>{{ $biodata->skill }}</td>
                                            <td>{{ $biodata->memorization }}</td>
                                            <td>{{ $biodata->gamer }}</td>
                                            <td>{{ $biodata->user->biodataOne->family }}</td>
                                            <td>{{ $biodata->parent }}</td>
                                            <td class="fw-bold">{{ $biodata->parent_income }}</td>
                                            <td>
                                                <span class="fw-bold  badge badge-{{ $biodata->status == 'lolos' ? 'success':'' }}{{ $biodata->status == 'tidak' ? 'danger':'' }}">{{ $biodata->status }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    @if ($biodata->status == null)
                                                        @if ($biodata->user->biodataOne->family == 'sangat-mampu')
                                                            <a href="{{ route('biodatas.status', $biodata->id) }}?status=lolos"
                                                                class="btn btn-success btn-icon-text p-2">
                                                                    <i class="icon-check btn-icon-prepend"></i> Lolos (Interview)
                                                            </a>
                                                        @else
                                                            <a href="{{ route('biodatas.status', $biodata->id) }}?status=lolos"
                                                                class="btn btn-success btn-icon-text p-2">
                                                                    <i class="icon-check btn-icon-prepend"></i> Lolos
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('biodatas.status', $biodata->id) }}?status=tidak"
                                                            class="btn btn-warning mx-1 btn-icon-text p-2">
                                                                <i class="icon-close btn-icon-prepend"></i> Tidak Lolos
                                                        </a>
                                                    @endif
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('biodatas.show', $biodata->user->biodataOne->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Detail Biodata {{ $biodata->full_name }}" 
                                                        class="btn btn-info btn-icon-text  p-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                        <i class="icon-eye btn-icon-prepend"></i> Detail
                                                    </a>
                                                    <a href="{{ route('biodatas.edit', $biodata->id) }}"
                                                        class="btn ms-1 btn-primary btn-icon-text  p-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil btn-icon-prepend"></i> Edit
                                                    </a>
                                                    <button formaction="{{ route('biodatas.delete', $biodata->id) }}" class="btn btn-danger btn-icon-text  p-2 ms-1"><i class="icon-trash btn-icon-prepend"></i> Hapus</button>
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

<!--  modal filter -->
<div class="modal fade" id="exampleModalOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Filter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form method="GET">

                <div class="form-group">
                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label class="fs-6" for="exampleInputEmail1">Umur</label>
                            <select name="age" class="form-select">
                                <option selected value="{{ null }}">-- umur --</option>
                                <option value="16" {{ request()->get('age') == '16' ? 'selected' :''  }}>16 Tahun</option>
                                <option value="17" {{ request()->get('age') == '17' ? 'selected' :''  }}>17 Tahun</option>
                                <option value="18" {{ request()->get('age') == '18' ? 'selected' :''  }}>18 Tahun</option>
                                <option value="19" {{ request()->get('age') == '19' ? 'selected' :''  }}>19 Tahun</option>
                                <option value="20" {{ request()->get('age') == '20' ? 'selected' :''  }}>20 Tahun</option>
                                <option value="21" {{ request()->get('age') == '21' ? 'selected' :''  }}>21 Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label class="fs-6" for="exampleInputEmail1">Kondisi Keluarga</label>
                        <select name="family" class="form-select">
                            <option selected value="{{ null }}">-- Kondisi Keluarga --</option>
                            <option value="sangat-mampu" {{ request()->get('family') == 'sangat-mampu' ? 'selected' :''  }}>Keluarga Sangat Mampu</option>
                            <option value="mampu" {{ request()->get('family') == 'mampu' ? 'selected' :''  }}>Keluarga Mampu</option>
                            <option value="tidak-mampu" {{ request()->get('family') == 'tidak-mampu' ? 'selected' :''  }}>Keluarga Tidak Mampu</option>
                        </select>
                        </div>
                    </div>  
                    </div>

                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                        <label class="fs-6" for="exampleInputEmail1">Orang Tua</label>
                        <select name="parent" class="form-select">
                            <option selected value="{{ null }}">-- orang tua --</option>
                            <option value="lengkap" {{ request()->get('parent') == 'lengkap' ? 'selected' :''  }}>Lengkap</option>
                            <option value="ayah" {{ request()->get('parent') == 'ayah' ? 'selected' :''  }}>Ayah</option>
                            <option value="ibu" {{ request()->get('parent') == 'ibu' ? 'selected' :''  }}>Ibu</option>
                            <option value="yatim-piatu" {{ request()->get('parent') == 'yatim-piatu' ? 'selected' :''  }}>Yatim Piatu</option>
                        </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                        <label class="fs-6" for="exampleInputEmail1">Pendidikan Terakhir</label>
                        <select name="last_education" class="form-select">
                            <option selected value="{{ null }}">-- Pendidikan --</option>
                            <option value="SD" {{ request()->get('last_education') == 'SD' ? 'selected' :''  }}>SD Sederajat</option>
                            <option value="SMP" {{ request()->get('last_education') == 'SMP' ? 'selected' :''  }}>SMP Sederajat</option>
                            <option value="SMA" {{ request()->get('last_education') == 'SMA' ? 'selected' :''  }}>SMA Sederajat</option>
                        </select>
                        </div>
                    </div>
                    </div>

                    <div class="row">

                    <div class="col">
                        <div class="form-group">
                        <label class="form-label fs-6">Perokok</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-biodata">
                                <input class="form-check-input" type="radio" name="smoker" value="iya" class="selectgroup-input" {{ request()->get('smoker') == 'iya' ? 'checked' :''  }}>
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-check"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input class="form-check-input" type="radio" name="smoker" value="tidak" {{ request()->get('smoker') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-close"></i></span>
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <label class="form-label fs-6">Punya Pacar</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input class="form-check-input" type="radio" name="girlfriend" value="iya" class="selectgroup-input" {{ request()->get('girlfriend') == 'iya' ? 'checked' :''  }}>
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-check"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input class="form-check-input" type="radio" name="girlfriend" value="tidak" {{ request()->get('girlfriend') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-close"></i></span>
                            </label>
                        </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                        <label class="form-label fs-6">Gamer</label>
                        <div class="selectgroup selectgroup-pills">
                            <label class="selectgroup-item">
                                <input class="form-check-input" type="radio" name="gamer" value="iya" class="selectgroup-input" {{ request()->get('gamer') == 'iya' ? 'checked' :''  }}>
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-check"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input class="form-check-input" type="radio" name="gamer" value="tidak" {{ request()->get('gamer') == 'tidak' ? 'checked' :''  }} class="selectgroup-input">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="ti-close"></i></span>
                            </label>
                        </div>
                        </div>
                    </div>

                    </div>

                    <div class="row">
                    <div class="col">
                        <div class="row">
                        <div class="col">
                            <label class="fs-6">Pendapatan Orang Tua</label>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col">
                            <div class="form-group">
                            <label class="fs-6">Minimal</label>
                            <input type="number" class="form-control" name="parent_income_min" placeholder="Rp." value="{{ request()->get('parent_income_min') }}">
                            </div>
                        </div> 
                        <div class="col">
                            <div class="form-group">
                            <label class="fs-6">Maksimal</label>
                            <input type="number" class="form-control" name="parent_income_max" placeholder="Rp." value="{{ request()->get('parent_income_max') }}">
                            </div>
                        </div>
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
                <div class="d-flex justify-content-between">
                    <button type="submit"  formaction="{{ route('biodatas.filter-reset') }}"  class="btn btn-danger float-right">Atur Ulang</button>    
                    <button type="submit" formaction="{{ route('biodatas.index') }}" class="btn btn-primary">Terapkan</button>
                </div>    
            </form>
        </div>
        {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
        </div>
    </div>
</div>

{{-- modal full --}}
<div class="modal fade" id="exampleModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen m-0" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Biodata</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    @csrf
                    <button class="d-none" formaction="{{ route('biodatas.passAll') }}" id="lolos4"></button>
                    <button class="d-none" formaction="{{ route('biodatas.nonpassAll') }}" id="no-lolos4"></button>
                    <button class="d-none" formaction="{{ route('biodatas.deleteAll') }}" id="del4"></button>
                    <div class="table-responsive">
                        <div class="dropdown mb-3">
                            <button class="btn btn-danger dropdown-toggle text-white p-2" type="button" id="dropdownMenuSizeButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Aksi Masal
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton2">
                                <a class="dropdown-item" href="#" id="lolos3">Lolos</a>
                                <a class="dropdown-item" href="#" id="no-lolos3">Tidak Lolos</a>
                                <a class="dropdown-item" href="#" id="del3">Hapus</a>
                            </div>
                        </div>
                        <table id="myTable1" class="table-2 table-hover" style="font-size: 10px">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="checkall1">
                                            </label>
                                        </div>
                                    </th>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>No WA</th>
                                    <th>Umur</th>
                                    <th>Pendidikan</th>
                                    <th>Cita Cita</th>
                                    <th>Prestasi</th>
                                    <th>Skill</th>
                                    <th>Hafalan</th>
                                    <th>Gamer</th>
                                    <th>Keluarga</th>
                                    <th>Orang Tua</th>
                                    <th>Penghasilan Ortu</th>
                                    <th>Status</th>
                                    {{-- <th width="10%">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biodataswide as $biodata)
                                <tr class="
                                    {{ $biodata->status == null ? 'text-warning' : '' }}
                                    {{ $biodata->status == 'lolos' ? 'text-success' : '' }}
                                    {{ $biodata->status == 'tidak' ? 'text-danger' : '' }}
                                    fw-bold
                                    " >
                                    <td>
                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $biodata->id }}]" value="{{ $biodata->id }}">
                                            </label>
                                        </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a 
                                            href="#mymodal"
                                            data-remote="{{ route('biodatas.show', $biodata->id) }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Detail Data" 
                                            class="badge text-decoration-none fw-bold
                                                {{ $biodata->status == null ? 'text-warning badge-opacity-warning' : '' }}
                                                {{ $biodata->status == 'lolos' ? 'text-success badge-opacity-success' : '' }}
                                                {{ $biodata->status == 'tidak' ? 'text-danger badge-opacity-danger' : '' }}"
                                        >
                                            @if ($biodata->user->biodataOne->family == 'sangat-mampu')
                                                <i class="ti-star text-warning"></i>
                                            @endif
                                            {{ $biodata->user->biodataOne->full_name }}
                                        </a>
                                    </td>
                                    <td>{{ $biodata->user->biodataOne->no_wa }}</td>
                                    <td>{{ $biodata->user->biodataOne->age }}</td>
                                    <td>{{ $biodata->last_education }}</td>
                                    <td>{{ $biodata->goal }}</td>
                                    <td style="width: 200px">{{ $biodata->achievment }}</td>
                                    <td style="width: 200px">{{ $biodata->skill }}</td>
                                    <td>{{ $biodata->memorization }}</td>
                                    <td>{{ $biodata->gamer }}</td>
                                    <td>{{ $biodata->user->biodataOne->family }}</td>
                                    <td>{{ $biodata->parent }}</td>
                                    <td class="fw-bold" style="width: 150px">{{ $biodata->parent_income }}</td>
                                    <td>
                                        <span class="fw-bold  badge badge-{{ $biodata->status == 'lolos' ? 'success':'' }}{{ $biodata->status == 'tidak' ? 'danger':'' }}">{{ $biodata->status }}</span>
                                    </td>
                                    {{-- <td>
                                        <div class="d-flex justify-content-end">
                                            @if ($biodata->status == null)
                                                <a href="{{ route('biodatas.status', $biodata->id) }}?status=lolos"
                                                    class="btn btn-success btn-icon-text p-2">
                                                        <i class="icon-check btn-icon-prepend"></i> Lolos
                                                </a>
                                                <a href="{{ route('biodatas.status', $biodata->id) }}?status=tidak"
                                                    class="btn btn-warning mx-1 btn-icon-text p-2">
                                                        <i class="icon-close btn-icon-prepend"></i> Tidak Lolos
                                                </a>
                                            @endif
                                            <a href="#mymodal"
                                                data-remote="{{ route('biodatas.show', $biodata->id) }}"
                                                data-toggle="modal"
                                                data-target="#mymodal"
                                                data-title="Detail Biodata {{ $loop->iteration }}" 
                                                class="btn btn-info btn-icon-text  p-2"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                <i class="icon-eye btn-icon-prepend"></i> Detail
                                            </a>
                                            <a href="{{ route('biodatas.edit', $biodata->id) }}"
                                                class="btn ms-1 btn-primary btn-icon-text  p-2"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                <i class="icon-pencil btn-icon-prepend"></i> Edit
                                            </a>
                                            <button formaction="{{ route('biodatas.delete', $biodata->id) }}" class="btn btn-danger btn-icon-text  p-2 ms-1"><i class="icon-trash btn-icon-prepend"></i> Hapus</button>
                                        </div>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('after-style')
    <style>
        .table-2 th{
            padding: 2px 20px;
        }
        .table-2 td{
            padding: 2px 20px;
        }
    </style>
@endpush

@push('after-script')
    <script>
        $(document).ready( function () {
        $('#myTable1').DataTable({
            lengthMenu: [10, 20, 50, 100, 200, 500],
            'columnDefs': [ {
            'targets': [0], /* column index */
            'orderable': false, /* true or false */
                }]
            });
        } );
    </script>
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
        $('#lolos3').click(function(){
            $('#lolos4').click();
        });
        $('#no-lolos3').click(function(){
            $('#no-lolos4').click();
        });
        $('#del3').click(function(){
            $('#del24').click();
        });
    </script>
    <script type='text/javascript'>
        $(document).ready(function(){
          // Check or Uncheck All checkboxes
        $("#checkall1").change(function(){
            var checked = $(this).is(':checked');
            if(checked){
                $(".checkbox").each(function(){
                $(this).prop("checked",true);
                });
            }else{
                $(".checkbox").each(function(){
                $(this).prop("checked",false);
                });
            }
            });
    
            // Changing state of CheckAll1 checkbox 
            $(".checkbox").click(function(){
    
            if($(".checkbox").length == $(".checkbox:checked").length) {
                $("#checkall1").prop("checked", true);
            } else {
                $("#checkall1").prop("checked", false);
            }
    
            });
        });
    </script>
@endpush