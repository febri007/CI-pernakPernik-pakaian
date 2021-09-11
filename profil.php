<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel-body">
			<p style="font-size: 30px;" class="text-center atas"><img class="packing" width="60" src="img/icon-keranjang.svg" alt=""> Profil Saya </p>
			<p class="text-center">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
			<hr>
			<table class="table-striped table">
				<tr>
					<td width="17%"><b>Nama</b></td>
					<td width="5%"><b>:</td>
					<td><?php echo $datapelanggan['nama'] ?></td>
				</tr>
				<tr>
					<td><b>Email</b></td>
					<td><b>:</b></td>
					<td><?php echo $datapelanggan['email'] ?></td>
				</tr>
				<tr>
					<td><b>Nomor Telepon</b></td>
					<td><b>:</b></td>
					<td><?php echo $datapelanggan['telepon'] ?></td>
				</tr>
				<tr>
					<td><b>Alamat</b></td>
					<td><b>:</b></td>
					<td><?php echo $datapelanggan['alamat'] ?></td>
				</tr>
			</table>
			<div class="text-center baton">
				<a href="" class="btneditprofil btn btn-primary" style=" background: linear-gradient(to bottom, #E094A3 0%, #E094A3 100%); border-color: #E094A3;"> Edit Profil</a>
				<a href="" class="btnlupa btn btn-warning"> Ubah Password</a>
			</div>
		</div>
	</div>
</div>
