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
                            <div class="row mb-4 ">
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-danger " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                        Hapus Semua
                                    </button>
                                    <div class="btn-group dropleft d-inline float-right">
                                        <a href="#mymodal"
                                            data-remote="{{ route('personals.create') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Soal Kepribadian" 
                                            class="btn btn-info"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Buat Data">
                                            Buat Data
                                        </a>
                                        <button class="btn btn-info ml-2">Impor Soal</button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="myTable1">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check form-check-danger">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" id="checkall">
                                                    </label>
                                                </div>
                                            </th>
                                            <th>No</th>
                                            <th>Soal</th>
                                            <th width="20">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                        <tr>
                                            <td>
                                                <div class="form-check form-check-danger">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input checkbox">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $question->id }}</td>
                                            <td>{{ Str::limit($question->question, 120, '...') }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('personals.show', $question->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Detail Soal Kepribadian {{ $question->id }}" 
                                                        class="btn btn-success align-items-center  py-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                        <i class="icon-eye"></i> Detail
                                                    </a>
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('personals.edit', $question->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Edit Soal Kepribadian {{ $question->id }}" 
                                                        class="btn ms-1 btn-primary  py-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil"></i> Edit
                                                    </a>
                                                    <form action="{{ route('personals.destroy', $question->id) }}" method="POST">
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
                                        </input>
                                    </td>
                                    <td class="pl-5">
                                        {{-- <select name="poin_a" id="">
                                        @if ($cek)
                                            <option value="{{ $data->poin_a }}">{{ $data->poin_a }}</option>
                                        @else
                                            <option value="">-- scrore --</option>
                                        @endif
                                        <template x-for="poin in poins" index="poin.id">
                                            <option :value="poin" x-text="poin" ></option>
                                        </template>
                                        </select> --}}
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
                                        </input>
                                    </td>
                                    <td class="pl-5">
                                        {{-- <select name="poin_b" id="">
                                        @if ($cek)
                                            <option value="{{ $data->poin_b }}">{{ $data->poin_b }}</option>
                                        @else
                                            <option value="">-- scrore --</option>
                                        @endif
                                        <template x-for="poin in poins" index="poin.id">
                                            <option :value="poin" x-text="poin" ></option>
                                        </template>
                                        </select> --}}
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
                                        </input>
                                    </td>
                                    <td class="pl-5">
                                        {{-- <select name="poin_c" id="">
                                        @if ($cek)
                                            <option value="{{ $data->poin_c }}">{{ $data->poin_c }}</option>
                                        @else
                                            <option value="">-- scrore --</option>
                                        @endif
                                        <template x-for="poin in poins" index="poin.id">
                                            <option :value="poin" x-text="poin" ></option>
                                        </template>
                                        </select> --}}
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
                                        </input>
                                    </td>
                                    <td class="pl-5">
                                        {{-- <select name="poin_d" id="" >
                                        @if ($cek)
                                            <option value="{{ $data->poin_d }}">{{ $data->poin_d }}</option>
                                        @else
                                            <option value="">-- scrore --</option>
                                        @endif
                                        <template x-for="poin in poins" index="poin.id">
                                            <option :value="poin" x-text="poin" x-on:change="coba(poin)"></option>
                                        </template>
                                        </select> --}}
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
                                        </input>
                                    </td>
                                    <td class="pl-5">
                                    {{-- <select name="poin_e" id="">
                                        @if ($cek)
                                            <option value="{{ $data->poin_e }}" >{{ $data->poin_e }}</option>
                                        @else
                                        <option value="">-- scrore --</option>
                                        @endif
                                        <template x-for="poin in poins" index="poin.id">
                                        <option :value="poin" x-text="poin"></option>
                                        </template>
                                    </select> --}}
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
@endsection

@push('after-script')
{{-- <script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal',function(e){
        var button=$(e.relatedTarget);
        var modal =$(this);

        modal.find('.modal-body').load(button.data('remote'));
        modal.find('.modal-title').html(button.data('title'));
        });
    });
</script>
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button class="close" type="button" data-dismiss-v="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
    </div>
    <div class="modal-body">
        <i class="fas fa-spiner fa-spin"></i>
    </div>
    </div>
</div>
</div> --}}

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
@endpush