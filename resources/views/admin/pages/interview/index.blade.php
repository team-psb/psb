@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title pb-4" style="border-bottom: 1px solid black;">Video Pendaftar</h4>
                        <p class="card-description">
                        Daftar Video Pendaftar
                        </p>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No WhatsApp</th>
                                        <th>Status</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Jacob</td>
                                        <td>
                                            <div class="input-group">
                                                <input value="085023234534" id="copy" disabled type="text" class="form-control fw-bold">
                                                <div class="input-group-append">
                                                    <button onclick="myFunction()"  class="input-group-text btn-success text-light">copy</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td><label class="badge badge-success">Lolos</label></td>
                                        <td>
                                            <a href="#" type="button" class="btn py-2 btn-danger btn-sm">
                                                <i class="mdi mdi-delete"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
<script>
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("copy");
    
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
    
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
    
    /* Alert the copied text */
    alert("Berhasil di salin : " + copyText.value);
    }
    </script>
@endpush