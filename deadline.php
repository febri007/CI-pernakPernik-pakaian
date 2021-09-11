<?php 
include 'config/class.php'; 
include 'config/fungsi.php'; 
$id_pesanan = $_GET['id'];
$datanota = $pesanan->tampil_produk_pesanan($id_pesanan);
$datakonfigurasi = $konfigurasi->ambil();
$databank=$bank->tampil();
$detailharga=$pesanan->ambil_pesanan($id_pesanan);
$tanggal = date('Y-m-d', strtotime($detailharga['deadline_dp']));
?>
<?php  
if (!isset($_SESSION['pelanggan'])) 
{
  echo "<script>alert('Anda harus login');</script>";
  echo "<script>location='login';</script>";
  exit();
}
?>
<?php  
$detail=$pesanan->ambil_pesanan($id_pesanan);
// mendapatkn id pelanggan yg login
$idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];
// mendapatkan id pelanggan yang beli
$idpelangganygbeli = $detail["id_pelanggan"];
if ($idpelangganlogin!==$idpelangganygbeli) 
{
    echo "<script>alert('Nakal ya kamu mau ngintip');</script>";
    echo "<script>location='pelanggan.php';</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Info Pembayaran - <?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <style>
        .gambar
        {
            width: 1200px;
            height: 500px;

        }
        .breadcrumb
        {
            margin-top: 20px;
        }
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
        .isi
        {
            background-color: #e5e5e5;
            padding: 10px 10px 10px 10px;
        }
        h1{ 
          color: #396; 
          font-weight: 100; 
          font-size: 20px; 
          margin: 40px 0px 20px; 
      } 
      #clockdiv{ 
        font-family: sans-serif; 
        color: #fff; 
        display: inline-block; 
        font-weight: 100; 
        text-align: center; 
        font-size: 30px; 
        margin-top: 10px;
        margin-bottom: 10px;
    } 
    #clockdiv > div{ 
        padding: 10px; 
        border-radius: 3px; 
        background: #DD8C9B; 
        display: inline-block; 
    } 
    #clockdiv div > span{ 
        padding: 10px; 
        border-radius: 3px; 
        background: #FF5C84; 
        display: inline-block; 
    } 
    .smalltext{ 
        padding-top: 5px; 
        font-size: 15px; 
    } 
    .pastikan
    {
        width: 50%;
        text-align: center;
    }
</style>
</head>
<body>
<!--    <div class="preloader">
        <div class="loading">
            <img src="img/spinner.gif" width="100">
            <p>Harap Tunggu</p>
        </div>
    </div> -->
    
    <?php include 'header.php'; ?>

    <div id="breadcrumb" class="section hidden-print">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Info Pembayaran</h3>
                </div>
            </div>
        </div>
    </div>


    <?php if ($detailharga['status_pesanan']=="Menunggu Pelunasan"): ?>
        <input type="hidden" id="deadline" value="<?php echo $detailharga['deadline_lunas'] ?>">
        <input type="hidden" id="status" value="<?php echo $detailharga['status_pesanan'] ?>">
        <input type="hidden" id="id_pesanan" value="<?php echo $id_pesanan ?>">
        <?php elseif ($detailharga['status_pesanan']=="Belum Bayar"): ?>
            <input type="hidden" id="deadline" value="<?php echo $detailharga['deadline_dp'] ?>">
            <input type="hidden" id="status" value="<?php echo $detailharga['status_pesanan'] ?>">
            <input type="hidden" id="id_pesanan" value="<?php echo $id_pesanan ?>">
        <?php endif ?>
        <div class="container">
            <div class="panel panel-default">
                <center>
                    <div style="margin-top: 20px;"></div>
                    <img src="img/anekanota.png" width="80" alt="">
                    <hr>
                    <div id="clockdiv">  
                        <h5>Sisa waktu pembayaran Anda</h5>
                        <div> 
                           <span class="days" id="day"></span> 
                           <div class="smalltext">Hari</div> 
                       </div> 
                       <div> 
                        <span class="hours" id="hour"></span> 
                        <div class="smalltext">Jam</div> 
                    </div> 
                    <div> 
                        <span class="minutes" id="minute"></span> 
                        <div class="smalltext">Menit</div> 
                    </div> 
                    <div> 
                        <span class="seconds" id="second"></span> 
                        <div class="smalltext">Detik</div> 
                    </div> 
                </div>

                <div class="alert alert-warning pastikan">
                    <p>Pastikan untuk tidak menginformasikan bukti dan data pembayaran kepada pihak manapun kecuali Roti Aneka</p>
                </div>
            </center> 
            <div class="paymen text-center">
                <p>Untuk menyelesaikan proses pesanan Anda, silahkan melakukan pembayaran dengan cara Transfer ke rekening di bawah ini :</p>
            </div>
            <br>
            <div class="row">
                <?php foreach ($databank as $key => $value): ?>
                    <div class="col-md-12">
                        <center>
                            <div>
                                <h3 style="color: #8E8E8E;">
                                    <img class="bank" width="160" src="admin/upload/img-bank/<?= $value['foto_bank']; ?>" alt="">
                                </h3>
                                <h3><?= $value['no_rek']; ?></h3>
                                <p>a/n <?= $value['nama'] ?></p>
                            </div>
                        </center>
                    </div>
                <?php endforeach ?>
            </div>
            <hr>
            <div class="paymen">
                <center>
                    <?php if ($detailharga['status_pesanan']=="Belum Bayar"): ?>
                        <p>Jumlah DP yang harus Anda bayar sebesar : <strong style="color: #FF6636;"><h2>Rp. <?= number_format($detailharga['dp']); ?></h2></strong> </p>
                        <?php elseif ($detailharga['status_pesanan']=="Menunggu Pelunasan"): ?>
                            <p>Jumlah Pelunasan yang harus dibayar : <strong style="color: #FF6636;"><h2>Rp. <?= number_format($detailharga['lunas']); ?></h2></strong> </p>
                        <?php endif ?>
                    </center>
                </div>
                <hr>
                <div class="text-center">
                    Pastikan pembayaran Anda sudah BERHASIL untuk mempercepat proses verifikasi
                </div><br><br>
                <div class=" text-center">
                    <a href="pelanggan?page=pesanan" class="btn btn-success" style="background: #DD8C9B; border-color: #DD8C9B;"> Cek status pembayaran</a>
                </div>
                <hr>
            </div>
        </div>
    </div>


    <?php include 'whatsapp.php'; ?>

    <?php include 'footer.php'; ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/active.js"></script>
    <script src="js/stiky.js"></script>
    <script>
        $(window).load(function() {
            $('.preloader').fadeOut('slow');
        });
    </script>
    <script> 

       var deadline = $('#deadline').val();
       var id_pesanan = $('#id_pesanan').val();
       var status = $('#status').val();
       var countDownDate = new Date(deadline).getTime(); 

       var x = setInterval(function() { 

        var now = new Date().getTime(); 

        var distance  = countDownDate - now; 
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance %(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)); 
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("day").innerHTML =days ; 
        document.getElementById("hour").innerHTML =hours; 
        document.getElementById("minute").innerHTML = minutes;  
        document.getElementById("second").innerHTML =seconds;  

        if (distance < 0 && status==="Belum Bayar") 
        { 
           $.get("batalpesanan.php", {id:id_pesanan});
           clearInterval(x); 
       } 
   },1000); 
</script> 
</body>
</html>
