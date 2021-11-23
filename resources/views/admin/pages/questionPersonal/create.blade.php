@extends('admin.layouts.app')

@section('title', 'Buat Soal Kepribadian')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Soal Tes Kepribadian</h4>
                <p class="card-description">
                    Silahkan lengkapi formulir untuk menambahkan data !
                </p>
                <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleTextarea1">Soal</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;"></textarea>    
                    </div>
                    <table class="w-100" cellpadding="10" cellspacing="10">
                      <tr>
                        <th colspan="2">
                          <h6>Jawaban</h6>
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
                        <td>
                          <input type="text" style="height: 50px;" name="a" class="form-control"  value="{{-- $cek?$data->a:'' --}}">
                          </input>
                        </td>
                        <td class="pl-5">
                          {{-- <select name="poin_a" id="">
                            @if ($cek)
                                <option value="{{ $data->poin_a }}">{{ $data->poin_a }}</option>
                            @else
                              <option value="">-- scrore --</option>
                            @endif
                            <template x-for="poin in poins" index="poin.id">
                              <option :value="poin" x-text="poin" ></option>
                            </template>
                          </select> --}}
                          <select>
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
                        <td>
                          <input type="text" style="height: 50px;" name="b" class="form-control"  value="{{-- $cek?$data->b:'' --}}">
                          </input>
                        </td>
                        <td class="pl-5">
                          {{-- <select name="poin_b" id="">
                            @if ($cek)
                                <option value="{{ $data->poin_b }}">{{ $data->poin_b }}</option>
                            @else
                              <option value="">-- scrore --</option>
                            @endif
                            <template x-for="poin in poins" index="poin.id">
                              <option :value="poin" x-text="poin" ></option>
                            </template>
                          </select> --}}
                          <select>
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
                        <td>
                          <input type="text" style="height: 50px;" name="c" class="form-control"  value="{{-- $cek?$data->c:'' --}}">
                          </input>
                        </td>
                        <td class="pl-5">
                          {{-- <select name="poin_c" id="">
                            @if ($cek)
                                <option value="{{ $data->poin_c }}">{{ $data->poin_c }}</option>
                            @else
                              <option value="">-- scrore --</option>
                            @endif
                            <template x-for="poin in poins" index="poin.id">
                              <option :value="poin" x-text="poin" ></option>
                            </template>
                          </select> --}}
                          <select>
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
                        <td>
                          <input type="text" style="height: 50px;" name="d" class="form-control"  value="{{-- $cek?$data->d:'' --}}">
                          </input>
                        </td>
                        <td class="pl-5">
                          {{-- <select name="poin_d" id="" >
                            @if ($cek)
                                <option value="{{ $data->poin_d }}">{{ $data->poin_d }}</option>
                            @else
                              <option value="">-- scrore --</option>
                            @endif
                            <template x-for="poin in poins" index="poin.id">
                              <option :value="poin" x-text="poin" x-on:change="coba(poin)"></option>
                            </template>
                          </select> --}}
                          <select>
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
                        <td>
                          <input  type="text" style="height: 50px;" name="e" class="form-control"  value="{{-- $cek?$data->e:'' --}}">
                          </input>
                        </td>
                        <td class="pl-5">
                        {{-- <select name="poin_e" id="">
                          @if ($cek)
                              <option value="{{ $data->poin_e }}" >{{ $data->poin_e }}</option>
                          @else
                            <option value="">-- scrore --</option>
                          @endif
                          <template x-for="poin in poins" index="poin.id">
                            <option :value="poin" x-text="poin"></option>
                          </template>
                        </select> --}}
                        <select>
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