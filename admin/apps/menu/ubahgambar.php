<?php  
$id_gambar = $_GET['id'];
$id_menu = $_GET['id_menu'];
$detail = $menu->detailgambar2($id_gambar);
print_r($detail);
?>
<div class="breadcome-area mg-b-30 small-dn">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcome-list shadow-reset">
					<div class="row">
						<div class="col-lg-6">
							<div class="breadcome-heading">
								<h1>Ubah Gambar</h1>
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="breadcome-menu">
								<li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
								</li>
								<li><span class="bread-blod">Ubah Gambar</span>
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

<div class="col-lg-12">
	<a href="index.php?halaman=menu" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div><br><br><br>
<!-- Breadcome End-->
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline13-list shadow-reset">

					<div class="sparkline13-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="row">
									<di class="col-md-6">
										<div class="form-group">
											<label for="">Judul Gambar</label>
											<input type="text" class="form-control" name="judul" value="<?= $detail['judul_gambar'] ?>" placeholder="Judul Gambar" required="">
										</div>
									</di>
									<di class="col-md-6">
										<div class="form-group">
											<div class="row">
												<div class="col-md-3">
													<img width="80" src="../upload/img-menu/<?= $detail['gambar'] ?>" alt="">
												</div>
												<div class="col-md-9">
													<label for="">Unggah Gambar</label>
													<input type="file" class="form-control" name="gambar">
												</div>
											</div>
											
										</div>
									</di>
								</div>
								<button class="btn btn-primary" name="simpan"><i class="fa fa-edit"></i> Ubah</button>
							</form>
							<?php  
							if (isset($_POST['simpan'])) 
							{
								$menu->ubahgambar($_POST['judul'],$_FILES['gambar'],$id_gambar);
								echo "<script>alert('Gambar menu berhasil disimpan!');</script>";
								echo "<script>location='index.php?halaman=gambarmenu&id=".$id_menu."';</script>";
							}
							?>
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
<br><br><br>
<br><br><br><br>