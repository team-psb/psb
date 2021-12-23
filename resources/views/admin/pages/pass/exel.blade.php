<div>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Kabupaten/Kota</td>
                <td>Provinsi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($lolos as $item)
                <tr>
                    <td>{{ $item->user->biodataOne->full_name }}</td>
                    <td>{{ $item->user->biodataTwo->city->name }}</td>
                    <td>{{ $item->user->biodataTwo->provincy->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>