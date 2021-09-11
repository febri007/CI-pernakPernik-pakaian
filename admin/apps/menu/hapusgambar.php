<?php  
$id_menu = $_GET['id'];
$menu->hapusgambar($id_menu);
echo "<script>alert('Menu berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=gambarmenu&id=$id_menu';</script>";
?>