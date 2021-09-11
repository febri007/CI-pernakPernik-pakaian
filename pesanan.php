<?php  
 require_once(dirname(__FILE__) . '/payprocess/Midtrans.php');

 //Set Your server key
 \Midtrans\Config::$serverKey = "Mid-server-JbhP2qj8a_btWPDEQb5Xylnu";

 // Uncomment for production environment
 // \Midtrans\Config::$isProduction = true;

 \Midtrans\Config::$isSanitized = true;
 \Midtrans\Config::$is3ds = true;


$datapesanan = $pesanan->tampil_pesanan_pelanggan($id_pelanggan);
?>

<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size: 30px;" class="text-center atas"><img class="packing" width="60" src="img/icon-user.svg"
                    alt=""> Pesanan Saya </p>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Transaksi</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datapesanan as $key => $value): ?>
                            <?php  
								$tanggal = date('Y-m-d', strtotime($value['tanggal_pesanan']));
								?>
                            <tr>
                                <td><?= $key+1 ?></td>
                                <td><?= tanggal_indo($tanggal, true); ?></td>



                                <td>
                                    <?php 
									 $statuspayment = \Midtrans\Transaction::status($value['id_pesanan'] );
									 if($statuspayment -> status_code != "404"){
										 if ($statuspayment->transaction_status == "pending") {
											$pesanan->updatestatuspayment($value['id_pesanan'] , "Pending");
                                            $pesanan->updatestatuskeperluan($value['id_pesanan'] , "");
											?> <span class="label label-warning"> Pending </span><?php
										 }elseif ($statuspayment->transaction_status == "settlement") {
											?> <span class="label label-success"> Dibayar </span><?php
											$pesanan->updatestatuspayment($value['id_pesanan'] , "Dibayar");
                                            $pesanan->updatestatuskeperluan($value['id_pesanan'] , "Pelunasan");
										 }else {
											?> <span class="label label-danger"> Pembayaran Kadaluarsa </span><?php
											$pesanan->updatestatuspayment($value['id_pesanan'] , "Kadaluarsa");
                                            $pesanan->updatestatuskeperluan($value['id_pesanan'] , "");
										 }
										 
                                    }else {
										?> <span class="label label-danger"> Belum Bayar </span><?php
									}
                                    ?>





                                </td>
                                <td>Rp. <?= number_format($value['total_pesanan']) ?></td>
                                <td>
                                    <a href="nota.php?id=<?= $value['id_pesanan'] ?>" class="btn btn-primary btn-sm"><i
                                            class="fa fa-file-text"></i> Nota</a>

                                    <?php 
											 $statuspayment = \Midtrans\Transaction::status($value['id_pesanan'] );
											 if($statuspayment -> status_code != "404"){
												 if ($statuspayment->transaction_status == "pending") {
													 if ($statuspayment->payment_type == "gopay") {
														 $qrcode = "https://api.veritrans.co.id/v2/gopay/".$statuspayment->transaction_id."/qr-code";
														 ?>
                                    <a type="button" class="btn btn-warning btn-md" class="btn btn-info btn-md"
                                        href="qrisscan.php?qris=<?= $qrcode ?>" data-target="#tampilqr"
                                        onclick="">Tampilkan
                                        QR</a>
                                    <?php
													 }else {
														 
														 ?> <a target="_blank" class="btn btn-info btn-md"
                                        href="https://app.midtrans.com/snap/v1/transactions/<?=$value['snaptoken']?>/pdf">Cara
                                        Pembayaran</a><?php
												}
													
												 }elseif ($statuspayment->transaction_status == "settlement") {
													?><?php
												 }else {
													?><?php
												 }
												 
											}else {
												?> <button id="bayar" class="btn btn-info btn-md"
                                        onclick="bayar('<?= $value['id_pesanan'] ?>')">Bayar</button><?php
											}
											?>
                                    <?php if ($value['status_pesanan']=="dibayar" && $value['status_pesanan']=="diterima"): ?>
                                    <a href='#penilaian' class='btn btn-warning btn-sm' data-toggle='modal'
                                        data-id="<?= $value['id_pesanan'] ?>" data-idpelanggan="<?= $id_pelanggan ?>"
                                        style="background-color: #f7ae09; border-color: #f7ae09;"><i
                                            class="fa fa-star"></i> Penilaian</a>

                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="penilaian" role="dialog">
    <div class="modal-dialog" style="margin-top: 120px;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-cubes"></i> Penilaian Pesanan</h4>
            </div>
            <div class="modal-body">

                <div class="hasil-data"></div>
                <?php 
													if (isset($_POST['kirimpenilaian'])) {
														$pesanan->penilaian($_POST['id_pesanan'],$_POST['id_pelanggan'],$_POST['penilaian']);
														echo "<script>alert('Penilaian berhasil di kirim, terima kasih telah memesan catering di toko kami!');</script>";
														echo "<script>location='pelanggan?page=pesanan';</script>"; 
													}
													?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal hide" id="addBookDialog">
    <div class="modal-header">
        <button class="close" data-dismiss="modal">×</button>
        <h3>Modal header</h3>
    </div>
    <div class="modal-body">
        <p>some content</p>
        <input type="text" name="bookId" id="bookId" value="" />
    </div>
</div>

<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-JrxuPhkjvs8NUiA8"></script>
<script type="text/javascript">
var payButton = document.getElementById('bayar');
console.log($snapToken['snap_token']);


function bayar(_order_id) {
    $.ajax({
        url: 'payprocess/fetch.php',
        data: {
            order_id: _order_id,

        },
        type: 'POST',
        dataType: 'json',
        success: (result) => {
            snap.pay(result.snap_token, {
                onSuccess: function(result) {
                    alert("Pembayaran Berhasil!");
                    location.reload();
                },
                onPending: function(result) {
                    alert("Silahkan Selesaikan Pembayaran!");
                    location.reload();
                },
                onError: function(result) {
                    alert("Pembayaran Gagal!");
                    location.reload();
                },
            }); // store your snap token here
        },
        error: (error) => {
            console.error(error.responseText);
        }

    });
}
// payButton.addEventListener('click', function () {
//   $.ajax({
//     url : 'backend_checkout.php',
//     data : $('#form_input').serialize(),
//     type : 'POST',
//     dataType : 'json',
//     success : (result)=>{
//       console.log(result);
//       snap.pay(result); // store your snap token here
//     },
//     error : (error)=>{
//       console.error(error);
//     }

//   });



// });

$(document).on("click", ".open-AddBookDialog", function() {
    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val(myBookId);
    // As pointed out in comments, 
    // it is unnecessary to have to manually call the modal.
    // $('#addBookDialog').modal('show');
});
</script>