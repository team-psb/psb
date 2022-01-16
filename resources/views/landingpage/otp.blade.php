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

            body{
                background: #eee;
            }

            .card {
                width: 350px;
                padding: 10px;
                border-radius: 20px;
                background: #fff;
                border: none;
                position: relative;
            }

            .container{
                height: 100vh;
            }

            .mobile-text {
                color: #989696b8;
                font-size: 15px;
            }

            .form-control:focus {
                color: #465057;
                background-color: #fff;
                border-color: #ff8880;
                outline: 0;
                box-shadow: none;
            }
        </style>
    </head>

    <body>
        <div class="d-flex justify-content-center align-items-center container">
            <div class="card py-5 px-4 text-center">
                <h3 class="m-0">OTP Verification</h3>
                <span class="mobile-text mt-2">Masukkan kode yang baru saja kami <br> kirim ke apk WA Anda
                    <b class="text-danger">089538001****</b>
                </span>
                <form action="#" method="POST">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="col-md-2">
                            <input type="text">
                        </div>
                        <div class="col-md-2">
                            <input type="text">
                        </div>
                        <div class="col-md-2">
                            <input type="text">
                        </div>
                        <div class="col-md-2">
                            <input type="text">
                        </div>
                    </div>
                    {{-- <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-success rounded-pill">
                            <a href="#" class="text-decoration-none text-white">
                                Go back
                            </a>
                        </button>
                        <div class="mx-2"></div>
                        <button class="btn btn-danger rounded-pill">Submit</button>
                    </div> --}}
                </form>

                <div class="text-center">
                    <span class="d-block mobile-text">Belum menerima kode?</span>
                    <a href="#" class="fw-bold text-danger" role="button">kirim ulang</a>
                </div>
            </div>
        </div>

        <script src="./assets/js/main.js"></script>
    </body>
</html>
