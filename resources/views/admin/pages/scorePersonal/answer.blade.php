@extends('admin.layouts.app')

@section('title', 'Nilai Kepribadian Pendaftar')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card   card-rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-content-center pb-2" style="border-bottom: 1px solid #c4c4c4;">
                            <h4 class="card-title">Detail Nilai Kepribadian | {{ $user->biodataOne->full_name }}</h4>
                            <div>
                                <a href="{{ route('scorePersonal.index') }}" class="btn btn-success">Back</a>
                            </div>
                        </div>
                        <p class="card-description">
                            Detail Jawaban Soal Personal | {{ $user->biodataOne->full_name }}
                        </p>
                        <div class="table-responsive">
                            <table cellpadding="10" class="table-2  table-hover" style="font-size: 14px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th width="50%">Soal</th>
                                        <th width="40%">Jawaban</th>
                                        <th>Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($answers as $answer)
                                    <tr class="align-content-start">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $answer->questionPersonal->question }}</td>
                                        <td>
                                            @if ($answer->answer == 'a')
                                                {{ $answer->questionPersonal->a }}
                                            @elseif ($answer->answer == 'b')
                                                {{ $answer->questionPersonal->b }}
                                            @elseif ($answer->answer == 'c')
                                                {{ $answer->questionPersonal->c }}
                                            @elseif ($answer->answer == 'd')
                                                {{ $answer->questionPersonal->d }}
                                            @elseif ($answer->answer == 'e')
                                                {{ $answer->questionPersonal->e }}
                                            @else
                                                Tidak di jawab
                                            @endif
                                        </td>
                                        <td>
                                            @if ($answer->answer == 'a')
                                                {{ $answer->questionPersonal->poin_a }}
                                            @elseif ($answer->answer == 'b')
                                                {{ $answer->questionPersonal->poin_b }}
                                            @elseif ($answer->answer == 'c')
                                                {{ $answer->questionPersonal->poin_c }}
                                            @elseif ($answer->answer == 'd')
                                                {{ $answer->questionPersonal->poin_d }}
                                            @elseif ($answer->answer == 'e')
                                                {{ $answer->questionPersonal->poin_e }}
                                            @else
                                                Tidak ada poin
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="background-color: #67f09b">
                                    <tr>
                                        @php
                                            $data = App\Models\ScorePersonal::where('user_id', $user->id)->first();
                                        @endphp
                                        <td colspan="5" class="text-center fw-bold">
                                            <div class="d-flex justify-content-around">
                                                <p style="font-size: 20px">
                                                    Total Poin :
                                                    {{ $data->score_question_personal }}
                                                </p>
                                                <p style="font-size: 16px">
                                                    Soal dijawab :
                                                    {{ $answers->count() }}
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

@endsection
