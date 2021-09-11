<?php  
include 'config/class.php';
$id_pesanan = $_POST['idx'];
$id_pelanggan = $_POST['idp'];
$data = $pesanan->cek_penilaian($id_pesanan);
?>

<?php if ($data=="belumada"): ?>
    <form method="post">
        <div class="form-group">
            <input type="hidden" name="id_pesanan" value="<?php echo $id_pesanan; ?>" class="form-control">
        </div>
        <div class="form-group">
            <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="penilaian" class="form-control" placeholder="Mohon masukan penilaian untuk menu yang anda pesan :)"></textarea>
        </div><hr>
        <div class="text-center">
            <button class="btn btn-primary" name="kirimpenilaian" style="background: #40b149; border-color: #40b149;"><i class="fa fa-send"></i> Kirim</button>
            <button class="btn btn-danger" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i> Batal</button>
        </div>
    </form>
    <?php else: ?>
        <p class="alert alert-success">Terima kasih sudah menilai menu yang Anda pesan :)</p>
    <?php endif ?>
    


