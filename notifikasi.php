<?php  
$datapesanan = $pesanan->tampil_pesanan_pelanggan($id_pelanggan);

?>
<?php  
$sql = "UPDATE notifikasi SET status=1 WHERE status=0 AND id_pelanggan='$id_pelanggan'";
$r = mysqli_query($mysqli, $sql);
?>
<style>
.isinotifikasi {
    padding: 10px 10px 10px 10px;
}
</style>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size: 30px;" class="text-center atas"><img class="packing" width="40" src="img/bell.png"
                    alt=""> Notifikasi </p>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <?php if (empty($datapesanan)): ?>
                    <div class="tidakadapesanan">
                        <center>
                            <img width="150" src="img/tidakada.png" alt=""><br>
                            <p><strong>Tidak ada notifikasi</strong></p>
                        </center>
                    </div>
                    <?php else: ?>
                    <?php foreach ($datapesanan as $key => $value): ?>
                    <?php if ($value['status_pesanan']=="Belum Bayar"): ?>
                    <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
											$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
											?>
                            <p><strong>Pesanan Dibuat</strong> - Tanggal Transaksi :
                                <strong><?= tanggal_indo($tanggal, true); ?></strong>
                            </p>
                            <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>, Untuk menyelesaikan pesanan
                                Anda, silahkan lanjutnkan pembayaran dengan total Rp.
                                <?= number_format($value['total_pesanan']) ?></b></p>
                            <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                                Pesanan</a>
                            <!-- <a href="carapembayaran.php?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #54d44e; border-color: #54d44e; color: #fff;"> Cara Pembayaran</a> -->
                        </div>
                    </div>
                    <?php elseif ($value['status_pesanan']=="Menunggu Konfirmasi"): ?>
                    <!-- <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
												$id_pesanan = $value['id_pesanan'];
												$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
												$databayar = $pesanan->lihatbukti($id_pesanan);
												$datapesanan = $pesanan->ambil_pesanan($id_pesanan);
												$tglkonfirm = date('Y-m-d', strtotime($databayar['tanggal_konfirmasi']));
												?>
                            <p><strong>Pesanan Menunggu Konfirmasi</strong> - Tanggal Transaksi :
                                <strong><?= tanggal_indo($tanggal, true); ?></strong>
                            </p>
                            <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>, Tanggal Konfirmasi Pembayaran :
                                <strong><?= tanggal_indo($tglkonfirm, true); ?></strong>
                            </p>
                            <p>Terima kasih telah melakukan pembayaran DP sebesar <strong>Rp.
                                    <?= number_format($datapesanan['dp']) ?></strong>, Mohon menunggu pembanyaran Anda
                                akan kami konfirmasi paling lambat <strong>1x24 jam</strong>.</p>
                            <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                                Pesanan</a>
                        </div>
                    </div> -->
                    <?php elseif ($value['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                    <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
													$id_pesanan = $value['id_pesanan'];
													$tanggaldt = date('Y-m-d', strtotime($value['tgl_konfirmasi_pesanan']));
													?>
                            <div class="panel panel-default isi">
                                <div class="isinotifikasi">
                                    <?php  
															$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
															?>
                                    <p><strong>Pembayaran Pelunasan Ditolak</strong> - Tanggal Transaksi :
                                        <strong><?= tanggal_indo($tanggal, true); ?></strong>
                                    </p>
                                    <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong> Alasan pembayaran
                                        Pelunasan ditolak : <strong><?= $value['alasan_tolak'] ?></strong></p>
                                    <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                        style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan
                                        Rincian Pesanan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php elseif ($value['status_pesanan']=="Menunggu Konfirmasi Pelunasan"): ?>
                    <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
														$id_pesanan = $value['id_pesanan'];
														$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
														$databayar = $pesanan->lihatbukti($id_pesanan);
														$datapesanan = $pesanan->ambil_pesanan($id_pesanan);
														$tglkonfirm = date('Y-m-d', strtotime($databayar['tanggal_konfirmasi']));
														$databayar2 = $pesanan->lihatbukti2($id_pesanan);
														$tglkonfirm2 = date('Y-m-d', strtotime($databayar2[0]['tanggal_konfirmasi']));
														?>
                            <p><strong>Pesanan Menunggu Konfirmasi Pelunasan</strong> - Tanggal Transaksi :
                                <strong><?= tanggal_indo($tanggal, true); ?></strong>
                            </p>
                            <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>, Tanggal Konfirmasi Pembayaran
                                Pelusanan : <strong><?= tanggal_indo($tglkonfirm2, true); ?></strong></p>
                            <p>Terima kasih telah melakukan pembayaran Pelunasan sebesar <strong>Rp.
                                    <?= number_format($datapesanan['lunas']) ?></strong>, Mohon menunggu pembanyaran
                                pelunasan Anda akan kami konfirmasi paling lambat <strong>1x24 jam</strong>.</p>
                            <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                                Pesanan</a>
                        </div>
                    </div>
                    <?php elseif ($value['status_pesanan']=="Proses"): ?>
                    <?php  
													$id_pesanan = $value['id_pesanan'];
													$dataverifikasi = $pesanan->lihatbukti($id_pesanan);
													$tanggalv = date('Y-m-d', strtotime($dataverifikasi['tanggal_verifikasi']));
													?>
                    <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
															$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
															?>
                            <p><strong>Pesanan Sedang Diproses</strong> - Tanggal Transaksi :
                                <strong><?= tanggal_indo($tanggal, true); ?>, <?= $value['jam_pengiriman']; ?>
                                    WIB</strong>
                            </p>
                            <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>, - Pembayaran Diverifikasi pada
                                tanggal <strong><?= tanggal_indo($tanggalv, true); ?></strong></p>
                            <p>Pembayaran telah diterima dan pesanan anda sedang dalam proses.</p>
                            <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                                Pesanan</a>
                        </div>
                    </div>
                    <?php elseif ($value['status_pesanan']=="Menunggu Pelunasan"): ?>
                    <?php  
														$id_pesanan = $value['id_pesanan'];
														$tanggaldt = date('Y-m-d', strtotime($value['tgl_konfirmasi_pesanan']));
														?>
                    <div class="panel panel-default isi">
                        <div class="isinotifikasi">
                            <?php  
																$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
																?>
                            <p><strong>Pesanan Dibuat</strong> - Tanggal Transaksi :
                                <strong><?= tanggal_indo($tanggal, true); ?></strong>
                            </p>
                            <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>, Pesanan Anda akan kami proses,
                                Mohon lakukan pembayaran Pelunasan sebesar <b>Rp. <?= number_format($value['dp']) ?></b>
                                H-1 sebelum pesanan diambil/diantar untuk menghindari pembatalan secara otomatis.</p>
                            <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                                Pesanan</a>
                            <a href="carapembayaran.php?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                                style="background: #54d44e; border-color: #54d44e; color: #fff;"> Cara Pembayaran</a>
                        </div>
                    </div>
                </div>
                <?php elseif ($value['status_pesanan']=="Selesai"): ?>
                <?php  
														$id_pesanan = $value['id_pesanan'];
														$tanggaldt = date('Y-m-d', strtotime($value['tgl_konfirmasi_pesanan']));
														?>
                <div class="panel panel-default isi">
                    <div class="isinotifikasi">
                        <?php  
																$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
																?>
                        <p><strong>Pesanan Selesai</strong> - Tanggal Transaksi :
                            <strong><?= tanggal_indo($tanggal, true); ?></strong>
                        </p>
                        <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong>,
                            <strong><?= tanggal_indo($tanggaldt, true); ?></strong> - Pemesanan telah selesai.
                        </p>
                        <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                            style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                            Pesanan</a>
                    </div>
                </div>
                <?php elseif ($value['status_pesanan']=="Pembayaran Ditolak"): ?>
                <?php  
															$id_pesanan = $value['id_pesanan'];
															$tanggaldt = date('Y-m-d', strtotime($value['tgl_konfirmasi_pesanan']));
															?>
                <div class="panel panel-default isi">
                    <div class="isinotifikasi">
                        <?php  
																	$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
																	?>
                        <p><strong>Pembayaran Ditolak</strong> - Tanggal Transaksi :
                            <strong><?= tanggal_indo($tanggal, true); ?></strong>
                        </p>
                        <p>Pesanan <strong>#<?= $value['id_pesanan'] ?>PS</strong></p>
                        <p>Alasan pembayaran DP ditolak : <strong><?= $value['alasan_tolak'] ?></strong></p>
                        <a href="nota?id=<?= $value['id_pesanan']; ?>" class="btn btn-success btn-xs"
                            style="background: #fff; border-color: #54d44e; color: #202020;"> Tampilkan Rincian
                            Pesanan</a>
                    </div>
                </div>
                <?php endif ?>

                <?php endforeach ?>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>
</div>