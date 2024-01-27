<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Marga Las</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha256-mLBIhmBvigTFWPSCtvdu6a76T+3Xyt+K571hupeFLg4=" crossorigin="anonymous" />
    <!-- font awesome style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>






<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="header_top">
                <div class="container-fluid header_top_container">
                    <img class="logo" src="images/logomargalas.png">
                    <a class="navbar-brand " href="index.html"> Marga<span>Las</span> </a>
                    <div class="contact_nav">
                        <a href="">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <span>
                                Lokasi
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>
                                Call : +62 89520361859
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>
                                margalas08@gmail.com
                            </span>
                        </a>
                    </div>
                    <div class="social_box">
                        <a href="">
                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                        </a>
                        <a href="">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            @include('partials.navbar')
        </header>
    </div>




    <div class="container mt-3 shadow p-3 mb-5 bg-white rounded">
        <table class="table">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <thead class="thead-light">
                <tr>
                    <th scope="col">Id Transaksi</th>
                    <th scope="col">Nama Pembeli </th>
                    <th scope="col">Layanan atau Sperpart</th>
                    <th scope="col">Status Pembelian</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Memesan</th>
                    <th scope="col">Tipe Pembayaran</th>
                    <th scope="col">Bukti Transfer</th>
                </tr>
            </thead>
            <!-- ... -->
            <tbody>
                @foreach($transaksiModels as $index => $transaksiModel)
                <tr>
                    <td>{{ $transaksiModel->id }}</td>
                    <td>{{ Auth::user()->name }}</td>

                    <td>
                        {{ $transaksiModel->transaksi_data }}
                    </td>

                    {{-- Ganti logic untuk menampilkan status --}}
                    <td>
                        @if($transaksiModel->status == "belum_terbayar")
                        <span class="badge badge-danger">Belum Lunas</span>
                        @elseif($transaksiModel->status == "terbayar")
                        <span class="badge badge-success">Lunas</span>
                        @elseif($transaksiModel->status == "menunggu")
                        <span class="badge badge-warning">Menunggu</span>
                        @endif
                    </td>

                    <td>{{ $transaksiModel->total_harga }}</td>
                    <td>{{ $transaksiModel->tanggal_pesan }}</td>
                    <td>Transfer</td>
                    <td>
                        <form action="{{ route('transfer.form', $transaksiModel->id) }}" method="get">
                            <button class="btn btn-primary" type="submit">Kirim Bukti Transfer</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <!-- ... -->




        </table>
    </div>



    <!-- info section -->
    <section class="info_section ">
        <div class="info_container layout_padding2">
            <div class="container">
                <div class="info_logo">
                    <a class="navbar-brand" href="index.html"> Marga <span>Las</span> </a>
                </div>
                <div class="info_main">
                    <div class="row">
                        <div class="col-md-3 col-lg-2">
                            <div class="info_link-box">
                                <h5>
                                    Informasi
                                </h5>
                                <ul>
                                    <li class=" active">
                                        <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="">
                                        <a class="" href="about.html">Tentang Kami</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="service.html">Layanan</a>
                                    </li>
                                    <li class="">
                                        <a class="" href="portfolio.html"> Galeri </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="contact.html"> Kontak </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <h5>
                                Las
                            </h5>
                            <p>
                                Kami menyediakan Las alat spare part dan komponen berbagai mobil menggunakan kawat las
                                dengan kualitas terbaik dan hasil las yang baik.
                            </p>
                        </div>
                        <div class="col-md-3 mx-auto  ">
                            <h5>
                                Media Sosial
                            </h5>
                            <div class="social_box">
                                <a href="#">
                                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <h5>
                                Bubut
                            </h5>
                            <p>
                                Kami menyediakan bubut alat spare part dan komponen mobil dengan hasil bubut yang baik.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="info_bottom">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="info_contact ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <span>
                                                Lokasi
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <span>
                                                Call +62 89520361859
                                            </span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#" class="link-box">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <span>
                                                margalas08@gmail.com
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info_form ">
                                <form action="">
                                    <input type="email" placeholder="Enter Your Email" />
                                    <button>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By Sindy Valensia
            </p>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!--  OwlCarousel 2 - Filter -->
    <script src="https://huynhhuynh.github.io/owlcarousel2-filter/dist/owlcarousel2-filter.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
        integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

</body>

</html>