@php
    $tahun_ajaran = \App\Models\AcademyYear::where('is_active','=','1')->first();
    $gelombang = App\Models\Stage::whereHas('academy_year', function($query){
        $query->where('is_active', true);
    })->orderBy('created_at', 'desc')->pluck('name')->first();
    
@endphp
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
        <link href="assets/Logo-Pondok.png" rel="icon" />
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
            <img
                src="./assets/logo-bg.png"
                alt="logo"
                class="position-absolute img-fluid"
                width="1100"
                style="z-index: -1; top: 120px; left: -67vh"
            />
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
                            Pondok Informatika Al-Madinah
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
        <section id="home" class="d-flex mb-5">
            <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row">
                    {{-- <div class="col-md-6 col-sm-12 mb-5 mb-lg-0 mb-md-0">
                        <h3 class="fw-bold mb-4 banner-title"></h3>

                        <div class="paragraf-text mb-5">
                            <p class="sub-banner1">
                                Web Penerimaan Peserta Didik Baru <br />
                                Tahun Pelajaran 2021/2022 <br />
                                Pondok Informatika Al-Madinah
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
                    @if (session('success-register'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body fw-bold">
                                <button class="btn-close" data-dismiss="alert" aria-label="Close">
                                    <span>&times;</span>
                                </button>
                                {{ session('success-register') }}
                            </div>
                        </div>
                    @endif
                        <!-- Animate -->
                        <img
                            src="./assets/people.png"
                            alt="people"
                            class="
                                position-absolute
                                d-none 
                                {{-- d-xl-inline --}}
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
                                w-100 w-lg-50
                            "
                            data-aos="zoom-in"
                        >
                            <div>
                                <img
                                    src="./assets/logo-bg.png"
                                    class="position-absolute"
                                    alt="logo"
                                    width="400"
                                    style="
                                        z-index: -0;
                                        top: 157px;
                                        left: -150px;
                                    "
                                />
                            </div>

                            <div class="card-body">
                                <h1
                                    class="
                                        card-title
                                        text-center text-white
                                        mb-5
                                    "
                                >
                                    Pendaftaran Santri {{ $gelombang }}
                                </h1>
                                <div class="card-text">
                                    <form action="{{ route('register-proses') }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <div class="form-group">
                                            <div class="row">
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="name"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Nama
                                                        Pengguna</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                        "
                                                        id="name"
                                                        name="name"
                                                        placeholder="Masukkan Nama Pengguna"
                                                    />
                                                </div>
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="full_name"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Nama Lengkap</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                        "
                                                        id="full_name"
                                                        name="full_name"
                                                        placeholder="Masukkan Nama Lengkap"
                                                    />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="birth_date"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Tanggal
                                                        Lahir</label
                                                    >
                                                    <input
                                                        type="date"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                            color: #145560;
                                                        "
                                                        id="birth_date"
                                                        name="age"
                                                        placeholder="01 Desember 2001"
                                                    />
                                                </div>
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="family"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Keluarga</label
                                                    >
                                                    <select
                                                        class="
                                                            form-select
                                                            form-select-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                            color: #145560;
                                                        "
                                                        aria-label="family"
                                                        id="family"
                                                        name="family"
                                                    >
                                                        <option selected>
                                                            -- Keluarga --
                                                        </option>
                                                        <option
                                                            value="sangat-mampu"
                                                        >
                                                            Sangat Mampu
                                                        </option>
                                                        <option
                                                            value="mampu"
                                                        >
                                                            Mampu
                                                        </option>
                                                        <option
                                                            value="tidak-mampu"
                                                        >
                                                            Tidak Mampu
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-12 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="no_wa"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >No Whatsapp</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        maxlength="13"
                                                        style="
                                                            font-size: 15px;
                                                        "
                                                        id="no_wa"
                                                        name="no_wa"
                                                        placeholder="Masukkan No Whatsapp"
                                                    />
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="password"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                        "
                                                        id="password"
                                                        name="password"
                                                        placeholder="Masukkan Password"
                                                    />
                                                    <div
                                                        class="
                                                            d-flex
                                                            justify-content-between
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                d-flex
                                                                align-items-center
                                                                px-2
                                                                pt-1
                                                            "
                                                            style="
                                                                font-size: 12px;
                                                                color: #efefef;
                                                            "
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                onclick="showFunction()"
                                                                class="form-check-input"
                                                            />&nbsp; Show
                                                            Password
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="
                                                        mb-4
                                                        col-lg-6 col-sm-12
                                                    "
                                                >
                                                    <label
                                                        for="confirm_password"
                                                        class="
                                                            form-label
                                                            text-white
                                                            px-3
                                                        "
                                                        >Konfirmasi
                                                        Password</label
                                                    >
                                                    <input
                                                        type="password"
                                                        class="
                                                            form-control
                                                            form-control-lg
                                                            rounded-pill
                                                        "
                                                        style="
                                                            font-size: 15px;
                                                            color: #145560;
                                                        "
                                                        id="confirm_password"
                                                        name="password_confirmation"
                                                        placeholder="Masukkan Ulang Password"
                                                    />
                                                    <div
                                                        class="
                                                            d-flex
                                                            justify-content-between
                                                        "
                                                    >
                                                        <div
                                                            class="
                                                                d-flex
                                                                align-items-center
                                                                px-2
                                                                pt-1
                                                            "
                                                            style="
                                                                font-size: 12px;
                                                                color: #efefef;
                                                            "
                                                        >
                                                            <input
                                                                type="checkbox"
                                                                onclick="seeFunction()"
                                                                class="form-check-input"
                                                            />&nbsp; Show
                                                            Password
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="gender" 
                                                class="
                                                form-label
                                                text-white
                                                "
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
                                                <label class="form-check-label text-white" for="gender">
                                                    Laki-Laki
                                                </label>
                                                <div class="invalid-feedback">
                                                    jenis kelamin harus di isi
                                                </div>
                                                </div>
                                            </div>

                                            <br />
                                            @if (is_null($tahun_ajaran))
                                            <button 
                                            type="submit" 
                                            class="btn
                                            sign-in
                                            rounded-pill
                                            text-uppercase
                                            px-4
                                            py-2
                                            col-12" disabled tabindex="4">
                                                Pendaftaran belum di buka
                                            </button>
                                            @else
                                            <button 
                                            type="submit" 
                                            class="btn
                                            sign-in
                                            rounded-pill
                                            text-uppercase
                                            px-4
                                            py-2
                                            col-12" tabindex="4">
                                                Daftar
                                            </button>
                                            @endif
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
                text: "Selamat Datang Di Web PSB Online Pondok Informatika Al-Madinah",
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
