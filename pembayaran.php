    <?php  
    $id_pesanan = $_GET['id'];
    $detail=$pesanan->ambil_pesanan($id_pesanan);
    $pembayaran=$pesanan->tampil_pembayaran($id_pesanan);
    ?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
              <p style="font-size: 30px;" class="text-center atas"><img class="packing" width="60" src="img/konfirmasi.png" alt=""> Pembayaran </p>
              <a href="pelanggan?page=pesanan" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Riwayat Pesanan</a>
              <hr>

              <?php if ($detail['status_pesanan']=="Belum Bayar"): ?>
               <p class="text-center alert alert-success">Jumlah DP yang harus Anda bayar adalah <strong>Rp. <?= number_format($detail['dp']) ?> </strong></p> 
               <hr>
               <?php elseif ($detail['status_pesanan']=="Menunggu Konfirmasi"): ?>
                <p class="text-center alert alert-info">Terima kasih telah melakukan pembayaran DP sebesar <strong>Rp. <?= number_format($detail['dp']) ?></strong>. Mohon menunggu, kami sedang memproses pembayaran Anda paling lambat 1x24 Jam.</p>
                <hr>
                <?php elseif ($detail['status_pesanan']=="Pelunasan"): ?>
                    <p class="text-center alert alert-info"> Jumlah Pelunasan yang harus Anda bayar sebesar <strong>Rp. <?= number_format($detail['lunas']) ?></strong></p>
                    <hr>
                    <?php elseif ($detail['status_pesanan']=="Menunggu Konfirmasi Pelunasan"): ?>
                        <p class=" text-center alert alert-info">Terima kasih telah melakukan pembayaran Pelunasan sebesar <strong>Rp. <?= number_format($detail['lunas']) ?></strong>. Mohon menunggu, kami sedang memproses pembayaran Anda paling lambat 1x24 Jam.</p>
                        <hr>
                        <?php elseif ($detail['status_pesanan']=="Proses"): ?>
                            <p class="text-center alert alert-success">Semua pembayaran telah diterima dan pesanan sedang dalam proses, kami akan menginfokan jika pesanan sudah selesai.</p>
                            <hr>
                            <?php elseif ($detail['status_pesanan']=="Pembayaran Ditolak"): ?>
                                <p class="text-center alert alert-danger">Mohon maaf pembayaran DP Anda kami tolak dengan alasan : <strong><?php echo $detail['alasan_tolak'] ?></strong></p>
                                <hr>
                                <?php elseif ($detail['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                                    <p class="text-center alert alert-info">Mohon maaf pembayaran Pelunasan Anda kami tolak dengan alasan : <strong><?php echo $detail['alasan_tolak'] ?></strong></p>
                                    <hr>
                                <?php endif ?>
                                <?php if ($detail['status_pesanan']=="Belum Bayar"): ?>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Atas Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $datapelanggan['nama'] ?>" placeholder="Atas Nama" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>BANK</label>
                                                    <select name="bank" id="" class="form-control" required="">
                                                        <option value="">-- Pilih Bank --</option>
                                                        <option value="Bank Mandiri">Bank Mandiri</option>
                                                        <option value="Bank Negara Indonesia">Bank Negara Indonesia</option>
                                                        <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>
                                                        <option value="Bank Tabungan Negara">Bank Tabungan Negara</option>
                                                        <option value="Bank Central Asia">Bank Central Asia</option>
                                                        <option value="Bank Bukopin">Bank Bukopin</option>
                                                        <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                                        <option value="Lain-Lain">Lain-Lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                             <div class="form-group">
                                                <label>Tanggal Pembayaran</label>
                                                <input type="date" class="form-control" name="tanggal" value="<?php echo date('Y-m-d') ?>" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah (Rp).</label>
                                                <input type="number" class="form-control" name="jumlah" value="<?php echo $detail['dp'] ?>" readonly="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bukti Pembayaran</label>
                                                <input type="file" class="form-control" name="file" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary" name="kirim"><i class="fa fa-send"></i> kirim</button>
                                    </div>
                                </form>
                                <?php 
                                if (isset($_POST['kirim'])) 
                                {
                                    $hasil=$pesanan->kirim_pembayaran($_POST['nama'],$_POST['bank'],$_POST["tanggal"],$_POST["jumlah"],$_FILES['file'],$id_pesanan,$id_pelanggan);
                                    if ($hasil=="sukses") 
                                    {
                                        echo "<script>alert('Terima kasih telah melakukan pembayaran, barang akan kami kirim setelah kmi menerima pembayaran anda');</script>";
                                        echo "<script>location='pelanggan.php?page=pesanan';</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('Gagal, bukti harus JPG dan maksimal 2MB');</script>";
                                        echo "<script>location='pelanggan.php?page=pembayaran&id=id=".$id_pesanan."';</script>";
                                    }
                                }
                                ?> 
                                   <!--  <?php 
                                    if (isset($_POST['kirim'])) 
                                    {
                                        $hasil=$pesanan->kirim_pembayaran($_POST['nama'],$_POST['bank'],$_POST["jumlah"],$id_pesanan,$id_pelanggan);
                                        if ($hasil=="sukses") 
                                        {
                                            echo "<script>alert('Terima kasih telah melakukan pembayaran, barang akan kami kirim setelah kmi menerima pembayaran anda');</script>";
                                            echo "<script>location='pelanggan.php?page=pesanan';</script>";
                                        }
                                        else
                                        {
                                            echo "<script>alert('Gagal, bukti harus JPG dan maksimal 2MB');</script>";
                                            echo "<script>location='pelanggan.php?page=pembayaran&id=id=".$id_pesanan."';</script>";
                                        }
                                    }
                                    ?> -->
                                    <?php else: ?>
                                        <?php foreach ($pembayaran as $key => $value): ?>
                                            <div class="row">
                                                <div class="col-md-12"><br>
                                                    <table class="table">
                                                      <tr>
                                                        <td width="20%">ID Pesanan</td>
                                                        <th>:</th>
                                                        <th>#<?php echo $value["id_pesanan"]; ?>PS</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Keperluan</td>
                                                        <th>:</th>
                                                        <th><?php echo $value['keperluan']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <th>:</th>
                                                        <th><?php echo $value['atas_nama']; ?></th>
                                                    </tr>
                                                    <tr>
                                                        <td>Bank</td>
                                                        <th>:</th>
                                                        <th><?php echo $value["bank"]; ?></th>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td>Tanggal Bayar</td>
                                                        <th>:</th>
                                                        <th><?php echo tanggal_indo($value["tanggal_bayar"]); ?></th>
                                                    </tr> -->
                                                    <tr>
                                                        <td>Jumlah Pelunasan</td>
                                                        <th>:</th>
                                                        <th>Rp. <?php echo number_format($value['jumlah']); ?></th>
                                                    </tr>
                                                </table>    
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <?php if ($detail['status_pesanan']=="Pembayaran Ditolak"): ?>
                                    <hr>
                                    <center><h4><u>Pembayaran Ulang</u></h4></center>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Atas Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $datapelanggan['nama'] ?>" placeholder="Atas Nama" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>BANK</label>
                                                    <select name="bank" id="" class="form-control" required="">
                                                        <option value="">-- Pilih Bank --</option>
                                                        <option value="Bank Mandiri">Bank Mandiri</option>
                                                        <option value="Bank Negara Indonesia">Bank Negara Indonesia</option>
                                                        <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>
                                                        <option value="Bank Tabungan Negara">Bank Tabungan Negara</option>
                                                        <option value="Bank Central Asia">Bank Central Asia</option>
                                                        <option value="Bank Bukopin">Bank Bukopin</option>
                                                        <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                                        <option value="Lain-Lain">Lain-Lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Jumlah (Rp).</label>
                                                    <input type="number" class="form-control" name="jumlah" value="<?php echo $detail['dp'] ?>" readonly="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary" name="kirimpelunasan"><i class="fa fa-send"></i> kirim</button>
                                        </div>
                                    </form>
                                    <?php 
                                    if (isset($_POST['kirimpelunasan'])) 
                                    {

                                        $pesanan->kirim_pembayaran2($_POST['nama'],$_POST['bank'],$_POST["jumlah"], $id_pesanan,$id_pelanggan);
                                        echo "<script>alert('Terima kasih telah melakukan pembayaran, Mohon menunggu secepatnya kami akan mengonfirmasi pembayaran pelunasan pesanan Anda!');</script>";
                                        echo "<script>location='pelanggan.php?page=pesanan';</script>";
                                    }
                                    ?>
                                <?php endif ?>
                                <?php if ($detail['status_pesanan']=="Pembayaran Pelunasan Ditolak"): ?>
                                    <hr>
                                    <center><h4><u>Pembayaran Ulang Pelunasan</u></h4></center>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Atas Nama</label>
                                                    <input type="text" class="form-control" name="nama" value="<?php echo $datapelanggan['nama'] ?>" placeholder="Atas Nama" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>BANK</label>
                                                    <select name="bank" id="" class="form-control" required="">
                                                        <option value="">-- Pilih Bank --</option>
                                                        <option value="Bank Mandiri">Bank Mandiri</option>
                                                        <option value="Bank Negara Indonesia">Bank Negara Indonesia</option>
                                                        <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>
                                                        <option value="Bank Tabungan Negara">Bank Tabungan Negara</option>
                                                        <option value="Bank Central Asia">Bank Central Asia</option>
                                                        <option value="Bank Bukopin">Bank Bukopin</option>
                                                        <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                                        <option value="Lain-Lain">Lain-Lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                              <?php  
                                              $first = date('Y-m-d');
                                              $deadline_lunas = date('Y-m-d', strtotime($detail['deadline_lunas']));
                                              ?>
                                              <div class="form-group">
                                                <label>Tanggal Pembayaran</label>
                                                <input type="text" class="form-control" id="first" name="tanggal" value="<?= $first ?>" required="">

                                                <input type="hidden" class="form-control" id="second" name="tanggal" value="<?= $deadline_lunas ?>" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah (Rp).</label>
                                                <input type="number" class="form-control" name="jumlah" value="<?php echo $detail['lunas'] ?>" readonly="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-primary" name="kirimpelunasan"><i class="fa fa-send"></i> kirim</button>
                                    </div>
                                </form>
                                <?php 
                                if (isset($_POST['kirimpelunasan'])) 
                                {

                                    $pesanan->kirim_pembayaran_ulang_pelunasan($_POST['nama'],$_POST['bank'],$_POST["tanggal"],$_POST["jumlah"], $id_pesanan,$id_pelanggan);
                                    echo "<script>alert('Terima kasih telah melakukan pembayaran, Mohon menunggu secepatnya kami akan mengonfirmasi pembayaran pelunasan pesanan Anda!');</script>";
                                    echo "<script>location='pelanggan.php?page=pesanan';</script>";
                                }
                                ?>
                            <?php endif ?>
                            <?php if ($detail['status_pesanan']=="Menunggu Pelunasan"): ?>
                                <hr>
                                <center><h4><u>Pembayaran Pelunasan</u></h4></center>
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Atas Nama</label>
                                                <input type="text" class="form-control" name="nama" value="<?php echo $datapelanggan['nama'] ?>" placeholder="Atas Nama" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>BANK</label>
                                                <select name="bank" id="" class="form-control" required="">
                                                    <option value="">-- Pilih Bank --</option>
                                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                                    <option value="Bank Negara Indonesia">Bank Negara Indonesia</option>
                                                    <option value="Bank Rakyat Indonesia">Bank Rakyat Indonesia</option>
                                                    <option value="Bank Tabungan Negara">Bank Tabungan Negara</option>
                                                    <option value="Bank Central Asia">Bank Central Asia</option>
                                                    <option value="Bank Bukopin">Bank Bukopin</option>
                                                    <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                                    <option value="Lain-Lain">Lain-Lain</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <?php  
                                            $first = date('Y-m-d');
                                            $deadline_lunas = date('Y-m-d', strtotime($detail['deadline_lunas']));
                                            ?>
                                            <div class="form-group">
                                                <label>Tanggal Pembayaran</label>
                                                <input type="text" class="form-control" id="first" name="tanggal" value="<?= $first ?>" required="">

                                                <input type="hidden" class="form-control" id="second" name="tanggal" value="<?= $deadline_lunas ?>" required="">
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah (Rp).</label>
                                                <input type="number" class="form-control" name="jumlah" value="<?php echo $detail['lunas'] ?>" readonly="">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bukti Pembayaran</label>
                                                <input type="file" class="form-control" name="file" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button class="btn btn-primary" name="kirimpelunasan"><i class="fa fa-send"></i> kirim</button>
                                    </div>
                                </form>
                                <?php 
                                if (isset($_POST['kirimpelunasan'])) 
                                {
                                    $pesanan->kirim_pembayaran_pelunasan($_POST['nama'],$_POST['bank'],$_POST["tanggal"],$_POST["jumlah"],$_FILES['file'],$id_pesanan,$id_pelanggan);
                                    echo "<script>alert('Terima kasih telah melakukan pembayaran pelunasan, Mohon menunggu secepatnya kami akan mengonfirmasi pembayaran pesanan Anda!');</script>";
                                    echo "<script>location='pelanggan.php?page=pesanan';</script>";
                                }
                                ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>