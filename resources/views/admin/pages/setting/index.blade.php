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
                                    <h5>Tahun Ajaran Aktif <span class="badge badge-success">{{ $academies->count() }}</span></h5>
                                    <div class="form-group">
                                        @foreach ($academies as $academy)
                                            <div class="form-check form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" {{ $academy->is_active == 1 ? 'checked' : ''}}>
                                                    {{ $academy->year }}({{ $academy->stage->name }})
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Gelombang Aktif <span class="badge badge-success">{{ $stages->count() }}</span></h5>
                                    <div class="form-group">
                                        @foreach ($stages as $stages)
                                            <div class="form-check form-check-success">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" checked>
                                                    {{ $stages->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Soal Tes IQ Aktif <span class="badge badge-success">{{ $iqs->count() }}</span></h5>
                                    {{-- <textarea name="editor1" class="form-control"></textarea> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <h5>Soal Tes Kepribadian Aktif <span class="badge badge-success">{{ $personals->count() }}</span></h5>
                                    {{-- <textarea name="editor1" class="form-control"></textarea> --}}
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-2">
                            <button  class="btn btn-primary btn-md mt-2">Simpan</button>
                        </div>
                    </div>
                </div>
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