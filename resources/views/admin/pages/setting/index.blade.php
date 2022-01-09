@php
    $iq = App\Models\Setting::pluck('question_iq_value')->first();
    $soaliq = App\Models\QuestionIq::get();
    $personal = App\Models\Setting::pluck('question_personal_value')->first();
    $soalpersonal = App\Models\QuestionPersonal::get();
@endphp
@extends('admin.layouts.app')

@section('title', 'Pengaturan Sistem')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Pengaturan Sistem</h4>
                        <div class="form-group">
                            <h5>Pesan Pemberitahuan Whatsapp</h5>
                            <textarea name="notification" class="form-control" style="height: 200px"></textarea>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <h5>Tahun Ajaran Aktif <span class="badge badge-success">{{ $academies->count() }}</span>
                                        <a href="#mymodal"
                                            data-remote="{{ route('academies.create') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Tahun Ajaran" 
                                            class="btn btn-info btn-sm">
                                            <i class="icon-plus"></i>
                                        </a>
                                    </h5>
                                    <div class="form-group">
                                        @foreach ($academies as $academy)
                                            <div class="form-check form-check-success d-flex align-items-center justify-content-between border-bottom">
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" {{ $academy->is_active == 1 ? 'checked' : ''}} disabled>
                                                        {{ $academy->year }}({{ $academy->stage->name }})
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('academies.edit', $academy->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Edit Tahun Ajaran {{ $academy->year }}" 
                                                        class="btn btn-primary p-1 ms-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button formaction="{{ route('academies.delete', $academy->id) }}" class="btn btn-danger p-1 ms-2">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Gelombang Aktif 
                                        <span class="badge badge-success">{{ $stages->count() }}</span>
                                        {{-- <a href="#mymodal"
                                            data-remote="{{ route('settings.stage-store') }}"
                                            data-toggle="modal"
                                            data-target="#mymodal"
                                            data-title="Buat Gelombang Baru" 
                                            class="btn ms-1 btn-primary  btn-icon-text p-2"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                            <i class="icon-plus btn-icon-prepend"></i>
                                        </a> --}}
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="icon-plus"></i>
                                        </a>
                                    </h5>
                                    <div class="form-group">
                                        @foreach ($stages as $stage)
                                            <div class="form-check form-check-success d-flex align-items-center justify-content-between border-bottom">
                                                <div class="form-check form-check-success">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" checked disabled>
                                                        {{ $stage->name }}
                                                    </label>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#mymodal"
                                                        data-remote="{{ route('settings.stage-edit', $stage->id) }}"
                                                        data-toggle="modal"
                                                        data-target="#mymodal"
                                                        data-title="Edit Gelombang {{ $stage->name }}" 
                                                        class="btn btn-primary p-1 ms-2"
                                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit">
                                                        <i class="icon-pencil"></i>
                                                    </a>
                                                    <form action="" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button formaction="{{ route('settings.stage-delete', $stage->id) }}" class="btn btn-danger p-1 ms-2">
                                                            <i class="icon-trash btn-icon-prepend"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Soal Tes IQ Aktif <span class="badge badge-success">{{ $iq.'/'.$iqs->count() }}</span></h5>
                                    <form action="{{ route('settings.iq-value') }}" method="POST">
                                        @csrf
                                        <label for="">Soal di tampilkan</label>
                                        <div class="form-group">
                                            <select 
                                            class="form-select"
                                            id="value"
                                            name="question_iq_value"
                                            >
                                            <option value="{{ $iq }} ? 'selected : '' ">{{ $iq }} Soal</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i.'0' }}" {{ $soaliq->count() < $i.'0' ? 'disabled' : '' }}>{{ $i }}0 Soal</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <button class="btn btn-primary float-right">save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Soal Tes Kepribadian Aktif <span class="badge badge-success">{{ $personal.'/'.$personals->count() }}</span></h5>
                                    <form action="{{ route('settings.personal-value') }}" method="POST">
                                        @csrf
                                        <label for="">Soal di tampilkan</label>
                                        <div class="form-group">
                                            <select 
                                            class="form-select"
                                            id="value"
                                            name="question_personal_value"
                                            >
                                            <option value="{{ $personal }} ? 'selected : '' ">{{ $personal }} Soal</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i.'0' }}" {{ $soalpersonal->count() < $i.'0' ? 'disabled' : '' }}>{{ $i }}0 Soal</option>
                                            @endfor
                                            </select>
                                        </div>
                                        <button class="btn btn-primary float-right">save</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="border-top border-2">
                            <button  class="btn btn-primary btn-md mt-2">Simpan</button>
                        </div> --}}
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
            <h5 class="modal-title" id="exampleModalLabel">Buat Gelombang Pendafatran</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('settings.stage-store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Gelombang</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="contoh : gel-1">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endpush