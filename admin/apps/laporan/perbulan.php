<?php  
include '../../../config/class.php';
include '../../../config/fungsi.php';
date_default_timezone_set("Asia/Jakarta");
$bulan=$_GET['bulan'];
$tahun=$_GET['tahun'];
$data=$laporan->laporantransaksi($bulan,$tahun);
$konfigurasi = $konfigurasi->ambil();
$tgl= date("Y-m-d");
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>.:: Laporan Transaksi ::.</title>
  <style type="text/css">

    #judul {
     width:100%;
     margin-bottom:20px;
     text-align:center;
   }
   @media print{
    .no-print
    {
      display: none;
    }
  }

</style>
<link href="../css/style.default.css" rel="stylesheet" type="text/css" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
  <div id='contentwrapper' class='contentwrapper'>
    <div id="judul">
      <br />
      <br />
      <font size="+2">ROTI ANEKA</font><br />
      <font size="+2"><u>LAPORAN TRANSAKSI</u></font><br /><br />
      Menulis, Sumbersari, Kec. Moyudan, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55563<br />
      Hp.  0851-0048-3065 Email : rotianeka1@gmail.com Website : www.anekaroti.com

      <hr color="#eee" />   </div>
      <div class="container">
        <a href="#" class="no-print" onclick="window.print();"><button class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak/Print</button></a> <br><br>
        <table class="table table-striped table-bordered">
          <colgroup>
            <col class='con0' style='width: 4%' />
            <col class='con1' />
            <col class='con0' />
            <col class='con1' />
            <col class='con0' />
          </colgroup>
          <thead>
            <tr>
              <th><i class='icon-terminal'></i>No</th>
              <th><i class='icon-signal'></i> Tgl. Transaksi</th>
              <th><i class='icon-signal'></i> Pelanggan</th>
              <th><i class='icon-signal'></i> DP</th>
              <th><i class='icon-signal'></i> Lunas</th>
              <th><i class='icon-signal'></i> Status</th>
              <th><i class='icon-signal'></i> Subtotal</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($data)): ?>
              <tr>
                <td colspan="7"> <p class="text-center">Tidak ada data untuk ditampilkan pada bulan dan tahun yang anda pilih.</p></td>
              </tr>
              <?php else: ?>
               <?php 
               $totalsemua = 0;
               ?>
               <?php foreach ($data as $key => $value): ?>
                <?php 
                $totalsemua += $value['total_pesanan'];
                ?>
                <?php  
                $tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
                ?>
                <tr class='gradeX'>
                  <td><?= $value['id_pesanan'] ?></td>
                  <td><?= tanggal_indo($tanggal, true); ?></td>
                  <td><?= $value['nama_penerima'] ?></td>
                  <td>Rp. <?= number_format($value['dp']) ?></td>
                  <td>Rp. <?= number_format($value['lunas']) ?></td>
                  <td><?= $value['status_pesanan'] ?></td>
                  <td>Rp. <?= number_format($value['total_pesanan']) ?></td>
                </tr>
              <?php endforeach ?>
              <tfoot>
                <tr>
                  <th colspan="6">TOTAL</th>
                  <th>Rp. <?= number_format($totalsemua) ?></th>
                </tr>
              </tfoot>
            <?php endif ?>

          </tbody>
        </table>
        <table width="100%" >
          <tr>
            <td></td>
            <td width="200px">
              <p>Yogyakarta, <?php echo tanggal_indo(date("Y-m-d")); ?><br>
              Pemilik,</p>
              <br>
              <br>
              <br>
              <p><u><?= $konfigurasi['pemilik'] ?></u></p>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>   


</body>
</html>

