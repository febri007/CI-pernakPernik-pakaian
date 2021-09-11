<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Aktivasi pendaftaran</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
  .invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, .15);
    font-size: 16px;
    line-height: 24px;
    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    color: #555;
  }
  .aktivasi {
   display: block;
   width: 250px;
   max-width: 100%;
   background: #47BD4A;
   font-weight: bold;
   font-size: 16px;
   color: #fff;
   outline: 0px;
   text-decoration: none;
   border-radius: 50px;
   margin: 30px auto;
   text-align: center;
   padding: 15px;
   text-transform: capitalize;
 }
 p
 {
   text-align: center;
 }
</style>
<!-- <style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }
  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    font: 14px arial;
  }
</style> -->
<body>
  <!-- <div class="preloader">
    <div class="loading">
      <img src="images/loading.gif" width="100">
      <p>Harap Tunggu</p>
    </div>
  </div> -->
  <div class="container" align="center">
    <br>
    <?php
    include "config/class.php";
    $token=$_GET['t'];
    $sql_cek=mysqli_query($mysqli,"SELECT * FROM pelanggan WHERE token='".$token."' and aktif='0'");
    $jml_data=mysqli_num_rows($sql_cek);
    if ($jml_data>0) {
    //update data users aktif
      mysqli_query($mysqli,"UPDATE pelanggan SET aktif='1' WHERE token='".$token."' and aktif='0'");
      echo '
      <div class="invoice-box">
      <img src="img/smile.png" width="150">
      <h3 align="center">Akun anda sudah aktif</h3>
      <table width="100%">
      <tr>
      <td><center><a href="https://rotianeka.site/login" class="aktivasi">Silahkan Login</a></center></td>
      </tr>
      </table>
      </div>';
    }else{
  //data tidak di temukan
      echo '
      <div class="invoice-box">
      <img src="img/crying.png" width="100"><br><br>
      <h3 align="center">Invalid token!</h3>
      </div>';
    }
    ?>
  </div>
  <script src="js/bootstrap.min.js"></script>
<!--  <script>
  $(window).load(function() {
    $('.preloader').fadeOut('slow');
  });
</script> -->
</body>
</html>