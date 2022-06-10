@extends('admin.layouts.app')

@section('title', 'Nilai Tes IQ Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="border-bottom: 1px solid #c4c4c4;">
                            <h4 class="card-title pb-4">Nilai Iq Pendaftar | {{ $user->biodataOne->full_name }}</h4>
                            <div>
                                <a href="{{ route('scoreIq.index') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <p class="card-description">
                            Detail Jawaban Soal Iq Pendaftar | {{ $user->biodataOne->full_name }}
                        </p>
                        <div class="row">
                            <div class="col">
                                <table cellpadding="5">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Soal</th>
                                            <th class="text-center">Jawaban</th>
                                            <th class="text-center">Ket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($answers as $answer)
                                        <tr class="align-top">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ Storage::url($answer->questionIq->image) }}" alt="" style="width: 100px;">    
                                            </td>
                                            <td class="w-75">{{ $answer->questionIq->question }}</td>
                                            <td class="text-center">{{ $answer->answer }}</td>
                                            <td class="text-center">
                                                @php
                                                    $data = $answer->answer == $answer->questionIq->answer_key;
                                                @endphp
                                                @if ($data)
                                                    <span class="text-success">Benar</span>
                                                @else
                                                    <span class="text-danger">Salah</span>
                                                @endif
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                    <tfoot style="background-color: #67f09b">
                                        <tr>
                                            @php
                                                $data = App\Models\ScoreIq::where('user_id', $user->id)->first();
                                            @endphp
                                            <td colspan="5" class="text-center fw-bold">
                                                <div class="d-flex justify-content-around">
                                                    <p style="font-size: 20px">
                                                        Total Poin :
                                                        {{ $data->score_question_iq }}
                                                    </p>
                                                    <p style="font-size: 20px">
                                                        Soal dijawab :
                                                        {{ $answers->count() }}
                                                    </p>
                                                    <p style="font-size: 20px">
                                                        Benar :
                                                        {{ $data->correct }}
                                                    </p>
                                                    <p style="font-size: 20px">
                                                        Salah :
                                                        {{ $data->wrong }}
                                                    </p>
                                                </div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
