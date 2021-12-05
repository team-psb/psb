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
                    <td>{{ $item->user->biodataOne->name }}</td>
                    <td>{{ $item->user->biodataOne->no_wa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>