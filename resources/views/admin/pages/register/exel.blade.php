<div>
    <table class="table table-striped display nowrap" id="status-pendaftar">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Wa</th>
                <th>Umur</th>
                {{-- <th>Pendidikan</th>
                <th>Cita-cita</th>
                <th>Prestasi</th>
                <th>Skill</th>
                <th>Hafalan</th>
                <th>Gamer</th>
                <th>Keluarga</th>
                <th>Orang Tua</th>
                <th>Penghasilan Ortu</th> --}}
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($biodatas as $item)
                <tr>
                    <td width="10">{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->full_name }}
                    </td>
                    <td>
                        @php
                            $no = str_split( $item->no_wa);
                        @endphp
                        {{ $item->no_wa }}
                    </td>
                    <td>
                    {{ $item->age }} &nbsp; Tahun
                    </td>
                    {{-- <td>{{ $item->last_education }}</td>
                    <td>{{ $item->goal }}</td>
                    <td>{{ $item->achievment }}</td>
                    <td>{{ $item->skill }}</td>
                    <td>{{ $item->memorization }}</td>
                    <td>{{ $item->gamer }}</td>
                    <td>{{ $item->family }}</td>
                    <td>{{ $item->parent }}</td>
                    <td class="fw-bold">{{ $item->parent_income }}</td> --}}
                    @if ($item->user->biodataTwo->where('academy_year_id', $tahun_ajaran)->first())
                    <td> Biodata Lengkap </td>
                    @else
                    <td> Biodata Tidak Lengkap </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
