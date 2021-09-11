<?php 

include 'config/class.php'; 
$datakonfigurasi = $konfigurasi->ambil();	
$datakeranjang = $pesanan->tampil_keranjang();

if (isset($_GET['ubah_keranjang'])) 
{
	if (isset($_GET['jumlah']) && isset($_GET['id_menu'])) 
	{
		$jumlah = $_GET['jumlah'];
		$id_menu = $_GET['id_menu'];
		if (isset($_SESSION["keranjang"][$id_menu]))
		{
			$_SESSION["keranjang"][$id_menu]=$jumlah;
		}
	}
}
;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
	<title>Keranjang - <?= $datakonfigurasi['nama_instansi'] ?></title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<style>
		.panel-body
		{
			box-shadow: 0 4px 8px 0 rgba(0.2, 0.2, 0.2, 0.2);
			margin-top: 20px;
		}
	</style>
</head>
<body>

	<?php include 'header.php'; ?>

	<div id="breadcrumb" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb-tree">
						<li><a href="#">Home</a></li>
						<li><a href="#">Keranjang</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="panel panel-body">
				<?php if (empty($datakeranjang)): ?>
					<center>
						<img width="100" src="img/goods.png" alt=""><br>
						<strong><h4>Keranjang belanja Anda kosong</h4></strong>
						<a href="menu" class="btn btn-success" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;"> Belanja Sekarang</a>
					</center>
					<?php else: ?>
						<div class="table-responsive">
							<table class="table table-striped table-hover table-responsive">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th colspan="2" class="text-center"> Menu</th>
										<th class="text-center">Harga Satuan</th>
										<th class="text-center">Kuantitas</th>
										<th class="text-center">Total Harga</th>
										<th class="text-center">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $total=0; ?>
									<?php $totalberat=0; ?>
									<?php foreach ($datakeranjang as $key => $value): ?>
										<?php 
										$total+=$value['subharga'];
										?>
										<tr>
											<td class="text-center"><?php echo $key+1; ?></td>
											<td class="text-center" width="10%"><img width="80" src="admin/upload/img-menu/<?= $value['gambar_menu']; ?>" alt=""></td>
											<td><?php echo $value['nama_menu']; ?></td>
											<td class="text-center">Rp. <?php echo number_format($value['harga_menu']); ?></td>
											<td class="text-center" width="10%"><!-- 
												
												<input name="jumlah" type="number" value="<?= $value['jumlah'] ?>" class="text-center jumlah" readonly="">
												<a href="" class="btnubahku" data-toggle="modal" data-id="<?= $value['id_produk']; ?>" data-jumlah="<?= $value['jumlah']; ?>" data-stok="<?= $value['stok']; ?>"> Ubah</a> -->
												<form action="keranjang.php" method="GET">
													<div class="input-number">
														<input type="hidden" name="ubah_keranjang" value="ubah">
														<input type="hidden" name="id_menu" value="<?= $value['id_menu'] ?>">
														<input type="number" readonly="" value="<?= $value['jumlah'] ?>" name="jumlah" onchange="this.form.submit()">
														<span class="qty-up">+</span>
														<span class="qty-down">-</span>
													</div>
												</form>
											</td>
											<td class="text-center">Rp. <?php echo number_format($value['subharga']); ?></td>
											<td class="text-center">
												<a href="hapuskeranjang.php?id=<?php echo $value['id_menu']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin, <?= $value['nama_menu'] ?> akan dihapus dari keranjang belanja anda ?')"><i class="fa fa-times"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5"></th>
										<th class="text-center">Total Belanja</th>
										<th class="text-center"> Rp. <?php echo number_format($total) ?></th>
										<th></th>
									</tr>
								</tfoot>
							</table>
						</div>
						<br>
						<div class="text-center">
							<a href="menu" class="btn btn-warning"><i class="fa fa-shopping-cart"></i> Lanjutkan Belanja</a>

							<a href="checkout" class="btn btn-success" style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #3eac47;">
								Checkout <i class="fa fa-sign-in"></i>
							</a>
						</div>

					<?php endif ?>
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

	</body>
	</html>
