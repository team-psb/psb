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
                                        <tr class="
                                            {{ $interview->status == null ? 'text-warning' : '' }}
                                            {{ $interview->status == 'lolos' ? 'text-success' : '' }}
                                            {{ $interview->status == 'tidak' ? 'text-danger' : '' }}
                                            fw-bold
                                        " >
                                            <td>
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $interview->id }}]" value="{{ $interview->id }}">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a 
                                                    href="#mymodal"
                                                    data-remote="{{ route('biodatas.show', $interview->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Data" 
                                                    class="badge text-decoration-none fw-bold
                                                        {{ $interview->status == null ? 'text-warning badge-opacity-warning' : '' }}
                                                        {{ $interview->status == 'lolos' ? 'text-success badge-opacity-success' : '' }}
                                                        {{ $interview->status == 'tidak' ? 'text-danger badge-opacity-danger' : '' }}"
                                                >
                                                    @if ($interview->user->biodataOne->family == 'sangat-mampu')
                                                        <i class="ti-star text-warning"></i>
                                                    @endif
                                                    {{ $interview->user->biodataOne->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <div class="input-group">
                                                    {{-- <input value="{{ $interview->user->phone }}" id="copy" disabled type="text" class="form-control fw-bold">
                                                    <div class="input-group-append">
                                                        <button type="button" onclick="myFunction()"  class="input-group-text btn-success text-light">copy</button>
                                                    </div> --}}
                                                    {{-- <span class="hp">{{ $interview->user->phone }}</span> --}}
                                                    <p>
                                                        {{ $interview->user->phone }}
                                                        <a href="https://api.whatsapp.com/send?phone={{ $interview->user->phone }}" class="btn btn-success px-1">Chat Wa</a>
                                                    </p>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-{{ $interview->status == 'lolos' ? 'success':'' }}{{ $interview->status == 'tidak' ? 'danger':'' }}">{{ $interview->status }}</span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    @if ($interview->status == null)
                                                        <a href="{{ route('interviews.status', $interview->id) }}?status=lolos"
                                                            class="btn btn-success btn-icon-text p-2">
                                                                <i class="icon-check btn-icon-prepend"></i> Lolos
                                                        </a>
                                                        <a href="{{ route('interviews.status', $interview->id) }}?status=tidak"
                                                            class="btn btn-warning mx-1 btn-icon-text p-2">
                                                                <i class="icon-close btn-icon-prepend"></i> Tidak Lolos
                                                        </a>
                                                    @endif
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
                                    <label class="fs-6">Pilih Gelombang <span style="font-size: 12px;" class    ="text-danger">* pastikan sudah memilih gelombang sebelum menerapkan</span></label>
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
    var color = document.querySelectorAll('.hp') //DOM selector

//Loop through all elements and attaching event listener
color.forEach(el => {
  el.addEventListener('click',copyText)
})

// function for selecting the text of an element based on the event.target (supporting IE)
function selectText() {
    var element = event.target
    var range;
    if (document.selection) {
        // IE
        range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        range = document.createRange();
        range.selectNode(element);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
    }
}

// function for copying selected text in clipboard
function copyText() {
    selectText();
    alert('No whatsapp ' + event.target.innerText + ' Berhasil di copy')
    document.execCommand("copy");
}
</script>
{{-- <script>
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
</script> --}}
@endpush