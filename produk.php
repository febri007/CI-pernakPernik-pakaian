<?php 
$datakategori1 = $kategori1->tampil();
?>

<?php 
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$batas=8;
if (isset($_GET["page"]) AND !empty($_GET["page"])) 
{
	$posisi = ($_GET["page"]-1)*8;
}
else
{
	$posisi = 0;
	$_GET["page"]= 1;
}
$dataproduk= $produk->tampilprodukterbaru($posisi,$batas);
$terlaris = $produk->produkterlaris();
?>
<style>
	.gambarpro
	{

		height: 350px;
	}
	@media only screen and (min-width: 768px) {
		.gambarpro
		{
			width: 100%;
			height: 190px;
		}
	}
	.on { color:#FFC107; }
	.off { color:#E0E0E0; }
</style>
<div class="section">
	<div class="container">
		<div class="row">
			<div id="aside" class="col-md-3">
				<div class="aside">
					<h3 class="aside-title">Kategori</h3>
					<div class="checkbox-filter">
						<?php foreach ($datakategori1 as $key => $value): ?>
							<div class="input-checkbox">
								<i class="fa fa-chevron-right"></i>
								<label for="category-1">
									<span></span>
									<a href="produkkategori.php?id=<?php echo $value['id_kategori1']; ?>"><?= $value['kategori1']; ?></a>
								</label>
							</div>
						<?php endforeach ?>
					</div>
				</div>

				<div class="aside">
					<h3 class="aside-title">Terlaris</h3>
					<?php foreach ($terlaris as $key => $value): ?>
					
								<div class="product-widget">
									<div class="product-img">
										<img src="img_produk/<?php echo $value['gambar_produk'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $value['kategori1']; ?> 
									</p>
									<h3 class="product-name"><a href="#"><?php echo $value['nama_produk']; ?></a></h3>
									<h4 class="product-price">Rp. <?= $value['harga_produk']; ?></h4>
								</div>
							</div>
					<?php endforeach ?> 
				</div>
			</div>

			<div id="store" class="col-md-9">
				<div class="row">
					<?php foreach ($dataproduk as $key => $value): ?>
						<div class="col-md-3 col-xs-6">
							<div class="product">
								<div class="product-img">
									<a href="detail?id=<?= $value['id_produk']; ?>"><img class="gambarpro" src="admin/upload/img-produk/<?= $value['gambar_produk']; ?>" alt=""></a>
								</div>
								<div class="product-body">
									<p class="product-category"><?= $value['kategori1']; ?></p>
									<h3 class="product-name"><a href="detail?id=<?= $value['id_produk'] ?>"><?= $value['nama_produk']; ?></a></h3>
									<h4 class="product-price">Rp. <?= number_format($value['harga_produk']); ?></h4>
									<div class="product-rating">
									</div>
								</div>
								<div class="add-to-cart">
									<a href="detail?id=<?= $value['id_produk']; ?>" class="add-to-cart-btn"> Detail</a>
								</div>
							</div>
						</div>
						<?php  
						$nomor=$key+1;
						if (($key+1)%4==0) {
							echo "<div class='clearfix'></div>";
						}
						?>
					<?php endforeach ?>
				</div>
				<div class="store-filter clearfix">
					<ul class="store-pagination">
						<?php
						if($page == 1){ 
							?>
							<li><a class="disabled">First</a></li>
							<li><a class="disabled"><i class="fa fa-angle-double-left"></i></a></li>
							<?php
						}else{ 
							$link_prev = ($page > 1)? $page - 1 : 1;
							?>
							<li><a href="./?page=1">First</a></li>
							<li><a href="./?page=<?php echo $link_prev; ?>"><i class="fa fa-angle-double-left"></i></a></li>
							<?php
						}
						?>
						<?php 
						$banyakproduk=$produk->total_produk();
						$banyakpage=ceil($banyakproduk/$batas);
						$jumlah_number = 3;
						$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
						$end_number = ($page < ($banyakpage - $jumlah_number))? $page + $jumlah_number : $banyakpage;
						for($i = $start_number; $i <= $end_number; $i++){
							$link_active = ($page == $i)? ' class="active"' : '';
							?>
							<li<?php echo $link_active; ?>><a href="./?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
							<?php
						}
						?>
						<?php
						if($page == $banyakpage){
							?>
							<li><a class="disabled"><i class="fa fa-angle-double-right"></i></a></li>
							<li><a class="disabled">Last</li>
								<?php
                }else{ // Jika Bukan page terakhir
                	$link_next = ($page < $banyakpage)? $page + 1 : $banyakpage;
                	?>
                	<li><a href="./?page=<?php echo $link_next; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                	<li><a href="./?page=<?php echo $banyakpage; ?>">Last</a></li>
                	<?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
