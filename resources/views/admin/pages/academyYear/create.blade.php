<form action="{{ route('academies.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="card-body">
        <div class="form-group">
            <label>Tahun ajaran</label>
            <div class="input-group">
                <input type="number" name="year" class="form-control phone-number" placeholder="contoh : 2022">
            </div>
        </div>

        <div class="form-group">
            <label>Gelombang</label>
            <select class="form-control select2" name="stage_id">
                @foreach ($stages as $stage)
                    <option value="{{ $stage->id }}" >{{ $stage->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <div class="ps-4">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                    <label for="inlineRadio1">Aktif</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                    <label for="inlineRadio2">Tidak Aktif</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary  btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
    </div>
</form>