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
    <style>
    </style>
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
        <!-- end header section -->
    </div>

    <!-- contact section -->
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Bukti {{ $title }}</h2>
            </div>
            <div class="row">
                <div class="col">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form_container">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <!-- Id Transaksi	Nama Peneransfer	Foto Bukti -->
                        <form action="{{ route('testimoni.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $data->user_id }}">
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="exampleFormName" style="color: white;">Nama</label>
                                    <input type="text" name="name" id="exampleFormName" readonly class="form-control"
                                        value="{{ $data->name }}" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1" style="color: white;">Rate</label>
                                    <select name="rate" class="form-control" id="exampleFormControlSelect1">
                                        <option value="1">
                                            <span class="star">&#9733;</span>
                                        </option>
                                        <option value="2">
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                        </option>
                                        <option value="3">
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                        </option>
                                        <option value="4">
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                        </option>
                                        <option value="5" selected>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                            <span class="star">&#9733;</span>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="exampleFormControlTextarea1" style="color: white;">Ulasan</label>
                                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
                                        placeholder="berikan ulasan anda" rows="3">{{ $data->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="btn_box">
                                <button type="submit">
                                    Kirim
                                </button>
                            </div>
                        </form>
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
                                    <input type="email" placeholder="Masukkan Email" />
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


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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