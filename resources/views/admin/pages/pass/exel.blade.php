<div>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Kabupaten/Kota</td>
                <td>Provinsi</td>
                <td>No Wa</td>
                <td>Umur</td>
                <td>Pendidikan</td>
                <td>Cita-cita</td>
                <td>Prestasi</td>
                <td>Skill</td>
                <td>Hafalan</td>
                <td>Gamer</td>
                <td>Keluarga</td>
                <td>Orang Tua</td>
                <td>Penghasilan Ortu</td>
                <td>Nama Wali</td>
                <td>NO Wali</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($lolos as $item)
                <tr>
                    <td class="text-uppercase">{{ $item->user->biodataOne->full_name }}</td>
                    <td>{{ $item->user->biodataTwo->city->name }}</td>
                    <td>{{ $item->user->biodataTwo->provincy->name }}</td>
                    <td>{{ $item->user->biodataOne->no_wa }}</td>
                    <td>{{ $item->user->biodataOne->age }}</td>
                    <td>{{ $item->user->biodataTwo->last_education }}</td>
                    <td>{{ $item->user->biodataTwo->goal }}</td>
                    <td>{{ $item->user->biodataTwo->achievment }}</td>
                    <td>{{ $item->user->biodataTwo->skill }}</td>
                    <td>{{ $item->user->biodataTwo->memorization }}</td>
                    <td>{{ $item->user->biodataTwo->gamer }}</td>
                    <td>{{ $item->user->biodataOne->family }}</td>
                    <td>{{ $item->user->biodataTwo->parent }}</td>
                    <td>{{ $item->user->biodataTwo->parent_income }}</td>
                    <td>{{ $item->user->biodataTwo->guardian }}</td>
                    <td>{{ $item->user->biodataTwo->no_guardian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>