<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Selamat Datang Di Web Pendaftaran Santri Baru</h1>
    <form method="POST" action="{{ url('/logout') }}">
        @csrf
            <a 
            class="nav-link" 
            href="{{ url('/logout') }}"
            onclick="event.preventDefault();
            this.closest('form').submit();">
                <i class="menu-icon mdi mdi-logout"></i>
                <span class="menu-title">Keluar</span>
            </a>
    </form>
</body>
</html>