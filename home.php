<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Karunia - Sistem Penjualan Barang Berbasis Web </title>
    <meta name="description"
          content="Knight is a beautiful Bootstrap 4 template for product landing pages."/>

    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">

    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">

    <!-- Bootstrap CSS / Color Scheme -->
    <link rel="stylesheet" href="assets/css/default.css" id="theme-color">
</head>
<body>

<!--navigation-->
<section class="smart-scroll">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand heading-black" href="home.php">
                Karunia
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="navbar-brand heading-black" href="login.php">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</section>

<!--hero header-->
<section class="py-7 py-md-0 bg-hero" id="home">
    <div class="container">
        <div class="row vh-md-100">
            <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
            	<?php
            	$koneksi = mysqli_connect("localhost","root","","db_toko");
            	$sql = mysqli_query($koneksi,"SELECT * from pengumuman");
            	$row = mysqli_fetch_assoc($sql);
            	if ($row['text'] == '') {
            		echo "<h1 class='heading-black text-capitalize'>Selamat Datang</h1>
                <p class='lead py-3'>Aplikasi Kasir</p>";
            	}else{
            		echo "<h1 class='heading-black text-capitalize'>PENGUMUMAN</h1>
                <p class='lead py-3'>".$row['text']."</p>";
            	}
            	?>
            </div>
        </div>
    </div>
</section>

<!-- features section -->

<!--footer-->
<footer class="py-6">
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-5 mr-auto">
                <h5>About Knight</h5>
                <p class="text-muted">Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore.
                    Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.</p>
                <ul class="list-inline social social-sm">
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href=""><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Refund policy</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Partner</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Refer a friend</a></li>
                    <li><a href="#">Affiliates</a></li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Help</h5>
                <ul class="list-unstyled">
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Log in</a></li>
                </ul>
            </div>
        </div> -->
        <div class="row mt-5">
            <div class="col-12 text-muted text-center small-xl">
                &copy; Karunia Plastik
            </div>
        </div>
    </div>
</footer>

<!--scroll to top-->
<div class="scroll-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.7.3/feather.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>