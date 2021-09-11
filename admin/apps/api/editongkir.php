<?php  
include '../../../config/class.php';
$data = $ongkir->apiubahongkir($_POST['id_ongkir']);
echo json_encode($data);
?>