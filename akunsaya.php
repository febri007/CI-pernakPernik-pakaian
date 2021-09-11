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
                <p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/pelanggan.png" alt=""> Akun Saya </p>
                <hr>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title atasbawah">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Bagaimana cara daftar akun Roti Aneka?</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>1. Klik daftar pada menu diatas. <a href="daftar" style="color: #40b149;"> Klik Disini!</a></p>
                                <p>2. Isi seluruh data dengan benar, lalu klik Daftar.</p>                                    
                                <p>3. Gunakan email dan password yang Anda daftarkan untuk login ke akun Anda.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title atasbawah" >
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Bagaimana cara ubah kata sandi?</a>
                            </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>1. Login ke Akun Anda.</p>
                                <p>2. Arahkan kursor <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/akunsaya.PNG" alt="">, lalu pilih akun saya.</p>
                                <p>3. Pada halaman Profil Saya terdapat <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/ubahpassword.PNG" alt="">, lalu klik Ubah Password.</p>
                                <p>4. Isi seluruh data dengan benar, lalu klik Ubah Password.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title atasbawah">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Bagaimana jika lupa kata sandi?</a>
                            </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>1. Klik login pada menu diatas. <a href="login" style="color: #40b149;"> Klik Disini!</a></p>
                                <p>2. Pada halaman login <img class="packing" src="http://luciffer.rancangdesainrumah.com/img/lupa.PNG" alt="">, lalu klik Lupa Password ?. </p>
                                <p>3. Masukan email dengan benar.</p>
                                <p>4. Anda akan mendapatkan email yang berisi password yang telah direset.</p>
                                <p>5. Gunakan password yang telah direset untuk login.</p>
                            </div>
                        </div>
                    </div>
                </div>
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