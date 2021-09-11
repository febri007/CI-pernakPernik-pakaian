<?php  

include 'config/class.php';
$datkec=$ongkir->update_kecamatan($_POST['idkab']);

?>
<option value="">Pilih Kecamatan</option>
<?php foreach ($datkec as $key => $value): ?>
	<option value="<?php echo $value['id_ongkir'] ?>" nama="<?php echo $value['kecamatan'] ?>" biaya="<?php echo $value['ongkos_kirim'] ?>">
		<?php echo $value['kecamatan']; ?>
	</option>
	<?php endforeach ?>