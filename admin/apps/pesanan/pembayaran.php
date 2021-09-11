<?php  
$id_pesanan = $_GET['id'];
$data = $pesanan->tampilpesanan($id_pesanan);
$datapembayaran = $pesanan->tampil_pembayaran($id_pesanan);
$status = $pesanan->ambil_pesanan($id_pesanan);
$id_pelanggan = $status['id_pelanggan'];
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-money"></i> Pembayaran</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="index.php?halaman=home">Pesanan</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Pembayaran</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcome-area mg-b-30 des-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading">
                                <form role="search" class="">
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <a href=""><i class="fa fa-search"></i></a>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Dashboard</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcome End-->
<div class="col-lg-12">

    <a href="index.php?halaman=pesanan" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div><br><br><br>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <?php if (empty($datapembayaran)): ?>
                                <div class="alert alert-danger">
                                   <i class="fa fa-info-circle"></i> Pelanggan belum melakukan pembayaran!
                               </div>
                               <?php else: ?>
                                  <?php if ($status['status_pesanan']=="Pembayaran ditolak"): ?>
                                    <div class="alert alert-danger"> pembayaran ditolak dengan alasan <strong><?php echo $status['alasan_tolak'] ?></strong></div>
                                    <?php elseif ($status['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                                     <div class="alert alert-danger"> pembayaran pelunasan ditolak dengan alasan <strong><?php echo $status['alasan_tolak'] ?></strong></div>
                                     <?php elseif ($status['status_pesanan']=="Proses"): ?>
                                         <div class="alert alert-success"><i class="fa fa-info-circle"></i> Semua pembayaran telah diterima segera proses pesanan ini!</div>
                                         <?php elseif ($status['status_pesanan']=="Selesai"): ?>
                                            <div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Pesanan telah selesai!</div>
                                            <?php elseif ($status['status_pesanan']=="Pembayaran Ditolak"): ?>
                                                <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Pembayaran DP ditolak dengan alasan : <strong><?php echo $status['alasan_tolak'] ?></strong>!</div>
                                            <?php endif ?>
                                            <?php foreach ($datapembayaran as $key => $value): ?>
                                                <div class="row">
                                                    <div class="col-md-8">

                                                        <table class="table">
                                                            <tr>
                                                                <th width="20%">Id Pembayaran</th>
                                                                <th>:</th>
                                                                <td>#<?php echo $value["id_pembayaran"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Keperluan</th>
                                                                <th>:</th>
                                                                <td><?php echo $value["keperluan"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama</th>
                                                                <th>:</th>
                                                                <td><?php echo $value["atas_nama"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Bank</th>
                                                                <th>:</th>
                                                                <td><?php echo $value["bank"]; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Jumlah</th>
                                                                <th>:</th>
                                                                <td>Rp. <?php echo number_format($value["jumlah"]); ?></td>
                                                            </tr>

                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img width="300" src="../../img-bukti/<?= $value['bukti'] ?>" alt="">
                                                    </div>
                                                </div>
                                                <hr>
                                            <?php endforeach ?>
                                            <?php if ($status['status_pembayaran']=="Menunggu Konfirmasi"): ?>
                                                <a href="index.php?halaman=terimapembayaran&id=<?= $status['id_pesanan'] ?>" class="btn btn-primary" onclick="return confirm('Apakah total pembayaran sudah sesuai ?')" style=' background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);'> <i class="fa fa-check"></i> Terima Pembayaran</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-times"></i>
                                                    Tolak Pemabayaran
                                                </button>
                                                <?php elseif ($status['status_pembayaran']=="Menunggu Konfirmasi Pelunasan"): ?>
                                                    <a href="index.php?halaman=terimapembayaran2&id=<?= $status['id_pesanan'] ?>" class="btn btn-primary" onclick="return confirm('Apakah total pembayaran sudah sesuai ?')" style=' background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);'><i class="fa fa-check"></i> Terima Pembayaran</a>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default"><i class="fa fa-times"></i>
                                                        Tolak Pemabayaran
                                                    </button> 
                                                <?php endif ?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                            <h3 class="modal-titl text-center">Tolak Pembayaran</h3>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="form-group">
                                                    <textarea name="alasan" class="form-control" placeholder="Mohon masukan alasan tolak pembayaran"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <center>
                                                        <button name="kirim" class="btn btn-primary" style=' background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);'> Submit</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </center>
                                                </div>
                                            </form>
                                            <?php  

                                            if (isset($_POST['kirim'])) 
                                            {
                                                $pesanan->tolakpembayaran($_POST['alasan'],$id_pesanan);
                                                echo "<script>alert('Pembayaran berhasil ditolak');</script>";
                                                echo "<script>location='index.php?halaman=pesanan';</script>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 240px;"></div>