<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="PSB Pondok Informatika Al-Madinah" />
        <meta
            name="keywords"
            content="HTML, CSS, JavaScript, PHP, Pendaftaran"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pondok Informatika Al Madinah</title>

        <!-- Favicons -->
        <link href="{{ asset('assets/img/Logo-Pondok.png') }}" rel="icon" />

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
        <link
            href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}"
            rel="stylesheet"
        />
        <link
            href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}"
            rel="stylesheet"
        />
        {{-- <link
            href="assets/vendor/glightbox/css/glightbox.min.css"
            rel="stylesheet"
        />
        <link
            href="assets/vendor/swiper/swiper-bundle.min.css"
            rel="stylesheet"
        /> --}}

        <!-- Template Main CSS File -->
        {{-- <link href="assets/css/style.css" rel="stylesheet" /> --}}
        <style >
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* Firefox */
            input[type=number] {
            -moz-appearance: textfield;
            }

            /* -------- Line -------- */

            body{
                background: linear-gradient(-45deg, lightseagreen, #23d5ab, #23a6d5, steelblue);
                background-size: 500%, 500%;
                position: relative;
                animation: change 10s ease-in-out infinite;
            }

            .card {
                width: 350px;
                padding: 10px;
                border-radius: 20px;
                background-image: linear-gradient(to right bottom, #37b091, #44708b);
                border: none;
                position: relative;
            }

            .container{
                height: 100vh;
            }

            .mobile-text {
                color: #fff;
                font-size: 15px;
            }

            .button {
                color: #fff;
                border: 2px solid lightseagreen;
                transition: all 500ms;
            }

            .button:hover {
                color: #104852  !important;
                background: linear-gradient(to right, lightseagreen, steelblue);
            }

            @keyframes change {
                0% {
                    background-position: 0 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0 50%;
                }
            }
        </style>
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center container">
            <div class="card py-5 px-4 text-center shadow position-relative overflow-hidden">
                <img
                    src="{{ asset('./assets/img/logo-bg.png') }}"
                    class="position-absolute"
                    alt="logo"
                    width="400"
                    style="
                        z-index: -0;
                        top: 100px;
                        left: -140px;
                    "
                />
                <h3 class="m-0 text-white">OTP Verification</h3>
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
                <span class="mobile-text mt-2">Masukkan kode yang baru saja kami kirim ke nomor Whatsapp Anda
                    <b style="color:#FFAD60;">{{ $wa }}</b>
                </span>
                {{-- <p>waktu tersisa <span id='time-remaining'></span> detik.</p> --}}
                {{-- <p class="mobile-text"> Silahkan masukkan Kode OTP yang telah kami kirim di whatsapp!</p> --}}
                <form method="POST" action="{{ route('post-token', $wa) }}" class="position-relative">
                    @csrf
                    @method('POST')
                    <div class="d-flex justify-content-around py-3">
                        <input type="text" name="t1" maxlength="1" style="width:50px;" class="otpinput text-center rounded border border-0 outline-none border-secondary py-1">
                        <input type="text" name="t2" maxlength="1" style="width:50px;" class="otpinput text-center rounded border border-0 outline-none border-secondary py-1">
                        <input type="text" name="t3" maxlength="1" style="width:50px;" class="otpinput text-center rounded border border-0 outline-none border-secondary py-1">
                        <input type="text" name="t4" maxlength="1" style="width:50px;" class="otpinput text-center rounded border border-0 outline-none border-secondary py-1">
                    </div>

                    {{-- <div class="d-flex justify-content-center mt-2 mb-3">
                        <a href="{{ url()->previous() }}">
                            <button class="btn rounded-pill button px-4 fw-bold">
                                Go back
                            </button>
                        </a>
                        <div class="mx-3"></div>
                    </div> --}}
                    <button class="btn rounded-pill button px-4 fw-bold" id="ExampleButton">Konfirmasi</button>
                </form>
                {{-- <div class="mt-3">
                    <a href="{{ route('resend-token', $wa) }}" class="btn rounded-pill button px-4 fw-bold btn-block" tabindex="4" id="ExampleButton1">
                        Kirim Ulang kode OTP
                    </a>
                </div> --}}
                <div>
                    <p class="d-block mobile-text" id="countdown">Sisa Waktu :</p>
                    <div class="text-center">
                        <span class="d-block mobile-text" id="resend"></span>
                    </div>
                </div>
                <div class="mobile-text">
                    Copyright &copy; pondok Informatika {{ date('Y') }}
                </div>
            </div>
        </div>


        {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
            }
        </script> --}}

        {{-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
        </script> --}}
        

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            // Auto fokus input kosong
            document.querySelectorAll('.otpinput').forEach((input) => {
                input.oninput = function() {
                    let { nextElementSibling } = this;
                    while (nextElementSibling && nextElementSibling.tagName !== 'INPUT') {
                    nextElementSibling = nextElementSibling.nextElementSibling;
                    }
                    if (nextElementSibling) {
                    nextElementSibling.focus();
                    }
                }
            });
            // Timer
            let timerOn = true;
            function timer(remaining){
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;
                document.getElementById('countdown').innerHTML =
                'Sisa Waktu :' + ' ' + m + ':' + s;
                remaining -=1;
                if (remaining >= 0 && timerOn) {
                    setTimeout( function() {
                        timer(remaining);
                    }, 1000);
                document.getElementById('resend').innerHTML =
                '';
                return;
                }else{
                document.getElementById('countdown').innerHTML =
                '';
                }
                if (!timerOn) {
                    return;
                }
                $("#ExampleButton").prop('disabled',true);
                document.getElementById('resend').innerHTML = 'Belum menerima kode? <a href="{{ route('resend-token', $wa) }}" style="color: #FFAD60;font-weight: bold;" onclick="timer(60)">kirim ulang</a>'
            }
            timer(180);
        </script>
    </body>
</html>
