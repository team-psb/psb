@php
    $tahun_ajaran= App\Models\AcademyYear::where('is_active', true)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Reset Password</title>
        <link href="assets_new/logo/logo-s-rgb.png" rel="icon" />

        @stack('head-style')
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css')}}">
            <link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css')}}">
        @stack('end-style')
        <style>
            b{
            color: red;
            }
        </style>
    </head>

    <body>
        <div id="app">
            <section class="section">
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-6 col-12 m-auto">
                            <div class="login-brand"></div>
                            <div class="card card-primary">
                                <div class="card-header d-flex justify-content-between">
                                    <h4 style="color: #0076F6">Reset Password</h4>
                                    <a class="btn btn-primary rounded btn-lg" href="{{ route('password-getwhatsapp') }}">
                                        Back
                                    </a>
                                </div>
                                <div class="card-body">
                                    @if (session('sukses-buat'))
                                        <div class="alert alert-success">
                                        {{ session('sukses-buat') }} <br>
                                        </div>
                                    @endif
                                    @if (session('gagal-kirim'))
                                        <div class="alert alert-danger">
                                        {{ session('gagal-kirim') }} <br>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('update-password') }}" class="needs-validation" novalidate="">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" value="{{ $token }}" name="token">
                                        <div class="form-group">
                                            <label for="phone">No Whatsapp</label>
                                            <input id="phone" value="{{ old('phone') }}" placeholder="contoh : 08574442XXXX" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" tabindex="1" required autofocus>
                                            <small> silahkan diisi dengan no whatsapp yang anda gunakan untuk login!</small>
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="d-block">
                                                <label for="password" class="control-label">Password</label>
                                            </div>
                                            <input id="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                                            <div class="row d-flex ">
                                                <div class="col">
                                                    <input
                                                        id="showpass"
                                                        class="form-check-input ml-1"
                                                        type="checkbox"
                                                        onclick="myFunction()"
                                                    />
                                                    <label for="showpass" class="ml-4">show password</label>
                                                </div>
                                            </div>

                                            <small>silahkan isi dengan password baru anda, min 6 karakter max 20 karakter.</small>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Reset password
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="simple-footer">
                            &copy; {{ date('Y') }} Copyright <strong><span>Pondok Mahir Teknologi</span></strong>.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        @stack('head-script')
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
        @stack('end-script')

    </body>
</html>
