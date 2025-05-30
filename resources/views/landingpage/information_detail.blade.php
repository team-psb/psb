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
        <link rel="shortcut icon" href="/assets_new/logo/logo-s-rgb.png" rel="icon" />

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet"
        />

        <!-- Vendor CSS Files -->
        <link href="/assets/vendor/aos/aos.css" rel="stylesheet" />
        <link
            href="/assets/vendor/bootstrap/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <link
            href="/assets/vendor/bootstrap-icons/bootstrap-icons.css"
            rel="stylesheet"
        />
        <link
            href="/assets/vendor/boxicons/css/boxicons.min.css"
            rel="stylesheet"
        />
        <link
            href="/assets/vendor/glightbox/css/glightbox.min.css"
            rel="stylesheet"
        />
        <link
            href="/assets/vendor/swiper/swiper-bundle.min.css"
            rel="stylesheet"
        />

        <!-- Template Main CSS File -->
        <link href="/assets/css/style.css" rel="stylesheet" />
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
                    <i class="bi bi-envelope d-flex align-items-center"><span class="email-address"></span></i>
                    <i
                        class="
                            bi bi-phone
                            d-flex
                            align-items-center
                            ms-4
                            d-none d-lg-inline
                        "
                        ><span class="no-hp"></span
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

        <!-- WA Live -->
        {{-- <a id="Wa" class="wa" title="Chat Live Wa" href="#">
            <img src="/assets/img/wa.png" alt="logo-wa" width="80" />
        </a> --}}

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
                    <a href="https://mahirteknologi.com/" target="blank">
                        <img
                            src="/assets_new/logo/logo-s-rgb.png"
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

                <nav id="navbar" class="navbar">
                    <a class="nav-link" href="{{ route('home','#info') }}" id="link1"
                        ><button
                            class="
                                btn
                                button
                                bg-transparent
                                rounded-pill
                                px-3
                                py-1
                                back-button
                            "
                        >
                            Back
                        </button>
                    </a>
                </nav>
                <!-- .navbar -->
            </div>
        </header>
        <!-- End Header -->

        <main id="main" data-aos="fade-up">
            <!-- ======= Breadcrumbs Section ======= -->
            <section class="breadcrumbs">
                <div class="container">
                    <div
                        class="
                            d-flex
                            justify-content-between
                            align-items-center
                        "
                    >
                        <h2>Detail Informasi</h2>
                        <ol>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('home','#info') }}">Informasi</a></li>
                            <li>Detail Informasi</li>
                        </ol>
                    </div>
                </div>
            </section>
            <!-- Breadcrumbs Section -->

            <!-- ======= Portfolio Details Section ======= -->
            <section
                id="portfolio-details"
                class="portfolio-details mb-lg-5 mb-0"
            >
                <div class="container mb-lg-5 mb-0">
                    <div class="row gy-4">
                        <div class="col-lg-6">
                            <div class="portfolio-details-sliders">
                                <div class="align-items-center">
                                    {{-- @isset($infodetail->video) --}}
                                        @if ($infodetail->video == null)
                                            <a href="{{ asset('/storage/'.$infodetail->image) }}" class="portfolio-lightbox">
                                                <img
                                                src="{{ asset('/storage/'.$infodetail->image) }}"
                                                alt="image"
                                                class="img-fluid"
                                                />
                                            </a>
                                        @else
                                            <div class="responsive">
                                                <iframe class="responsive-iframe" src="{{ $infodetail->video ? $infodetail->video : '' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allow='autoplay'></iframe>
                                            </div>
                                        @endif
                                    {{-- @endisset --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div
                                class="
                                    portfolio-description
                                    card
                                    px-4
                                    py-5
                                    rounded
                                    overflow-hidden
                                "
                            >
                                <h2>{{ $infodetail->title }}</h2>
                                <p>
                                    {!! $infodetail->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Portfolio Details Section -->
        </main>
        <!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="footer-top">
                <div class="content-footer overflow-hidden">
                    {{-- <img
                        src="/assets/img/footer.png"
                        alt="logo"
                        class="position-absolute d-none d-md-block"
                        width="2300"
                        style="
                            z-index: -1;
                            top: 30%;
                            left: 60%;
                            transform: translate(-50%, -50%);
                        "
                    /> --}}
                    {{-- <img
                        src="/assets/img/footer.png"
                        alt="logo"
                        class="position-absolute d-none d-xxl-block"
                        width="2300"
                        style="
                            z-index: -2;
                            top: 30%;
                            left: 26.8%;
                            right: 0;
                            transform: translate(-50%, -50%);
                        "
                    /> --}}
                    <div class="row align-items-center">
                        <div
                            class="
                                col-12 col-lg-5
                                footer-contact
                                mx-auto
                                text-center
                            "
                        >
                            <h4 class="text-uppercase mb-5 title-footer-left"></h4>
                            <a
                                href="https://mahirteknologi.com/"
                                class="text-decoration-none btn-footer"
                            >
                                <button
                                    class="
                                        btn
                                        rounded-pill
                                        px-3
                                        py-2
                                        text-white text-uppercase button-footer-left
                                    "
                                    style="background: #3adb9f"
                                >
                                    Info lebih lanjut
                                </button>
                            </a>
                        </div>
                        <div
                            class="
                                col-12 col-lg-2
                                footer-contact
                                text-center
                                my-5 my-lg-0
                                logo-sponsor
                            "
                        >
                            <img
                                src="/assets/img/logo-putih.png"
                                alt="Logo Pondok"
                                width="150"
                            />
                        </div>
                        <div class="col-12 col-lg-5 footer-contact">
                            <p class="fs-6 px-0 px-lg-5 footer-right">
                                Pondok Mahir Teknologi membuka penerimaan
                                santri baru yang siap menjadi ahli IT yang
                                bertauhid lurus, mencintai sunnah, berakhlak
                                mulia serta profesional dan siap membela islam
                                dengan keahlian dan mau mendedikasikan waktu dan
                                tenaganya untuk dakwah islam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright text-center">
            &copy; 2021 Copyright
            <strong><span>Pondok Mahir Teknologi</span></strong
            >.
        </div>
        <!-- End Footer -->

        {{-- <div id="preloader"></div> --}}
        <a
            href="#"
            class="back-to-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

        <!-- Vendor JS Files -->
        <script src="/assets/vendor/purecounter/purecounter.js"></script>
        <script src="/assets/vendor/aos/aos.js"></script>
        <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="/assets/vendor/php-email-form/validate.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js"></script>
        <script>
            /* GSAP */

            //Top-Navbar
            gsap.to(".email-address", {
                text: "pondokmahirteknologi@gmail.com",
                duration: 2,
                delay: 2,
            });
            gsap.to(".no-hp", {
                text: " 088 892 398 44",
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


            // Section Informasi Detail

            //Section Sponsor
            gsap.from(".logo-sponsor", {
                delay: 2,
                duration: 2,
                rotateY: 360,
                opacity: 0
            });

            //Section Footer
            gsap.to(".title-footer-left", {
                text: "Pondok Mahir Teknologi",
                duration: 2,
                delay: 2,
            });
            gsap.from(".button-footer-left", {
                duration: 1.5,
                delay: 3,
                y: 50,
                ease: "back",
                opacity: 0,
            });
            gsap.from(".footer-right", {
                duration: 1.5,
                delay: 2,
                x: 50,
                ease: "back",
                opacity: 0,
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
        <script src="/assets/js/main.js"></script>
    </body>
</html>
