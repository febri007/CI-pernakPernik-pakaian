<?php 
include 'config/class.php'; 
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hubungi Kami - <?= $datakonfigurasi['nama_instansi'] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<style>
	.gambar
	{
		width: 1200px;
		height: 500px;

	}
	.breadcrumb
	{
		margin-top: 20px;
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
<!-- 	<div class="preloader">
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
    				<h3 class="breadcrumb-header"> Hubungi Kami</h3>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="contact-page page">
    	<div class="container">
    		<div class="row">
    			<div class="contact-page-inner">
    				<div class="col-md-7">
    					<div class="panel panel-default">
    						<div class="panel panel-body">
    							<div class="contact-page-title">
    								<h4>Informasi Kontak</h4>
    							</div>
    							<div class="contact-info">
    								<p><i class="fa fa-phone"></i>+62851-0048-3065</p>
    								<p><i class="fa fa-whatsapp"></i>+62813-9253-6241</p>
    								<p><i class="fa fa-envelope"></i>rotianeka1@gmail.com</p>
    								<p><i class="fa fa-map-marker"> </i>Menulis, Sumbersari, Moyudan, Sleman, Yogyakarta 55563</p>
    							</div>
    							<div class="contact-map">
    								<center><a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942"  class="btn btn-success" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;" target="_blank">Klik Disini! lokasi Roti Aneka melalui Google Maps</a></center>
    								<br>
    								<center><a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942" target="blank"><img class="gambar img-thumbnail" src="img/mapsaneka.png" alt=""></a></center>
    							</div>
    						</div>
    					</div>
    				</div>
    				<div class="col-md-5">
    					<div class="panel panel-default">
    						<div class="panel panel-body">
    							<div class="contact-page-title">
    								<h4>Ketentuan Pesanan</h4>
    							</div>
    							<div class="">
    								<p>- Jumlah pesanan minimal 15 porsi.</p>
    								<p>- Pelunasan H-1 sebelum hari pelaksanaan acara.</p>
    								<p>- Pemesanan diantar dikenakan biaya ongkos kirim.</p>
    								<p>- Harga sewaktu-waktu dapat berubah tanpa pemberitahuan terlebih dahulu.</p>
    								<p>- DP atau uang muka sebagai pengikat tanggal.</p>
    								<p>- Apabila terjadi pembatalan, booking fee atau DP tidak dapat dikembalikan / hangus.</p>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    <?php include 'whatsapp.php'; ?>

    <?php include 'footer.php'; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/tawkto.js"></script>
    <script src="js/active.js"></script>
    <script src="js/stiky.js"></script>
    <script src="js/tawkto.js"></script>
    <script>
    	$(window).load(function() {
    		$('.preloader').fadeOut('slow');
    	});
    </script>
</body>
</html>
