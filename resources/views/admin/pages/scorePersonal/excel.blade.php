<div>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                {{-- <td>Nilai Tes iq</td> --}}
                <td>Nilai Tes Kepribadian</td>
                <td>No wa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $item)
                <tr>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}</td>
                    {{-- <td>{{ $item->user->score->score_question_iq }}</td> --}}
                    <td>{{ $item->user->scorePersonal->where('academy_year_id', $tahun_ajaran)->first()->score_question_personal }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
