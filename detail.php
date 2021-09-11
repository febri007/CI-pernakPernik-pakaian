<?php  
$id_menu = $_GET['id'];
include 'config/class.php';
$dataproduk = $menu->detail($id_menu);
$datagambar = $menu->gambar($id_menu);
$dataprodukterbaru = $menu->menuterbaru();
$datakonfigurasi = $konfigurasi->ambil();	
?>
<?php  
if (isset($_GET['id']))
{
	$id_menu = $_GET['id'];
	$query="UPDATE menu SET views_menu = views_menu + 1 WHERE id_menu = $id_menu";
	$get_post_view = mysqli_query($mysqli,$query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
	<title>Detail Produk - <?= $datakonfigurasi['nama_instansi'] ?></title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
</head>
<body>

	<?php include 'header.php'; ?>

	<div id="breadcrumb" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Detail Menu</a></li>
						<li class="active"><?= $dataproduk['nama_menu'] ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="admin/upload/img-menu/<?= $dataproduk['gambar_menu'] ?>" alt="">
						</div>
						<?php foreach ($datagambar as $key => $value): ?>
							<div class="product-preview">
								<img src="admin/upload/img-menu/<?= $value['gambar'] ?>" alt="">
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						<div class="product-preview">
							<img src="admin/upload/img-menu/<?= $dataproduk['gambar_menu'] ?>" alt="">
						</div>
						<?php foreach ($datagambar as $key => $value): ?>
							<div class="product-preview">
								<img src="admin/upload/img-menu/<?= $value['gambar'] ?>" alt="">
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?= $dataproduk['nama_menu'] ?></h2>

						<div>
							<h3 class="product-price">Rp. <?= number_format($dataproduk['harga_menu']) ?></h3>
							<span class="product-available" style="color: #54d44e; font-size: 17px;">Tersedia</span>
						</div>



						<div class="add-to-cart">
							<form action="" method="post">
								<div class="qty-label">
									Jumlah
									<div class="input-number">
										<input type="number" value="15" name="jumlah" required="">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<button class="add-to-cart-btn" name="masukankeranjang"><i class="fa fa-shopping-cart"></i> Masukan Keranjang</button>
							</form>
							<?php  
							if (isset($_POST['masukankeranjang'])) 
							{
								$jumlah = $_POST['jumlah'];
								if ($jumlah <= 14 ) 
								{
									echo "<script>alert('".$dataproduk['nama_menu']." gagal dimasukan ke Keranjang, minimal pemesanan adalah 15');</script>";
									echo "<script>location='';</script>";
								}
								else
								{

									$pesanan->masukankeranjang($id_menu,$_POST['jumlah']);
									echo "<script>alert('".$dataproduk['nama_menu']." berhasil dimasukan ke Keranjang');</script>";
									echo "<script>location='';</script>";
								}
							}
							?>
						</div>



						<ul class="product-links">
							<li>Kategori :</li>
							<li><a href="#"><?= $dataproduk['nama_kategori'] ?></a></li>
						</ul>
						<br>
						<div class="alert alert-danger"><i class="fa fa-info-circle"></i> Pembelian diatas 80pcs memerlukan 2 hari, silahkan order h-2 jika pesanan lebih dari 80pcs.</div>

					</div>
				</div>
				<!-- /Product details -->

				<!-- Product tab -->
				<div class="col-md-12">
					<div id="product-tab">
						<!-- product tab nav -->
						<ul class="tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
						</ul>
						<!-- /product tab nav -->

						<!-- product tab content -->
						<div class="tab-content">
							<!-- tab1  -->
							<div id="tab1" class="tab-pane fade in active">
								<div class="row">
									<div class="col-md-12">
										<p><?= $dataproduk['deskripsi_menu'] ?></p>
									</div>
								</div>
							</div>
							<!-- /tab1  -->

							<!-- tab2  -->
							
							<!-- /tab2  -->

							<!-- tab3  -->
							
							<!-- /tab3  -->
						</div>
						<!-- /product tab content  -->
					</div>
				</div>
				<!-- /product tab -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<?php  include 'produkterbaru.php'; ?>

	<?php include 'footer.php'; ?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
