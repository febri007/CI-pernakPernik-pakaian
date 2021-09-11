<?php

if (!isset($_SESSION))
{
	session_start();
}

$mysqli = new mysqli("localhost","root","","sapril");
if (!function_exists('base_url')) {
	function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
		if (isset($_SERVER['HTTP_HOST'])) {
			$http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
			$hostname = $_SERVER['HTTP_HOST'];
			$dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
			$core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
			$core = $core[0];
			$tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
			$end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
			$base_url = sprintf( $tmplt, $http, $hostname, $end );
		}
	else $base_url = 'http://localhost/sapril/sapril/';
	if ($parse) {
		$base_url = parse_url($base_url);
		if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
	}
	return $base_url;
}
}
$base_url = base_url();

class admin
{
	public $koneksi;

	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function login($email,$password)
	{
		$email = mysqli_real_escape_string($this->koneksi,$email);
		$password= mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);

		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE (email='$email' OR username='$email') AND password='$enpass' ");

		$yangcocok=$ambil->num_rows;
		if ($yangcocok==1) 
		{
			$akun=$ambil->fetch_assoc();

			$_SESSION["admin"]=$akun;
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function tampil()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM admin ORDER BY id_admin");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function ubahpassword($passlama,$pass,$password,$id_admin)
	{
		$passwordlama= mysqli_real_escape_string($this->koneksi,$passlama);
		$sip = sha1($passwordlama);
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE password='$sip'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0 && strlen($pass) >= 8 && $pass == $password)
		{
			$pass = sha1($pass);
			$this->koneksi->query("UPDATE admin SET password='$pass' WHERE id_admin='$id_admin' ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function ambil($id_admin)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function ambiladmin($id_admin)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE id_admin='$id_admin' ");
		$pecahdata = $ambil->fetch_assoc();
		return json_encode($pecahdata);
	}
	function tambah($nama,$username,$email,$password,$jk,$alamat,$foto,$hak_akses)
	{
		$ambil = $this->koneksi->query("SELECT * FROM admin WHERE email='$email' OR username='$username'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0)
		{
			return "gagal";
		}
		else
		{
			$enpass = sha1($password);
			$namafoto = $foto['name'];
			$lokasi = $foto['tmp_name'];
			$tgl = date('Ymd');
			if (!empty($namafoto)) 
			{
				$fix = $tgl.$namafoto;
				move_uploaded_file($lokasi, "../upload/img-user/$fix");
				$this->koneksi->query("INSERT INTO admin (nama,username,email,password,$jk,$alamat,foto,hak_akses) VALUES ('$nama','$username','$email','$enpass','$jk','$alamat','$fix','$hak_akses')")or die(mysqli_error($this->koneksi));
				
			}
			else
			{
				$this->koneksi->query("INSERT INTO admin (nama,username,email,password,jk,alamat,hak_akses) VALUES ('$nama','$username','$email','$enpass','$jk','$alamat','$hak_akses')")or die(mysqli_error($this->koneksi));
			}
			return "sukses";
		}
	}
	function ubah($nama,$username,$email,$jk,$alamat,$foto,$id_admin)
	{
		$namagambar=$foto['name'];
		$lokasi=$foto['tmp_name'];
		$tgl = date('Ymd');
		if (!empty($namagambar)) 
		{
			$fix = $tgl.$namagambar;
			$adminlama=$this->ambil($id_admin);
			$gambarlama=$adminlama['foto'];
			if (!empty($gambarlama)) 
			{
				if (file_exists("../upload/img-user/$gambarlama")) {
					unlink("../upload/img-user/$gambarlama");
				}
				move_uploaded_file($lokasi, "../upload/img-user/$fix");
				$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', email='$email', jk='$jk', alamat='$alamat', foto='$fix' WHERE id_admin='$id_admin'")or die(mysqli_error($this->koneksi));
			}
			else
			{
				move_uploaded_file($lokasi, "../upload/img-user/$fix");
				$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', email='$email', jk='$jk', alamat='$alamat', foto='$fix' WHERE id_admin='$id_admin'")or die(mysqli_error($this->koneksi));
			}
		}
		else
		{
			$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', email='$email', jk='$jk', alamat='$alamat' WHERE id_admin='$id_admin'")or die(mysqli_error($this->koneksi));
		}
	}
	function ubahprofil($nama,$username,$email,$jk,$file,$id_admin)
	{
		$namagambar=$file['name'];
		$lokasi=$file['tmp_name'];
		if (!empty($namagambar)) {
			$adminlama=$this->ambil($id_admin);
			$gambarlama=$adminlama['foto'];
			if (file_exists("../upload/img-user/$gambarlama")) {
				unlink("../upload/img-user/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-user/$namagambar");
			$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', email='$email',  jk='$jk', foto='$namagambar' WHERE id_admin='$id_admin'");
		}
		else
		{
			$this->koneksi->query("UPDATE admin SET nama='$nama', username='$username', email='$email', jk='$jk' WHERE id_admin='$id_admin'");
		}
	}
	function hapus($id_admin)
	{
		$data=$this->ambil($id_admin);
		$gambar=$data['foto'];
		if (!empty($gambar)) {
			if (file_exists("../upload/img-user/$gambar")) 
			{
				unlink("../upload/img-user/$gambar");
			}
			$this->koneksi->query("DELETE FROM admin WHERE id_admin='$id_admin'");
		}
		else
		{
			$this->koneksi->query("DELETE FROM admin WHERE id_admin='$id_admin'");
		}
		return "sukses";
	}
	function fsize($file)
	{
		$a = array("B", "KB", "MB", "GB", "TB", "PB");
		$pos = 0;
		$size = filesize($file);
		while ($size >= 10024)
		{
			$size /= 10024;
			$pos++;
		}
		return round ($size,2)." ".$a[$pos];
	}
	function totadmin()
	{
		$ambil=$this->koneksi->query("SELECT * FROM admin");
		$data=$ambil->num_rows;
		return $data;
	}
}

class kategori
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_kategori)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kategori WHERE id_kategori='$id_kategori'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function tampil()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM kategori ORDER BY id_kategori");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function tampilfooter()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM kategori ORDER BY id_kategori ASC LIMIT 6");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function tambah($nama,$gambar,$uraian)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kategori WHERE nama_kategori='$nama'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0)
		{
			return "gagal";
		}
		else
		{
			$namagambar = $gambar['name'];
			$tgl = date('Ymd');
			$fix = $tgl.$namagambar;
			$lokasi = $gambar['tmp_name'];
			move_uploaded_file($lokasi, "../upload/img-kategori/$fix");
			$this->koneksi->query("INSERT INTO kategori (nama_kategori,uraian,gambar) VALUES ('$nama','$uraian','$fix')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}
	function ubah($nama,$gambar,$uraian,$id_kategori)
	{
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		$tanggal = date('Ymd');
		$fix = $tanggal.$namagambar;
		if (!empty($lokasi)) {
			$fotolama=$this->detail($id_kategori);
			$gambarlama=$fotolama['gambar'];
			if (file_exists("../upload/img-kategori/$gambarlama")) {
				unlink("../upload/img-kategori/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-kategori/$fix");
			$this->koneksi->query("UPDATE kategori SET nama_kategori='$nama',gambar='$fix', uraian='$uraian' WHERE id_kategori='$id_kategori' ")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE kategori SET nama_kategori='$nama', uraian='$uraian' WHERE id_kategori='$id_kategori' ")or die(mysqli_error($this->koneksi));
		}
	}
	function hapus($id_kategori)
	{
		$datakategori=$this->detail($id_kategori);
		$gambar=$datakategori['gambar'];
		if (file_exists("../upload/img-kategori/$gambar")) {
			unlink("../upload/img-kategori/$gambar");
		}
		$this->koneksi->query("DELETE FROM kategori WHERE id_kategori='$id_kategori'");
	}
}


class menu
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_menu)
	{
		$ambil = $this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE id_menu='$id_menu'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}

	function detailgambar2($id_gambar)
	{
		$ambil = $this->koneksi->query("SELECT * FROM gambar  WHERE id_gambar='$id_gambar'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function tampil()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori ORDER BY id_menu");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function gambar($id_menu)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM gambar WHERE id_menu='$id_menu' ORDER BY id_gambar DESC ");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function simpangambar($judul,$gambar,$id_menu)
	{
		$namagambar = $gambar['name'];
		$tgl = date('Ymd');
		$fix = $tgl.$namagambar;
		$lokasi = $gambar['tmp_name'];
		move_uploaded_file($lokasi, "../upload/img-menu/$fix");
		$this->koneksi->query("INSERT INTO gambar (id_menu,judul_gambar,gambar) VALUES ('$id_menu','$judul','$fix')")or die(mysqli_error($this->koneksi));
	}
	function ubahgambar($judul,$gambar,$id_gambar)
	{
		$namafoto = $gambar['name'];
		$lokasi = $gambar['tmp_name'];
		$tgl = date('Ymd');
		if (!empty($namafoto)) 
		{
			$fix = $tgl.$namafoto;
			$adminlama=$this->detailgambar2($id_gambar);
			$gambarlama=$adminlama['gambar'];
			if (!empty($gambarlama)) 
			{
				if (file_exists("../upload/img-menu/$gambarlama")) {
					unlink("../upload/img-menu/$gambarlama");
				}
				move_uploaded_file($lokasi, "../upload/img-menu/$fix");
				$this->koneksi->query("UPDATE gambar SET judul_gambar='$judul', gambar='$fix' ")or die(mysqli_error($this->koneksi));

			}
		}
		else
		{
			$this->koneksi->query("UPDATE gambar SET judul_gambar='$judul'")or die(mysqli_error($this->koneksi));
		}
		return "sukses";
	}
	function tampilmenuterbaru($posisi,$batas)
	{
		$semuadata = array();
	// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori  ORDER BY menu.id_menu DESC LIMIT $posisi,$batas")or die(mysqli_error($this->koneksi));
	// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function total_menu()
	{
		$ambil=$this->koneksi->query("SELECT * FROM menu");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
	function menuterbaru()
	{
		$semuadata = array();
	// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori ORDER BY menu.id_menu DESC LIMIT 6")or die(mysqli_error($this->koneksi));
	// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function menuterlaris()
	{
		$semuadata = array();
	// menampilkan data dari database
		$ambildata=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE terjual!='' ORDER BY terjual DESC LIMIT 8")or die(mysqli_error($this->koneksi));
	// memecah array dan diperulangkan
		while($pecahdata=$ambildata->fetch_assoc())
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;	
	}
	function tambah($id_kategori,$nama,$harga,$deskripsi,$gambar)
	{
		$ambil = $this->koneksi->query("SELECT * FROM menu WHERE nama_menu='$nama'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0)
		{
			return "gagal";
		}
		else
		{
			$namagambar = $gambar['name'];
			$tgl = date('Ymd');
			$fix = $tgl.$namagambar;
			$lokasi = $gambar['tmp_name'];
			move_uploaded_file($lokasi, "../upload/img-menu/$fix");
			$this->koneksi->query("INSERT INTO menu (id_kategori,nama_menu,harga_menu,deskripsi_menu,gambar_menu) VALUES ('$id_kategori','$nama','$harga','$deskripsi','$fix')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}
	function ubah($id_kategori,$nama,$harga,$deskripsi,$gambar,$id_menu)
	{
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		$tanggal = date('Ymd');
		$fix = $tanggal.$namagambar;
		if (!empty($lokasi)) {
			$fotolama=$this->detail($id_menu);
			$gambarlama=$fotolama['gambar_menu'];
			if (file_exists("../upload/img-menu/$gambarlama")) {
				unlink("../upload/img-menu/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-menu/$fix");
			$this->koneksi->query("UPDATE menu SET id_kategori='$id_kategori',  nama_menu='$nama',
				harga_menu='$harga', deskripsi_menu='$deskripsi',gambar_menu='$fix' WHERE id_menu='$id_menu' ")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE menu SET id_kategori='$id_kategori',  nama_menu='$nama',
				harga_menu='$harga', deskripsi_menu='$deskripsi' WHERE id_menu='$id_menu' ")or die(mysqli_error($this->koneksi));
		}
	}
	function hapus($id_menu)
	{
		$datamenu=$this->detail($id_menu);
		$gambar=$datamenu['gambar_menu'];
		if (file_exists("../upload/img-menu/$gambar")) 
		{
			unlink("../upload/img-menu/$gambar");
		}
		$this->koneksi->query("DELETE FROM menu WHERE id_menu='$id_menu'");
	}
	function detailgambar($id_menu)
	{
		$ambil = $this->koneksi->query("SELECT * FROM gambar WHERE id_menu='$id_menu'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function hapusgambar($id_menu)
	{
		$datamenu=$this->detailgambar($id_menu);
		$gambar=$datamenu['gambar'];
		if (file_exists("../upload/img-menu/$gambar")) 
		{
			unlink("../upload/img-menu/$gambar");
		}
		$this->koneksi->query("DELETE FROM gambar WHERE id_menu='$id_menu'");
	}
	function paketmenu($id_kategori,$posisi,$batas)
	{
		$semuadata=array();
		$ambildata=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE menu.id_kategori='$id_kategori' ORDER BY id_menu DESC LIMIT $posisi,$batas ");
		while ($pecah=$ambildata->fetch_assoc()) 
		{
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function semuamenu($id_kategori)
	{
		$data=$this->koneksi->query("SELECT * FROM menu WHERE id_kategori='$id_kategori'");
		$total=$data->num_rows;
		return $total;
	}
	function carimenu($keyword,$posisi,$batas)
	{
		$keyword=mysqli_real_escape_string($this->koneksi,$keyword);
		$data=array();
		$ambil=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori  WHERE nama_menu LIKE '%$keyword%' OR deskripsi_menu LIKE '$$keyword' ORDER BY id_menu DESC LIMIT $posisi,$batas");
		while ($pecah=$ambil->fetch_assoc()) 
		{
			$data[]=$pecah;
		}
		return $data;
	}
	function semuamenucari($keyword){
		$data=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori  WHERE nama_menu LIKE '%$keyword%' OR deskripsi_menu LIKE '$$keyword'");
		$total=$data->num_rows;
		return $total;
	}
}

class pelanggan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_pelanggan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function tampil()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan ORDER BY id_pelanggan");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function daftar($nama,$username,$email,$password,$telepon,$alamat)
	{
		$ambil=$this->koneksi->query("SELECT * FROM pelanggan WHERE email='$email'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 1) 
		{
			return "gagal";
		}
		else
		{
			$token=hash('sha256', md5(date('Y-m-d')));
			require_once('function.php');
			require_once('fungsi.php');
			$to       = $email;
			$subject  = 'Info akun Roti Aneka';
			$message  = '
			<!doctype html>
			<html>
			<head>
			<meta charset="utf-8">
			<title>Info akun Roti Aneka</title>

			<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}
			.aktivasi {
				display: block;
				width: 250px;
				max-width: 100%;
				background: #47BD4A;
				font-weight: bold;
				font-size: 16px;

				outline: 0px;
				text-decoration: none;
				border-radius: 50px;
				margin: 30px auto;
				text-align: center;
				padding: 15px;
				text-transform: capitalize;
			}
			p
			{
				text-align: center;
			}
			</style>
			</head>

			<body>
			<div class="invoice-box">
			<h3 align="center">Info akun Roti Aneka</h3>
			<table width="100%">
			<tr>
			<td><p>Terimakasih telah melakukan pendaftaran. Data registrasi Anda telah berhasil kami terima. Aktivasi akun Anda dengan mengklik tautan di bawah ini:</p></td>
			</tr>
			<tr>
			<td><center><a style="color: #fff;" href="https://rotianeka.site/aktivasi?t='.$token.'" class="aktivasi">Aktivasi Akun</a></center></td>
			</tr>
			<tr>
			<td><p>Atau kamu dapat menyalin link berikut untuk aktivasi akun anda <br> <a href="https://rotianeka.site/aktivasi?t='.$token.'">https://rotianeka.site/aktivasi?t='.$token.'</a></p></td>
			</tr>
			<hr>
			<tr>
			<td><p>Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</p></td>
			</tr>
			</table>
			</div>
			</body>
			</html>

			';
			smtp_mail($to, $subject, $message, '', '', 0, 0, true);
			$enpass=sha1($password);
			$this->koneksi->query("INSERT INTO pelanggan (nama,username,email,password,telepon,alamat,token,aktif) VALUES ('$nama','$username','$email','$enpass','$telepon','$alamat','$token','0')");
			return "sukses";
		}
	}
	function ubah($nama,$email,$no_telp,$alamat,$gambar,$id_pelanggan)
	{
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		$tgl = date('Ymd');
		$fix = $tgl.$namagambar;
		if (!empty($namagambar)) {
			$pelangganlama=$this->detail($id_pelanggan);
			$gambarlama=$pelangganlama['foto'];
			if (file_exists("img-pelanggan/$gambarlama")) {
				unlink("img-pelanggan/$gambarlama");
			}
			move_uploaded_file($lokasi, "img-pelanggan/$fix");
			$this->koneksi->query("UPDATE pelanggan SET nama='$nama', email='$email', telepon='$no_telp', alamat='$alamat',  foto='$fix' WHERE id_pelanggan='$id_pelanggan'");
		}
		else
		{
			$this->koneksi->query("UPDATE pelanggan SET nama='$nama', email='$email', telepon='$no_telp', alamat='$alamat' WHERE id_pelanggan='$id_pelanggan'");
		}

		// $detil=$this->ambil_pelanggan($id_pelanggan);
		// $_SESSION["pelanggan"]=$detil;
	}
	function ubahpassword($passlama,$pass,$password)
	{
		$passwordlama= mysqli_real_escape_string($this->koneksi,$passlama);
		$sip = sha1($passwordlama);
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE password='$sip'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0 && strlen($pass) >= 8 && $pass == $password) 
		{
			$pass = sha1($pass);
			$this->koneksi->query("UPDATE pelanggan SET password='$pass' ");
			return "sukses";
		}
		else
		{
			return "gagal";
		}
	}
	function hapus($id_pelanggan)
	{
		$data=$this->detail($id_pelanggan);
		$gambar=$data['foto'];
		if ($gambar!="") {
			if (file_exists("../../img-pelanggan/$gambar")) {
				unlink("../../img-pelanggan/$gambar");
			}
			$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
		}
		else
		{
			$this->koneksi->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
		}
	}
	function totcostumer()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pelanggan");
		$data=$ambil->num_rows;
		return $data;
	}
	function login($email,$password)
	{
		$email=mysqli_real_escape_string($this->koneksi,$email);
		$password=mysqli_real_escape_string($this->koneksi,$password);
		$enpass=sha1($password);
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE (email='$email' OR username='$email') AND password='$enpass'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok==0) {
			return "gagal";
		}
		else
		{
			$ambil2 = $this->koneksi->query("SELECT * FROM pelanggan WHERE (email='$email' OR username='$email') AND password='$enpass' AND aktif='1'");
			$yangcocok2 = $ambil2->num_rows;
			if ($yangcocok2==0) 
			{
				return "gagalaktifasi";
			}
			else
			{
				$akun = $ambil->fetch_assoc();

				$_SESSION["pelanggan"] = $akun;

				return "sukses";
			}
		}
	}
	function lupa_password($email)
	{
		$ambil=$this->koneksi->query("SELECT*FROM pelanggan WHERE email='$email'");
		$yangcocok=$ambil->num_rows;
		if ($yangcocok<1) 
		{
			return "gagal";
		}
		else
		{
				// membuat password secara random
			$karakter = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$pjg=strlen($karakter);
			$password = '';
			for ($i = 0; $i<8; $i++) {
				$password .= $karakter[rand(0, $pjg-1)];
			}
				// mengirim password ke email

			require_once('function.php');
			require_once('fungsi.php');
			$to       = $email;
			$subject  = 'Info Akun Roti Aneka';
			$message  = '
			<!doctype html>
			<html>
			<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

			<title>A simple, clean, and responsive HTML invoice template</title>

			<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.top table td.invoice {
				float: right;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}
			.invoice-box table tr.information table .informasi {
				float: right;
			}

			.invoice-box table tr.heading th {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item th{
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.rtl {
				direction: rtl;
				font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
			}

			.rtl table {
				text-align: right;
			}

			.rtl table tr td:nth-child(2) {
				text-align: left;
			}
			.table1 {
				font-family: sans-serif;
				color: #232323;
				border-collapse: collapse;
			}

			.table1, th, td {
				padding: 8px 20px;
			}
			</style>
			</head>

			<body>
			<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
			<tr class="top">
			<td colspan="2">
			<table>
			<tr>
			<td class="title" >
			<h5 style="margin-top: -7px;">Roti Aneka</h5>
			</td>

			<td class="invoice">
			Telp : +6285100483065 <br>
			Email : rotianeka1@gmail.com<br>
			Alamat : Menulis, Sumbersari, <br>Kec. Moyudan, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta 55563
			</td>
			</tr>
			</table>
			</td>
			</tr>
			</table>
			<br><br>
			<h5 style="margin-top: -30px;">Selamat datang , Atas permintaan anda kami telah mereset password anda.
			Silahkan gunakan akun dibawah ini untuk login ke</h5>
			<table class="table1">
			<tr class="heading">
			<th>Email</th>
			<th>Password</th>
			</tr>
			<tr class="item">
			<th>'.$email.'</th>
			<th>'.$password.'</th>
			</tr>
			</table>
			</div>
			</body>
			</html>
			';
			smtp_mail($to, $subject, $message, '', '', 0, 0, true);
			$enpass=sha1($password);
			$this->koneksi->query("UPDATE pelanggan SET password='$enpass' WHERE email='$email'");
			return "sukses";
		}
	}
	function totpelanggan()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pelanggan");
		$data=$ambil->num_rows;
		return $data;
	}
	function ambilpelanggan($id_pelanggan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan' ");
		$pecahdata = $ambil->fetch_assoc();
		return json_encode($pecahdata);
	}
}

class pesanan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function updatestatuspayment($id, $status){
		$ambil=$this->koneksi->query("UPDATE `pesanan` SET `status_pesanan` = '$status' WHERE `pesanan`.`id_pesanan` = '$id';");
		return $ambil;
	}
	function updatestatuskeperluan($id , $data){
		$ambil=$this->koneksi->query("UPDATE `pembayaran` SET `keperluan` = '$data' WHERE `pembayaran`.`id_pesanan` = $id;");
		return $ambil;
	}
	function getdatapayment($id){
		$ambil=$this->koneksi->query("SELECT * FROM `pesanan` WHERE id_pesanan = '$id'");
		return $ambil;
	}
	function inserttoken($id, $token){
		$ambil=$this->koneksi->query("UPDATE `pesanan` SET `snaptoken` = '$token' WHERE `pesanan`.`id_pesanan` = $id;");
		return $ambil;
	}
	function ambil_pesanan($id_pesanan)
	{
		// menampilkan data dari tabel pembelian yang yg id_pembelian adallah $id_pembelian
		$ambil=$this->koneksi->query("SELECT*FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan JOIN ongkirket ON pesanan.id_ongkirket=ongkirket.id_ongkirket 
			WHERE id_pesanan='$id_pesanan'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function masukankeranjang($id_menu,$jumlah)
	{
		if (isset($_SESSION["keranjang"][$id_menu])){
			$_SESSION["keranjang"][$id_menu]+=$jumlah;
		}
		else{
			$_SESSION["keranjang"][$id_menu]=$jumlah;
		}
	}
	function tampil_keranjang()
	{
		$semuadata=array();
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];	
			foreach ($keranjang as $id_menu => $jumlah) {
				$ambil=$this->koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu'");
				$array=$ambil->fetch_assoc();
				$array["jumlah"]=$jumlah;
				$array["subharga"]=$array["harga_menu"]*$jumlah;
				$semuadata[]=$array;
			}
		}
		return $semuadata;
	}
	function tampil_pesanan()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pesanan DESC");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function simpan_pengiriman($id, $status){
		$this->koneksi->query("UPDATE `pesanan` SET `stts_kirim` = '$status' WHERE `pesanan`.`id_pesanan` = $id;");
	}

	function batalotomatis($id_pesanan,$status)
	{
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status' WHERE id_pesanan='$id_pesanan'");
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
	}
	function tampil_pembayaran($id_pesanan)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM pembayaran LEFT JOIN pesanan ON pembayaran.id_pesanan=pesanan.id_pesanan WHERE pembayaran.id_pesanan='$id_pesanan'");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function ambil_pembayaran($id_pesanan)
	{
			// menampilkan dari tabel pembayaran yang id pelanggannyaa ($id_pelanggan)
		$ambil=$this->koneksi->query("SELECT * FROM pembayaran WHERE id_pesanan='$id_pesanan'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function ambilpembayaran($id_pembayaran)
	{
			// menampilkan dari tabel pembayaran yang id pelanggannyaa ($id_pelanggan)
		$ambil=$this->koneksi->query("SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function cek_pembayaran($id_pesanan)
	{
		$ambil=$this->koneksi->query("SELECT*FROM pembayaran WHERE id_pesanan='$id_pesanan'");
			// coba cek menggunakan numrows
		$yangcocok=$ambil->num_rows;
		if ($yangcocok>0) 
		{
			$pecah=$ambil->fetch_assoc();
			return $pecah;
		}
		else
		{
			return "belumkirim";
		}
	}
	function checkout($nama,$telp,$alamat,$kategori,$tanggal_aa,$jam_aa,$biaya_kategori,$total_belanja)
	{
		$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];
		date_default_timezone_set('Asia/Jakarta');
		$tanggal_pesan = date('Y-m-d H:i:s');
		$expires = strtotime('+1 days', strtotime($tanggal_pesan));
		$deadlinedp=date('Y-m-d H:i:s', $expires);

		$expireslunas = strtotime('+1 days', strtotime($tanggal_pesan));
		$deadlinepelunasan=date('Y-m-d H:i:s', $expireslunas);
		$expireskirim = strtotime('+1 hours,+1 minutes,+1 seconds', strtotime($tanggal_aa));
		$tanggalaa=date('Y-m-d H:i:s', $expireskirim);
		$expired = strtotime('-1 days', strtotime($tanggalaa));
		$deadlinelunas=date('Y-m-d H:i:s', $expired);
		$status="Belum Bayar";
		$status_p="Belum Bayar";
		$statuspembayaran ="Menunggu Pembayaran";
		$total_pesanan = $biaya_kategori+$total_belanja;
		$dplunas = $total_pesanan/2;
		$this->koneksi->query("INSERT INTO pesanan (id_pelanggan,id_ongkirket,tanggal_pesanan,tanggal_pengiriman,jam_pengiriman,status_pesanan,status_pembayaran,total_belanja,total_ongkir,total_pesanan,nama_penerima,telepon_penerima,alamat_penerima) VALUES ('$id_pelanggan','$kategori','$tanggal_pesan','$tanggalaa','$jam_aa','$status','$status_p','$total_belanja','$biaya_kategori','$total_pesanan','$nama','$telp','$alamat')")or die(mysqli_error($this->koneksi));

		$id_pesanan_barusan = $this->koneksi->insert_id;
		$datakeranjang=$this->tampil_keranjang();
		foreach ($datakeranjang as $key => $perproduk) 
		{
			$id_menu = $perproduk["id_menu"];
			$nama = $perproduk["nama_menu"];
			$harga = $perproduk["harga_menu"];
			$jumlah = $perproduk["jumlah"];
			$subharga = $perproduk["subharga"];
			$this->koneksi->query("INSERT INTO pesanan_detail(id_pesanan,id_pelanggan,id_menu,nama_menu,harga_menu,jumlah_menu,subharga_menu) 
				VALUES ('$id_pesanan_barusan','$id_pelanggan','$id_menu','$nama','$harga','$jumlah','$subharga')")or die(mysqli_error($this->koneksi));
		}
		$this->koneksi->query("INSERT INTO notifikasi (id_pesanan,id_pelanggan) 
			VALUES ('$id_pesanan_barusan','$id_pelanggan')")or die(mysqli_error($this->koneksi));
		unset($_SESSION["keranjang"]);
		return $id_pesanan_barusan;

	}
	function totkeranjang()
	{
		if (isset($_SESSION["keranjang"])) {
			$keranjang=$_SESSION["keranjang"];
			$items_in_cart = count($keranjang);
			return $items_in_cart;
		}
	}
	function tampil_produk_pesanan($id_pesanan)
	{
		// menampilkan data dari tabel pembelian detail yang id_pembelian adalah $id_pembelian
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT*FROM  pesanan_detail JOIN menu ON pesanan_detail.id_menu=menu.id_menu JOIN pesanan ON pesanan_detail.id_pesanan=pesanan.id_pesanan WHERE pesanan_detail.id_pesanan='$id_pesanan'");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function tampil_pesanan_pelanggan($id_pelanggan)
	{
		// menampilkan data dari tabel pembelian detail yang id_pembelian adalah $id_pembelian
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE pesanan.id_pelanggan='$id_pelanggan' ORDER BY id_pesanan DESC");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function detail_pesanan_admin($id_pesanan)
	{
		// menampilkan data dari tabel pembelian detail yang id_pembelian adalah $id_pembelian
		$ambil=$this->koneksi->query("SELECT * FROM pesanan_detail  JOIN menu ON pesanan_detail.id_menu=menu.id_menu WHERE pesanan_detail.id_pesanan='$id_pesanan' ");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function kirim_pembayaran($nama,$bank,$tanggal,$jumlah,$file,$id_pesanan,$id_pelanggan)
	{

		$tglkon=date("Y-m-d H:i:s");
		$keperluan = "DP";
		$namagambar = $file['name'];
		$lokasi = $file['tmp_name'];
		move_uploaded_file($lokasi, "img-bukti/$namagambar");
		$this->koneksi->query("INSERT INTO pembayaran (id_pesanan,id_pelanggan,tanggal_konfirmasi,tanggal_bayar,atas_nama,bank,jumlah,keperluan,bukti)
			VALUES ('$id_pesanan',$id_pelanggan,'$tglkon','$tanggal','$nama','$bank','$jumlah','$keperluan','$namagambar')");
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='Menunggu Konfirmasi',status_pembayaran='Menunggu Konfirmasi' WHERE id_pesanan='$id_pesanan'");
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan' ");
		return "sukses";
	}
	function kirim_pembayaran2($nama,$bank,$jumlah,$id_pesanan,$id_pelanggan)
	{
		$tglkon=date("Y-m-d H:i:s");
		$keperluan = "Pembayaran Ulang DP";
		$this->koneksi->query("INSERT INTO pembayaran (id_pesanan,id_pelanggan,tanggal_konfirmasi,atas_nama,bank,jumlah,keperluan)
			VALUES ('$id_pesanan',$id_pelanggan,'$tglkon','$nama','$bank','$jumlah','$keperluan')");
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='Menunggu Konfirmasi',status_pembayaran='Menunggu Konfirmasi' WHERE id_pesanan='$id_pesanan'");
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan' ");
		return "sukses";
	}
	function kirim_pembayaran_ulang_pelunasan($nama,$bank,$tanggal,$jumlah,$id_pesanan,$id_pelanggan)
	{
		$tglkon=date("Y-m-d H:i:s");
		$keperluan = "Pembayaran Ulang Pelunasan";
		$this->koneksi->query("INSERT INTO pembayaran (id_pesanan,id_pelanggan,tanggal_konfirmasi,tanggal_bayar,atas_nama,bank,jumlah,keperluan)
			VALUES ('$id_pesanan',$id_pelanggan,'$tglkon','$tanggal','$nama','$bank','$jumlah','$keperluan')");
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='Menunggu Konfirmasi Pelunasan',status_pembayaran='Menunggu Konfirmasi Pelunasan' WHERE id_pesanan='$id_pesanan'");
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan' ");
	}
	function kirim_pembayaran_pelunasan($nama,$bank,$tanggal,$jumlah,$file,$id_pesanan,$id_pelanggan)
	{
		$tglkon=date("Y-m-d H:i:s");
		$keperluan = "Pelunasan";
		$namagambar = $file['name'];
		$lokasi = $file['tmp_name'];
		move_uploaded_file($lokasi, "img-bukti/$namagambar");
		$this->koneksi->query("INSERT INTO pembayaran (id_pesanan,id_pelanggan,tanggal_konfirmasi,tanggal_bayar,atas_nama,bank,jumlah,keperluan,bukti)
			VALUES ('$id_pesanan',$id_pelanggan,'$tglkon','$tanggal','$nama','$bank','$jumlah','$keperluan','$namagambar')");
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='Menunggu Konfirmasi Pelunasan',status_pembayaran='Menunggu Konfirmasi Pelunasan' WHERE id_pesanan='$id_pesanan'");
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan' ");
		return "sukses";
	}
	function tampilpesanan($id_pesanan)
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM pesanan_detail JOIN menu ON pesanan_detail.id_menu=menu.id_menu WHERE pesanan_detail.id_pesanan='$id_pesanan' ");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function terimapembayaran($id_pesanan)
	{
		$tgl_verifikasi=date("Y-m-d H:i:s");
		$status = "Menunggu Pelunasan";
		$statusp = "Menunggu Pelunasan";
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status', status_pembayaran='$statusp' WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE pembayaran SET tanggal_verifikasi='$tgl_verifikasi' WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
	}
	function totalterjual($id_menu)
	{
		$ambil=$this->koneksi->query("SELECT * FROM menu WHERE id_menu='$id_menu' ");
		$data=$ambil->num_rows;
		return $data;
	}
	function terimapembayaran2($id_pesanan)
	{
		$tgl_verifikasi=date("Y-m-d H:i:s");
		$status = "Proses";
		$statusp = "Diterima";
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status', status_pembayaran='$statusp' WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE pembayaran SET tanggal_verifikasi='$tgl_verifikasi' WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
		$data = $this->tampilpesanan($id_pesanan);
		foreach ($data as $key => $value) 
		{
			$id_menu=$value["id_menu"];
			$terjual = $value['terjual'];
			$jumlah_menu=$value["jumlah_menu"];
			$terjualbaru = $terjual+$jumlah_menu;
			$this->koneksi->query("UPDATE menu SET terjual='$terjualbaru' WHERE id_menu='$id_menu'");			
		}
	}
	function tolakpembayaran($alasan,$id_pesanan)
	{
		$data = $this->ambil_pesanan($id_pesanan);
		$status_pesanan = $data['status_pesanan'];
		if ($status_pesanan=="Menunggu Konfirmasi Pelunasan") 
		{
			$status = "Pembayaran Pelunasan Ditolak";
			$statusp = "Ditolak";
			$tgl_verifikasi = date('Y-m-d H:i:s');
			$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status', status_pembayaran='$statusp', alasan_tolak='$alasan' WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
			$this->koneksi->query("UPDATE pembayaran SET tanggal_verifikasi='$tgl_verifikasi' WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
			$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$status = "Pembayaran Ditolak";
			$statusp = "Ditolak";
			$tgl_verifikasi = date('Y-m-d H:i:s');
			$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status', status_pembayaran='$statusp', alasan_tolak='$alasan' WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
			$this->koneksi->query("UPDATE pembayaran SET tanggal_verifikasi='$tgl_verifikasi' WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
			$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
		}

	}
	function batalpesanan($id_pesanan,$status)
	{
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status'WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));
	}
	function totpesanan()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pesanan");
		$data=$ambil->num_rows;
		return $data;
	}
	function totpesanannotifikasi()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pesanan WHERE status_pesanan='Belum Bayar' OR status_pesanan='Menunggu Konfirmasi' OR status_pesanan='Menunggu Pelunasan' OR status_pesanan='Menunggu Konfirmasi Pelunasan' OR status_pesanan='Proses' OR status_pesanan='Pembayaran Ditolak' OR status_pesanan='Proses'  OR status_pesanan='Menunggu Pelunasan' OR status_pesanan='Menunggu Konfirmasi Pelunasan' OR status_pesanan='Pembayaran Pelunasan Ditolak'");
		$data=$ambil->num_rows;
		return $data;
	}
	function totpesananterbaru()
	{
		$ambil=$this->koneksi->query("SELECT * FROM pesanan WHERE status_pesanan='Belum Bayar' ");
		$data=$ambil->num_rows;
		return $data;
	}
	function konfirmasi($id_pesanan)
	{
		$ambil=$this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan WHERE id_pesanan='$id_pesanan' ");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function konfirmasipesanan($id_pesanan)
	{
		$status = "Selesai";
		$tgl_konfirmasi_pesanan = date('Y-m-d H:i:s');
		$this->koneksi->query("UPDATE pesanan SET status_pesanan='$status',tgl_konfirmasi_pesanan='$tgl_konfirmasi_pesanan' WHERE id_pesanan='$id_pesanan' ")or die(mysqli_error($this->koneksi));
		$this->koneksi->query("UPDATE notifikasi SET status=0 WHERE id_pesanan='$id_pesanan'")or die(mysqli_error($this->koneksi));

	}
	function lihatbukti($id_pesanan)
	{
		$ambil = $this->koneksi->query("SELECT * FROM pembayaran WHERE id_pesanan='$id_pesanan' ");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function lihatbukti2($id_pesanan)
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM pembayaran WHERE id_pesanan='$id_pesanan' ORDER BY id_pembayaran DESC LIMIT 1");
		while($pecah=$ambil->fetch_assoc())
		{
			$semuadata[]=$pecah;
		}
		return $semuadata; 
	}
	function tampilnotifikasi()
	{
		$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
		$ambil=$this->koneksi->query("SELECT * FROM notifikasi WHERE id_pelanggan='$id_pelanggan' ");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function totalnotifikasi($id_pelanggan)
	{
		$ambil=$this->koneksi->query("SELECT*FROM notifikasi WHERE id_pelanggan='$id_pelanggan' AND status=0 ");
		$hitung=$ambil->num_rows;
		return $hitung;
	}
	function hapuspembayaran($id_pembayaran)
	{
		$datapembayaran=$this->ambilpembayaran($id_pembayaran);
		$gambar=$datapembayaran['bukti'];
		if (file_exists("../upload/img-pembayaran/$gambar")) {
			unlink("../upload/img-pembayaran/$gambar");
		}
		$this->koneksi->query("DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'");
	}
	function penilaian($id_pesanan,$id_pelanggan,$penilaian)
	{
		$this->koneksi->query("INSERT INTO testimoni (id_pesanan,id_pelanggan,testimoni)
			VALUES ($id_pesanan,$id_pelanggan,'$penilaian')");
		return "sukses";
	}
	function cek_penilaian($id_pesanan)
	{
		$ambil=$this->koneksi->query("SELECT*FROM testimoni WHERE id_pesanan='$id_pesanan'");
			// coba cek menggunakan numrows
		$yangcocok=$ambil->num_rows;
		if ($yangcocok>0) 
		{
			$pecah=$ambil->fetch_assoc();
			return $pecah;
		}
		else
		{
			return "belumada";
		}
	}
}


class laporan
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}

	function laporantransaksi($bulan,$tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
			WHERE status_pesanan='Selesai' AND month(tanggal_pesanan)='$bulan' AND year(tanggal_pesanan)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function laporanpertahun($tahun){
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
			WHERE status_pesanan='Selesai' AND year(tanggal_pesanan)='$tahun'");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function laporanpertanggal($dari,$sampai)
	{
		if ($dari == $sampai)
		{
			$semuadata = array();
			$ambil = $this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
				WHERE tanggal_pesanan='$dari' ");
			while ($pecahdata = $ambil->fetch_assoc())
			{
				$semuadata[] = $pecahdata;
			}
			return $semuadata;
		}
		elseif ($dari !== $sampai)
		{
			$semuadata = array();
			$ambil = $this->koneksi->query("SELECT * FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan=pelanggan.id_pelanggan
				WHERE (tanggal_pesanan BETWEEN '$dari' AND '$sampai') ");
			while ($pecahdata = $ambil->fetch_assoc())
			{
				$semuadata[] = $pecahdata;
			}
			return $semuadata;
		}
	}
	function laporanterlaris()
	{
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE terjual!=0 ORDER BY terjual DESC LIMIT 10");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
	function laporantidaklaris()
	{
		$semuadata=array();
		$ambil=$this->koneksi->query("SELECT * FROM menu JOIN kategori ON menu.id_kategori=kategori.id_kategori WHERE terjual=0 ORDER BY terjual ASC LIMIT 5");
		while ($pecah=$ambil->fetch_assoc()) {
			$semuadata[]=$pecah;
		}
		return $semuadata;
	}
}
class bank
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function detail($id_bank)
	{
		$ambil = $this->koneksi->query("SELECT * FROM bank WHERE id_bank='$id_bank'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function tampil()
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM bank ORDER BY id_bank");
		while ($pecahdata = $ambil->fetch_assoc())
		{
			$semuadata[] = $pecahdata;
		}
		return $semuadata;
	}
	function tambah($nama,$bank,$norek,$gambar)
	{
		$ambil = $this->koneksi->query("SELECT * FROM bank WHERE no_rek='$norek'");
		$yangcocok = $ambil->num_rows;
		if ($yangcocok > 0)
		{
			return "gagal";
		}
		else
		{
			$namagambar = $gambar['name'];
			$tgl = date('Ymd');
			$fix = $tgl.$namagambar;
			$lokasi = $gambar['tmp_name'];
			move_uploaded_file($lokasi, "../upload/img-bank/$fix");
			$this->koneksi->query("INSERT INTO bank (nama,bank,no_rek,foto_bank) VALUES ('$nama','$bank','$norek','$fix')")or die(mysqli_error($this->koneksi));
			return "sukses";
		}
	}
	function ubah($nama,$bank,$norek,$gambar,$id_bank)
	{

		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		$tanggal = date('Ymd');
		$fix = $tanggal.$namagambar;
		if (!empty($lokasi)) {
			$fotolama=$this->detail($id_bank);
			$gambarlama=$fotolama['foto_bank'];
			if (file_exists("../upload/img-bank/$gambarlama")) {
				unlink("../upload/img-bank/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-bank/$fix");
			$this->koneksi->query("UPDATE bank SET nama='$nama',  bank='$bank',
				no_rek='$norek', foto_bank='$fix' WHERE id_bank='$id_bank' ")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE bank SET nama='$nama',  bank='$bank',
				no_rek='$norek' WHERE id_bank='$id_bank' ")or die(mysqli_error($this->koneksi));
		}
	}
	function hapusbank($id_bank)
	{
		$databank=$this->detail($id_bank);
		$gambar=$databank['foto_bank'];
		if ($gambar!="") {
			if (file_exists("../upload/img-bank/$gambar")) {
				unlink("../upload/img-bank/$gambar");
			}
			$this->koneksi->query("DELETE FROM bank WHERE id_bank='$id_bank'");
		}
		else
		{
			$this->koneksi->query("DELETE FROM bank WHERE id_bank='$id_bank'");
		}
	}
}
class testimoni
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function ambiltestimoni($id_testi)
	{
		$ambil = $this->koneksi->query("SELECT * FROM testimoni WHERE id_testi='$id_testi'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function simpantestimoni($nama,$gambar)
	{
		$namagambar = $gambar['name'];
		$lokasigambar = $gambar['tmp_name'];
		move_uploaded_file($lokasigambar, "../img_testimoni/$namagambar");
		$this->koneksi->query("INSERT INTO testimoni (nm_test_pel,gbr_test) VALUES('$nama', '$namagambar') ");
	}
	function tampiltestimoni()
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM testimoni ORDER BY id_testimoni ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;

	}
	function tampiltestimonipelanggan()
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM testimoni JOIN pelanggan ON testimoni.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_testimoni ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;

	}
	function edittestimoni($nama,$gambar,$id_testi)
	{
		$namagambar=$gambar['name'];
		$lokasi=$gambar['tmp_name'];
		if (!empty($lokasi)) {
			$testimonilama=$this->ambiltestimoni($id_testi);
			$gambarlama=$testimonilama['gbr_test'];
			if (file_exists("../img_testimoni/$gambarlama")) {
				unlink("../img_testimoni/$gambarlama");
			}
			move_uploaded_file($lokasi, "../../img_testimoni/$namagambar");
			$this->koneksi->query("UPDATE testimoni SET nm_test_pel='$nama', gbr_test='$namagambar' WHERE id_testi='$id_testi'");
		}else{
			$this->koneksi->query("UPDATE testimoni SET nm_test_pel='$nama' WHERE id_testi='$id_testi'");
		}
	}
	function hapustestimoni($id_testi){
		$datatesti=$this->ambiltestimoni($id_testi);
		$gambar=$datatesti['gbr_test'];
		if (file_exists("../img_testimoni/$gambar")) {
			unlink("../img_testimoni/$gambar");
		}
		$this->koneksi->query("DELETE FROM testimoni WHERE id_testi='$id_testi'");
	}

}
class ongkir
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function ambil($id_testi)
	{
		$ambil = $this->koneksi->query("SELECT * FROM testimoni WHERE id_testi='$id_testi'");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function simpan($kabupaten,$id_ongkirket)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kabupaten WHERE kabupaten='$kabupaten'");

		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0) 
		{
			return "gagal";	
		}
		else
		{
			$this->koneksi->query("INSERT INTO kabupaten (id_ongkirket,kabupaten) VALUES('$id_ongkirket', '$kabupaten') ");
			return "sukses";
		}

	}

	function add($id_kabupaten,$kecamatan,$ongkos)
	{
		$ambil = $this->koneksi->query("SELECT * FROM kecamatan WHERE kecamatan='$kecamatan'");

		$yangcocok=$ambil->num_rows;
		if ($yangcocok > 0) 
		{
			return "gagal";	
		}
		else
		{
			$this->koneksi->query("INSERT INTO ongkir (id_kabupaten,kecamatan,ongkos_kirim) VALUES('$id_kabupaten', '$kecamatan','$ongkos') ");
			return "sukses";
		}
	}
	function update_kecamatan($idkab)
	{
		$semuadata = array();
		$ambil = $this->koneksi->query("SELECT * FROM ongkir WHERE id_kabupaten='$idkab'");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;
	}
	function tampil()
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM ongkirket ORDER BY id_ongkirket ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;

	}
	function list($id_kabupaten)
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM ongkir WHERE id_kabupaten='$id_kabupaten' ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;

	}
	function tampillistongkir($id_ongkirket)
	{
		$semuadata = array();
		$ambil=$this->koneksi->query("SELECT * FROM kabupaten WHERE id_ongkirket='$id_ongkirket' ");
		while ($pecahdata=$ambil->fetch_assoc()) 
		{
			$semuadata[]=$pecahdata;
		}
		return $semuadata;

	}
	function apiubah($id_kabupaten)
	{
		$ambil=$this->koneksi->query("SELECT * FROM kabupaten WHERE id_kabupaten='$id_kabupaten' ");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}

	function apiubahongkir($id_ongkir)
	{
		$ambil=$this->koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir' ");
		$pecah=$ambil->fetch_assoc();
		return $pecah;
	}
	function ubah($id_kabupaten,$kabupaten)
	{
		$this->koneksi->query("UPDATE kabupaten SET kabupaten='$kabupaten' WHERE id_kabupaten='$id_kabupaten'");
	}
	function edit($id_ongkir,$kecamatan,$ongkos_kirim)
	{
		$this->koneksi->query("UPDATE ongkir SET kecamatan='$kecamatan', ongkos_kirim='$ongkos_kirim' WHERE id_ongkir='$id_ongkir'");
	}
	function hapus($id_kabupaten)
	{
		$this->koneksi->query("DELETE FROM kabupaten WHERE id_kabupaten='$id_kabupaten'");
	}
	function hapusongkir($id_ongkir)
	{
		$this->koneksi->query("DELETE FROM ongkir WHERE id_ongkir='$id_ongkir'");
	}

}

class konfigurasi
{
	public $koneksi;
	function __construct($mysqli)
	{
		$this->koneksi = $mysqli;
	}
	function ambil()
	{
		$ambil = $this->koneksi->query("SELECT * FROM konfigurasi");
		$pecahdata = $ambil->fetch_assoc();
		return $pecahdata;
	}
	function ubah($nama_instansi,$nama_web,$nama_pemilik,$alamat,$email,$logo)
	{
		$namagambar=$logo['name'];
		$lokasi=$logo['tmp_name'];
		$tanggal = date('Ymd');
		$gambar = $tanggal.$namagambar;
		if (!empty($lokasi)) {
			$instansilama=$this->ambil();
			$gambarlama=$instansilama['logo'];
			if (file_exists("../upload/img-konfigurasi/$gambarlama")) {
				unlink("../upload/img-konfigurasi/$gambarlama");
			}
			move_uploaded_file($lokasi, "../upload/img-konfigurasi/$gambar");
			$this->koneksi->query("UPDATE konfigurasi SET nama_web='$nama_web',  nama_instansi='$nama_instansi',
				alamat='$alamat', pemilik='$nama_pemilik', email='$email', logo='$gambar'")or die(mysqli_error($this->koneksi));
		}
		else
		{
			$this->koneksi->query("UPDATE konfigurasi SET nama_web='$nama_web',  nama_instansi='$nama_instansi',
				alamat='$alamat', pemilik='$nama_pemilik', email='$email'")or die(mysqli_error($this->koneksi));
		}
	}
}
$admin = new admin($mysqli);
$pelanggan = new pelanggan($mysqli);
$kategori = new kategori($mysqli);
$pesanan = new pesanan($mysqli);
$menu = new menu($mysqli);
$laporan = new laporan($mysqli);
$konfigurasi = new konfigurasi($mysqli);
$bank = new bank($mysqli);
$testimoni = new testimoni($mysqli);
$ongkir = new ongkir($mysqli);
?>