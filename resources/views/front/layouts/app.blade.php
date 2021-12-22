<!DOCTYPE html>
<html lang="en">
<head>
    @stack('start-style')
    @include('front.includes.style')
    @stack('end-style')
    <title>@yield('title')</title>
</head>
<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            @include('front.includes.navbar')
            @include('front.includes.second-nav')
            @yield('content')
            <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-topfas fa-arrow-up"></i></button>
        </div>
    </div>
    @stack('start-script')
    @include('front.includes.script')
    @stack('end-script')
</body>
</html>