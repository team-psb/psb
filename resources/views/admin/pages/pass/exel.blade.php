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
                    <td>{{ $item->user->biodataOne->name }}</td>
                    {{-- <td>{{ $item->user->biodataTwo->kabupaten->name }}</td>
                    <td>{{ $item->user->biodataTwo->provinsi->name }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</div>