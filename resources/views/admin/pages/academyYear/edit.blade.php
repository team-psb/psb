<form action="{{ route('academies.update', $academy->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label>Tahun ajaran</label>
            <div class="input-group">
                <input type="number" name="year" class="form-control phone-number" value="{{ $academy->year }}">
            </div>
        </div>

        <div class="form-group">
            <label>Gelombang</label>
            <select class="form-control select2" name="stage_id">
                @foreach ($stages as $stage)
                    <option value="{{ $stage->id }}" {{ $stage->id == $academy->stage->id ? 'selected ' : ''}}>{{ $stage->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="ps-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="input1" value="1" {{ $academy->is_active == 1 ? 'checked' : '' }}>
                    <label for="input1">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="input2" value="0" {{ $academy->is_active == 0 ? 'checked' : '' }}>
                    <label for="input2">Tidak Aktif</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
    </div>
</form>