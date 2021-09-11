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
     <h3 class="breadcrumb-header">Testimoni</h3>

 </div>
</div>
</div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
         <?php if (empty($datatesti)): ?>
            <center>
                <div class="page" >
                    <div class="error404-page">
                        <div class="error-page">
                            <div class="container">
                                <div class="amplebiz-errorpage">
                                    <center><img width="80" src="img/testimoni.png" alt=""></center>
                                    <em>Belum ada testimoni</em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>
            <?php else: ?>
                <div class="panel panel-default">

                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <div class="carousel-inner text-center">
                           <?php foreach($datatesti as $key=>$value) { ?>
                            <div class="item <?php echo ($key == 0) ? "active" : ""; ?>">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p><?= $value['testimoni']; ?></p>
                                            <small><?= $value['nama']; ?></small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        <?php } ?>
                    </div>
                    <ol class="carousel-indicators">
                     <?php foreach($datatesti as $key=>$value) { ?>

                        <?php if (empty($value['foto'])): ?>
                            <li data-target="#quote-carousel" data-slide-to="0" class="<?php echo ($key == 0) ? "active" : ""; ?>"><img class="img-responsive " src="img/user.png" alt="">
                                <?php else: ?>
                                    <li data-target="#quote-carousel" data-slide-to="0" class="<?php echo ($key == 0) ? "active" : ""; ?>"><img class="img-responsive " src="img-pelanggan/<?= $value['foto'] ?>" alt="">
                                    <?php endif ?>

                                </li>
                            <?php } ?>
                        </ol>
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                    </div>            
                </div>
            <?php endif ?>
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