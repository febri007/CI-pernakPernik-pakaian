<?php 
include 'config/class.php'; 
$datadh = $menu->tampil();
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Harga - <?= $datakonfigurasi['nama_instansi'] ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
	">
	<style>
		.gambarpro
		{

			height: 350px;
		}
		@media only screen and (min-width: 768px) {
			.gambarpro
			{
				width: 100%;
				height: 190px;
			}
		}
		.on { color:#FFC107; }
		.off { color:#E0E0E0; }
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
					<h3 class="breadcrumb-header">Daftar Harga</h3>

				</div>
			</div>
		</div>
	</div>

	<div class="section">
		<div class="container">
			<div class="row">
				<table class="table table-striped table-bordered" id="example">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th>Gambar</th>
							<th>Nama Menu</th>
							<th>Harga / Pcs</th>
							<th>Tindakan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($datadh as $key => $value): ?>	
							<tr>
								<td><?= $key+1; ?></td>
								<td width="10%"><img width="80" src="admin/upload/img-menu/<?= $value['gambar_menu'] ?>" alt=""></td>
								<td><?= $value['nama_menu'] ?> </td>
								<td>Rp. <?= number_format($value['harga_menu']) ?></td>
								<td width="10%"><a href="detail?id=<?= $value['id_menu'] ?>" class="btn btn-primary"> Lihat</a></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
	<?php include 'whatsapp.php'; ?>

	<?php include 'footer.php'; ?>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/active.js"></script>
	<script >
		$(document).ready(function() {
			var table = $('#example').DataTable( {
				rowReorder: {
					selector: 'td:nth-child(2)'
				},
				responsive: true
			} );
		} );
	</script>

</body>
</html>
