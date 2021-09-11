<?php  
include 'config/class.php';
if (isset($_GET['id'])) {     
	$id_pesanan = $_GET['id'];
	$status = "Batal";
	$pesanan->batalpesanan($id_pesanan,$status);
}
?>