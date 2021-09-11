<?php  
include '../../../config/class.php';
$data = $pesanan->konfirmasi($_POST['id_pesanan']);
echo json_encode($data);
?>