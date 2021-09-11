<?php
include 'config/class.php'; 
include 'config/fungsi.php'; 
?>
<?php  
$id_pesanan=$_GET['id'];
$detailharga=$pesanan->ambil_pesanan($id_pesanan);
$produkpesanan=$pesanan->tampil_produk_pesanan($id_pesanan);
$databank=$bank->tampil();
?>
<?php  
$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
$detailbeli=$pesanan->tampil_pesanan_pelanggan($id_pelanggan);
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cara Pembayaran - <?= $datakonfigurasi['nama_instansi'] ?></title>
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
	.cara
	{
		margin-left: 450px;
		font-size: 20px;
	}
</style>
</head>
<body>
	<div id="breadcrumb" class="section" style="background-color: #DD8C9B; padding-top: 15px; padding-bottom: 15px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<a href="pelanggan?page=pesanan" style="color: #fff;"><i class="fa fa-arrow-left"></i> <span class="cara">Cara Pembayaran</span></a>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="panel panel-default">
				<div class="panel panel-body">
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Gambar</th>
										<th>Nama</th>
										<th>Harga / pcs</th>
										<th>Jumlah</th>
										<th>Subharga</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($produkpesanan as $key => $value): ?>

										<tr>
											<td width="5%"><?= $key+1 ?></td>
											<td><img width="60" src="admin/upload/img-menu/<?= $value['gambar_menu'] ?>" alt=""> </td>
											<td><?= $value['nama_menu'] ?></td>
											<td>Rp. <?= number_format($value['harga_menu']) ?></td>
											<td><?= $value['jumlah_menu'] ?></td>
											<td>Rp. <?= number_format($value['subharga_menu']) ?></td>
										</tr>
									<?php endforeach ?>
								</tbody>
								<tfoot>
									<tr>
										<th colspan="5">Total Belanja</th>
										<th>Rp. <?php echo number_format($detailharga["total_belanja"]) ?></th>
									</tr>
									<tr>
										<th colspan="5">Total Ongkir</th>
										<th>Rp. <?php echo number_format($detailharga["total_ongkir"]); ?></th>
									</tr>
									<tr>
										<th colspan="5">Total Bayar (Pesanan)</th>
										<th>Rp. <?php echo number_format($detailharga["total_pesanan"]); ?></th>
									</tr>
								</tfoot>

							</table>
						</div>
					</div>
					<div class="paymen">
						<center>
						
								<?php if ($detailharga['status_pesanan']=="Belum Bayar"): ?>
									<p>Terimakasih telah melakukan pesanan, Jumlah DP yang harus dibayar : <strong style="color: #FF6636;"><h2>Rp. <?= number_format($detailharga['dp']); ?></h2></strong> </p>
									<?php elseif ($detailharga['status_pesanan']=="Menunggu Pelunasan"): ?>
									<p>Terimakasih telah melakukan pesanan, Jumlah Pelunasan yang harus dibayar : <strong style="color: #FF6636;"><h2>Rp. <?= number_format($detailharga['dp']); ?></h2></strong> </p>
								<?php endif ?>
							</center>
						</div>
						<br><br>
						<div class="paymen text-center">
							<p>Untuk menyelesaikan proses pesanan Anda, silahkan melakukan pembayaran dengan cara Transfer ke salah satu rekening di bawah ini :</p>
						</div>
						<br>
						<div class="row">
							<?php foreach ($databank as $key => $value): ?>
								<div class="col-md-12">
									<center>
										<div>
											<h3 style="color: #8E8E8E;">
												<img class="bank" width="160" src="admin/upload/img-bank/<?= $value['foto_bank']; ?>" alt="">
											</h3>
											<h3><?= $value['no_rek']; ?></h3>
											<p>a/n <?= $value['nama'] ?></p>
										</div>
									</center>
								</div>
							<?php endforeach ?>
						</div>

						<hr>
						<br>
						<div class="text-center">
							Pastikan pembayaran Anda sudah BERHASIL untuk mempercepat proses verifikasi
						</div><br><br>
						<div class=" text-center">
							<a href="pelanggan?page=pesanan" class="btn btn-success" style="background: #40b149; border-color: #40b149;"> Cek status Pembayaran</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include 'whatsapp.php'; ?>

		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/tawkto.js"></script>
	</body>
	</html>
