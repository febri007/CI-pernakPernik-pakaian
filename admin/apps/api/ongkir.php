<?php  
include '../../../config/class.php';
$data = $ongkir->apiubah($_POST['id_kabupaten']);
echo json_encode($data);
?>