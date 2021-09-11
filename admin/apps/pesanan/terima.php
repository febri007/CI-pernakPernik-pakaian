<?php  
    $id_pesanan=$_GET['id'];
    $pesanan->terimapembayaran($id_pesanan);
    echo "<script>alert('Pemabayaran berhasil diterima');</script>";
    echo "<script>location='index.php?halaman=pesanan';</script>";
?>