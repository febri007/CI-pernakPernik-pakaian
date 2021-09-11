<?php  
    $id_bank=$_GET['id'];
    $databank=$bank->detail($id_bank);
    $gambar=$databank['foto_bank'];
    $bank->hapusbank($id_bank);
    echo "<script>alert('Bank berhasil dihapus');</script>";
    echo "<script>location='index.php?halaman=bank';</script>";
?>