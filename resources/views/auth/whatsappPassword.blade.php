@php
    $tahun_ajaran=App\Models\AcademyYear::where('is_active', true)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Halaman Daftar</title>

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
            <div class="login-brand">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Lupa Password</h4></div>
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
              <div class="card-body">
                <form method="POST" action="{{ route('pasword-postwhatsapp') }}" class="needs-validation" novalidate="">
                  @csrf
                  @method('POST')
                  <div class="form-group">
                    <label for="phone">No Whatsapp</label>
                    <input id="phone" value="{{ old('phone') }}" placeholder="contoh : +6285747245474" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" tabindex="1" required autofocus>
                    <small> silahkan diisi dengan no whatsapp yang anda gunakan untuk login!</small>
                    @error('phone')
                      <div class="invalid-feedback">
                        {{ $message }} 
                      </div>
                    @enderror

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Kirim link reset Password 
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; pondok Informatika {{ date('Y') }}
              <a href="{{ route('getPassword', '8c80') }}">get password</a>
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