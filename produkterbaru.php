
<style>
.gambarnew
{
	width: 100%;
	height: 220px;
}
</style>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Menu terbaru</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1"></a></li>
							<li><a data-toggle="tab" href="#tab1"></a></li>
							<li><a data-toggle="tab" href="#tab1"></a></li>
							<li><a data-toggle="tab" href="#tab1"></a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php foreach ($dataprodukterbaru as $key => $value): ?>
									<div class="product">
										<div class="product-img">
											<a href="detail?id=<?= $value['id_menu']; ?>"><img class="gambarnew" src="admin/upload/img-menu/<?= $value['gambar_menu'] ?>" alt=""></a>
										</div>
										<div class="product-body">
											<p class="product-category"><?= $value['nama_kategori']; ?></p>
											<h3 class="product-name"><a href="detail?id=<?= $value['id_menu']; ?>"><?= $value['nama_menu']; ?></a></h3>
											<h4 class="product-price">Rp. <?= number_format($value['harga_menu']); ?> </h4>
											<div class="product-rating">	
											</div>
										</div>
										<div class="add-to-cart">
											<a href="detail?id=<?= $value['id_menu']; ?>"  class="add-to-cart-btn"> detail</a>
										</div>
									</div>
								<?php endforeach ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>