<?php  
$id_pelanggan = $_GET['id'];
$data = $pelanggan->detail($id_pelanggan);
$gambar = $data['foto'];
$pelanggan->hapus($id_pelanggan);
echo "<script>alert('Pelanggan telah terhapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
?>