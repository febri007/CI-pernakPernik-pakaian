<?php  
include '../../../config/class.php';
    $id_pesanan=$_POST['id_pesanan'];
    $alasan=$_POST['alasan'];
    $pesanan->tolakpembayaran($alasan,$id_pesanan);
    echo "<script>alert('Pemabayaran berhasil ditolak');</script>";
    echo "<script>location='index.php?halaman=pesanan';</script>";
?>