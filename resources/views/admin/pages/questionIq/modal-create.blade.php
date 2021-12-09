<form class="forms-sample" action="{{ route('iqs.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method("POST")
	<div class="form-group d-flex">
		<div class="mx-2" style="width: 72%;">
			<label for="exampleTextarea1" class="fw-bold fs-6">Soal</label>
			<textarea name="question" class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;" placeholder="Ketikkan pertanyaan..."></textarea>    
		</div>
		<div class="mx-2" style="width: 28%;">
			<div class="form-group">
				<label class="fw-bold">Gambar</label>
				<div class="ml-2 col-sm-6">
					<img src="https://placehold.it/100x100" id="preview" class="img-thumbnail" style="width: 100px;height:100px;">
				</div>
				<input type="file" name="image" class="file d-none" accept="image/*">
				<div class="input-group my-3">
					<input type="text" class="form-control" disabled placeholder="Upload File" id="file">
					<div class="input-group-append">
						<button type="button" class="browse btn btn-primary py-2">Browse...</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<table class="w-100 mt-5" cellpadding="5" cellspacing="2">
		<tr>
			<th colspan="2">
				<h6>Jawaban</h6>
			</th>
			<th>
				<h6>Pilih Kunci Jawaban</h6>
			</th>
		</tr>
		{{-- a --}}
		<tr>
			<td>
				<strong> A .</strong>
			</td>
			<td>
				<input type="text" style="height: 50px;" name="a" class="form-control"  value="" placeholder="Ketikkan jawaban...">
			</td>
			<td class="pl-5">
				<div class="selectgroup selectgroup-pills">
				<label class="selectgroup-item">
					<input type="radio" class="form-check-input" name="answer_key" value="a">
					<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
				</label>
				</div>
			</td>
		</tr>
		{{-- B --}}
		<tr>
			<td>
				<strong> B .</strong>
			</td>
			<td>
				<input type="text" style="height: 50px;" name="b" class="form-control"  value="" placeholder="Ketikkan jawaban...">
			</td>
			<td class="pl-5">
				<div class="selectgroup selectgroup-pills">
				<label class="selectgroup-item">
					<input type="radio" class="form-check-input" name="answer_key" value="b">
					<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
				</label>
				</div>
			</td>
		</tr>
		{{-- c --}}
		<tr>
			<td>
				<strong> C .</strong>
			</td>
			<td>
				<input type="text" style="height: 50px;" name="c" class="form-control"  value="" placeholder="Ketikkan jawaban...">
			</td>
			<td class="pl-5">
				<div class?="selectgroup selectgroup-pills">
				<label class="selectgroup-item">
					<input type="radio" class="form-check-input" name="answer_key" value="c">
					<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
				</label>
				</div>
			</td>
		</tr>
		{{-- d --}}
		<tr>
			<td>
				<strong> D .</strong>
			</td>
			<td>
				<input type="text" style="height: 50px;" name="d" class="form-control"  value="" placeholder="Ketikkan jawaban...">
			</td>
			<td class="pl-5">
				<div class="selectgroup selectgroup-pills">
				<label class="selectgroup-item">
					<input type="radio" class="form-check-input" name="answer_key" value="d">
					<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
				</label>
				</div>
			</td>
		</tr>
		{{-- e --}}
		<tr>
			<td>
				<strong> E .</strong>
			</td>
			<td>
				<input type="text" style="height: 50px;" name="e" class="form-control"  value="" placeholder="Ketikkan jawaban...">
			</td>
			<td class="pl-5">
				<div class="selectgroup selectgroup-pills">
				<label class="selectgroup-item">
					<input type="radio" class="form-check-input" name="answer_key" value="e">
					<span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
				</label>
				</div>
			</td>
		</tr>
	</table>
	<button type="submit" class="btn btn-primary me-2 mt-4">Kirimkan</button>
</form>

<script>
	$(document).on("click", ".browse", function() {
	var file = $(this).parents().find(".file");
	file.trigger("click");
	});
	$('input[type="file"]').change(function(e) {
	var fileName = e.target.files[0].name;
	$("#file").val(fileName);

	var reader = new FileReader();
	reader.onload = function(e) {
		// get loaded data and render thumbnail.
		document.getElementById("preview").src = e.target.result;
	};
	// read the image file as a data URL.
	reader.readAsDataURL(this.files[0]);
	});
</script>