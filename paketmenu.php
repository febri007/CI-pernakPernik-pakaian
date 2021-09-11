<?php 
include 'config/class.php';
$id_kategori = $_GET['id'];

$page = (isset($_GET['page']))? $_GET['page'] : 1;
$batas=8;
if (isset($_GET["page"]) AND !empty($_GET["page"])) 
{
	$posisi = ($_GET["page"]-1)*8;
}
else
{
	$posisi = 0;
	$_GET["page"]= 1;
}
$datamenu=$menu->paketmenu($id_kategori,$posisi,$batas);
$datakategorimenu = $kategori->detail($id_kategori);
$datakategori = $kategori->tampil();
$nama_kategori=$datakategorimenu['nama_kategori'];
$terlaris = $menu->menuterlaris();
$dataprodukterbaru = $menu->menuterbaru();
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $datakonfigurasi['nama_instansi'] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<style>
	.gambarpro
	{

		height: 350px;
	}
	@media only screen and (min-width: 768px) {
		.gambarpro
		{
			width: 100%;
			height: 170px;
		}
	}
	.on { color:#FFC107; }
	.off { color:#E0E0E0; }
</style>
</head>
<body>

	<?php include 'header.php'; ?>
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="alert alert-dark" style="background: #E8E8E8;">
					<b><h4 style="color: #202020;">Kategori Menu &nbsp "<?php echo $nama_kategori; ?>"</h4></b>
				</div>
				<?php if (empty($datamenu)): ?>
					<div id="aside" class="col-md-3">
						<div class="aside">
							<h3 class="aside-title">Kategori Menu</h3>
							<div class="checkbox-filter">
								<?php foreach ($datakategori as $key => $value): ?>

									<div class="input-checkbox">
										<i class="fa fa-chevron-right"></i>
										<label for="category-1">
											<span></span>
											<a href="paketmenu?id=<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></a>
										</label>
									</div>
								<?php endforeach ?>
							</div>
						</div>

						<div class="aside">

							<h3 class="aside-title">Terlaris</h3>
							<?php foreach ($terlaris as $key => $value): ?>
								<?php if ($value['terjual'] < 1): ?>
									<?php else: ?>
										<div class="product-widget">
											<div class="product-img">
												<img src="admin/upload/img-menu/<?php echo $value['gambar_menu'] ?>" alt="">
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $value['nama_kategori']; ?> 

											</p>
											<h3 class="product-name"><a href="detail?id=<?= $value['id_menu'] ?>"><?php echo $value['nama_menu']; ?></a></h3>
											<h4 class="product-price">Rp. <?= $value['harga_menu']; ?></h4>
										</div>
									</div>
								<?php endif ?>
							<?php endforeach ?> 
						</div>
					</div>
					<div class="col-md-9">
						<center>
							<div class="amplebiz-errorpage" style="width: 99%;">  
								<center>
									<img width="100" src="img/idea.png" alt="">
								</center>
								<br />
								<em>Maaf, kategori menu "<?php echo $nama_kategori ?>" belum tersedia. </em>

								<br />
							</div>
						</center>
					<?php endif ?>
					<?php if (empty($datamenu)): ?>

						<?php else: ?>
							<div id="aside" class="col-md-3">
								<div class="aside">
									<h3 class="aside-title">Kategori Menu</h3>
									<div class="checkbox-filter">
										<?php foreach ($datakategori as $key => $value): ?>

											<div class="input-checkbox">
												<i class="fa fa-chevron-right"></i>
												<label for="category-1">
													<span></span>
													<a href="paketmenu?id=<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></a>
												</label>
											</div>
										<?php endforeach ?>
									</div>
								</div>

								<div class="aside">

									<h3 class="aside-title">Terlaris</h3>
									<?php foreach ($terlaris as $key => $value): ?>
										<?php if ($value['terjual'] < 1): ?>
											<?php else: ?>
												<div class="product-widget">
													<div class="product-img">
														<img src="admin/upload/img-menu/<?php echo $value['gambar_menu'] ?>" alt="">
													</div>
													<div class="product-body">
														<p class="product-category"><?php echo $value['nama_kategori']; ?> 

													</p>
													<h3 class="product-name"><a href="detail?id=<?= $value['id_menu'] ?>"><?php echo $value['nama_menu']; ?></a></h3>
													<h4 class="product-price">Rp. <?= $value['harga_menu']; ?></h4>
												</div>
											</div>
										<?php endif ?>
									<?php endforeach ?> 
								</div>
							</div>
							<div id="store" class="col-md-9">
								<!-- store top filter -->

								<!-- /store top filter -->

								<!-- store products -->
								<div class="row">
									<?php foreach ($datamenu as $key => $value): ?>
										<div class="col-md-3 col-xs-6">
											<div class="product">
												<div class="product-img">
													<a href="detail?id=<?= $value['id_menu']; ?>"><img class="gambarpro" src="admin/upload/img-menu/<?= $value['gambar_menu']; ?>" alt=""></a>
												</div>
												<div class="product-body">
													<p class="product-category"><?= $value['nama_kategori']; ?></p>
													<h3 class="product-name"><a href="detailproduk.php?id=<?= $value['id_produk'] ?>&title=<?= $value['slug_produk'] ?>"><?= $value['nama_menu']; ?></a></h3>
													<h4 class="product-price">Rp. <?= number_format($value['harga_menu']); ?></h4>
												</div>
												<div class="add-to-cart">
													<a href="detail?id=<?= $value['id_menu']; ?>"  class="add-to-cart-btn"> Detail</a>
												</div>
											</div>
										</div>
										<?php  
										$nomor=$key+1;
										if (($key+1)%4==0) {
											echo "<div class='clearfix'></div>";
										}
										?>
									<?php endforeach ?>
								</div>
								<div class="store-filter clearfix">
									<ul class="store-pagination">
										<?php
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                	?>
                	<li><a class="disabled">First</a></li>
                	<li><a class="disabled"><i class="fa fa-angle-double-left"></i></a></li>
                	<?php
                }else{ // Jika page bukan page ke 1
                	$link_prev = ($page > 1)? $page - 1 : 1;
                	?>
                	<li><a href="./?page=1">First</a></li>
                	<li><a href="./?page=<?php echo $link_prev; ?>"><i class="fa fa-angle-double-left"></i></a></li>
                	<?php
                }
                ?>
                <?php 
                $id_kategori = $_GET['id'];
                $banyakproduk=$menu->semuamenu($id_kategori);
                $banyakpage=ceil($banyakproduk/$batas);
						 $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($banyakpage - $jumlah_number))? $page + $jumlah_number : $banyakpage;
                for($i = $start_number; $i <= $end_number; $i++){
                	$link_active = ($page == $i)? ' class="active"' : '';
                	?>
                	<li<?php echo $link_active; ?>><a href="produkkategori?id=<?= $id_kategori1; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                	<?php
                }
                ?>
                
                <!-- LINK NEXT AND LAST -->
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $banyakpage){ // Jika page terakhir
                	?>
                	<li><a class="disabled"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a class="disabled">Last</li>
                		<?php
                }else{ // Jika Bukan page terakhir
                	$link_next = ($page < $banyakpage)? $page + 1 : $banyakpage;
                	?>
                	<li><a href="produkkategori?id=<?= $id_kategori1; ?>&page=<?php echo $link_next; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a href="produkkategori?id=<?= $id_kategori1; ?>&page=<?php echo $banyakpage; ?>">Last</a></li>
                	<?php
                }
                ?>
            </ul>
        </div>
    </div>
<?php endif ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php include 'produkterbaru.php'; ?>


<?php include 'whatsapp.php'; ?>

<?php include 'footer.php'; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/tawkto.js"></script>
</body>
</html>


