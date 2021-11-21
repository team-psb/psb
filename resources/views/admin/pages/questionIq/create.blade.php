@extends('admin.layouts.app')

@section('title', 'Buat Soal IQ')

@section('content')
<div class="main-panel">        
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Soal Tes IQ</h4>
                <p class="card-description">
                    Silahkan lengkapi formulir untuk menambahkan data !
                </p>
                <form class="forms-sample">
                    <div class="form-group d-flex">
                        <div class="mx-2" style="width: 100%;">
                            <label for="exampleTextarea1">Soal</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" style="height: 150px;"></textarea>    
                        </div>
                        <div class="mx-2" style="width: 100%;">
                            <label>File upload</label>
                            <img src="{{ asset('template/images/pita_avatar.png') }}" width="150px" alt="">
                            <input type="file" name="img[]" class="file-upload-default">
                            <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <table class="w-100 mt-5" cellpadding="5" cellspacing="2">
                        <tr>
                          <th colspan="2">
                            <h6>Jawaban</h6>
                          </th>
                          <th>
                            <h6>Kunci Jawaban</h6>
                          </th>
                        </tr>
                        {{-- A --}}
                        <tr>
                          <td>
                            <strong> A .</strong>
                          </td>
                          <td>
                            <input type="text" style="height: 50px;" name="a" class="form-control"  value="">
                            </input>
                          </td>
                          <td class="pl-5">
                            <div class="selectgroup selectgroup-pills">
                              <label class="selectgroup-item">
                                <input type="radio" class="form-check-input" name="kunci_jawaban" value="a">
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
                            <input type="text" style="height: 50px;" name="b" class="form-control"  value="">
                            </input>
                          </td>
                          <td class="pl-5">
                            <div class="selectgroup selectgroup-pills">
                              <label class="selectgroup-item">
                                <input type="radio" class="form-check-input" name="kunci_jawaban" value="b">
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
                            <input type="text" style="height: 50px;" name="c" class="form-control"  value="">
                            </input>
                          </td>
                          <td class="pl-5">
                            <div class="selectgroup selectgroup-pills">
                              <label class="selectgroup-item">
                                <input type="radio" class="form-check-input" name="kunci_jawaban" value="c">
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
                            <input type="text" style="height: 50px;" name="d" class="form-control"  value="">
                            </input>
                          </td>
                          <td class="pl-5">
                            <div class="selectgroup selectgroup-pills">
                              <label class="selectgroup-item">
                                <input type="radio" class="form-check-input" name="kunci_jawaban" value="d">
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
                            <input type="text" style="height: 50px;" name="e" class="form-control"  value="">
                            </input>
                          </td>
                          <td class="pl-5">
                            <div class="selectgroup selectgroup-pills">
                              <label class="selectgroup-item">
                                <input type="radio" class="form-check-input" name="kunci_jawaban" value="e">
                                <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-check"></i></span>
                              </label>
                            </div>
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