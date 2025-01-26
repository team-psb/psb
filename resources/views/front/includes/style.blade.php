<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


<link rel="shortcut icon" href="{{ asset('assets_new/logo/logo-s-rgb.png') }}" />

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/chocolat/dist/css/chocolat.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/prismjs/themes/prism.css') }}">
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('stisla/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('front/style/style.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

{{-- Front --}}
<style>
    html {
        scroll-behavior: smooth;
    }
    #myBtn {
        width: 50px;
        height: 50px;
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: #0076F6;
        color: white;
        cursor: pointer;
        border-radius: 25px;
    }

    #myBtn:hover {
        background-color: #177896;
        transition: all 0.5s;
    }

    #myBtnWa {
        width: 50px;
        height: 50px;
        display: none;
        position: fixed;
        bottom: 20px;
        left: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: #32c193;
        color: white;
        cursor: pointer;
        border-radius: 25px;
    }

    #myBtnWa:hover {
        background-color: #188038;
        transition: all 0.5s;
    }

    @media (min-width: 1200px) {
    .hero-pt {
      padding-top: 40px;
    }
    .except-xl{
        display: none;
    }
}
</style>
