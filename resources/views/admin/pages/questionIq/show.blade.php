<div class="container">
    <div class="row">
        <div class="col">
        <table cellspacing="2" cellpadding="10">
            <tr class="d-flex justify-content-start">
                <td>
                    <div>
                        <h5 class="fw-bold">Soal :</h5>
                    </div>
                    {{ $question->question }}
                </td>
                @if (isset($question->image))
                    <td>
                        <div>
                            <h6 class="fw-bold">Gambar :</h6>
                        </div>
                        <img src="{{ Storage::url($question->image) }}" alt="" style="width: 200px;">
                    </td>
                @endif
            </tr>
            <tr>
                <td>
                    <h5 class="fw-bold">Jawaban :</h5>
                </td>
            </tr>
            <tr>
                <td class="d-flex">
                    <span>A. </span> 
                    <span class="ps-1">{{ $question->a }}</span>
                </td>
            </tr>
            <tr>
                <td class="d-flex">
                    <span>B. </span> 
                    <span class="ps-1">{{ $question->b }}</span>
                </td>
            </tr>
            <tr>
                <td class="d-flex">
                    <span>C. </span> 
                    <span class="ps-1">{{ $question->c }}</span>
                </td>
            </tr>
            <tr>
                <td class="d-flex">
                    <span>D.</span> 
                    <span class="ps-1">{{ $question->d }}</span>
                </td>
            </tr>
            <tr>
                <td class="d-flex">
                    <span>E. </span> 
                    <span class="ps-1">{{ $question->e }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Kunci Jawaban : 
                        <span class="text-uppercase">{{ $question->answer_key }}</span>
                    </strong>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>