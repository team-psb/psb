<!DOCTYPE html>
<html lang="en">
<head>
    @include('front.includes.style')
    <title>@yield('title')</title>
    <style>
        b {
        color : red;
    }
    </style>
</head>
<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            @include('front.includes.navbar')
            @include('front.includes.second-nav')
            @yield('content')
        </div>
    </div>
    @include('front.includes.script')
    @stack('end-script')
</body>
</html>