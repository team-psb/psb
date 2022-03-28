@extends('admin.layouts.app')

@section('title', 'Tes Kepribadian')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Soal Tes Kepribadian</h4>
                            <p class="card-description">
                                Jumlah soal tidak boleh kurang dari 50 soal
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
                                    <button class="btn btn-danger btn-icon-text p-2" id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti-trash btn-icon-perpend"></i> Hapus Semua
                                    </button>
                                    <div class="btn-group dropleft d-inline float-right">
                                        <a href="#mymodal"
                                            data-remote="{{ route('personals.create') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Soal Kepribadian"
                                            class="btn btn-primary btn-icon-text p-2"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buat Data">
                                            <i class="ti-plus btn-icon-prepend"></i> Buat Data
                                        </a>
                                        <button type="button" class="btn btn-info btn-icon-text p-2" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Import Data">
                                            <i class="ti-filter  btn-icon-prepend"></i>Impor Soal
                                        </button>
                                </div>
                            </div>
                            <form method="POST" class="mt-4">
                                @csrf
                                <button class="d-none" formaction="{{ route('personals.deleteAll') }}" id="del2"></button>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="myTable1">
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
                                                <th>Soal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $question)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-success">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $question->id }}]" value="{{ $question->id }}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ Str::limit($question->question, 100, '...') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#mymodal"
                                                            data-remote="{{ route('personals.show', $question->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal"
                                                            data-title="Detail Soal Kepribadian {{ $loop->iteration }}"
                                                            class="btn btn-success btn-icon-text p-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                            <i class="icon-eye btn-icon-prepend"></i> Detail
                                                        </a>
                                                        <a href="#mymodal"
                                                            data-remote="{{ route('personals.edit', $question->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal"
                                                            data-title="Edit Soal Kepribadian {{ $loop->iteration }}"
                                                            class="btn ms-1 btn-primary btn-icon-text p-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                            <i class="icon-pencil btn-icon-prepend"></i> Edit
                                                        </a>
                                                        <button formaction="{{ route('personals.delete', $question->id) }}" class="btn ms-1 btn-danger me-0 btn-icon-text p-2">
                                                            <i class="icon-trash btn-icon-prepend"></i> Hapus</button>
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

    <!-- Modal -->
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
                        <h4 class="card-title">Tambah Data Soal Tes Kepribadian</h4>
                            <p class="card-description">
                                Silahkan lengkapi formulir untuk menambahkan data !
                            </p>
                                <div class="form-group">
                                    <label for="exampleTextarea1">Soal</label>
                                    <textarea class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;"></textarea>
                                </div>
                                <table class="w-100" cellpadding="10" cellspacing="10">
                                    <tr>
                                    <th colspan="2">
                                        <h6>Jawaban</h6>
                                    </th>
                                    <th>
                                        <h6>Poin Jawaban</h6>
                                    </th>
                                    </tr>
                                    {{-- A --}}
                                    <tr>
                                    <td>
                                        <strong> A .</strong>
                                    </td>
                                    <td>
                                        <input type="text" style="height: 50px;" name="a" class="form-control"  value="{{-- $cek?$data->a:'' --}}">
                                    </td>
                                    <td class="pl-5">
                                        <select>
                                        <option>--score--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </td>
                                    </tr>
                                    {{-- B --}}
                                    <tr>
                                    <td>
                                        <strong> B .</strong>
                                    </td>
                                    <td>
                                        <input type="text" style="height: 50px;" name="b" class="form-control"  value="{{-- $cek?$data->b:'' --}}">
                                    </td>
                                    <td class="pl-5">
                                        <select>
                                        <option>--score--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </td>
                                    </tr>
                                    {{-- c --}}
                                    <tr>
                                    <td>
                                        <strong> C .</strong>
                                    </td>
                                    <td>
                                        <input type="text" style="height: 50px;" name="c" class="form-control"  value="{{-- $cek?$data->c:'' --}}">
                                    </td>
                                    <td class="pl-5">
                                        <select>
                                        <option>--score--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </td>
                                    </tr>
                                    {{-- d --}}
                                    <tr>
                                    <td>
                                        <strong> D .</strong>
                                    </td>
                                    <td>
                                        <input type="text" style="height: 50px;" name="d" class="form-control"  value="{{-- $cek?$data->d:'' --}}">
                                    </td>
                                    <td class="pl-5">
                                        <select>
                                        <option>--score--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        </select>
                                    </td>
                                    </tr>
                                    {{-- e --}}
                                    <tr>
                                    <td>
                                        <strong> E .</strong>
                                    </td>
                                    <td>
                                        <input  type="text" style="height: 50px;" name="e" class="form-control"  value="{{-- $cek?$data->e:'' --}}">
                                    </td>
                                    <td class="pl-5">
                                    <select>
                                        <option>--score--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    </td>
                                    </tr>
                                </table>
                                <button type="submit" class="btn btn-primary me-2 mt-4">Kirimkan</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Modal Import-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Import Data Soal Kepribadian</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  method="POST"  action="{{ route('personals.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                        <p>
                            Pastikan anda sudah memiliki template file download
                            <a href="{{ route('personals.template') }}">disini</a>
                        </p>
                        <div class="form-file">
                            <input type="file" name="file" class="form-file-input" id="customFile">
                            <label class="form-file-label" for="customFile">
                                <span class="form-file-text">Choose file...</span>
                                <span class="form-file-button btn-primary "><i
                                        data-feather="upload"></i></span>
                            </label>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Import</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>



@endsection

@push('after-script')
<script>
    $(document).ready( function () {
    $('#myTable1').DataTable({
        'columnDefs': [ {
        'targets': [0, 3], /* column index */
        'orderable': false, /* true or false */
            }]
        });
    } );
</script>

<script>
    $('#del1').click(function(){
        $('#del2').click();
    })
</script>
@endpush
