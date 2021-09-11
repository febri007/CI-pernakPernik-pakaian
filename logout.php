<?php  
include 'config/class.php';
if (isset($_SESSION['pelanggan']))
{
	unset($_SESSION['pelanggan']);
}
echo "<script>alert('anda telah logout');</script>";
echo "<script>location='login';</script>";
?>
