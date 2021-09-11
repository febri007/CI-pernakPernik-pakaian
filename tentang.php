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
    <title>Tentang - <?= $datakonfigurasi['nama_instansi'] ?></title>
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
        .breadcrumb
        {
            margin-top: 20px;
        }
        .pro
        {
            box-shadow: 0 4px 8px 0 rgba(0.2, 0.2, 0.2, 0.2);
            margin-top: 20px;
            text-align: center;
        }
        h3
        {
            margin-bottom: 50px;
        }
        .tes
        {
            padding: 12px;
        }
        .testi
        {
            text-align: center;
        }
        .gbr
        {
            height: 400px;
        }
        #quote-carousel {
            padding: 0 10px 30px 10px;
            margin-top: 60px;
        }
        #quote-carousel .carousel-control {
            background: none;
            color: #CACACA;
            font-size: 2.3em;
            text-shadow: none;
            margin-top: 30px;
        }
        #quote-carousel .carousel-indicators {
            position: relative;
            right: 50%;
            top: auto;
            bottom: 0px;
            margin-top: 20px;
            margin-right: -19px;
        }
        #quote-carousel .carousel-indicators li {
            width: 50px;
            height: 50px;
            cursor: pointer;
            border: 1px solid #ccc;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            border-radius: 50%;
            opacity: 0.4;
            overflow: hidden;
            transition: all .4s ease-in;
            vertical-align: middle;
        }
        #quote-carousel .carousel-indicators .active {
            width: 128px;
            height: 128px;
            opacity: 1;
            transition: all .2s;
        }
        .item blockquote {
            border-left: none;
            margin: 0;
        }
        .item blockquote p:before {
            content: "\f10d";
            font-family: 'Fontawesome';
            float: left;
            margin-right: 10px;
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
           <h3 class="breadcrumb-header">Tentang</h3>

       </div>
   </div>
</div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <img src="img/cupcakesaneka.png" alt="" class="img-thumbnail">
        </div>
        <div class="col-md-7">
           <h3>Roti Aneka</h3>
           <div class="panel panel-default" style="margin-top: -30px;">
            <div class="panel panel-body">

                <p align="justify">
                    Berawal dari usaha yang sederhana Toko Roti Aneka kini telah berkembang pesat. Didirikan oleh Ibu Rini Herawati dan Bapak Subianto pada tahun 1997 dan telah beroprasi sejak 1998 sampai saat ini,  Toko Roti Aneka telah menerima banyak pesanan dari berbagai instansi yang berada di wilayah Yogyakarta dan sekitarnya. Dengan rasa yang lezat, kualitas makanan terjamin, dan memprioritaskan pelanggan. 
             </p>
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