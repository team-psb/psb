<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="PSB Pondok Mahir Teknologi" />
        <meta
            name="keywords"
            content="HTML, CSS, JavaScript, PHP, Pendaftaran"
        />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Pondok Mahir Teknologi</title>

        <!-- Favicons -->
        <link href="{{ asset('assets_new/logo/logo-s-rgb.png') }}" rel="icon" />
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

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
        <link
            href="assets/vendor/glightbox/css/glightbox.min.css"
            rel="stylesheet"
        />
        <link
            href="assets/vendor/swiper/swiper-bundle.min.css"
            rel="stylesheet"
        />

        <!-- Template Main CSS File -->
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>

    <body>
        <!-- ======= Top Bar ======= -->
        <section id="topbar" class="d-flex align-items-center">
            <div
                class="
                    container
                    d-flex
                    justify-content-center justify-content-md-between
                "
            >
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"
                        ><a
                            href="pondokitalmadinah@gmail.com"
                            class="email-address"
                        ></a
                    ></i>
                    <i
                        class="
                            bi bi-phone
                            d-flex
                            align-items-center
                            ms-4
                            d-none d-lg-inline
                            no-hp
                        "
                        ><span></span
                    ></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a
                        href="https://www.facebook.com/PondokInformatikaAlmadinah/"
                        class="facebook"
                        ><i class="bi bi-facebook"></i
                    ></a>
                    <a
                        href="https://www.instagram.com/pondokinformatika/?hl=id"
                        class="instagram"
                        ><i class="bi bi-instagram"></i
                    ></a>
                </div>
            </div>
        </section>

        <!-- ======= Background Image ======= -->
        <div class="d-none d-lg-inline">
            {{-- <img
                src="./assets/logo-bg.png"
                alt="logo"
                class="position-absolute img-fluid"
                width="1100"
                style="z-index: -1; top: 120px; left: -67vh"
            /> --}}
        </div>
        <div class="d-none d-lg-inline">
            <img
                src="./assets/bawah.png"
                alt="bg-bawah"
                class="position-absolute img-fluid"
                width="400"
                style="z-index: -1; bottom: -120px; left: -5px"
            />
        </div>
        <div class="d-none d-lg-inline">
            <img
                src="./assets/Atas.png"
                class="position-absolute"
                alt="bg-atas"
                width="700"
                style="z-index: -1; top: 0px; right: -30px"
            />
        </div>
        <!-- ======= End Background Image ======= -->

        <!-- WA Live -->
        <a id="Wa" class="wa" title="Chat Live Wa" href="#">
            <img src="./assets/wa.png" alt="logo-wa" width="80" />
        </a>

        <!-- ======= Header ======= -->
        <header id="header" class="d-flex align-items-center user-select-none">
            <div
                class="
                    container
                    d-flex
                    align-items-center
                    justify-content-between
                "
            >
                <h1 class="logo">
                    <a href="#">
                        <img
                            src="./assets/Logo-Pondok.png"
                            alt="Logo-Pondok"
                            width="60"
                            class="img-fluid"
                            id="logo-image"
                        />
                        <span class="text-logo d-none d-sm-inline" id="text-lg">
                            Pondok Mahir Teknologi
                        </span>
                    </a>
                </h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

                {{-- <nav id="navbar" class="navbar">
                    <ul>
                        <li>
                            <a
                                class="nav-link scrollto active"
                                href="#home"
                                id="link1"
                                >Home</a
                            >
                        </li>
                        <li>
                            <a
                                class="nav-link scrollto"
                                href="#regis"
                                id="link2"
                                >Daftar</a
                            >
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#stat" id="link3"
                                >Statistik</a
                            >
                        </li>
                        <li>
                            <a
                                class="nav-link scrollto"
                                href="#announce"
                                id="link4"
                                >Pengumuman</a
                            >
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#qna" id="link5"
                                >Q&A</a
                            >
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#info" id="link6"
                                >Informasi</a
                            >
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav> --}}
                <!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->

        <!-- ======= Home Section ======= -->
        <section id="home" class="d-flex">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row">
                    {{-- <div class="col-md-6 col-sm-12 mb-5 mb-lg-0 mb-md-0">
                        <h3 class="fw-bold mb-4 banner-title"></h3>

                        <div class="paragraf-text mb-5">
                            <p class="sub-banner1">
                                Web Penerimaan Peserta Didik Baru <br />
                                Tahun Pelajaran 2021/2022 <br />
                                Pondok Mahir Teknologi
                            </p>
                            <p class="pt-2 sub-banner2">
                                Pendaftaran Santri Baru telah dibuka. <br />
                                Silahkan Segera Daftarkan dan Lengkapi Formulir
                                Pendaftaran.
                            </p>
                        </div>

                        <div class="mt-5">
                            <a
                                href="#alur"
                                class="text-decoration-none button-banner"
                            >
                                <button
                                    class="
                                        btn
                                        button
                                        bg-transparent
                                        rounded-pill
                                        px-3
                                        py-2
                                    "
                                >
                                    Alur Pendaftaran
                                </button>
                            </a>
                            <span class="mx-2"></span>
                            <a
                                href="#"
                                class="text-decoration-none button-banner2"
                            >
                                <button
                                    class="
                                        btn
                                        button
                                        bg-transparent
                                        rounded-pill
                                        px-3
                                        py-2
                                    "
                                >
                                    Lebih Lanjut
                                </button>
                            </a>
                        </div>
                    </div> --}}
                    <div
                        class="
                            col-md-12 col-sm-12
                            position-relative
                            login-banner
                            mb-5 mb-lg-0
                        "
                    >
                        <!-- Animate -->
                        <img
                            src="./assets/people.png"
                            alt="people"
                            class="
                                position-absolute
                                d-none d-xl-inline
                                img-fluid
                            "
                            style="left: 120px"
                            width="300"
                        />
                        <div
                            class="
                                card
                                login-form
                                py-3
                                px-3
                                shadow-lg
                                bg-body
                                {{-- float-md-end --}}
                                overflow-hidden
                                mx-auto
                            "
                            style="width: 600px"
                            data-aos="zoom-in"
                        >
                            <div>
                                {{-- <img
                                    src="./assets/logo-bg.png"
                                    class="position-absolute"
                                    alt="logo"
                                    width="400"
                                    style="
                                        z-index: -0;
                                        top: 157px;
                                        left: -150px;
                                    "
                                /> --}}
                            </div>

                            <div class="card-body">
                                <h1
                                    class="
                                        card-title
                                        text-center text-white
                                        mb-5
                                    "
                                >
                                    Login Here
                                </h1>
                                <div class="card-text">
                                    <form action="{{ route('login-proses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <div class="form-floating">
                                                <input
                                                    type="number"
                                                    class="
                                                        form-control
                                                        rounded-pill
                                                        px-4
                                                    "
                                                    id="floatingInput"
                                                    placeholder="1111111111"
                                                    name="phone"
                                                />
                                                <label
                                                    for="floatingInput"
                                                    class="px-4"
                                                    >Nomor Handphone</label
                                                >
                                            </div>

                                            <div
                                                class="
                                                    form-floating
                                                    d-flex
                                                    mt-4
                                                "
                                            >
                                                <input
                                                    type="password"
                                                    class="
                                                        form-control
                                                        rounded-pill
                                                        px-4
                                                    "
                                                    name="password"
                                                    id="floatingPassword"
                                                    placeholder="Password"
                                                />
                                                <label
                                                    for="floatingPassword"
                                                    class="px-4"
                                                    >Password</label
                                                >
                                            </div>
                                            <div
                                                class="
                                                    d-flex
                                                    justify-content-between
                                                    mt-2
                                                "
                                            >
                                                <div
                                                    class="
                                                        d-flex
                                                        align-items-center
                                                        px-3
                                                    "
                                                    style="
                                                        font-size: 12px;
                                                        color: #fff;
                                                        z-index: 1;
                                                    "
                                                >
                                                    <input
                                                        type="checkbox"
                                                        onclick="myFunction()"
                                                    />&nbsp; Show Password
                                                </div>
                                            </div>
                                            <br />
                                            <button
                                                class="
                                                    btn
                                                    sign-in
                                                    rounded-pill
                                                    text-uppercase
                                                    px-4
                                                    py-2
                                                    mt-4
                                                "
                                            >
                                                Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Home -->


        <!-- Vendor JS Files -->
        <script src="assets/vendor/purecounter/purecounter.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
        <script>
            //GSAP
            gsap.from(".logo", {
                delay: 1.5,
                duration: 1,
                opacity: 0,
            });
            gsap.from(".line-1", {
                delay: 2,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-2", {
                delay: 3,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-3", {
                delay: 4,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-4", {
                delay: 5,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-5", {
                delay: 6,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur_image_1", {
                delay: 7,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_2", {
                delay: 9,
                duration: 2,
                y: 100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_3", {
                delay: 11,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_4", {
                delay: 13,
                duration: 2,
                y: 100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_5", {
                delay: 15,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur-text", {
                delay: 8,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text2", {
                delay: 10,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text3", {
                delay: 12,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text4", {
                delay: 14,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text5", {
                delay: 16,
                duration: 1,
                scale: 0,
                opacity: 0,
            });

            gsap.to(".email-address", {
                text: "pondokitalmadinah@gmail.com",
                duration: 2,
                delay: 2,
            });
            gsap.to(".no-hp", {
                text: "085 725 249 265",
                duration: 2,
                delay: 4,
            });
            gsap.from(".social-links", {
                x: 50,
                opacity: 0,
                duration: 1,
                delay: 6,
            });
            gsap.to(".banner-title", {
                text: "Selamat Datang Di Web PSB Online Pondok Mahir Teknologi",
                duration: 5,
                delay: 2,
            });
            gsap.from(".sub-banner1", {
                x: -100,
                duration: 2,
                opacity: 0,
                delay: 7,
            });
            gsap.from(".sub-banner2", {
                x: -100,
                duration: 2,
                opacity: 0,
                delay: 8,
            });
            gsap.from(".button-banner", {
                duration: 1,
                opacity: 0,
                delay: 9,
            });
            gsap.from(".button-banner2", {
                duration: 1,
                opacity: 0,
                delay: 10,
            });
            gsap.from(".title-stats", {
                y: -50,
                duration: 1.5,
                opacity: 0,
                delay: 2,
                ease: "bounce",
            });
            gsap.from(".text-stats", {
                opacity: 0,
                duration: 2,
                delay: 3,
            });
            gsap.from(".text-stats2", {
                opacity: 0,
                duration: 2,
                delay: 4,
            });
            gsap.from(".text-stats3", {
                opacity: 0,
                duration: 2,
                delay: 5,
            });
        </script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
        <script>
            // Show Password
            function myFunction() {
                var x = document.getElementById("floatingPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function showFunction() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
            function seeFunction() {
                var x = document.getElementById("confirm_password");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>
