<div>
    <table>
        <thead>
            <tr>
                <td>nama</td>
                <td>no wa</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($interviews as $item)
                <tr>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
