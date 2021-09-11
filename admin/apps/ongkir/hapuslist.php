<?php  
$id_ongkir=$_GET['id'];
$id_kabupaten=$_GET['id_kabupaten'];
$id_ongkirket=$_GET['id_ongkirket'];
$ongkir->hapusongkir($id_ongkir);
echo "<script>alert('Ongkos kirim berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=ongkirlist&id=".$id_kabupaten."&id_ongkirket=".$id_ongkirket."';</script>";
?>