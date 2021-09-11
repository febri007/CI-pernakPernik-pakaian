<?php 
include 'config/class.php'; 
$dataprodukterbaru = $menu->menuterbaru();
$datakategori1 = $kategori->tampil();
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Menu Catering - <?= $datakonfigurasi['nama_instansi'] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<style>
		.breadcrumb
		{
			margin-top: 20px;
		}
		.panel-body
		{
			box-shadow: 0 4px 8px 0 rgba(0.2, 0.2, 0.2, 0.2);
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
		.galeriproduksi
		{
			width: 200px;
			height: 160px;
		}
	</style>
</head>
<body>
	<?php include 'header.php'; ?>

	<!-- NAVIGATION -->

	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Menu Catering</h3>

				</div>
			</div>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="billing-details">
					<div class="section-title">
						<center><h3 class="title">Menu Roti Aneka</h3></center><br>
						<p class="text-center">Melayani jasa layanan partai besar maupun kecil untuk berbagai acara syukuran, pesta, gathering, dan sebagainya, baik di dalam kota Yogyakarta dan sekitarnya</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="margin-top: -50px;">
		<div class="row">
			<div class="panel panel-body">
				<?php foreach ($datakategori1 as $key => $value): ?>

					<div class="col-md-4 col-xs-6 kgp">
						<a href="paketmenu?id=<?= $value['id_kategori']; ?>"><img class="img-thumbnail" src="admin/upload/img-kategori/<?= $value['gambar'] ?>" alt=""></a><br><br>
						<h3 class="text-center"><?= $value['nama_kategori'] ?></h3>
						<p class="text-center"><a href="galeriprodukkategori.php?id=<?= $value['id_kategori_galeri_produksi']; ?>"><?= $value['uraian'] ?></a></p>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<!-- /BREADCRUMB -->

	<?php include 'produkterbaru.php'; ?>

	<?php include 'whatsapp.php'; ?>

	<?php include 'footer.php'; ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/active.js"></script>
</body>
</html>
