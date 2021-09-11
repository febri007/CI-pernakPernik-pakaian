<?php 
include 'config/class.php'; 
include 'config/fungsi.php'; 
if (!isset($_SESSION['pelanggan'])) 
{
	echo "<script>location='login';</script>";
	exit();
}
$id_pelanggan= $_SESSION["pelanggan"]["id_pelanggan"];
$datauser =  $pelanggan->ambilpelanggan($id_pelanggan);
$datajson = json_decode($datauser,true);
$datapelanggan=$pelanggan->detail($id_pelanggan);
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
	">
	<style>
		#main-content
		{
			margin-top: 20px;
			margin-bottom: 20px;
		}
		h3
		{
			color: #fff;
		}
		.pembelian
		{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		}
		.tidakadapembelian
		{
			margin-top: 47px;
			margin-bottom: 67px;
		}
		.tidakadapesanan
		{
			margin-top: 47px;
			margin-bottom: 67px;
		}
		.baton
		{
			margin-top: 30px;
		}
		.profile
		{
			color: #202020;
		}
		.packing
		{
			display: inline-block;
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
		.nama
		{
			margin-right: 30px;
			margin-left: 30px;
		}
		.namu
		{
			margin-right: 30px;
			margin-left: 101px;
		}
		.nami
		{
			margin-right: 30px;
			margin-left: 101px;
		}
		.name
		{
			margin-right: 30px;
			margin-left: 90px;
		}
	</style>
</head>
<body>

	<?php include 'header.php'; ?>
	<div id="main-content" class="main-content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="popular-posts-area">
						<div class="row">
							<div class="col-md-4">
								<div class="thumbnail">

									<?php if(empty($datapelanggan['foto'])): ?> 
										<img src="img/user.png" alt="" height="150">
										<?php else: ?>
											<img class="gambar img-responsive" src="img-pelanggan/<?php echo $datajson['foto']; ?>" alt="" height="150">
										<?php endif ?>
									</div>
								</div>
								<div class="col-md-8">
									<ul class="list-group">
										<li class=""><strong> <?php echo $datajson["nama"]; ?></strong></li>
										<li class=""><a href="" class="btneditprofil"><i class="fa fa-pencil"></i> Ubah Profil</a></li>
									</ul>
								</div>
							</div>
							<ul class="list-group" style="margin-top: 15px;">
								<li class="list-group-item"><p><a href="pelanggan.php?page=profil"><img width="30" class="packing" src="img/icon-keranjang.svg" alt="">&nbsp;&nbsp; <strong>Profil Saya</strong></a></p></li>
								<li class="list-group-item"><p><a href="pelanggan.php?page=pesanan"><img width="30" class="packing" src="img/icon-user.svg" alt="">&nbsp;&nbsp; <strong>Pesanan Saya</strong></a></p></li>
								<li class="list-group-item"><p><a href="pelanggan.php?page=notifikasi"><img style="margin-left:6px;" width="28" class="packing" src="img/bell.png" alt="">&nbsp;&nbsp; <strong style="margin-left: 7px;">Notifikasi</strong>
									<span class="pull-right-container">
										<small class="label pull-right bg-blue count" style="margin-top: 7px;"></small>
									</span>
								</a></p></li>
							</ul>
						</div>
					</div>
					<?php  
					if (!isset($_GET['page'])) 
					{
						include 'profil.php';
					}
					else
					{
						if ($_GET['page']=="profil") 
						{
							include 'profil.php';
						}
						if ($_GET['page']=="pesanan") 
						{
							include 'pesanan.php';
						}
						if ($_GET['page']=="pembayaran") 
						{
							include 'pembayaran.php';
						}
						if ($_GET['page']=="notifikasi") 
						{
							include 'notifikasi.php';
						}
					}
					?>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modallupa" style="margin-top: 45px;">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-center">Ubah Password</h4>
						<br>
						<p class="text-center">Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p>
					</div>
					<div class="modal-body">
						<form method="post">
							<div class="form-group">
								<label >Password Saat Ini</label>
								<input type="password" name="passlama" class="form-control" placeholder="Masukan password anda saat ini">
							</div>
							<div class="form-group">
								<label >Password Yang Baru</label>
								<input type="password" name="pass" class="form-control" placeholder="Masukan password anda yang baru">
							</div>
							<div class="form-group">
								<label>Konfirmasi Password</label>
								<div class="input-group">
									<input type="password" name="password" class="form-control" placeholder="Ulangi password anda" aria-describedby="basic-addon2 ">
									<span class="input-group-addon" id="basic-addon2 "></span>
								</div>
							</div>
							<div class="modal-footer">
								<center>
									<button name="kirim" class="btn btn-success" style="background: #40b149; border-color: #40b149;"> Ubah Password </button>
									<button type="button" class="btn btn-default" data-dismiss="modal" style="border-color: #40b149;">Close</button>
								</center>
							</div>
						</form>
						<?php  
						if (isset($_POST['kirim'])) 
						{
							$pass = $_POST['pass'];
							if (strlen($pass) >= 8) 
							{
								$passbaru = $_POST['pass'];
								$konfirm = $_POST['password'];
								if ($passbaru == $konfirm) 
								{
									$hasil=$pelanggan->ubahpassword($_POST['passlama'],$_POST['pass'],$_POST['password']);
									if ($hasil=="sukses") 
									{
										echo "<script>alert('Password anda berhasil di perbaharui!');</script>";
										echo "<script>location='pelanggan';</script>";
									}
									else
									{
										echo "<script>alert('Password lama anda salah');</script>";
										echo "<script>location='pelanggan';</script>";
									}
								}
								else
								{
									echo "<script>alert('Ubah password gagal, Konfirmasi password tidak sama');</script>";
									echo "<script>location='pelanggan';</script>";
								}
							}
							else
							{
								echo "<script>alert('Ubah password gagal, Password kurang dari 8');</script>";
								echo "<script>location='pelanggan';</script>";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modaleditprofil">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title text-center">Edit Profil</h4>
						<br>
					</div>
					<div class="modal-body">
						<form method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for=""> Nama</label> 
								<input type="text" class="form-control" name="nama" placeholder="Nama anda" value="<?php echo $datapelanggan['nama'] ?>" required>
							</div>
							<div class="form-group">
								<label for=""> Email</label>
								<input type="email" class="form-control" name="email" placeholder=" Alamat email anda" value="<?php echo $datapelanggan['email'] ?>" required>
							</div>
							<div class="form-group">
								<label for="">Nomor Telepon </label>
								<input type="number" class="form-control" name="no_telp" placeholder="Nomor telepon atau Nomor WhatsApp anda" value="<?php echo $datapelanggan['telepon'] ?>" required>
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea name="alamat" class="form-control"><?php echo $datapelanggan['alamat'] ?></textarea>
							</div>
							<div class="form-group">
								<div class="col-md-2">
									<?php if(empty($datapelanggan['foto'])): ?> 
										<img src="<?php echo $base_url; ?>img/user.png" class="user-image" alt="User Image">
										<?php else: ?>
											<img src="img-pelanggan/<?php echo $datapelanggan["foto"]; ?>" class="user-image" alt="User Image"> 
										<?php endif ?>
									</div>
									<div class="col-md-10">
										<label>Pilih Gambar</label>
										<input type="file" name="gambar" class="form-control">
									</div>
								</div>
								<div class="text-center" style="margin-top: 100px;">
									<button style="background: #40b149; border-color: #40b149;" class="btn btn-success" name="ubah"> Simpan</button>
									<button type="button" class="btn btn-default" data-dismiss="modal" style="border-color: #40b149;">Close</button>
								</div>
							</form>
							<?php   
							if (isset($_POST["ubah"])) {
								$pelanggan->ubah($_POST['nama'], $_POST['email'], $_POST['no_telp'], $_POST['alamat'],$_FILES['gambar'],$id_pelanggan);
								echo "<script>alert('Profil anda berhasil di perbaharui');</script>";
								echo "<script>location='pelanggan';</script>";
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<?php include 'whatsapp.php'; ?>
			<?php include 'footer.php'; ?>

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
			<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
			<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
			<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
			<script src="js/slick.min.js"></script>
			<script src="js/nouislider.min.js"></script>
			<script src="js/jquery.zoom.min.js"></script>
			<script src="js/main.js"></script>
			<script src="js/notifikasi.js"></script>
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
			<script type="text/javascript">
				$(document).ready(function () {
					$(".btnlupa").on("click",function (e) {
						e.preventDefault();
						$("#modallupa").modal();
					})
				})
			</script>
			<script type="text/javascript">
				$(document).ready(function () {
					$(".btntestimoni").on("click",function (e) {
						e.preventDefault();
						$("#testimoni").modal();
					})
				})
			</script>
			<script type="text/javascript">
				$(document).ready(function () {
					$(".btneditprofil").on("click",function (e) {
						e.preventDefault();
						$("#modaleditprofil").modal();
					})
				})
			</script>
			
			<script type="text/javascript">

				$(document).ready(function(){

					$('#penilaian').on('show.bs.modal', function (e) {

						var idx = $(e.relatedTarget).data('id');
						var idp = $(e.relatedTarget).data('idpelanggan');

            //menggunakan fungsi ajax untuk pengambilan data

            $.ajax({

            	type : 'post',

            	url : 'penilaian.php',

            	data :  {idx: idx, idp: idp},

            	success : function(data){

                $('.hasil-data').html(data);//menampilkan data ke dalam modal

            }

        });

        });

				});

			</script>
			<script type="text/javascript">
				$(document).ready(function(){
					var second = $('#second').val();
					var last7Days = new Date(); 
					last7Days.setDate(last7Days.getDate()+0);
					var dates = $("#first").datepicker({
						format: 'yyyy-mm-dd',
						autoclose: true, 
						todayHighlight: true,
						startDate: last7Days,
						endDate: second,
					});
				});
			</script>
		</body>
		</html>
