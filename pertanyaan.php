<?php include 'config/class.php'; ?>
<?php 
$datatesti=$testimoni->tampiltestimonipelanggan(); 
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testimoni - <?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <style>
        .pusatbantuan
        {
            width: 100%;
            height: 300px;
            padding-top: 64px;
            margin-bottom: 32px;
            background-image: url(img/bantuan.png);
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-position: center;
        }
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }
        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            font: 14px arial;
        }
        .packing
        {
            display: inline-block;
        }
        .menu-bantuan li 
        {
            border-bottom: 1px solid #9fa6b0;
            margin: 10px;
        }
    </style>
</head>
<body>
  <!--   <div class="preloader">
  <div class="loading">
    <img src="img/spinner.gif" width="100">
    <p>Harap Tunggu</p>
  </div>
</div> -->

<?php include 'header.php'; ?>
<div id="breadcrumb" class="section">
  <div class="container">
     <div class="row">
        <div class="col-md-12">
            <h3 class="breadcrumb-header"><i class="fa fa fa-question-circle-o"></i> Bantuan</h3>
        </div>
    </div>
</div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel panel-body">
                 <ul class="menu-bantuan">
                    <li><a href="akunsaya"><img width="40" class="packing" src="img/pelanggan.png" alt=""> Akun Saya</a></li>
                    <li><a href="panduanpemesanan"><img width="40" class="packing" src="img/panduan pemesanan.png" alt=""> Panduan Pemesanan</a></li>
                    <li><a href="pertanyaan"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel panel-body">
                <p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan </p>
                <hr>
                <h4>Berapa lama waktu produksi ?</h4>
                <p>Waktu produksi ditentukan oleh banyaknya jumlah pesanan. Waktu yang dibutuhkan juga berbeda-beda.</p><br>
                <h4>Apakah ada minimal pemesanan ?</h4>
                <p>Demi menjaga kualitas produk dan layanan, kami menerapkan kebijakan minimal order (MOQ) sebesar 15 pcs. Silahkan hubungi kami untuk mendapatkan informasi lebih lanjut.</p><br>
            </div>
        </div>
    </div>

</div>
</div>
<br><br>
<?php include 'whatsapp.php'; ?>
<?php include 'footer.php'; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/tawkto.js"></script>
<script src="js/active.js"></script>
<script src="js/stiky.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $("#testimonial-slider").owlCarousel({
           items:3,
           itemsDesktop:[1000,3],
           itemsDesktopSmall:[990,2],
           itemsTablet:[768,2],
           itemsMobile:[650,1],
           pagination:true,
           navigation:false,
           autoPlay:true
       });
   });
</script>
<script>
    $(window).load(function() {
        $('.preloader').fadeOut('slow');
    });
</script>
</body>
</html>