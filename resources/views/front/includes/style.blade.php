<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">


<link rel="shortcut icon" href="{{ asset('template/images/Logo-Pondok.png') }}" />

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('stisla/node_modules/chocolat/dist/css/chocolat.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/node_modules/prismjs/themes/prism.css') }}">

<!-- Template CSS -->
<link rel="stylesheet" href="{{ asset('stisla/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('stisla/assets/css/components.css') }}">

{{-- Front --}}
<link rel="stylesheet" href="{{ asset('front/style/style.css') }}">

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
        background-color: #32c193;
        color: white;
        cursor: pointer;
        border-radius: 25px;
    }

    #myBtn:hover {
        background-color: #188038;
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
</style>