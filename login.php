<?php  
include 'config/class.php';
if (isset($_SESSION["pelanggan"])) 
{
	echo "<script>location='pelanggan';</script>";
	exit();
}
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Masuk - Roti Aneka Yogyakarta</title>
	<link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick.css"/>
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	<style>
		h4
		{
			text-align: center;
			margin: 15px;
		}
		.panel-default
		{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
		}
		.sudah 
		{
			text-align: center;
		}
		.sudah a
		{
			color: #3eac47;
		}
		.desainsesukamu
		{
			text-align: center;
			margin-top: 15px;
		}
	</style>
</head>
<body>

	<?php include 'header.php'; ?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<h4>Masuk</h4>
					<hr>
					<div class="panel-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="">Username atau Email</label>
								<input type="text" name="email" class="form-control" placeholder="Silahkan masukan username atau email anda" required="">
							</div>
							<div class="form-group">
								<label for="">Kata Sandi</label>
								<input type="password" name="password" class="form-control" placeholder="Mohon isikan kata sandi anda" required="">
							</div>
							<div class="text-center">
								<button style=" background: linear-gradient(to bottom, #E49FAE 0%, #E49FAE 100%); border-color: #E49FAE;" class="btn btn-success" name="login"> Masuk</button>
								<a href="" class="btnlupa btn btn-danger"> Lupa Password ?</a>
							</div>
						</form>
						<?php  
						if (isset($_POST['login'])) 
						{
							$hasil=$pelanggan->login($_POST['email'],$_POST['password']);
							if ($hasil=="sukses") 
							{
								echo "<script>location='pelanggan';</script>";
							}
							elseif ($hasil=="gagalaktifasi") 
							{
								echo "<script>alert('Login gagal, silahkan aktifasi akun pada email anda!');</script>";
								echo "<script>location='login';</script>";
							}
							else
							{
								echo "<script>alert('Login gagal, masukan email, username dan password anda dengan benar!');</script>";
								echo "<script>location='login';</script>";
							}
						}
						?>
						<hr>
						<div class="sudah">Belum punya akun ? <a href="daftar">Daftar</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modallupa" style="margin-top: 135px;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h3 class="modal-title">Lupa Password</h3>
					<br>
					<p>Masukan alamat email yang terdaftar pada Roti Aneka</p>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<input type="text" class="form-control" name="email" placeholder="Silahkan masukkan email anda" required="">
						</div>
						<div class="modal-footer">
							<center>
								<button style="background: linear-gradient(to bottom, #3eac47 0%, #54d44e 100%); border-color: #40b149;" class="btn btn-success" name="kirim"> Kirim</button>
								<button type="button" class="btn btn-default" data-dismiss="modal" style="border-color: #3eac47;">Close</button>
							</center>
						</div>
					</form>
					<?php 
					if (isset($_POST["kirim"])) 
					{
						$hasil=$pelanggan->lupa_password($_POST["email"]);
						if ($hasil=="sukses") 
						{
							echo "<script>alert('Password telah direset, silahkan cek email anda untuk endapatkan password baru!');</script>";
							echo "<script>location='login';</script>";
						}
						else
						{
							echo "<script>alert('Password gagal direset, email yang anda masukan tidak terdaftar!');</script>";
							echo "<script>location='login';</script>";
						}
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
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/active.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(".btnlupa").on("click",function (e) {
				e.preventDefault();
				$("#modallupa").modal();
			})
		})
	</script>

</body>
</html>
