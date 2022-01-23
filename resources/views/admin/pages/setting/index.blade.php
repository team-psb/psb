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
                        {{-- <div class="form-group">
                            <h5>Pesan Pemberitahuan Whatsapp</h5>
                            <textarea name="" name="notification" class="form-control" style="height: 200px">{{ $settings->first()->no_msg }}</textarea>
                        </div> --}}
                        <div class="row">
                            <div class="col-3">
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
                            <div class="col-3">
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
                            <div class="col-3">
                                <div class="row">
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
                                            <button class="btn btn-primary float-end">save</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Pengumuman Santri Baru</h5>
                                    <form action="{{ route('settings.announcement') }}" method="POST">
                                        @csrf
                                        <input type="date" name="announc" class="form-control" value="{{ $settings->first()->announcement }}">
                                        <button  class="btn btn-primary btn-md mt-2 float-end">Save</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="row">
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
                                            <button class="btn btn-primary float-end">save</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>No Pesan Whatsapp</h5>
                                    <form action="{{ route('settings.no-message') }}" method="POST">
                                        @csrf
                                        <input type="text" name="no_msg" class="form-control" value="{{ $settings->first()->no_msg }}">
                                        <button  class="btn btn-primary btn-md mt-2 float-end">Save</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <h4 class="card-title">
                            Pengaturan Notif Tes Ke Whatsapp
                        </h4>
                        <div class="row border border-2 py-2 mb-4 rounded">
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Selesai</span> Tes Biodata</h5>
                                <form action="{{ route('settings.complete-tahap1') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="complete_tahap1" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->complete_tahap1 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Selesai</span> Tes Biodata (<span class="text-success">Sangat Mampu</span>)</h5>
                                <form action="{{ route('settings.complete-tahap1-sm') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="complete_tahap1_sm" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->complete_tahap1_sm }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Biodata</h5>
                                <form action="{{ route('settings.biodata-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap1" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap1 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Biodata (<span class="text-success">Sangat Mampu</span>)</h5>
                                <form action="{{ route('settings.biodata-pass-sm') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap1_sm" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap1_sm }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-danger">Gagal</span> Tes Biodata</h5>
                                <form action="{{ route('settings.biodata-failed') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap1_failed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap1_failed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row border border-2 py-2 mb-4 rounded">
                            <div class="col-12 mb-4">
                                <h5>Notif <span class="text-success">Selesai</span> Tes IQ</h5>
                                <form action="{{ route('settings.complete-tahap2') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="complete_tahap2" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->complete_tahap2 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes IQ</h5>
                                <form action="{{ route('settings.iq-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap2" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap2 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-danger">Gagal</span> Tes IQ</h5>
                                <form action="{{ route('settings.iq-failed') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap2_failed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap2_failed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row border border-2 py-2 mb-4 rounded">
                            <div class="col-12 mb-4">
                                <h5>Notif <span class="text-success">Selesai</span> Tes Kepribadian</h5>
                                <form action="{{ route('settings.complete-tahap3') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="complete_tahap3" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->complete_tahap3 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Kepribadian</h5>
                                <form action="{{ route('settings.personal-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap3" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap3 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-danger">Gagal</span> Tes Kepribadian</h5>
                                <form action="{{ route('settings.personal-failed') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap3_failed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap3_failed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row border border-2 py-2 mb-4 rounded">
                            <div class="col-12 mb-4">
                                <h5>Notif <span class="text-success">Selesai</span> Tes Video</h5>
                                <form action="{{ route('settings.complete-tahap4') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="complete_tahap4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->complete_tahap4 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Video</h5>
                                <form action="{{ route('settings.video-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap4 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-danger">Gagal</span> Tes Video</h5>
                                <form action="{{ route('settings.video-failed') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap4_failed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap4_failed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row border border-2 py-2 mb-4 rounded">
                            {{-- <div class="col-12 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Wawancara</h5>
                                <form action="{{ route('settings.interview-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap5" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap5 }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-success">Lolos</span> Tes Wawancara</h5>
                                <form action="{{ route('settings.student-pass') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap5_passed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap5_passed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-6 mb-4">
                                <h5>Notif <span class="text-danger">Gagal</span> Tes Wawancara</h5>
                                <form action="{{ route('settings.student-failed') }}" method="POST">
                                    @csrf
                                    <div class="form-floating">
                                        <textarea name="notif_tahap5_failed" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">{{ $settings->first()->notif_tahap5_failed }}</textarea>
                                        <label for="floatingTextarea2">Isi Pesan</label>
                                        <div class="float-end">
                                            <button  class="btn btn-primary btn-md mt-2">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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