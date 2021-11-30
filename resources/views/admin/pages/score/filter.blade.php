<form method="GET">
            
    <div class="row">
        <div class="col">
            <div class="row">
            <div class="col">
                <label>Nilai Tes Iq</label>
            </div>
            </div>
            <div class="row">
            <div class="col">
                <div class="form-group">
                <label>Minimal</label>
                <input type="number" class="form-control" name="score_test_iq_min" placeholder="MIN" value="{{ request()->get('score_test_iq_min') }}">
                </div>
            </div> 
            <div class="col">
                <div class="form-group">
                <label>Maksimal</label>
                <input type="number" class="form-control" name="score_test_iq_max" placeholder="MAX" value="{{ request()->get('score_test_iq_max') }}">
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="row">
        <div class="col">
            <div class="row">
            <div class="col">
                <label>Nilai Tes Kepribadian</label>
            </div>
            </div>
            <div class="row">
            <div class="col">
                <div class="form-group">
                <label>Minimal</label>
                <input type="number" class="form-control" name="score_test_personal_min" placeholder="MIN" value="{{ request()->get('score_test_personal_min') }}">
                </div>
            </div> 
            <div class="col">
                <div class="form-group">
                <label>Maksimal</label>
                <input type="number" class="form-control" name="score_test_personal_max" placeholder="MAX" value="{{ request()->get('score_test_personal_max') }}">
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col">
                <div class="form-group">
                <label>Pilih Gelombang</label>
                <select name="stage_id" class="form-select">
                    <option value="" >-- Pilih Gelombang --</option>
                    <option value="1" >GELOMBANG 1</option>
                    <option value="2" >GELOMBANG 2</option>
                    <option value="3" >GELOMBANG 3</option>
                    <option value="4" >GELOMBANG 4</option>
                </select>
                </div>
            </div> 
            </div>
        
        </div>
        </div>
        
        <button type="submit" formaction="{{ route('scores.index') }}" class="btn btn-primary">Terapkan</button>
        <button type="submit" formaction="{{ route('scores.filter-reset') }}" class="btn btn-primary float-right">Atur Ulang</button>
        
</form>