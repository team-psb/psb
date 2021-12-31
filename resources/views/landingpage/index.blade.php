@php
    $tahun_ajaran = App\Models\AcademyYear::where('is_active', true)->orderBy('id','desc')->first();
    $users = App\Models\BiodataOne::whereHas('academy_year', function($query){
        $query->where('is_active', true);
    })->count();
    $userregister = App\Models\BiodataTwo::whereHas('user')->whereHas('academy_year', function($query){
        $query->where('is_active', true);
    })->get();
    $gelombang = App\Models\Stage::whereHas('academy_year', function($query){
        $query->where('is_active', true);
    })->orderBy('id', 'desc')->pluck('name')->first();
    $informations = App\Models\Schdule::orderBy('id', 'desc')->limit(6)->get();
    $qnas = App\Models\Qna::get();
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
                src="./assets/img/logo-bg.png"
                alt="logo"
                class="position-absolute img-fluid"
                width="1100"
                style="z-index: -1; top: 120px; left: -67vh"
            />
        </div>
        <div class="d-none d-lg-inline">
            <img
                src="./assets/img/bawah.png"
                alt="bg-bawah"
                class="position-absolute img-fluid"
                width="400"
                style="z-index: -1; bottom: -120px; left: -5px"
            />
        </div>
        <div class="d-none d-lg-inline">
            <img
                src="./assets/img/Atas.png"
                class="position-absolute"
                alt="bg-atas"
                width="700"
                style="z-index: -1; top: 0px; right: -30px"
            />
        </div>
        <!-- ======= End Background Image ======= -->

        <!-- WA Live -->
        <a id="Wa" class="wa" title="Chat Live Wa" href="#">
            <img src="./assets/img/wa.png" alt="logo-wa" width="80" />
        </a>
        <!-- End WA Live -->

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
                            src="assets/img/Logo-Pondok.png"
                            alt="Logo-Pondok"
                            width="60"
                            class="img-fluid"
                            id="logo-image"
                        />
                        <span class="text-logo d-none d-sm-inline" id="text-lg">
                            Pondok Informatika Al Madinah
                        </span>
                    </a>
                </h1>

                <nav id="navbar" class="navbar">
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
                            <a class="nav-link scrollto" href="#info" id="link6"
                                >Informasi</a
                            >
                        </li>
                        <li>
                            <a class="nav-link scrollto" href="#qna" id="link5"
                                >Q&A</a
                            >
                        </li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
                <!-- End Navbar -->
            </div>
        </header>
        <!-- ======= End Header ======= -->

        <!-- ======= Home Section ======= -->
        <section id="home" class="d-flex align-items-center">
            <div class="container" data-aos="zoom-out">
                @if (session('success-create'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body fw-bold">
                                {{ session('success-create') }}
                            </div>
                        </div>
                    @elseif(session('success-danger'))
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body fw-bold">
                                {{ session('success-danger') }}
                            </div>
                        </div>
                    @elseif(session('success-edit'))
                        <div class="alert alert-warning alert-dismissible show fade">
                            <div class="alert-body fw-bold">
                                {{ session('success-edit') }}
                            </div>
                        </div>
                    @else
                    @endif
                <div class="row">
                    <div class="col-md-6 col-sm-12 mb-5 mb-lg-0 mb-md-0">
                        <h3 class="fw-bold mb-4 banner-title">Selamat Datang Di Web PSB Online Pondok Informatika Al-Madinah</h3>

                        <div class="paragraf-text mb-5">
                            <p class="sub-banner1">
                                Web Penerimaan Peserta Didik Baru <br />
                                Tahun Pelajaran {{ isset($tahun_ajaran->year) ? $tahun_ajaran->year.' / '. intval($tahun_ajaran->year +1) : '' }} <br />
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
                    </div>
                    <div
                        class="
                            col-md-6 col-sm-12
                            position-relative
                            login-banner
                            mb-5 mb-lg-0
                        "
                    >
                        <!-- Animate -->
                        <img
                            src="./assets/img/people.png"
                            alt="people"
                            class="
                                position-absolute
                                d-none d-xl-inline
                                img-fluid
                            "
                            width="180"
                        />
                        <div
                            class="
                                card
                                login-form
                                py-3
                                px-3
                                shadow-lg
                                bg-body
                                float-md-end
                                overflow-hidden
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
                                    Login Here
                                </h1>
                                <div class="card-text">
                                    <form action="{{ route('login-proses') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            @if (session('failed-danger'))
                                                <div class="alert alert-danger alert-dismissible show fade rounded-pill py-2">
                                                    <div class="alert-body fw-bold text-danger">
                                                        {{ session('failed-danger') }}
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="form-floating">
                                                <input type="number" name="phone" required class="form-control rounded-pill px-4" id="floatingInput" placeholder="Nomor Handphone" value="{{ old('phone') }}" required>
                                                <label for="floatingInput" class="px-4">Nomor Handphone</label>
                                            </div>

                                            <div class="form-floating d-flex align-items-center mt-4 position-relative password-login">
                                                <input type="password" name="password" class="form-control rounded-pill px-4" id="floatingPassword" placeholder="Password" name="password" required>
                                                <i class="bi bi-eye-slash position-absolute" id="hide" onclick="myFunction()"></i>
                                                <i class="bi bi-eye position-absolute" id="show" onclick="myFunction()"></i>
                                                <label for="floatingPassword" class="px-4">Password</label>
                                            </div>

                                            {{-- <div
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
                                            </div> --}}
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
                                        <div class="form-floating text-center">
                                            <a href="{{ route('password-getwhatsapp') }}" class="text-light">Lupa password ?</a>
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

        <main id="main">
            <!-- Section Regis -->
            <section id="regis" class="d-flex align-items-center">
                <div class="container" data-aos="fade-up">
                    <!-- Background Image -->
                    <div class="d-none d-lg-inline">
                        <img
                            src="assets/img/logo-bg.png"
                            alt="logo"
                            class="position-absolute img-fluid"
                            width="1100"
                            style="z-index: -1; top: 0px; left: 600px"
                        />
                    </div>
                    <!-- End Background Image -->
                    <div class="row">
                        <div
                            class="
                                col-md-6 col-sm-12
                                position-relative
                                login-banner
                            "
                            id="regis-form"
                        >
                            <div
                                class="
                                    card
                                    login-form
                                    py-4
                                    px-2
                                    shadow-lg
                                    bg-body
                                "
                                data-aos="fade-right"
                            >
                                <div class="card-body">
                                    <h1
                                        class="
                                            card-title
                                            text-center text-white
                                        "
                                    >
                                        Formulir Peserta {{ $gelombang }}
                                    </h1>
                                    <h6
                                        class="
                                            mb-5
                                            card-subtitle
                                            text-center text-white
                                        "
                                        style="font-size: 12px"
                                    >
                                        Mohon isi formulir pendaftaran dengan
                                        lengkap dan benar
                                    </h6>
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
                                                            required
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
                                                            required
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
                                                            Lahir
                                                            </label
                                                        >
                                                        {{-- <input
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
                                                            required
                                                        /> --}}
                                                        {{-- <input
                                                            type="text"
                                                            class="form-control"
                                                            data-field="date"
                                                            data-format="dd-MMM-yyyy"
                                                            readonly
                                                        /> --}}
                                                        <input type="text" data-field="date" readonly>
                                                        <div id="dtBox"></div>

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
                                                            required
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
                                                            >No Whatsapp
                                                            <small style="font-size: 12px;">*mohon di isi denggan no whatsapp aktif yang dapat kami hubungi!.</small>
                                                            </label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="
                                                                form-control
                                                                form-control-lg
                                                                rounded-pill
                                                            "
                                                            maxlength="15"
                                                            style="
                                                                font-size: 15px;
                                                            "
                                                            id="no_wa"
                                                            name="no_wa"
                                                            placeholder="Masukkan No Whatsapp"
                                                            required
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
                                                            >Password
                                                            <br>
                                                            <small style="font-size: 12px;">min 6 karakter max 20 karakter.</small>
                                                            </label
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
                                                            required
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
                                                                    px-2
                                                                    pt-1
                                                                "
                                                                style="
                                                                    font-size: 15px;
                                                                    color: #efefef;
                                                                "
                                                            >
                                                            <input
                                                            id="pass"
                                                            type="checkbox"
                                                            onclick="showFunction()"
                                                            class="form-check-input"
                                                            />
                                                            <label for="pass" class="form-check-label ms-2">Show Password</label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="
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
                                                            Password
                                                            <br>
                                                            <small style="font-size: 12px;">min 6 karakter max 20 karakter.</small>
                                                            </label
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
                                                            required
                                                        />
                                                    </div>
                                                </div>
                                                <div class="form-group px-2">
                                                    <label for="gender"
                                                    class="
                                                    form-label
                                                    text-white
                                                    "
                                                    >Jenis Kelamin, Wanita Belum Diterima <b>*</b></label
                                                    >
                                                    <div class="form-check" style="
                                                                font-size: 15px;
                                                            ">
                                                        <input
                                                            class="form-check-input"
                                                            type="checkbox"
                                                            name="gender"
                                                            id="gender"
                                                            value="l"
                                                            required
                                                            checked

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
                        <div
                            class="
                                col-md-6 col-sm-12
                                d-flex
                                align-items-center
                                justify-content-around
                                position-relative
                            "
                            id="alur"
                        >
                            <div class="position-relative">
                                <p
                                    class="
                                        position-absolute
                                        text-center
                                        alur-text
                                    "
                                >
                                    1 <br />
                                    Daftar Akun dan Mengisi Formulir Pendaftaran
                                </p>
                                <img
                                    src="assets/img/daftar.png"
                                    alt="daftar"
                                    width="90px"
                                    class="img-fluid alur_image_1"
                                />
                                <img
                                    src="assets/img/line_1.png"
                                    alt="daftar"
                                    width="115px"
                                    class="
                                        position-absolute
                                        line-1
                                        d-none d-lg-inline
                                    "
                                    style="left: -13px; bottom: -15px"
                                />
                            </div>
                            <div class="position-relative">
                                <img
                                    src="assets/img/tes.png"
                                    alt="tes"
                                    width="90px"
                                    class="img-fluid alur_image_2"
                                />
                                <img
                                    src="assets/img/line_2.png"
                                    alt="daftar"
                                    width="115px"
                                    class="
                                        position-absolute
                                        line-2
                                        d-none d-lg-inline
                                    "
                                    style="left: -13px; top: -15px"
                                />
                                <p
                                    class="
                                        position-absolute
                                        text-center
                                        alur-text2
                                    "
                                >
                                    2 <br />
                                    Melakukan Tes IQ dan Tes Kepribadian
                                </p>
                            </div>
                            <div class="position-relative">
                                <p
                                    class="
                                        position-absolute
                                        text-center
                                        alur-text3
                                    "
                                >
                                    3 <br />
                                    Selanjutnya Membuat dan Upload Video
                                </p>
                                <img
                                    src="assets/img/video.png"
                                    alt="daftar"
                                    width="90px"
                                    class="img-fluid alur_image_3"
                                />
                                <img
                                    src="assets/img/line_1.png"
                                    alt="daftar"
                                    width="115px"
                                    class="
                                        position-absolute
                                        line-3
                                        d-none d-lg-inline
                                    "
                                    style="left: -13px; bottom: -15px"
                                />
                            </div>
                            <div class="position-relative">
                                <img
                                    src="assets/img/line_2.png"
                                    alt="daftar"
                                    width="115px"
                                    class="
                                        position-absolute
                                        line-4
                                        d-none d-lg-inline
                                    "
                                    style="left: -13px; top: -15px"
                                />
                                <img
                                    src="assets/img/wawancara.png"
                                    alt="tes"
                                    width="90px"
                                    class="img-fluid alur_image_4"
                                />
                                <p
                                    class="
                                        position-absolute
                                        text-center
                                        alur-text4
                                    "
                                >
                                    4 <br />
                                    Tes Wawancara
                                </p>
                            </div>
                            <div class="position-relative">
                                <p
                                    class="
                                        position-absolute
                                        text-center
                                        alur-text5
                                    "
                                >
                                    5 <br />
                                    Pengumuman dan tunggu konfirmasi dari
                                    panitia
                                </p>
                                <img
                                    src="assets/img/lolos.png"
                                    alt="daftar"
                                    width="90px"
                                    class="img-fluid alur_image_5"
                                />
                                <img
                                    src="assets/img/line_1.png"
                                    alt="daftar"
                                    width="115px"
                                    class="
                                        position-absolute
                                        line-5
                                        d-none d-lg-inline
                                    "
                                    style="left: -13px; bottom: -15px"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Regis Section -->

            <!-- ======= Statistic Section ======= -->
            <section id="stat" class="stat">
                <div
                    class="container"
                    data-aos="fade-up"
                >
                    <!-- Background Image -->
                    <div class="d-none d-lg-inline">
                        <img
                            src="assets/img/logo-bg.png"
                            alt="logo"
                            class="position-absolute img-fluid"
                            width="1100"
                            style="z-index: -1; top: 0px; right: 600px"
                        />
                    </div>
                    <!-- End Background Image -->
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="count-box">
                                <h1 class="mb-5 fw-bold title-stats">
                                    Statistik Pendaftaran
                                </h1>
                                <div
                                    class="position-relative text-center"
                                    data-aos="zoom-in"
                                    data-aos-duration="1000"
                                >
                                    <p class="text-stats">Total Pendaftar</p>
                                    <p class="text-stats2">Quota Penerimaan</p>
                                    <p class="text-stats3">
                                        Total Pengisi Formulir
                                    </p>
                                    <img
                                        src="assets/img/users_stats.png"
                                        alt="stat_image"
                                        width="500"
                                        class="img-fluid pt-5"
                                    />
                                    <span
                                        data-purecounter-start="0"
                                        data-purecounter-end="{{ $users }}"
                                        data-purecounter-duration="1"
                                        class="
                                            purecounter
                                            text-white
                                            fs-1
                                            img-stats
                                        "
                                    ></span>
                                    <span
                                        data-purecounter-start="0"
                                        data-purecounter-end="11"
                                        data-purecounter-duration="1"
                                        class="
                                            purecounter
                                            text-white
                                            fs-1
                                            img-stats2
                                        "
                                    ></span>
                                    <span
                                        data-purecounter-start="0"
                                        data-purecounter-end="{{ $userregister->count() }}"
                                        data-purecounter-duration="1"
                                        class="
                                            purecounter
                                            text-white
                                            fs-1
                                            img-stats3
                                        "
                                    ></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Statistic Section -->

            <!-- ======= Announce Section ======= -->
            <section id="announce" class="announce">
                <div class="container"  data-aos="fade-up">
                    <!-- Background Image -->
                    <div class="d-none d-lg-inline">
                        <img
                            src="assets/img/logo-bg.png"
                            alt="logo"
                            class="position-absolute img-fluid"
                            width="1100"
                            style="z-index: -1; top: 0px; left: 600px"
                        />
                    </div>
                    <h1 class="fw-bold text-center title-announce">Pengumuman</h1>
                    <!-- End Background Image -->
                    <div class="row align-items-center justify-content-around">
                        <div class="col-sm-12 col-lg-5 mb-5 mb-lg-0">
                            <div
                            class="icon-box"
                            data-aos="fade-up"
                            data-aos-delay="100"
                            >
                                <h3 class="title mb-5">
                                    Pengumuman
                                </h3>

                                <div class="description gsap-desc1 mb-5">
                                    <span class="dot"></span>
                                    <h4 class="desc1">Pengumuman</h5>
                                    <p class="desc">
                                        Pengumuman akan di umumkan pada tanggal <b>23 November 2022</b>.
                                    </p>
                                </div>
                                <div class="description gsap-desc2 mb-5">
                                    <span class="dot"></span>
                                    <h4 class="desc1">Penting</h5>
                                    <p class="desc">
                                        Mengecek ulang formulir pendaftran secara menyeluruh.
                                    </p>
                                </div>
                                <div class="description gsap-desc3 mb-5 mb-xl-4">
                                    <span class="dot"></span>
                                    <h4 class="desc1">Test</h5>
                                    <p class="desc">
                                        Mengikuti semua tes yang ada dengan Teliti dan Tertib.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-6 mb-5 mb-lg-0">
                            <div
                            class="icon-box2"
                            data-aos="fade-up"
                            data-aos-delay="100"
                            >
                                <h3 class="title2 text-nowrap mb-5">
                                    Cara Daftar
                                </h3>

                                <div class="description gsap-desc1 mb-4 mt-1">
                                    <span class="dots d-flex align-items-center justify-content-center">1.</span>
                                    <p class="desc2">
                                        Calon santri mengisi formulir pendaftaran di website <a href="https://pondokinformatika.com/" class="text-white text-decoration-underline">pondokinformatika.com</a>.
                                    </p>
                                </div>
                                <div class="description gsap-desc2 mb-4">
                                    <span class="dots d-flex align-items-center justify-content-center">2.</span>
                                    <p class="desc2">
                                        Lengkapi formulir pendaftaran dengan data diri yang benar dan isi dengan teliti.
                                    </p>
                                </div>
                                <div class="description gsap-desc3 mb-4">
                                    <span class="dots d-flex align-items-center justify-content-center">3.</span>
                                    <p class="desc2">Jika telah selesai mengisi formulir pendaftaran, cek kembali data yang sudah dimasukkan, apabila sudah benar tekan tombol <b>Daftar</b>.
                                    </p>
                                </div>
                                <div class="description gsap-desc4 mb-5 mb-xl-4">
                                    <span class="dots d-flex align-items-center justify-content-center">4.</span>
                                    <p class="desc2">Selanjutnya silahkan login dengan akun anda menggunakan nomor handphone dan password yang anda isikan di dalam fomulir pendaftaran.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ======= End Announce Section ======= -->

            <!-- ======= Information Section ======= -->
            <section id="info" class="information">
                <div class="container" data-aos="fade-up">
                    <div class="section-title mb-4 title-info">
                        <h1>Informasi</h1>
                    </div>

                    <div class="row">
                        @forelse ($informations as $informasi)
                        <div
                                class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4"
                                data-aos="zoom-in"
                                data-aos-delay="100"
                            >
                            <div class="icon-box">
                                <a href="{{ route('information', $informasi->id) }}" class="text-dark">
                                    <div class="icon">
                                        <img src="{{ asset('/storage/'.$informasi->image) }}" alt="thumbnail tutorial" class="img-fluid">
                                        {{-- <i class="bx bxl-dribbble"></i> --}}
                                    </div>
                                    <h5>{{ $informasi->title }}</h5>
                                    <p>
                                        {!! Str::limit($informasi->content, 200, '...') !!}
                                    </p>
                                    <div class="text-muted mt-2">
                                        <p>{{ Carbon\Carbon::parse($informasi->created_at)->diffForHumans() }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @empty
                            <p class="text-center">Belum ada informasi</p>
                        @endforelse
                    </div>
                </div>
            </section>
            <!-- End Information Section -->

            <!-- ======= Activity Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="title-activity">Kegiatan</h1>
                        <p class="subtitle-activity">Terdapat banyak kegiatan seru dan bermanfaat untuk semua santri Pondok Informatika Al-Madinah.</p>
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">
                                    Semua
                                </li>
                                <li data-filter=".filter-app">Programming</li>
                                <li data-filter=".filter-card">Design</li>
                                <li data-filter=".filter-web">Olahraga</li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="row portfolio-container"
                        data-aos="fade-up"
                        data-aos-delay="200"
                    >
                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-app"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2019/03/volly.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Volly</h4>
                                <p>Bermain volly bersama <br>dilapangan, setelah pemanasan.</p>
                                <a
                                    href="https://pondokinformatika.com/wp-content/uploads/2019/03/volly.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Bermain volly bersama dilapangan, setelah pemanasan."
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-web"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2019/03/panahan.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-2.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Web 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-app"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2019/03/futsal.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-3.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="App 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-card"
                            >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2018/01/Renang.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-4.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Card 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-web"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2019/03/ceramah.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-5.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Web 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-app"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2017/11/WhatsApp-Image-2017-11-29-at-07.55.01-1.jpeg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-6.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="App 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-card"
                        >
                            <img
                                src="https://pondokinformatika.com/wp-content/uploads/2018/02/santri-ammar.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-7.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Card 1"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-card"
                        >
                            <img
                                src="./assets/img/portfolio/portfolio-8.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-8.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Card 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item filter-web"
                        >
                            <img
                                src="./assets/img/portfolio/portfolio-9.jpg"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-9.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox preview-link"
                                    title="Web 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <!-- <a
                                    href="portfolio-details.html"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Activity Section -->

            <!-- ======= Work Section ======= -->
            <section id="portfolio" class="portfolio">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="title-activity">Karya Santri</h1>
                        <p class="subtitle-activity">Banyak karya yang sudah di buat oleh santri Pondok Informatika Al-Madinah dan berikut ini adalah beberapa contohnya.</p>
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters-work">
                                <li data-filter="*" class="filter-active">
                                    Semua
                                </li>
                                <li data-filter=".filter-programming">Programming</li>
                                <li data-filter=".filter-design">Design</li>
                                <li data-filter=".filter-video">Video</li>
                            </ul>
                        </div>
                    </div>

                    <div
                        class="row portfolio-container-work"
                        data-aos="fade-up"
                        data-aos-delay="200"
                        >
                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-programming"
                        >
                            <img
                                src="https://media.istockphoto.com/photos/team-of-young-computer-programmers-cooperating-in-the-office-picture-id1157345255?b=1&k=20&m=1157345255&s=170667a&w=0&h=prDhzMeI5tUoecj4kQwxOnRSI6X2vyVMkHbYOGU1Stw="
                                class="img-fluid"
                                alt="image"
                            />
                            <div class="portfolio-info">
                                <h4>Volly</h4>
                                <p>Bermain volly bersama <br>dilapangan, setelah pemanasan.</p>
                                <a
                                    href="https://media.istockphoto.com/photos/team-of-young-computer-programmers-cooperating-in-the-office-picture-id1157345255?b=1&k=20&m=1157345255&s=170667a&w=0&h=prDhzMeI5tUoecj4kQwxOnRSI6X2vyVMkHbYOGU1Stw="
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Bermain volly bersama dilapangan, setelah pemanasan."
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-design"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTh8fGRlc2lnbiUyMHdvcmt8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-2.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Web 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-programming"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTd8fHByb2dyYW1taW5nJTIwd29ya3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>App</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-3.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="App 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-video"
                            >
                            <img
                                src="https://media.istockphoto.com/photos/laptop-pc-with-many-people-having-a-meeting-at-distance-picture-id1226068276?b=1&k=20&m=1226068276&s=170667a&w=0&h=4CEo3YjPzJpyAVMMopkhRICuf5Z8zWWcQ11XuUF-B74="
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 2</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-4.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Card 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-design"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1493932484895-752d1471eab5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGRlc2lnbiUyMHdvcmt8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 2</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-5.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Web 2"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-programming"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fHByb2dyYW1taW5nJTIwd29ya3xlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>App</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-6.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="App 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-video"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1629956874549-a21316bfe0a9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8dmlkZW8lMjBpc2xhbXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 1</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-7.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Card 1"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-video"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1620802232352-8ad6533690ca?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dmlkZW8lMjBpc2xhbXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Card 3</h4>
                                <p>Card</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-8.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Card 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>

                        <div
                            class="col-lg-4 col-md-6 portfolio-item-work filter-design"
                        >
                            <img
                                src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTB8fGRlc2lnbiUyMHdvcmt8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60"
                                class="img-fluid"
                                alt=""
                            />
                            <div class="portfolio-info">
                                <h4>Web 3</h4>
                                <p>Web</p>
                                <a
                                    href="./assets/img/portfolio/portfolio-9.jpg"
                                    data-gallery="portfolioGallery"
                                    class="portfolio-lightbox-work preview-link"
                                    title="Web 3"
                                    ><i class="bx bx-plus"></i
                                ></a>
                                <a
                                    href="https://pondokinformatika.com/karya-santri/"
                                    class="details-link"
                                    title="More Details"
                                    ><i class="bx bx-link"></i
                                ></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Work Section -->

            <!-- ======= Questions and Answers Section ======= -->
            <section id="qna" class="qna section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2 class="mb-3 subtitle-activity">Q.&.A</h2>
                        <h1 class="fw-bold mb-3 title-activity">Questions and Answers</h1>
                        <p class="subtitle-activity">
                            Temukan berbagai pertanyaan seputar pendaftaran Pondok Informatika Al-Madinah dibawah ini.
                        </p>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10">
                            <ul class="qna-list">
                                @forelse ($qnas as $qna)
                                <li>
                                    <div
                                        data-bs-toggle="collapse"
                                        class="collapsed question text-lowercase"
                                        href="#qna{{ $qna->id }}"
                                    >
                                        {{ $qna->question }}
                                        <i
                                            class="bi bi-chevron-down icon-show"
                                        ></i
                                        ><i
                                            class="bi bi-chevron-up icon-close"
                                        ></i>
                                    </div>
                                    <div
                                        id="qna{{ $qna->id }}"
                                        class="collapse"
                                        data-bs-parent=".qna-list"
                                    >
                                        <p>
                                        {{ $qna->answer }}
                                        </p>
                                    </div>
                                </li>
                                @empty
                                    <p>belum ada pertanyaan</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Questions and Answers Section -->

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h1 class="fw-bold about-title title-activity"><span>About Us</span></h1>
                    </div>

                    <div class="row" data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-6">
                            <div class="info-box mb-4 sub-address">
                                <i class="bx bx-map"></i>
                                <h3>Alamat</h3>
                                <p>Jl. Raya Krapyak, RT.05, Karanganyar, Wedomartani, Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55584</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box mb-4 sub-email">
                                <i class="bx bx-envelope"></i>
                                <h3>Email</h3>
                                <p>pondokitalmadinah@gmail.com</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="info-box mb-4 sub-contact">
                                <i class="bx bx-phone-call"></i>
                                <h3>Kontak</h3>
                                <p>085 725 249 265</p>
                            </div>
                        </div>
                    </div>

                    <div data-aos="fade-up" data-aos-delay="100">
                        <div class="col-lg-12">
                            <iframe
                                class="mb-4 mb-lg-0 sub-map"
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1662.272102301785!2d110.42290172593329!3d-7.729023614407029!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd648398dc4db70c6!2sPondok%20Informatika%20Al-Madinah%20-%20Pondok%20IT!5e0!3m2!1sen!2sus!4v1638843146450!5m2!1sen!2sus"
                                frameborder="0"
                                style="border: 0; width: 100%; height: 384px"
                                allowfullscreen
                            ></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End About Section -->
        </main>
        <!-- End Main -->

        <!-- ====== Sponsor Section ======= -->
            <section class="sponsor section-bg">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div
                            class="
                                col-lg-6 col-md-6 col-6
                                d-flex
                                align-items-center
                                justify-content-center
                                logo-sponsor
                            "
                        >
                            <img
                                src="./assets/img/client-1.png"
                                class="img-fluid "
                                alt="logo-mahirtechno"
                            />
                        </div>

                        <div
                            class="
                                col-lg-6 col-md-6 col-6
                                d-flex
                                align-items-center
                                justify-content-center
                                logo-sponsor
                            "
                        >
                            <img
                                src="./assets/img/client-2.png"
                                class="img-fluid"
                                alt="logo-ywj"
                            />
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Sponsor Section -->

        <!-- ======= Footer ======= -->
            <footer id="footer">
                <div class="footer-top">
                    <div class="content-footer overflow-hidden">
                        <img
                            src="./assets/img/footer.png"
                            alt="logo"
                            class="position-absolute d-none d-md-block"
                            width="2300"
                            style="z-index: -1; top: 30%; left: 60%; transform: translate(-50%, -50%);"
                        />
                        <div class="row align-items-center">
                            <div class="col-12 col-lg-5 footer-contact mx-auto text-center">
                                <h4 class="text-uppercase mb-5 title-footer-left"></h4>
                                <a
                                    href="https://pondokinformatika.com/"
                                    class="text-decoration-none btn-footer"
                                >
                                    <button class="btn rounded-pill px-3 py-2 text-white text-uppercase button-footer-left" style="background: #3adb9f;">Info lebih lanjut</button>
                                </a>
                            </div>
                            <div class="col-12 col-lg-2 footer-contact text-center my-5 my-lg-0 logo-sponsor">
                                <img src="./assets/img/logo-putih.png" alt="Logo Pondok" width="150">
                            </div>
                            <div class="col-12 col-lg-5 footer-contact">
                                <p class="fs-6 px-0 px-lg-5 footer-right">
                                    Pondok Informatika Al-Madinah membuka penerimaan santri baru yang siap menjadi ahli IT yang bertauhid lurus, mencintai sunnah, berakhlak mulia serta profesional dan siap membela islam dengan keahlian dan mau mendedikasikan waktu dan tenaganya untuk dakwah islam.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- ======= Copyright ======= -->
            <div class="copyright text-center">
                &copy; {{ date('Y') }} Copyright <strong><span>Pondok Informatika Al-Madinah</span></strong
                >.
            </div>
        <!-- End Footer -->

        <div id="preloader"></div>

        <a
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

        <!-- Vendor JS Files -->
        <script ssrc="./assets/vendor/purecounter/purecounter.js"></script>
        <script src="./assets/vendor/aos/aos.js"></script>
        <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="./assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="./assets/vendor/php-email-form/validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
        <script>
            /* GSAP */

            //Top-Navbar
            gsap.to(".email-address", {
                text: "pondokitalmadinah@gmail.com",
                duration: 2,
                delay: 2,
            });
            gsap.to(".no-hp", {
                text: " 085 725 249 265",
                duration: 2,
                delay: 4,
            });
            gsap.from(".social-links", {
                x: 50,
                opacity: 0,
                duration: 1,
                delay: 6,
            });

            //Navbar
            gsap.from(".logo", {
                x: -100,
                delay: 1.5,
                duration: 1.5,
                opacity: 0,
            });
            gsap.from(".navbar", {
                delay: 2,
                duration: 2,
                opacity: 0,
            });

            //Section Home
            gsap.from(".banner-title", {
                x: -100,
                duration: 2,
                opacity: 0,
                delay: 2,
            });
            gsap.from(".sub-banner1", {
                x: -100,
                duration: 2,
                opacity: 0,
                delay: 2.5,
            });
            gsap.from(".sub-banner2", {
                x: -100,
                duration: 2,
                opacity: 0,
                delay: 3,
            });
            gsap.from(".button-banner", {
                duration: 1,
                opacity: 0,
                delay: 4.5,
            });
            gsap.from(".button-banner2", {
                duration: 1,
                opacity: 0,
                delay: 5.5,
            });

            //Section Registration
            gsap.from(".line-1", {
                delay: 2,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-2", {
                delay: 2.5,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-3", {
                delay: 3,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-4", {
                delay: 3.5,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });

            gsap.from(".line-5", {
                delay: 4,
                duration: 0.5,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur_image_1", {
                delay: 4.5,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_2", {
                delay: 5.5,
                duration: 2,
                y: 100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_3", {
                delay: 6.5,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_4", {
                delay: 7.5,
                duration: 2,
                y: 100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur_image_5", {
                delay: 8.5,
                duration: 2,
                y: -100,
                opacity: 0,
                ease: "bounce",
            });
            gsap.from(".alur-text", {
                delay: 9,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text2", {
                delay: 9.5,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text3", {
                delay: 10,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text4", {
                delay: 10.5,
                duration: 1,
                scale: 0,
                opacity: 0,
            });
            gsap.from(".alur-text5", {
                delay: 11,
                duration: 1,
                scale: 0,
                opacity: 0,
            });

            //Section Stats
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

            // Section Announce
            gsap.from(".title-announce", {
                y: -50,
                duration: 1.5,
                opacity: 0,
                delay: 2,
                ease: "bounce",
            });
            gsap.from(".gsap-desc1", {
                duration: 1.5,
                opacity: 0,
                delay: 2.5,
            });
            gsap.from(".gsap-desc2", {
                duration: 1.5,
                opacity: 0,
                delay: 3,
            });
            gsap.from(".gsap-desc3", {
                duration: 1.5,
                opacity: 0,
                delay: 3.5,
            });
            gsap.from(".gsap-desc4", {
                duration: 1.5,
                opacity: 0,
                delay: 4,
            });

            //Section Stats
            gsap.from(".title-info", {
                y: -50,
                duration: 1.5,
                opacity: 0,
                delay: 2,
                ease: "bounce",
            });

            //Section Activity
            gsap.from(".title-activity", {
                y: -50,
                duration: 1.5,
                opacity: 0,
                delay: 2,
                ease: "bounce",
            });
            gsap.from(".subtitle-activity", {
                duration: 2,
                delay: 3,
                opacity:0
            });

            //Section Q&A
            gsap.from(".qna1", {
                duration: 1,
                delay: 3.5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna2", {
                duration: 1,
                delay: 4,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna3", {
                duration: 1,
                delay: 4.5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna4", {
                duration: 1,
                delay: 5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna5", {
                duration: 1,
                delay: 5.5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna6", {
                duration: 1,
                delay: 6,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna7", {
                duration: 1,
                delay: 6.5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna8", {
                duration: 1,
                delay: 7,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna9", {
                duration: 1,
                delay: 7.5,
                opacity:0,
                x: -50,
            });
            gsap.from(".qna10", {
                duration: 1,
                delay: 8,
                opacity:0,
                x: -50,
            });

            //Section About
            gsap.from(".sub-address", {
                y: 100,
                ease: "back",
                delay: 3.5,
                duration: 1.5,
                opacity: 0
            });
            gsap.from(".sub-email", {
                y: 100,
                ease: "back",
                delay: 4.5,
                duration: 1.5,
                opacity: 0
            });
            gsap.from(".sub-contact", {
                y: 100,
                ease: "back",
                delay: 5.5,
                duration: 1.5,
                opacity: 0
            });
            gsap.from(".sub-map", {
                delay: 6,
                duration: 1.5,
                opacity: 0
            });

            //Section Sponsor
            gsap.from(".logo-sponsor", {
                delay: 2,
                duration: 2,
                rotateY: 360,
                opacity: 0
            });

            //Section Footer
            gsap.to(".title-footer-left", {
                text: "Pondok Informatika Al-Madinah",
                duration: 2,
                delay: 2
            });
            gsap.from(".button-footer-left", {
                duration: 1.5,
                delay: 3,
                y: 50,
                ease: "back",
                opacity: 0
            });
            gsap.from(".footer-right", {
                duration: 1.5,
                delay: 2,
                x: 50,
                ease: "back",
                opacity: 0
            });

            //Copyright
            gsap.from(".copyright", {
                duration: 1.5,
                delay: 2,
                y: 50,
                ease: "elastic",
                opacity: 0,
            });
        </script>

        <!-- Template Main JS File -->
        <script src="./assets/js/main.js"></script>
        <script>
            // Show Password Icon
            function myFunction() {
                var x = document.getElementById("floatingPassword");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById("hide").style.display = "inline-block";
                    document.getElementById("show").style.display = "none";
                } else {
                    x.type = "password";
                    document.getElementById("hide").style.display = "none";
                    document.getElementById("show").style.display = "inline-block";
                }
            }

             // Show Password Checkbox
            function showFunction() {
                var x = document.getElementById("password");
                var y = document.getElementById("confirm_password");
                if (x.type === "password") {
                    x.type = "text";
                } if (y.type === "password") {
                    y.type = "text";
                } else {
                    x.type = "password";
                    y.type = "password";
                }
            }
        </script>
    </body>
</html>
