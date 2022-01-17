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
        <link href="assets/img/Logo-Pondok.png" rel="icon" />

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
        <link
            href="assets/vendor/bootstrap/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
            rel="stylesheet"
        />
        <link
            href="assets/vendor/boxicons/css/boxicons.min.css"
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
                    src="./assets/img/logo-bg.png"
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
                <span class="mobile-text mt-2">Masukkan kode yang baru saja kami <br> kirim ke apk WA Anda
                    <b style="color:#FFAD60;">089538001****</b>
                </span>
                <form action="#" method="POST" class="position-relative">
                    @csrf
                    @method('POST')
                    <div class="d-flex justify-content-around py-3">
                        <input type="text" maxlength="1" style="width:50px;" class="otpinput text-center form-control">
                        <input type="text" maxlength="1" style="width:50px;" class="otpinput text-center form-control">
                        <input type="text" maxlength="1" style="width:50px;" class="otpinput text-center form-control">
                        <input type="text" maxlength="1" style="width:50px;" class="otpinput text-center form-control">
                    </div>

                    <div class="d-flex justify-content-center mt-2 mb-3">
                        {{-- <a href="{{ url()->previous() }}">
                            <button class="btn rounded-pill button px-4 fw-bold">
                                Go back
                            </button>
                        </a>
                        <div class="mx-3"></div> --}}
                        <button class="btn rounded-pill button px-5 fw-bold">Submit</button>
                    </div>
                </form>

                <div>
                    <p class="d-block mobile-text" id="countdown"></p>
                    <div class="text-center">
                        <span class="d-block mobile-text" id="resend"></span>
                    </div>
                </div>
            </div>
        </div>

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

            // Countdown timer
            let timerOn = true;

            function timer(remaining){
                var m = Math.floor(remaining / 60);
                var s = remaining % 60;
                m = m < 10 ? '0' + m : m;
                s = s < 10 ? '0' + s : s;

                document.getElementById('countdown').innerHTML =
                'Timer Left :' + ' ' + m + ':' + s;
                remaining -=1;
                if (remaining >= 0 && timerOn) {
                    setTimeout( function() {
                        timer(remaining);
                    }, 1000);
                document.getElementById('resend').innerHTML =
                '';

                return;

                } else {
                    document.getElementById('countdown').innerHTML =
                '';
                }

                if (!timerOn) {
                    return;
                }

                document.getElementById('resend').innerHTML = 'Belum menerima kode? <a href="#" style="color: #FFAD60;font-weight: bold;" onclick="timer(30)">kirim ulang</a>'
            }

            // setting long timer
            timer(30);
        </script>
    </body>
</html>
