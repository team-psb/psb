@php
    $tahun_ajaran= App\Models\AcademyYear::where('is_active', true)->first();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Konfirmasi Pendaftaran | Kode OTP</title>

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
            <div class="card card-success">
              <div class="card-header"><h4>Konfirmasi pendaftaran</h4></div>
              <div class="card-body">
                @if (session('sukses-kirim'))
                  <div class="alert alert-success">
                    {{ session('sukses-kirim') }} <br>
                  </div>
                @endif
                @if (session('gagal-kirim'))
                    <div class="alert alert-danger">
                      {{ session('gagal-kirim') }} <br>
                    </div>
                @endif  
                @if (session('resend-msg'))
                    <div class="alert alert-danger">
                      {{ session('resend-msg') }} <br>
                    </div>
                @endif  
                @if (session('alert-login'))
                    <div class="alert alert-danger">
                      {{ session('alert-login') }} <br>
                    </div>
                @endif           
                <form method="POST" action="{{ route('post-token', $wa) }}" class="needs-validation" novalidate="">
                  @csrf
                  @method('POST')
                  {{-- <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"> --}}
                  <div class="form-group">
                    <label for="phone" class="fw-bold">Kode OTP</label>
                    <p>Segera Masukkan Kode OTP. waktu tersisa <span id='time-remaining'></span> detik.</p>
                    <input id="phone" value="{{ old('token') }}" placeholder="Masukkan Kode OTP di sini..." type="text" class="form-control @error('token') is-invalid @enderror" name="token" tabindex="1" required autofocus>
                    <small class="text-danger"> Silahkan masukkan Kode OTP yang telah kami kirim di whatsapp!</small>
                    @error('phone')
                      <div class="invalid-feedback">
                        {{ $message }} 
                      </div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block" tabindex="4" id="ExampleButton">
                      Konfirmasi
                    </button>
                  </div>
                </form>
                  <a href="{{ route('resend-token', $wa) }}" class="btn btn-success btn-lg btn-block" tabindex="4" id="ExampleButton1">
                    Kirim Ulang kode OTP
                  </a>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; pondok Informatika {{ date('Y') }}
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

  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script type='text/javascript'>
    var secondsBeforeExpire = 300;
    $("#ExampleButton1").hide();
    
    // This will trigger your timer to begin
    var timer = setInterval(function(){
        // If the timer has expired, disable your button and stop the timer
        if(secondsBeforeExpire <= 0){
            clearInterval(timer);
            $("#ExampleButton").prop('disabled',true);
            // $("#ExampleButton1").prop('disabled',false);

            $("#ExampleButton1").show();
        }
        // Otherwise the timer should tick and display the results
        else{
            // Decrement your time remaining
            secondsBeforeExpire--;
            $("#time-remaining").text(secondsBeforeExpire);      
        }
    },1000);
  </script>
  @stack('end-script')

</body>
</html>
