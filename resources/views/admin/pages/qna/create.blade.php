<form action="{{ route('qna.store') }}" method="POST">
    @csrf
    @method('POST')
    <div class="card-body">
        <div class="form-group">
            <label>Pertanyaan</label>
            <div class="input-group">
            <textarea name="question" class="form-control" style="height: 150px;"></textarea>
            </div>
        </div>

        <div class="form-group">
            <label>Jawaban</label>
            <div class="input-group">
            <textarea name="answer" class="form-control" style="height: 150px;"></textarea>
            </div>
        </div>

        <div class="float-end">
            <button type="submit" class="btn btn-primary"> <i class="ti-save"></i> &nbsp;Simpan</button>
        </div>
    </div>
</form>