@extends('admin.layouts.app')

@section('title', 'QnA')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card card-rounded">
                        <div class="card-body">
                            <h4 class="card-title pb-4" style="border-bottom: 1px solid #c4c4c4;">Buat Data Question & Answer</h4>
                            <form action="{{ route('qna.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Pertanyaan</label>
                                        <div class="input-group">
                                        <textarea name="question" class="form-control" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                            
                                    <div class="form-group">
                                        <label>Jawaban</label>
                                        <div class="input-group">
                                        <textarea name="answer" class="form-control" style="height: 150px;"></textarea>
                                        </div>
                                    </div>
                            
                                    <button type="submit" class="btn btn-primary btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
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