<div>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Nilai Tes IQ</td>
                <td>No Wa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($video as $item)
                <tr>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}</td>
                    <td>{{ $item->user->video->where('academy_year_id', $tahun_ajaran)->first()->url }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
