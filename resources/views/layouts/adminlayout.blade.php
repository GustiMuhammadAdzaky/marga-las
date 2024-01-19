<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <!-- BoxIcons -->
    <link href='https//unpkg.com/boxicons@2.0.9/css/boxicons.mincss' rel='stylesheet'>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="admin/dashboard.css" />
    <style>
        .box-white {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            /* border: 1px solid black; */
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-smile'></i>
            <span class="text">AdminML</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="/dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/kategori_admin">
                    <i class='bx bx-store'></i>
                    <span class="text">Kategori Admin</span>
                </a>
            </li>
            <li>
                <a href="/layanan_admin">
                    <i class='bx bx-store'></i>
                    <span class="text">Layanan</span>
                </a>
            </li>
            <li>
                <a href="/galeri_admin">
                    <i class='bx bx-store'></i>
                    <span class="text">Galeri</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kontak.admin') }}">
                    <i class='bx bx-store'></i>
                    <span class="text">Lihat Pesan Kontak</span>
                </a>
            </li>
            <li>
                <a href="/transaksi_admin">
                    <i class='bx bx-store'></i>
                    <span class="text">Kelola Transaksi</span>
                </a>
            </li>
            <li>
                <a href="{{ Route('invoice.admin') }}">
                    <i class='bx bx-store'></i>
                    <span class="text">Invoice</span>
                </a>
            </li>
            <li>
                <a href="/galeri_admin">
                    <i class='bx bx-line-chart'></i>
                    <span class="text">Galeri Admin</span>
                </a>
            </li>
            <li>
                <a href="/kontak_admin">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Kontak</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.transfer'); }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Data Transfer Pelanggan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.admin') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Laporan Penjualan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('faktur.admin') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Faktur</span>
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class='bx bxs-group'></i>
                    <span class="text">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </li>

    </section>

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <!-- <label for="switch-mode" class="switch-mode"></label> -->
            <p class="mr-5">{{ Auth::user()->name }}</p>


        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <!-- Content -->
            @yield('content')
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</body>

</html>