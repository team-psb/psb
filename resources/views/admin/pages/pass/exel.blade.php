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
                    <td class="text-uppercase">{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->full_name }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->city->name }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->provincy->name }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->no_wa }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->age }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->last_education }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->goal }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->achievment }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->skill }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->memorization }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->gamer }}</td>
                    <td>{{ $item->user->biodataOne->where('academy_year_id', $tahun_ajaran)->first()->family }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->parent }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->parent_income }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->guardian }}</td>
                    <td>{{ $item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first()->no_guardian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
