<?php  
include 'config/class.php';
$id_menu=$_GET["id"];
$dataproduk = $menu->detail($id_menu);
unset($_SESSION["keranjang"][$id_menu]);

echo "<script>alert('".$dataproduk['nama_menu']." telah dihapus dari keranjang');</script>";
echo "<script>location='keranjang';</script>";
?>