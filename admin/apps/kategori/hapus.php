<?php  
    $id_kategori=$_GET['id'];
    $datakategori=$kategori->detail($id_kategori);
    $gambar=$datakategori['gambar'];
    $kategori->hapus($id_kategori);
    echo "<script>alert('Kategori berhasil dihapus');</script>";
    echo "<script>location='index.php?halaman=kategori';</script>";
?>