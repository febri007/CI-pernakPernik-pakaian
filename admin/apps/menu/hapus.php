<?php  
    $id_menu=$_GET['id'];
    $datamenu=$menu->detail($id_menu);
    $gambar=$datamenu['gambar_menu'];
    $menu->hapus($id_menu);
    echo "<script>alert('Menu berhasil dihapus');</script>";
    echo "<script>location='index.php?halaman=menu';</script>";
?>