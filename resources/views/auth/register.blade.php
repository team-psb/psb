@php
    $academy_year = \App\Models\AcademyYear::where('is_active','=','1')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Star Admin2 </title>
<!-- plugins:css -->
<link rel="stylesheet" href="/template/vendors/feather/feather.css">
<link rel="stylesheet" href="/template/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="/template/vendors/ti-icons/css/themify-icons.css">
<link rel="stylesheet" href="/template/vendors/typicons/typicons.css">
<link rel="stylesheet" href="/template/vendors/simple-line-icons/css/simple-line-icons.css">
<link rel="stylesheet" href="/template/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<link rel="stylesheet" href="/template/css/vertical-layout-light/style.css">
<!-- endinject -->
<link rel="shortcut icon" href="/template/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-i/templates-center auth px-0">
            <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
                <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                    <div class="brand-logo">
                        <!-- <img src="/template/images/logo.svg" alt="logo"> -->
                    </div>
                    <h4>Hello! let's get started</h4>
                    <h6 class="fw-light">Masuk untuk melanjutkan.</h6>
                    <form class="pt-3" action="{{ route('register-proses') }}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="name">Nama Pengguna</label>
                            <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus placeholder="contoh : budi">
                            </div>
                            
                            <div class="form-group">
                                <label for="full_name">Nama Lengkap</label>
                                <input id="full_name" type="text"  class="form-control" name="full_nama" tabindex="1" required autofocus placeholder="contoh : Budi Sasono">
                            </div>
            
                            <div class="form-group">
                                <label for="age">Tanggal Lahir</label>
                                <input id="age" type="date"  placeholder="contoh : 20" class="form-control" name="age" tabindex="1" required autofocus>
                            </div>
            
                            <div class="form-group">
                                <label for="family">Keluarga</label>
                                <select name="family" class="form-select">
                                    <option value="">-- Keluarga --</option>
                                    <option value="sangat-mampu">SANGAT-MAMPU</option>
                                    <option value="mampu">MAMPU</option >
                                    <option value="tidak-mampu">TIDAK-MAMPU</option>
                                </select>
                            </div>
                                                
                            <div class="form-group">
                                <label for="no_wa">No WhatssApp</label>
                                <input id="no_wa"  type="number" class="form-control " name="no_wa" tabindex="1" required autofocus placeholder="contoh : 085823945673">
                                <small>mohon di isi denggan no  whatsapp yang dapat kami hubungi!.</small>
                            </div>
            
                            {{-- <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email"  placeholder="contoh : budi@mail.com" type="email" class="form-control " name="email" tabindex="1" required autofocus>
                                <small> mohon di isi denggan alamat email aktif anda !</small>
            
                            </div> --}}
            
                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password"  type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="row d-flex ">
                                <div class="col">
                                    <input
                                        class="form-check-input ml-1"
                                        type="checkbox"
                                        onclick="myFunction()"
                                    />
                                    <small class="ml-4">show password</small>
                                </div>
                                </div>
                                
                                <br>
                                <small>di isi dengan password utuk masuk ke akun anda, min 6 karakter max 20 karakter.</small>
                            </div>
            
                            
                            <div class="form-group">
                                <label for="gender"
                                >Jenis Kelamin, Wanita Belum Diterima <b>*</b></label
                                >
                                <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="gender"
                                    id="gender"
                                    value="l"
                                    required
                                    
                                />
                                <label class="form-check-label" for="gender">
                                    Laki-Laki
                                </label>
                                <div class="invalid-feedback">
                                    jenis kelamin harus di isi
                                </div>
                                </div>
                            </div>
            
                            <div class="form-group">
                                @if (is_null($academy_year))
                                <button type="submit" class="btn btn-warning btn-lg btn-block" disabled tabindex="4">
                                    pendaftaran belum di buka
                                </button>
                                @else
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Daftar
                                </button>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="/template/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="/template/js/off-canvas.js"></script>
<script src="/template/js/hoverable-collapse.js"></script>
<script src="/template/j/template.js"></script>
<script src="/template/js/settings.js"></script>
<script src="/template/js/todolist.js"></script>
<script>
    function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
<!-- endinject -->
</body>

</html>
