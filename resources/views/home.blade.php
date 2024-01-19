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

    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>
</head>



<body>
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
                                Telepon : +62 89520361859
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
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Kami <br />
                                    Menghadirkan Layanan dan Kualitas <br />
                                    Terbaik
                                </h1>
                                <div class="btn-box">
                                    <a href="service.html" class="btn1">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Perbaikan<br />
                                    dan Pembuatan Alat Spare Part<br />
                                    Terbaik
                                </h1>
                                <div class="btn-box">
                                    <a href="service.html" class="btn1">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="detail-box">
                                <h1>
                                    Kami <br />
                                    Menghadirkan Layanan dan Kualitas <br />
                                    Terbaik
                                </h1>
                                <div class="btn-box">
                                    <a href="about.html" class="btn1">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel_btn-box">
                    <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span class="sr-only">Kembali</span>
                    </a>
                    <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                        <span class="sr-only">Selanjutnya</span>
                    </a>
                </div>
            </div>
        </section>
        <!-- end slider section -->
    </div>

    <!-- about section -->

    <section class="about_section layout_padding">
        <div class="container  ">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2>Selamat datang di <span>Marga Las</span></h2>
                        </div>
                        <p>
                        <h3><i class="fa fa-clock-o"></i>Jam Operasional:</h3>
                        <p>Senin-Sabtu: 08.00 AM - 17.00 PM</p>
                        <p>Minggu: Tutup</p>

                        <h3><i class="fa fa-map-marker"></i>Lokasi:</h3>
                        <p>Jalan 28 Oktober No. 18b</p>
                        <p>Kota Pontianak, 78241</p>
                        </p>
                        <a href="about.html">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="img-box">
                        <img src="images/about-img.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end about section -->

    <!-- portfolio section -->

    <section class="portfolio_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Galeri
                </h2>
            </div>
            <div class="carousel-wrap ">
                <div class="filter_box">
                    <nav class="owl-filter-bar">
                        <a href="#" class="item active" data-owl-filter="*">Semua</a>
                        <a href="#" class="item" data-owl-filter=".decorative">Perbaikan Spare Part</a>
                        <a href="#" class="item" data-owl-filter=".facade">Pembuatan Spare Part</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="owl-carousel portfolio_carousel">
            <div class="item decorative">
                <div class="box">
                    <div class="img-box">
                        <img src="images/pengerjaanlas.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="portfolio.html" class="">
                                Lihat Lebih Banyak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item facade">
                <div class="box">
                    <div class="img-box">
                        <img src="images/pengerjaanlas1.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="portfolio.html" class="">
                                Lihat Lebih Banyak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item perforated decorative">
                <div class="box">
                    <div class="img-box">
                        <img src="images/pengerjaanbubut.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="portfolio.html" class="">
                                Lihat Lebih Banyak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item railing">
                <div class="box">
                    <div class="img-box">
                        <img src="images/pengerjaanbubut2.jpg" alt="" />
                        <div class="btn_overlay">
                            <a href="portfolio.html" class="">
                                Lihat Lebih Banyak
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end portfolio section -->

    <!-- service section -->

    <section class="service_section layout_padding">
        <div class="container ">
            <div class="heading_container heading_center">
                <h2>Layanan <span> Kami</span></h2>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/krinshaft.jpg" alt="krinshaft" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Krinshaft
                            </h5>
                            <p>
                                Menyediakan Las dan bubut tempat oilseal dan tempat metal bulan krinshaft
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/anjester.jpg" alt="Anjester" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Anjester
                            </h5>
                            <p>
                                Menyediakan las anjester dan bubut busing anjester
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/block.jpg" alt="Block" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Block
                            </h5>
                            <p>
                                Menyediakan Las block dan Las mata block
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/bautdanpin.jpg" alt="Baut-dan-Pin" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Baut dan Pin
                            </h5>
                            <p>
                                Menyediakan pembuatan baut dan pin sesuai ukuran yang diinginkan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/daetselcanter.jpg" alt="Daetsel-Canter" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Daetsel Canter
                            </h5>
                            <p>
                                Menyediakan papas daetsel, cabut baut dan sarung mangkok kelep daetsel
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/tromol.jpg" alt="Tromol" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tromol
                            </h5>
                            <p>
                                Menyediakan bubut tromol
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/roller.jpg" alt="roller" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Roller
                            </h5>
                            <p>
                                Menyediakan pembuatan roller
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/greader.jpg" alt="Greader" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Greader
                            </h5>
                            <p>
                                Menyediakan bubut busing greader dan perbaikan bering greader
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/haproda.jpg" alt="haproda" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Haproda
                            </h5>
                            <p>
                                Menyediakan las dan bubut rumah bering haproda
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/rumahpump.jpg" alt="rumahpump" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Rumah Pump
                            </h5>
                            <p>
                                Menyediakan bubut busing dan sarung baut rumah pump
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box ">
                        <div class="img-box">
                            <img src="images/nepel.jpg" alt="nepel" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Nepel
                            </h5>
                            <p>
                                Menyediakan Las dan bubut tempat oilseal nepel
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/selongsong1.jpg" alt="selongsong" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Selongsong
                            </h5>
                            <p>
                                Menyediakan Center Lurus, Ganti Housing, Ganti Pin Sopeker
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/daetselfuso.jpg" alt="daetselfuso" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Daetsel Fuso
                            </h5>
                            <p>
                                Menyediakan Papas daetsel, Cabut baut, Sarung Mangkok Kelep Daetsel Fuso
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/nokenas.jpg" alt="nokenas" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Nokenas
                            </h5>
                            <p>
                                Menyediakan Las Nock Nokenas
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/sambungannepel.jpg" alt="sambungannepel" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Sambungan Nepel
                            </h5>
                            <p>
                                Menyediakan pembuatan drat sambungan nepel
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/gearinjeksi.jpg" alt="gearinjeksi" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Gear Injeksi
                            </h5>
                            <p>
                                Menyediakan Las dan bubut gear injeksi
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/waser.jpg" alt="waser" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Waser
                            </h5>
                            <p>
                                Menyediakan spare part waser
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/tramisi.jpg" alt="tramisi" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Tramisi
                            </h5>
                            <p>
                                Menyediakan polis tramisi
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/nouter.jpg" alt="tramisi" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Nouter
                            </h5>
                            <p>
                                Press Keluar Nouter
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/propeller.jpg" alt="tramisi" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Propeller
                            </h5>
                            <p>
                                Las Busing Propeller
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="img-box">
                            <img src="images/spider.jpg" alt="tramisi" />
                        </div>
                        <div class="detail-box">
                            <h5>
                                Spider
                            </h5>
                            <p>
                                Bikin kunci spider
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="btn-box">
                <a href="service.html">
                    Pesan Layanan
                </a>
            </div>
        </div>
    </section>

    <!-- end service section -->

    <!-- contact section -->
    <section class="contact_section ">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Kontak <span>Kami</span></h2>
            </div>
            <div class="row">
                <div class="col-md-6 px-0">
                    <div class="form_container">
                        <form action="">
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="form-control" placeholder="Masukkan nama" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" placeholder="Masukkan No Telepon" />
                                </div>
                                <div class="form-group col-lg-6">
                                    <select name="" id="" class="form-control wide">
                                        <option value="">Pilih Layanan</option>
                                        <option value="">Perbaikan Spare Part</option>
                                        <option value="">Pembuatan Spare Part</option>
                                        <option value="">Spare Part</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <input type="text" class="message-box form-control" placeholder="Pesan" />
                                </div>
                            </div>
                            <div class="btn_box">
                                <button>
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.8182506913504!2d109.36391200000003!3d-0.010705999999992017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d58105149f977%3A0x1893263f43dd82b6!2sMarga%20Las!5e0!3m2!1sid!2sid!4v1701785994505!5m2!1sid!2sid"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->


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
                                        <a class="" href="contact.html"> Kontak</a>
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
                                dengan kualitas
                                terbaik dan hasil las yang baik.
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
                                    <input type="email" placeholder="Masukkan Email Anda" />
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


</body>

</html>