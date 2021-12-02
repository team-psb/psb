@extends('admin.layouts.app')

@section('title', 'Tes Wawancara Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Tes Wawancara Pendaftar</h4>
                        <p class="card-description">
                            Daftar Tes Wawancara Pendaftar
                        </p>
                        <div class="row mb-4 ">
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
                                    <a href="{{ route('interviews.export') }}" class="btn btn-primary btn-icon-text p-2">
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
                            <button class="d-none" formaction="{{ route('interviews.passAll') }}" id="lolos2"></button>
                            <button class="d-none" formaction="{{ route('interviews.nonpassAll') }}" id="no-lolos2"></button>
                            <button class="d-none" formaction="{{ route('interviews.deleteAll') }}" id="del2"></button>
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
                                            <th>No WhatsApp</th>
                                            <th>Status</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($interviews as $interview)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $interview->id }}]" value="{{ $interview->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $interview->user->biodataOne->full_name }}</td>
                                            <td>
                                                <div class="input-group">
                                                    <input value="{{ $interview->user->phone }}" id="copy" disabled type="text" class="form-control fw-bold">
                                                    <div class="input-group-append">
                                                        <button onclick="myFunction()"  class="input-group-text btn-success text-light">copy</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $interview->status == 'lolos' ? 'success':'' }}{{ $interview->status == 'tidak' ? 'danger':'' }}">{{ $interview->status }}</span>
                                            </td>
                                            <td>
                                                <div class="btn-wrapper">
                                                    <button formaction="{{ route('interviews.delete', $interview->id) }}" class="btn ms-1 btn-danger btn-icon-text text-white p-2"><i class="icon-trash btn-icon-prepend"></i> Hapus</button>
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
            <h5 class="modal-title" id="exampleModalLabel">-- Filter Data Penduduk --</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="GET">
            
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
                            <button type="submit" formaction="{{ route('interviews.index') }}" class="btn btn-primary">Terapkan</button>
                            <button type="submit" formaction="{{ route('interviews.filter-reset') }}" class="btn btn-primary">Atur Ulang</button>
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
<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("copy");
    
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
    
    /* Alert the copied text */
    // alert("Berhasil di salin : " + copyText.value);
    }
    </script>
@endpush