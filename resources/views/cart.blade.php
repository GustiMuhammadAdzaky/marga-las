<!DOCTYPE html>
<html lang="en">

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to cart</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>

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
        <div class="bg-white">


            <main class="my-8">
                <main class="my-8">
                    <div class="container px-6 mx-auto">
                        <div class="flex justify-center my-6">
                            <div
                                class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                                @if ($message = Session::get('success'))
                                <div class="p-4 mb-3 bg-green-400 rounded">
                                    <p class="text-green-800">{{ $message }}</p>
                                </div>
                                @endif
                                <h3 class="text-3xl text-bold">Cart List</h3>
                                <div class="flex-1">
                                    <table class="w-full text-sm lg:text-base" cellspacing="0">
                                        <thead>
                                            <tr class="h-12 uppercase">
                                                <th class="hidden md:table-cell"></th>
                                                <th class="text-left">Nama Alat</th>
                                                <th class="text-left">Quantity</th>
                                                <th class="pl-5 text-left lg:text-right lg:pl-0">
                                                    <span class="lg:hidden" title="Quantity">Qtd</span>
                                                    <!-- <span class="hidden lg:inline">Quantity</span> -->
                                                </th>
                                                <th class="hidden text-right md:table-cell"> Hagra</th>
                                                <th class="hidden text-right md:table-cell"> Hapus </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="hidden pb-4 md:table-cell">
                                                    <a href="#">
                                                        <img src="{{  asset('storage/gambar/' . basename($item->attributes->image))  }}"
                                                            class="w-20 rounded" alt="Thumbnail">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <p class="mb-2 md:ml-4">{{ $item->name }}</p>

                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="#">
                                                        <p class="mb-2 md:ml-4">{{ $item->quantity }}</p>
                                                    </a>
                                                </td>
                                                <td class="justify-center mt-6 md:justify-end md:flex">
                                                    <div class="h-10 w-28">
                                                        <div class="relative flex flex-row w-full h-8">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="hidden text-right md:table-cell">
                                                    <span class="text-sm font-medium lg:text-base">
                                                        {{ $item->price }}
                                                    </span>
                                                </td>
                                                <td class="hidden text-right md:table-cell">
                                                    <form action="{{ route('cart.remove') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                                        <button class="px-4 py-2 text-white bg-red-600">x</button>
                                                    </form>

                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    <div>
                                        Total: Rp {{ Cart::getTotal() }}

                                    </div>
                                    <div style="">
                                        <div class="delete" style="display: inline-block;">
                                            <form action="{{ route('cart.clear') }}" method="POST">
                                                @csrf
                                                <button class="px-6 py-2 text-red-800 bg-red-300">Hapus Semua Data di
                                                    keranjang</button>
                                            </form>
                                        </div>
                                        <!-- id	user_id	transaksi_data	status	total_harga	tanggal_pesan	created_at	updated_at	 -->



                                        <div class="checkout" style="display: inline-block;">
                                            <form action="{{ route('cart.checkout') }}" method="post">
                                                @csrf
                                                <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="transaksi_data"
                                                    value="{{ $cartItems->keys() }}">
                                                <input type="hidden" name="total_harga" value="{{ Cart::getTotal() }}">
                                                <input type="hidden" name="tanggal_pesan"
                                                    value="{{ now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}">


                                                <button class="px-6 py-2 text-green-800 bg-green-300">CheckOut</button>
                                            </form>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </main>

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
                                            <a class="" href="index.html">Home <span
                                                    class="sr-only">(current)</span></a>
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
                                    Kami menyediakan Las alat spare part dan komponen berbagai mobil menggunakan kawat
                                    las
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
                                    Kami menyediakan bubut alat spare part dan komponen mobil dengan hasil bubut yang
                                    baik.
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