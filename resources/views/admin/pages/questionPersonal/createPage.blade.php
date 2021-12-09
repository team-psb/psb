@extends('admin.layouts.app')

@section('title', 'Buat Soal Kepribadian')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card card-rounded">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Soal Tes Kepribadian</h4>
                    {{-- <p class="card-description">
                        Silahkan lengkapi formulir untuk menambahkan data !
                    </p> --}}
                <form class="forms-sample" action="{{ route('personals.store') }}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <label for="exampleTextarea1" class="fs-6 fw-bold">Soal :</label>
                        <textarea name="question" class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;"></textarea>    
                    </div>
                    <table class="w-100" cellpadding="10" cellspacing="10">
                        <tr>
                            <th colspan="2">
                                <h6 class="fw-bold">Jawaban :</h6>
                            </th>
                            <th>
                                <h6>Poin Jawaban</h6>
                            </th>
                        </tr>
                        {{-- A --}}
                        <tr>
                            <td>
                                <strong> A .</strong>
                            </td>
                            <td width="74%">
                                <input type="text" style="height: 40px;" name="a" class="form-control"  value="">
                            </td>
                            <td>
                                <select class="form-select" name="poin_a">
                                    <option>--score--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                        {{-- B --}}
                        <tr>
                            <td>
                                <strong> B .</strong>
                            </td>
                            <td width="74%">
                                <input type="text" style="height: 40px;" name="b" class="form-control"  value="">
                            </td>
                            <td>
                                <select class="form-select" name="poin_b">
                                    <option>--score--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                        {{-- c --}}
                        <tr>
                            <td>
                                <strong> C .</strong>
                            </td>
                            <td width="74%">
                                <input type="text" style="height: 40px;" name="c" class="form-control"  value="">
                            </td>
                            <td>
                                <select class="form-select" name="poin_c">
                                    <option>--score--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                        {{-- d --}}
                        <tr>
                            <td>
                                <strong> D .</strong>
                            </td>
                            <td width="74%">
                                <input type="text" style="height: 40px;" name="d" class="form-control"  value="">
                            </td>
                            <td>
                                <select class="form-select" name="poin_d">
                                    <option>--score--</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                        {{-- e --}}
                        <tr>
                            <td>
                                <strong> E .</strong>
                            </td>
                            <td width="74%">
                                <input  type="text" style="height:40px;" name="e" class="form-control"  value="">
                            </td>
                            <td>
                            <select class="form-select" name="poin_e">
                                <option>--score--</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary me-2 mt-4">Kirimkan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection