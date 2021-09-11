<?php

use Midtrans\Snap;

require_once(dirname(__FILE__) . '/Midtrans.php');
include '../config/class.php';

//Set Your server key
\Midtrans\Config::$serverKey = "Mid-server-JbhP2qj8a_btWPDEQb5Xylnu";

// Uncomment for production environment
\Midtrans\Config::$isProduction = true;

\Midtrans\Config::$isSanitized = false;
\Midtrans\Config::$is3ds = true;

$order_id = $_POST['order_id'];
// $snaptokend = $_POST['snaptoken'];
// $action  = $pesanan->inserttoken($order_id, $snapToken);

$datapesanan = $pesanan->getdatapayment($order_id);
$datapesanan = mysqli_fetch_assoc($datapesanan);
$harga = $datapesanan['total_pesanan'];

$id_pelanggan= $_SESSION["pelanggan"]["id_pelanggan"];
	$datapelanggan=$pelanggan->detail($id_pelanggan);

// $query5 = mysqli_query($conn, "SELECT * FROM `pelanggan` inner JOIN detail_pelanggan INNER JOIN pamsimas WHERE pelanggan.no_ktp = detail_pelanggan.no_ktp and detail_pelanggan.no_ktp = pelanggan.no_ktp and pamsimas.no_induk = detail_pelanggan.no_induk AND detail_pelanggan.no_induk = pamsimas.no_induk and id_transaksi_pm = '$order_id';");

// $row5 = mysqli_fetch_assoc($query5);
// $idtransaksipm = $row5['id_transaksi_pm'];
// $nama = $row5['nama'];   
// $nohp = $row5['nohp'];
// $email = $row5['email'];
// $total = $row5['total_bayar'];
// $kategori = $row5['kategori'];
// $alamat = $row5['alamat'];


// Required
$transaction = array(
    'transaction_details' => array(
        'order_id' => $order_id,
        'gross_amount' => $harga // no decimal allowed
    ),
    'callbacks' => array(
        'finish' => ""
      ), 
    'customer_details' => array(
      'first_name'    => $datapelanggan["nama"], //optional
      'last_name'     => "", //optional
      'email'         => $datapelanggan["email"], //mandatory
      'phone'         => $datapelanggan["telepon"]
      )

    );

$snapToken = \Midtrans\Snap::getSnapToken($transaction);

$result_data = [
    'snap_token' => $snapToken,
    'message' => $snapToken
];
$action  = $pesanan->inserttoken($order_id, $snapToken);


echo json_encode($result_data);

?>