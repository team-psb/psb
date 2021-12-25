<div>
    <form action="{{ route('qna.update', $qna->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label>Pertanyaan</label>
                <div class="input-group">
                    <textarea name="question" class="form-control" style="height: 150px;">{{ $qna->question }}</textarea>
                </div>
            </div>
    
            <div class="form-group">
                <label>Jawaban</label>
                <div class="input-group">
                    <textarea name="answer" class="form-control" style="height: 150px;">{{ $qna->answer }}</textarea>
                </div>
            </div>
    
            <button type="submit" class="btn btn-primary btn-icon icon-left"> <i class="ti-save"></i> Kirimkan</button>
        </div>
    </form>
</div>