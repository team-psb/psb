@extends('admin.layouts.app')

@section('title', 'QnA')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Data Question & Answer</h4>
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
                                    <button class="btn btn-danger " id="del1" type="button" aria-haspopup="true" aria-expanded="false">
                                        Hapus Semua
                                    </button>
                                    <div>
                                        <a href="#mymodal"
                                            data-remote="{{ route('qna.create') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Pertanyaan" 
                                            class="btn btn-info">
                                            <i class="icon-plus"></i> Buat Data
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <form method="POST">
                                @csrf
                                <button class="d-none" formaction="{{ route('qna.deleteAll') }}" id="del2"></button>
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
                                            <th>Pertanyaan</th>
                                            <th>Jawaban</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($qnas as $qna)
                                            <tr>
                                                <td>
                                                    <div class="form-check form-check-success">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" class="form-check-input checkbox" name="ids[{{ $qna->id }}]" value="{{ $qna->id }}">
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ Str::limit($qna->question, 56, '...') }}</td>
                                                <td>{{ Str::limit($qna->answer, 56, '...') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="#mymodal"
                                                            data-remote="{{ route('qna.show', $qna->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal"
                                                            data-title="Detail Pertanyaan {{ $loop->iteration }}" 
                                                            class="btn btn-success align-items-center  py-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                            <i class="icon-eye"></i> Detail
                                                        </a>
                                                        <a href="#mymodal"
                                                            data-remote="{{ route('qna.edit', $qna->id) }}"
                                                            data-toggle="modal"
                                                            data-target="#mymodal"
                                                            data-title="Edit Pertanyaan {{ $loop->iteration }}" 
                                                            class="btn ms-1 btn-primary  py-2"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                            <i class="icon-pencil"></i> Edit
                                                        </a>
                                                        <button formaction="{{ route('qna.delete', $qna->id) }}" class="btn ms-1 btn-danger text-white me-0  py-2"><i class="icon-trash"></i> Hapus</button>
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
        $('#del1').click(function () {
            $('#del2').click();
        })
    </script>
@endpush