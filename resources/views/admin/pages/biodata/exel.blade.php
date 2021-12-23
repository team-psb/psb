<div>
    <table class="table table-striped display nowrap" id="status-pendaftar">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No Wa</th>
                <th>Umur</th>
                <th>Pendidikan</th>
                <th>Cita-cita</th>
                <th>Prestasi</th>
                <th>Skill</th>
                <th>Hafalan</th>
                <th>Gamer</th>
                <th>Keluarga</th>
                <th>Orang Tua</th>
                <th>Penghasilan Ortu</th>
                <th>Status</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($biodatas as $item)
                <tr class="
                    {{ $item->status == 'lolos' ? 'text-success' : '' }}
                    {{ $item->status == 'tidak' ? 'text-danger' : '' }}
                    " 
                    
                    style="{{ $item->status == 'tidak' || $item->status == 'lolos' ? 'font-weight:bold;' : '' }}">
                    <td width="10">{{ $loop->iteration }}</td>
                    <td>
                        {{ $item->user->biodataOne->full_name }}
                    </td>
                    <td>
                        @php
                            $no = str_split( $item->user->biodataOne->no_wa);
                        @endphp
                        {{ $item->user->biodataOne->no_wa }}
                    </td>
                    <td>
                    {{ $item->user->biodataOne->age }} &nbsp; Tahun
                    </td>
                    <td>{{ $item->last_education }}</td>
                    <td>{{ $item->goal }}</td>
                    <td>{{ $item->achievment }}</td>
                    <td>{{ $item->skill }}</td>
                    <td>{{ $item->memorization }}</td>
                    <td>{{ $item->gamer }}</td>
                    <td>{{ $item->user->biodataOne->family }}</td>
                    <td>{{ $item->parent }}</td>
                    <td class="fw-bold">Rp. {{ number_format($item->parent_income) }}</td>
                    <td> {{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>