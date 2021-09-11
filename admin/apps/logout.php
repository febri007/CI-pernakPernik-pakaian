<?php  
include '../../config/class.php';
if (isset($_SESSION['admin'])) 
{
	unset($_SESSION['admin']);
}
echo "<script>location='.././';</script>";
?>