<?php  
$id_admin=$_GET['id'];
$data=$admin->ambil($id_admin);
$gambar=$data['foto'];
$admin->hapus($id_admin);
echo "<script>alert('User berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=user';</script>";
?>