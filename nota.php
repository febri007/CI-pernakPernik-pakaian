<?php 
include 'config/class.php'; 
include 'config/fungsi.php'; 
$id_pesanan = $_GET['id'];
$datanota = $pesanan->tampil_produk_pesanan($id_pesanan);
$datakonfigurasi = $konfigurasi->ambil();
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
    <title>Hubungi Kami - <?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <style>
    .gambar {
        width: 1200px;
        height: 500px;

    }

    .breadcrumb {
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
        transform: translate(-50%, -50%);
        font: 14px arial;
    }

    .isi {
        background-color: #e5e5e5;
        padding: 10px 10px 10px 10px;
    }

    h1 {
        color: #396;
        font-weight: 100;
        font-size: 40px;
        margin: 40px 0px 20px;
    }

    #clockdiv {
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center;
        font-size: 30px;
    }

    #clockdiv>div {
        padding: 10px;
        border-radius: 3px;
        background: #54d44e;
        display: inline-block;
    }

    #clockdiv div>span {
        padding: 15px;
        border-radius: 3px;
        background: #40b149;
        display: inline-block;
    }

    smalltext {
        padding-top: 5px;
        font-size: 16px;
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
                    <h3 class="breadcrumb-header">Nota</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="panel panel-default">
            <div style="margin-top: 20px;"></div>
            <center><img src="img/anekanota.png" width="80" alt=""></center>
            <hr>
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Nota Pesanan</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3 col-xs-3">
                        <h5>Nomor Pesanan</h5>
                        <p><strong>#<?= $id_pesanan ?></strong></p>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <h5>Tgl. Transaksi</h5>
                        <?php  
                        $tanggal = date('Y-m-d', strtotime($detail['tanggal_pesanan']));
                        ?>
                        <p>
                            <strong><?= tanggal_indo($tanggal, true); ?></strong>
                        </p>
                    </div>
                    <?php  
                    $tanggalaa = date('Y-m-d', strtotime($detail['tanggal_pengiriman']));
                    ?>
                    <div class="col-md-3 col-xs-3">
                        <h5>Tgl. Ambil / Antar</h5>
                        <p>
                            <strong><?= tanggal_indo($tanggalaa, true); ?></strong>
                        </p>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <h5>Status</h5>
                        <p>

                            <?php if ($detail['status_pesanan']=="Belum Bayar"): ?>
                            <span class="label label-danger">Belum Bayar</span>
                            <?php elseif ($detail['status_pesanan']=="Dibayar"): ?>
                            <span class="label label-success">Lunas</span>
                            <?php elseif ($detail['status_pesanan']=="Kadaluarsa"): ?>
                            <span class="label label-danger">Kadaluarsa</span>
                            <?php elseif ($detail['status_pesanan']=="Pending"): ?>
                            <span class="label label-warning">Pembayaran Tertunda</span>

                            <?php endif ?>
                        </p>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th width="22%">Nama Pemesan</th>
                                    <th width="7%">:</th>
                                    <td><?= $detail['nama'] ?></td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <th>:</th>
                                    <td><?= $detail['telepon'] ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat Pemesan</th>
                                    <th>:</th>
                                    <td><?= $detail['alamat'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Menu</th>
                                    <th>Harga / Pcs</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datanota as $key => $value): ?>

                                <tr>
                                    <td width="5%"><?= $key+1 ?></td>
                                    <td><img width="70" src="admin/upload/img-menu/<?= $value['gambar_menu'] ?>" alt="">
                                    </td>
                                    <td><?= $value['nama_menu'] ?></td>
                                    <td>Rp. <?= number_format($value['harga_menu']) ?></td>
                                    <td><?= $value['jumlah_menu'] ?>x Item</td>
                                    <td>Rp. <?= number_format($value['subharga_menu']) ?></td>
                                </tr>
                                <?php endforeach ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Total Belanja</th>
                                    <th>Rp. <?= number_format($detail['total_belanja']) ?></th>
                                </tr>
                                <tr>
                                    <th colspan="5">Total Ongkir</th>
                                    <th>
                                        <?php if ($detail['total_ongkir']==0): ?>
                                        Rp. -
                                        <?php else: ?>
                                        Rp. <?= number_format($detail['total_ongkir']) ?>
                                        <?php endif ?>

                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="5">Total Pembayaran</th>
                                    <th>Rp. <?= number_format($detail['total_pesanan']) ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row hidden-print">
                    <div class="col-md-6 col-md-push-6 col-xs-6">
                        <a href="pelanggan?page=pesanan" class="btn btn-primary hidden-print"><i
                                class="fa fa-file-text"></i> Riwayat Transaksi</a>
                        <?php if ($detail['status_pesanan']=="Belum Bayar"): ?>
                        <a href="carapembayaran?id=<?= $id_pesanan ?>" class="btn btn-success hidden-print"><i
                                class="fa fa-money"></i> Cara Pembayaran</a>
                        <?php else: ?>
                        <?php endif ?>
                        <button onclick="window.print()" class="btn btn-info hidden-print"><i class="fa fa-print"></i>
                            Cetak</button>
                    </div>
                    <div class="col-md-6 col-md-pull-6 col-xs-6 hidden-print">
                        <div class="alert alert-info">


                            <?php if ($detail['status_pesanan']=="Menunggu Konfirmasi Pelunasan"): ?>
                            <p>
                                Terima kasih telah melakukan pembayaran Pelunasan sebesar <strong>Rp.
                                    <?= number_format($detail['lunas']) ?></strong>. Mohon menunggu, kami sedang
                                memproses pembayaran Anda paling lambat 1x24 Jam.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Selesai"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>, Pesanan telah selesai!.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Pembayaran Ditolak"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>. Pembayaran DP Anda kami tolak
                                dengan alasan : <strong><?php echo $detail['alasan_tolak'] ?></strong>.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>. Pembayaran Pelunasan Anda kami
                                tolak dengan alasan : <strong><?php echo $detail['alasan_tolak'] ?></strong>.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Belum Bayar"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>, Untuk menyelesaikan proses pesanan
                                Anda, silahkan melakukan pembayaran <strong>DP</strong> sebesar <strong>Rp.
                                    <?= number_format($detail['dp']) ?></strong>.
                            </p>
                            <hr>
                            <ul>
                                <li></li>
                                <li>Total tagihan pesanan Anda sebesar
                                    <strong>Rp. <?php echo number_format($detail["total_pesanan"]); ?></strong>
                                </li>
                            </ul>
                            <?php elseif ($detail['status_pesanan']=="Proses"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>, Pembayaran pelunasan untuk pesanan
                                ini telah diterima, kami akan menginfokan jika pesanan sudah selesai</strong>.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Menunggu Konfirmasi"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>, Mohon menunggu kami sedang
                                memproses pembayaran DP anda paling lambat 1x24 Jam</strong>.
                            </p>
                            <?php elseif ($detail['status_pesanan']=="Menunggu Pelunasan"): ?>
                            <p>
                                <strong>Terimakasih telah melakukan pesanan</strong>, Silahkan lakukan pelunasan sebesar
                                <strong>Rp. <?= number_format($detail['lunas']) ?></strong> untuk menyelesaikan pesanan
                                Anda.
                            </p>
                            <?php endif ?>

                        </div>
                    </div>
                </div>
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
    <script src="js/tawkto.js"></script>
    <script>
    $(window).load(function() {
        $('.preloader').fadeOut('slow');
    });
    </script>
</body>

</html>