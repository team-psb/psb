<form action="{{ route('settings.stage-update', $stage->id) }}" method="POST">
    @csrf
    @method('POST')
    <div class="card-body">
        <div class="form-group">
            <label>Nama Gelombang</label>
            <div class="input-group">
                <input type="text" name="name" class="form-control" value="{{ $stage->name }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-icon icon-left"> <i class="fas fa-save"></i> Kirimkan</button>
    </div>
</form>

