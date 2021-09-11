<?php  
include '../../../config/class.php';
$result = array();
$totpesanan =$pesanan->totpesanannotifikasi();
array_push($result, array('totpesanan' => $totpesanan));
echo json_encode(array("result" => $result));
?>