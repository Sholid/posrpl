<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Penjualan</title>
    {{-- menambahkan boostrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="mt-4">

            {{-- Header --}}
            <nav class="navbar shadow-sm navbar-expand-lg" style="background-color:white)">
                <div class="container-fluid">
                    <a href="/"><img style=" width:250px " src ="{{ asset('gambar/resto.png') }}"
                            alt=""></a>
                    <ul class="navbar-nav gap-4">
                        {{-- <li class="nav-item"><a class="nav-link" href="#">Cari Barang</a></li> --}}
                        @if (session()->missing('idpetugas'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}"> Login </a></li>
                        @endif
                        @if (session('idpetugas'))
                            <li class="nav-item"><a class="nav-link" href="{{ url('penjualan') }}">Transaksi</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('viewbarang') }}">Barang </a></li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">{{ session('idpetugas')['username'] }}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}">Logout</a></li>
                        @endif

                    </ul>

                </div>
            </nav>
        </div>
        {{-- Konten --}}
        <div class="mt-4">
            <div class="col-16">
                @yield('content')
            </div>
        </div>
        {{-- Footer --}}
        <div>
            <div class="row mt-4">
                <div class="text-center"Center aligned text on all viewport sizes style="">
                    Project Base Learning Pemrograman web
                </div>
            </div>
        </div>
    </div>
    {{-- js --}}
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
