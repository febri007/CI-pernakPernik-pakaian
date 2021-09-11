<?php
include 'config/class.php';
$datakeranjang = $pesanan->tampil_keranjang();
$datakonfigurasi = $konfigurasi->ambil();
$dataongkir = $ongkir->tampil();
?>
<?php
if (!isset($_SESSION["pelanggan"])) {
	echo "<script>alert('Anda harus login!');</script>";
	echo "<script>location='login';</script>";
	exit();
} else {
	$datapelanggan = $_SESSION['pelanggan'];
}
?>
<?php
if (empty($_SESSION["keranjang"])) {
	echo "<script>alert('Anda belum melakukan pembelian!');</script>";
	echo "<script>location='product';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checkout - <?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet"
        type="text/css" />
    <link href="css/bootstrap-timepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css" />
</head>

<body>

    <?php include 'header.php'; ?>

    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details">
                        <table class="table table-striped">
                            <tbody>
                                <?php $totalbelanja = 0; ?>
                                <?php $jumlah = 0; ?>
                                <?php foreach ($datakeranjang as $key => $value) : ?>
                                <?php $totalbelanja += $value["subharga"] ?>
                                <?php $jumlah += $value["jumlah"] ?>
                                <tr>
                                    <td width="15%">
                                        <center><img width="80"
                                                src="admin/upload/img-menu/<?= $value['gambar_menu']; ?>" alt="">
                                        </center>
                                    </td>
                                    <td>
                                        <strong><?php echo $value["nama_menu"]; ?></strong>
                                    </td>
                                    <td><strong>Rp. <?php echo number_format($value["harga_menu"]); ?></strong></td>
                                    <td><?php echo $value["jumlah"]; ?>x Item </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama Lengkap</label>
                                        <input class="input" type="text" name="nama"
                                            value="<?= $datapelanggan['nama'] ?>" placeholder="Nama Lengkap"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Telepon</label>
                                        <input class="input" type="number" name="telp"
                                            value="<?= $datapelanggan['telepon'] ?>" placeholder="Telepon" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <textarea name="alamat" class="input" placeholder="Alamat lengkap" minlength="20"
                                    maxlength="200" required=""><?= $datapelanggan['alamat'] ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Keterangan</label>
                                        <select id="kategori" class="form-control" name="kategori" required="">
                                            <?php
											$query = mysqli_query($mysqli, "SELECT * FROM ongkirket ORDER BY id_ongkirket");
											while ($row = mysqli_fetch_array($query)) { ?>

                                            <option value="<?php echo $row['id_ongkirket']; ?>">
                                                <?php echo $row['keterangan']; ?>
                                            </option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Kabupaten</label>
                                        <select id="sub" class="form-control" name="sub" required="">
                                            <option value="">- Pilih Kabupaten -</option>
                                            <?php
											$query = mysqli_query($mysqli, "SELECT * FROM kabupaten INNER JOIN ongkirket ON ongkirket.id_ongkirket = kabupaten.id_ongkirket ORDER BY kabupaten");
											while ($row = mysqli_fetch_array($query)) { ?>

                                            <option id="sub" class="<?php echo $row['id_ongkirket']; ?>"
                                                value="<?php echo $row['id_kabupaten']; ?>">
                                                <?php echo $row['kabupaten']; ?>
                                            </option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" class="form-control"></select>
                                    </div>

                                </div>
                            </div><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tanggal Ambil / Antar</label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type='text' id="second" name="tanggal_aa" class="form-control"
                                                placeholder="YYYY-MM-DD" required="" />
                                            <span class="input-group-addon">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group clockpicker">
                                        <label for="">Jam Ambil / Antar</label>
                                        <div class="input-group clockpicker">
                                            <input type="time" class="form-control" name="jam_aa" required="">
                                            <span class="input-group-addon">
                                                <span class="fa fa-clock-o"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <input type="hidden" name="biaya_kategori">
                <input type="hidden" name="total_belanja" value="<?= $totalbelanja ?>">

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Ringkasan Belanja</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>PRODUK</strong></div>
                            <div><strong>SUBTOTAL</strong></div>
                        </div>
                        <div class="order-products">
                            <?php $total = 0; ?>
                            <?php foreach ($datakeranjang as $key => $value) : ?>
                            <?php
									$total += $value['subharga'];
									?>
                            <div class="order-col">
                                <div><?= $value['jumlah'] ?>x <?= $value['nama_menu'] ?></div>
                                <div>Rp. <?= number_format($value['subharga']) ?></div>
                            </div>
                            <?php endforeach ?>

                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL BELANJA</strong></div>
                            <div><strong class="order-total" style="font-size: 18px;">Rp.
                                    <?= number_format($totalbelanja) ?> </strong></div>
                        </div>
                        <hr>

                        <div class="order-col">
                            <div><strong>ONGKOS KIRIM</strong></div>
                            <div><strong id="total_ongkir">Rp. </strong></div>
                        </div>
                        <hr>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total" id="total_bayar" style="font-size: 18px;">Rp. </strong>
                            </div>
                        </div>
                    </div>
                    <button class="primary-btn order-submit btn-block" name="checkout">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    </form>

    <?php

		if (isset($_POST['checkout'])) 
		{
			$id_pesanan = $pesanan->checkout($_POST['nama'], $_POST['telp'], $_POST['alamat'], $_POST['kategori'], $_POST['tanggal_aa'], $_POST['jam_aa'], $_POST['biaya_kategori'], $_POST['total_belanja']);
			echo "<script>alert('Terima kasih telah melakukan checkout, anda akan kami alihkan ke halaman info pembayaran');</script>";
			echo "<script>location='pelanggan.php?page=pesanan';</script>";
		}
		?>
    <!-- <input type="hidden" id="first" value="<?php echo date('Y-m-d') ?>"> -->

    <!-- NEWSLETTER -->

    <!-- /NEWSLETTER -->
    <?php include 'whatsapp.php'; ?>
    <!-- FOOTER -->
    <?php include 'footer.php'; ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-chained.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/locale/nl.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-timepicker.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/tawkto.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var last7Days = new Date();
        last7Days.setDate(last7Days.getDate() + 2);
        $("#second").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            startDate: last7Days
        });

    });
    </script>
    <script>
    $(document).ready(function() {
        $("#sub").chained("#kategori");
    });
    $(document).ready(function() {
        var tot = $("input[name=total_belanja]").val();
        $("input[name=biaya_kategori]").val(0);
        $("#total_ongkir").html("Rp. " + 0);
        $("#total_bayar").html("Rp. " + tot);
    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("select[name=sub]").on("change", function() {
            // mendapatkan id_provinsi yg dipillih
            var id_kabupaten = $(this).val();
            // mendapatkan isi atribut nama, dari option yang dipilih
            $.ajax({
                url: 'datakecamatan.php',
                type: 'POST',
                data: 'idkab=' + id_kabupaten,
                success: function(hasil) {
                    $("select[name=kecamatan]").html(hasil);
                }
            });
        })
    })
    $(document).ready(function() {
        $("select[name=kecamatan]").on("change", function() {
            // mendapatkan isi dari atribut nama,biata,lama
            var biaya = $("option:selected", this).attr("biaya");

            $("input[name=biaya_kategori]").val(biaya);

            $("#total_ongkir").html("Rp. " + biaya);
            var total_belanja = $("input[name=total_belanja]").val();
            var biaya_kategori = $("input[name=biaya_kategori]").val();

            var total_bayar = parseInt(total_belanja) + parseInt(biaya)
            $("#total_bayar").html("Rp. " + total_bayar);

        })
    })
    </script>
    <!-- <script type="text/javascript">
	$(document).ready(function() {
		$(".btncheckout").on("click", function(e) {
			e.preventDefault();
			$("#modalcheckout").modal();
		})
	})
</script> -->
    <!-- <script>

	function datediff()
	{
		var x = document.getElementById("first");
		var f = x.value;
		var y = document.getElementById("second");
		var s = y.value;
		var newf = new Date(f);
		var news = new Date(s);

		return Math.round((news-newf)/(1000*60*60*24));

	}

	function myFunction()
	{
		var c = datediff();
		if (c <= 3)
		{
			$("#p").hide();
			$("#q").show();
			$("#3hari").show();
			document.getElementById("3hari").innerHTML = "<p class='text-center alert alert-danger' style='color:red;'><i class='fa fa-info-circle'></i> Mohon maaf, pesanan dengan tanggal diambil/diantar kurang dari 3 hari dari tanggal pemesanan, tidak bisa memilih tipe pembayaran DP!</p>";
		}
		else
		{
			$("#p").show();
			$("#q").hide();
			$("#3hari").hide();

		}
	}

</script> -->
</body>

</html>