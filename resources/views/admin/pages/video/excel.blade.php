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
                    <td>{{ $item->user->biodataOne->name }}</td>
                    <td>{{ $item->user->video->url }}</td>
                    <td>{{ $item->user->biodataOne->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>