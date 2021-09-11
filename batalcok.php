<?php  
include 'config/class.php';
$data = $pesanan->tampil_pesanan();
foreach ($data as $key => $value) {
	$waktu_skrng = strtotime(date("Y-m-d H:i:s"));
	print_r($waktu_skrng); 
	$waktu_bayar_dp = strtotime($value['deadline_dp']);
	print_r($waktu_bayar_dp);
	$waktu_bayar_lunas = strtotime($value['deadline_lunas']);

	if($value['status_pesanan']=="Belum Bayar" && $waktu_skrng>=$waktu_bayar_dp)
	{
		$id_pesanan = $value['id_pesanan'];
		$status = 'batal';
		$pesanan->batalotomatis($id_pesanan,$status);
	}
	elseif($value['status_pesanan']=="Menunggu Pelunasan" && $waktu_skrng>=$waktu_bayar_lunas)
	{

		$id_pesanan = $value['id_pesanan'];
		$status = 'batal';
		$pesanan->batalotomatis($id_pesanan,$status);
	}
}
?>

<h1 style="text-align: center; margin-top: 300px;">404 Errors</h1>