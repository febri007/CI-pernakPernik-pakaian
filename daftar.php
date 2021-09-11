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
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar - Roti Aneka Yogyakarta</title>
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
			color: #102593;
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
					<h4>Daftar Sekarang</h4>
					<p class="text-center">Sudah mempunyai akun Roti Aneka? <a href="login"><span style="color:#102593;">Masuk</span></a></p>
					<hr>
					<div class="panel-body">
						<form action="" method="post">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" name="nama" class="form-control" placeholder="Silahkan masukan nama lengkap" required>
							</div>
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" name="username" class="form-control" placeholder="Silahkan masukan username" required>
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" name="email" class="form-control" placeholder="Silahkan masukan email" required>
							</div>
							<div class="form-group">
								<label for="">Kata Sandi</label>
								<input type="password" name="password" class="form-control" placeholder="Silahkan masukan Kata Sandi" required>
							</div>
							<div class="form-group">
								<label for="">Telepon</label>
								<input type="number" name="telepon" class="form-control" placeholder="Silahkan masukan nomor telepon" required>
							</div>
							<div class="form-group">
								<label for="">Alamat Lengkap</label>
								<textarea name="alamat" class="form-control" placeholder="Silahkan masukan alamat lengkap anda" required=""></textarea>
							</div>
							
							<div class="text-center">
								<button style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%); border: #102593;" class="btn btn-success btn-block" name="daftar"> Daftar</button>
							</div>
						</form>
						<?php  
						if (isset($_POST['daftar'])) 
						{
							$username = $_POST['username'];
							if (strlen($username) >= 8) {
								$password = $_POST['password'];
								if (strlen($password) >= 8) {
									$hasil=$pelanggan->daftar($_POST['nama'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['telepon'],$_POST['alamat']);
									if ($hasil=="sukses") 
									{
										echo "<script>alert('Pendaftaran berhasil, silahkan login menggunakan email atau username yang Anda daftarkan!');</script>";
										echo "<script>location='login';</script>";
									}
									else
									{
										echo "<script>alert('Pendaftaran gagal, email yang Anda masukan sudah terdaftar pada sistem kami!');</script>";
										echo "<script>location='daftar';</script>";
									}
								}
								else
								{
									echo "<script>alert('Pendaftaran gagal, Password minimal 8 karakter');</script>";
									echo "<script>location='daftar';</script>";
								}
							}
							else
							{
								echo "<script>alert('Pendaftaran gagal, Username minimal 8 karakter');</script>";
								echo "<script>location='daftar';</script>";
							}

						}
						?>
						<hr>
						<div class="sudah">Dengan mendaftar, saya menyetujui <span style="color: #102593;"><a href="<?= $base_url; ?>syaratketentuan">Syarat & Ketentuan</a></span> serta <span style="color: #102593;"><a href="<?= $base_url; ?>kebijakanprivasi">Kebijakan Privasi</a></span></div>
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
</body>
</html>
