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
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <link href="css/modal.css" rel="stylesheet">
    <style>

    </style>

    <!-- Alphine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- App JS -->
    <script src="js/app.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.x/dist/alpine.min.js"></script>
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
    </div>


    <div class="container-fluid">
        <div class="heading_container heading_center mt-3">
            <h2>Layanan <span> Kami</span></h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="kategori mt-5">
                    <div class="container">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h6 class="text-center">Kategori</h6>
                            </div>

                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><a href="{{ url('/layanan') }}">Semua</a></li>
                                    @foreach($kategoriLayanan as $kategori)
                                    <li class="list-group-item"><a
                                            href="{{ url('/layanan?kategori=' . $kategori->nama_kategori) }}">{{
                                            $kategori->nama_kategori }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <section class="service_section layout_padding">
                    <div class="container">
                        <div class="row">
                            @foreach ($layananModel as $layanan)
                            <div class="col-sm-6 col-md-4">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{ asset('storage/gambar/' . basename($layanan->gambar)) }}" />
                                    </div>
                                    <div class="detail-box">
                                        <h5>{{ $layanan->nama_alat }}</h5>
                                        <p>{{ $layanan->deskripsi_layanan }}</p>
                                    </div>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $layanan->id }}" name="id">
                                        <input type="hidden" value="{{ $layanan->nama_alat }}" name="name">
                                        <input type="hidden" value="{{ $layanan->harga_layanan }}" name="price">
                                        <input type="hidden" value="{{ $layanan->gambar }}" name="gambar">
                                        <input type="hidden" value="1" name="quantity">
                                        <button class="pesan">Pesan</button>
                                    </form>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pagination justify-content-center mt-4">
                            {{ $layananModel->appends(request()->input())->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                </section>
                <!-- end service section -->
            </div>
        </div>
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
                                        <a class="" href="service.html">Layanan </a>
                                    </li>
                                    <li class="">
                                        <a class="" href="portfolio.html"> Portofolio </a>
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


    <script>
        // MODAL KRINSHAFT // 

        // Fungsi untuk membuka modal dan menambahkan opsi ke dropdown
        function openModal_krinshaft(jenisLayanan) {
            // Ambil elemen select
            var select = document.getElementById("services");

            // Bersihkan opsi sebelum menambahkan yang baru
            select.innerHTML = "";

            // Parse nilai jenisLayanan menjadi array JavaScript
            var options = JSON.parse(jenisLayanan);

            // Iterasi melalui array dan tambahkan setiap opsi ke elemen select
            options.forEach(function (option) {
                var optionElement = document.createElement("option");
                optionElement.value = option.trim();
                optionElement.text = option.trim();
                select.appendChild(optionElement);
            });


            console.log(options);

            // Tampilkan modal
            document.getElementById("myModal_krinshaft").style.display = "block";
        }


        // Fungsi-fungsi lainnya

        // Fungsi untuk menutup modal
        function closeModal_krinshaft() {
            document.getElementById('myModal_krinshaft').style.display = 'none';
        }

        // Fungsi untuk menambahkan ke keranjang (contoh aksi)
        function addToCart() {
            const selectedService = document.getElementById('services').value;
            const quantity = document.getElementById('quantity').value;

            // Lakukan sesuatu dengan nilai yang dipilih, seperti menambahkan ke keranjang
            console.log(`Layanan yang dipilih: ${selectedService}, Kuantitas: ${quantity}`);
            // Di sini bisa ditambahkan logika untuk menambahkan ke keranjang belanja
            // Misalnya, menyimpan nilai-nilai ini dalam sebuah array atau melakukan permintaan HTTP ke backend, dll.

            // Setelah melakukan aksi yang diinginkan, tutup modal
            closeModal_krinshaft();
        }

        // MODAL ANJESTER // 

        // Fungsi untuk membuka modal
        function openModal_anjester() {
            document.getElementById('myModal_anjester').style.display = 'block';
        }

        // Fungsi untuk menutup modal
        function closeModal_anjester() {
            document.getElementById('myModal_anjester').style.display = 'none';
        }

        // Fungsi untuk menambahkan ke keranjang (contoh aksi)
        function addToCart() {
            const selectedService = document.getElementById('services').value;
            const quantity = document.getElementById('quantity').value;

            // Lakukan sesuatu dengan nilai yang dipilih, seperti menambahkan ke keranjang
            console.log(`Layanan yang dipilih: ${selectedService}, Kuantitas: ${quantity}`);
            // Di sini bisa ditambahkan logika untuk menambahkan ke keranjang belanja
            // Misalnya, menyimpan nilai-nilai ini dalam sebuah array atau melakukan permintaan HTTP ke backend, dll.

            // Setelah melakukan aksi yang diinginkan, tutup modal
            closeModal_anjester();
        }


        // MODAL ANJESTER // 

        // Fungsi untuk membuka modal
        function openModal_anjester() {
            document.getElementById('myModal_anjester').style.display = 'block';
        }

        // Fungsi untuk menutup modal
        function closeModal_anjester() {
            document.getElementById('myModal_anjester').style.display = 'none';
        }

        // Fungsi untuk menambahkan ke keranjang (contoh aksi)
        function addToCart() {
            const selectedService = document.getElementById('services').value;
            const quantity = document.getElementById('quantity').value;

            // Lakukan sesuatu dengan nilai yang dipilih, seperti menambahkan ke keranjang
            console.log(`Layanan yang dipilih: ${selectedService}, Kuantitas: ${quantity}`);
            // Di sini bisa ditambahkan logika untuk menambahkan ke keranjang belanja
            // Misalnya, menyimpan nilai-nilai ini dalam sebuah array atau melakukan permintaan HTTP ke backend, dll.

            // Setelah melakukan aksi yang diinginkan, tutup modal
            closeModal_anjester();
        }
    </script>
</body>

</html>