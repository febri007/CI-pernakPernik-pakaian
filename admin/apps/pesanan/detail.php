<?php  
$id_pesanan = $_GET['id'];
$data= $pesanan->detail_pesanan_admin($id_pesanan);
$detail= $pesanan->ambil_pesanan($id_pesanan);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-shopping-cart"></i> Detail Pesanan</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="index.php?halaman=home">Pesanan</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Detail Pesanan</span>
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
                          <div class="panel panel-default">
                            <section class="content">
                                <div class="container"><br>
                                    <div style="margin-top: 20px;"></div>
                                    <img style="margin-left: 500px;" src="../../img/anekanota.png" width="150" alt="">
                                    <hr>

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
                                        <div class="col-md-3 col-xs-3">
                                            <h5>Tgl. Ambil / Antar</h5>
                                            <?php  
                                            $tanggalpengiriman = date('Y-m-d', strtotime($detail['tanggal_pengiriman']));
                                            ?>
                                            <p>
                                                <strong><?= tanggal_indo($tanggalpengiriman, true); ?></strong>
                                            </p>
                                        </div>
                                        <div class="col-md-3 col-xs-3">
                                            <h5>Status</h5>
                                            <p>
                                                <?php if ($detail['status_pesanan']=="Belum Bayar"): ?>
                                                    <strong class="label label-danger"><?php echo $detail["status_pesanan"]; ?></strong>
                                                    <?php elseif ($detail['status_pesanan']=="Menunggu Konfirmasi"): ?>
                                                        <strong class="label label-warning"><?php echo $detail["status_pesanan"]; ?></strong>
                                                        <?php elseif ($detail['status_pesanan']=="Proses"): ?>
                                                            <strong class="label label-info"><?php echo $detail["status_pesanan"]; ?></strong>
                                                            <?php elseif ($detail['status_pesanan']=="Selesai"): ?>
                                                                <strong class="label label-success"><?php echo $detail["status_pesanan"]; ?></strong>
                                                                <?php elseif ($detail['status_pesanan']=="Pembayaran Ditolak"): ?>
                                                                    <strong class="label label-danger"><?php echo $detail["status_pesanan"]; ?></strong>
                                                                    <?php elseif ($detail['status_pesanan']=="Menunggu Pelunasan"): ?>
                                                                        <strong class="label label-danger">Menunggu Pelunasan</strong>
                                                                        <?php elseif ($detail['status_pesanan']=="Menunggu Konfirmasi Pelunasan"): ?>
                                                                            <strong class="label label-warning">Menunggu Konfirmasi</strong>
                                                                            <?php elseif ($detail['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                                                                                <strong class="label label-danger">Pembayaran Pelunasan Ditolak</strong>
                                                                            <?php endif ?>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-3 col-xs-3">
                                                                        <h4>Keterangan :  <?php if ($detail['keterangan']=="Diambil"): ?>
                                                                        <strong class="label label-primary"><?= $detail['keterangan'] ?></strong>
                                                                        <?php elseif ($detail['keterangan']=="Diantar"): ?>
                                                                           <strong class="label label-success"><?= $detail['keterangan'] ?></strong>
                                                                           <?php endif ?></h4>
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
                                                                    <div class="col-lg-11">
                                                                        <table class="table table-striped table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>No</th>
                                                                                    <th>Produk</th>
                                                                                    <th>Harga / pcs</th>
                                                                                    <th>Jumlah</th>
                                                                                    <th>Subharga</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <?php foreach ($data as $key => $value): ?>

                                                                                    <tr>
                                                                                     <td width="5%"><?= $key+1 ?></td>
                                                                                     <td><img width="60" src="../upload/img-menu/<?= $value['gambar_menu'] ?>" alt=""> <?= $value['nama_menu'] ?></td>
                                                                                     <td>Rp. <?= number_format($value['harga_menu']) ?></td>
                                                                                     <td><?= $value['jumlah_menu'] ?></td>
                                                                                     <td>Rp. <?= number_format($value['subharga_menu']) ?></td>
                                                                                 </tr>
                                                                             <?php endforeach ?>
                                                                         </tbody>
                                                                         <tfoot>
                                                                            <tr>
                                                                                <th colspan="4">Total Belanja</th>
                                                                                <th>Rp. <?php echo number_format($detail["total_belanja"]) ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="4">Total Ongkir</th>
                                                                                <th>Rp. <?php echo number_format($detail["total_ongkir"]); ?></th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th colspan="4">Total Bayar (Pesanan)</th>
                                                                                <th>Rp. <?php echo number_format($detail["total_pesanan"]); ?></th>
                                                                            </tr>
                                                                        </tfoot>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </section>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Static Table End -->
                </div>
            </div>
            <br><br><br><br>