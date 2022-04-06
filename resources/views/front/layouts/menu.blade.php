<!DOCTYPE html>
<html lang="en">
<head>
    @stack('start-style')
    @include('front.includes.style')
    @stack('end-style')
    <title>@yield('title')</title>
    <style>
        .navbar-bg{
            height: 70px;
        }
    </style>
</head>
<body class="layout-3"> 
    <div id="app"> 
        @include('front.includes.navbar-back-button')
        <div class="main-wrapper container">
            @include('front.includes.second-nav')
            @yield('content')
            <div class="fixed-bottom">
                <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
                <!-- WA Live -->
                <div class="m-3">
                    <a id="myBtnWa" title="Chat Live Wa" target="_blank" href="https://api.whatsapp.com/send?phone=62895380013428&text=Assalamu'alaikum%20Pondok%20Informatika,%20Saya%20pendaftar%20santri%20baru%20butuh%20bantuan !">
                        <img src="/assets/img/WA.png" alt="logo-wa" width="200" />
                    </a>
                </div>
                <!-- End WA Live -->
            </div>
        </div>
    </div>
    @stack('start-script')
    @include('front.includes.script')
    @stack('end-script')
</body>
</html>