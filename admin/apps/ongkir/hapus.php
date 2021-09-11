<?php  
$id_kabupaten=$_GET['id'];
$id_ongkirket=$_GET['id_ongkirket'];
$ongkir->hapus($id_kabupaten);
echo "<script>alert('Kabupaten berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=listongkir&id=".$id_ongkirket."';</script>";
?>