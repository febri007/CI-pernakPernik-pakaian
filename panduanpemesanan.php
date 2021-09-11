<?php include 'config/class.php'; ?>
<?php 
$datatesti=$testimoni->tampiltestimonipelanggan(); 
$datakonfigurasi = $konfigurasi->ambil();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Testimoni - <?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <style>
    .pusatbantuan
    {
        width: 100%;
        height: 300px;
        padding-top: 64px;
        margin-bottom: 32px;
        background-image: url(img/bantuan.png);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: center;
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
    .packing
    {
        display: inline-block;
    }
    .menu-bantuan li 
    {
        border-bottom: 1px solid #9fa6b0;
        margin: 10px;
    }
</style>
</head>
<body>
  <!--   <div class="preloader">
  <div class="loading">
    <img src="img/spinner.gif" width="100">
    <p>Harap Tunggu</p>
  </div>
</div> -->

<?php include 'header.php'; ?>
<div id="breadcrumb" class="section">
  <div class="container">
   <div class="row">
    <div class="col-md-12">
        <h3 class="breadcrumb-header"><i class="fa fa fa-question-circle-o"></i> Bantuan</h3>
    </div>
</div>
</div>
</div><br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel panel-body">
                   <ul class="menu-bantuan">
                    <li><a href="akunsaya"><img width="40" class="packing" src="img/pelanggan.png" alt=""> Akun Saya</a></li>
                    <li><a href="panduanpemesanan"><img width="40" class="packing" src="img/panduan pemesanan.png" alt=""> Panduan Pemesanan</a></li>
                    <li><a href="pertanyaan"><img width="40" class="packing" src="img/pertanyaan.png" alt=""> Pertanyaan</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel panel-body">
                <p style="font-size: 30px;" class="text-center atas"><img width="40" class="packing" src="img/panduan pemesanan.png" alt=""> Panduan Pemesanan </p>
                <hr>
                <p id="a"><b>1. Anda belum punya akun ?</b> Silankan Daftar <a href="daftar"> <u style="color: blue;">Klik Disini!</u></a> </p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/DaftarAkun.png" alt=""></center>
                <p class="b"><b>2. </b> Jika anda sudah mempunyai akun silahkan login <a href="login"> <u style="color: blue;">Klik Disini!</u></a></p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/LoginAkun.png" alt=""></center>
                <p class="b"><b>3. </b> Jika anda sudah mempunyai akun dan anda sudah login langkah selanjutnya, klik Menu Catering dan pilih kategori yang ingin anda pesan!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Menu.png" alt=""></center>
                <p class="b"><b>4. </b> Jika sudah sesuai dengan menu yang ingin anda pesan, langkah selanjutnya pilih kategori menu mana yang ingin anda pesan! Masukan jumlah yang ingin anda pesan dan langkah selanjutnya masukan ke keranjang!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/MenuDetail.png" alt=""></center>
                <p class="b"><b>5. </b> Jika sudah sesuai dengan menu yang ingin anda pesan, langkah selanjutnya pilih kategori menu mana yang ingin anda pesan! Masukan jumlah yang ingin anda pesan dan langkah selanjutnya masukan ke keranjang, didalam halaman keranjang anda dapat melihan pilihan kategori menu yang anda pesan, jika anda ingin membeli lebih dari satu kategori anda bisa klik Lanjutkan Belanja, jika tidak langsung saja dengan mengklik tombol Checkout untuk melakukan transaksi pesanan anda!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Keranjang.png" alt=""></center>
                <p class="b"><b>6. </b> Pada halaman checkout silahkan lihat apakah pesanan anda sudah benar, jika sudah benar pilih keterangan diambil / diantar. jika diantar makan akan dikenalan biaya transportasi pengantaran pesanan dengan jumlah yag sudah di tentukan oleh perusahaan! Setelah itu isi data anda dengan lengkap!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Checkout.png" alt=""></center>
                <p class="b"><b>7. </b> Jika sudah menyelesaikan tahap checkout, selanjutnya anda akan dialihkan ke halaman nota. Pada halaman nota anda akan diberitahu rincian pesanan anda, jumlah DP yang harus dibayarkan dan cara pembayaran untuk pesanan anda!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Nota.png" alt=""></center>
                <p class="b"><b>8. </b> Pada halaman cara pembayaran anda akan diberitahu jumlah pembayaran yang harus dibayar, dan transfer ke salah satu rekening Toko Roti Aneka!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Pembayaran.png" alt=""></center>
                <p class="b"><b>9. </b> Jika anda sudah membayar sesuai dengan pesanan, tahap selanjutnya silahkan klik tombol saya sudah bayar pada halaman bawah menu cara pembayaran. Maka anda akan dialihkan ke halaman unggah buti pembayaran dengan memasukan jumlah yang anda transfer dan upload bukti struk transfer, anda juga akan mendapatkan notifikasi pesanan update tiap proses!</p>
                <center><img class="thumbnail" width="800" id="gambar" src="img-panduan/Konfir.png" alt=""></center>
                <p id="a"><b>Menunggu konfirmasi pembayaran dari admin</b> - Silahkan menunggu konfirmasi dari admin paling lambat 1x24 Jam, jika disetujui maka pesanan anda akan diproses, dan jika sudah diproses anda akan diminta untuk melakukan pelunasan pesanan Anda, dan terakhir pesanan anda siap diambil / diantar.</p><br>
                <br>
                <p id="a"><b>Konsultasi</b> - Jika anda bingung bagaimana cara pemesanan, silahkan anda bisa hubungi CS melalui live chat dan jika CS live chat sedang offline anda juga bisa chat melalui whatsapp yang sudah tertera pada halaman website untuk mendapat respon lebih cepat.</p><br>
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6"></div>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>
</div>
<br><br>
<?php include 'whatsapp.php'; ?>
<?php include 'footer.php'; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/tawkto.js"></script>
<script src="js/active.js"></script>
<script src="js/stiky.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
     $("#testimonial-slider").owlCarousel({
         items:3,
         itemsDesktop:[1000,3],
         itemsDesktopSmall:[990,2],
         itemsTablet:[768,2],
         itemsMobile:[650,1],
         pagination:true,
         navigation:false,
         autoPlay:true
     });
 });
</script>
<script>
    $(window).load(function() {
        $('.preloader').fadeOut('slow');
    });
</script>
</body>
</html>