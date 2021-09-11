<?php  
    $id_pesanan=$_GET['id'];
    $pesanan->terimapembayaran2($id_pesanan);
    echo "<script>alert('Pemabayaran pelunasan berhasil diterima');</script>";
    echo "<script>location='index.php?halaman=pesanan';</script>";
?>