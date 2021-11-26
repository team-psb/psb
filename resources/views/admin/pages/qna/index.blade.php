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
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($qnas as $qna)
                                    <tr>
                                        <td>
                                            <div class="form-check form-check-danger">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input checkbox">
                                                </label>
                                            </div>
                                        </td>
                                        <td>{{ $qna->id }}</td>
                                        <td>{{ Str::limit($qna->question, 56, '...') }}</td>
                                        <td>{{ Str::limit($qna->answer, 56, '...') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#mymodal"
                                                    data-remote="{{ route('qna.show', $qna->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Detail Pertanyaan {{ $qna->id }}" 
                                                    class="btn btn-success align-items-center  py-2"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show Detail">
                                                    <i class="icon-eye"></i> Detail
                                                </a>
                                                <a href="#mymodal"
                                                    data-remote="{{ route('qna.edit', $qna->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#mymodal"
                                                    data-title="Edit Pertanyaan {{ $qna->id }}" 
                                                    class="btn ms-1 btn-primary  py-2"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                    <i class="icon-pencil"></i> Edit
                                                </a>
                                                <form action="{{ route('qna.destroy', $qna->id) }}" method="POST">
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

@endsection