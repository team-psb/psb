<div class="container">
    <div class="row">
        <div class="col">
        <table cellspacing="2" cellpadding="10">
            <tr>
                <td>
                    <div>
                        <h6 class="fw-bold">Soal  :</h6>
                    </div>
                    {{ $question->question }}
                </td>
            </tr>
            <tr>
                <td>
                    <h6 class="fw-bold">Jawaban :</h6>
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
                    <span>D. </span> 
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
                    <h6 class="fw-bold">Poin : </h6>
                    <div>
                        <span class="me-4 text-uppercase">a : {{ $question->poin_a }}</span>
                        <span class="mx-4 text-uppercase">b : {{ $question->poin_b }}</span>
                        <span class="mx-4 text-uppercase">c : {{ $question->poin_c }}</span>
                        <span class="mx-4 text-uppercase">d : {{ $question->poin_d }}</span>
                        <span class="mx-4 text-uppercase">e : {{ $question->poin_e }}</span>
                    </div>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>