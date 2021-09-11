<?php  
$datakategori = $kategori->tampilfooter();
?>
<div id="newsletter" class="section hidden-print">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="newsletter">
					<ul class="newsletter-follow">
						<li><a href="https://api.whatsapp.com/send?phone=6281392536241&amp;text=Hallo%20admin,%20Saya%20ingin%20memesan.%20Bagaimana%20cara%20ordernya ?" target="blank"><i class="fa fa-whatsapp"></i></a></li>
						<li><a href="https://www.instagram.com/roti_aneka1/" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942" target="_blank"><i class="fa fa-map-marker"></i></a></li>
						<!-- <li>
							<a href="#"><i class="fa fa-twitter"></i></a>
						</li> -->
						<!-- <li>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</li> -->
						<!-- <li>
							<a href="#"><i class="fa fa-youtube"></i></a>
						</li> -->
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<footer id="footer" class="hidden-print">
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Roti Aneka</h3>
						<ul class="footer-links">
							<li><p align="justify" style="color: #9fa6b0;">Roti Aneka Jogja melayani dengan sepenuh hati, berkualitas tinggi dan bercitarasa prima dengan tampilan yang lebih eksklusif dan lebih terpercaya dalam memberikan jamuan bagi tamu-tamu penting Anda. Beragam menu nusantara dan dunia menjadikan Roti Aneka menjadi pilihan yang tepat untuk semua acara. </p></li>
							<li><a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942" target="_blank"><i class="fa fa-map-marker"></i>Yogyakarta</a></li>
							<li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=anekaroti1@gmail.com" target="_blank"><i class="fa fa-envelope-o"></i> anekaroti1@gmail.com</a></li>
							<li><a href="https://api.whatsapp.com/send?phone=6281392536241&amp;text=Hallo%20admin,%20Saya%20ingin%20memesan.%20Bagaimana%20cara%20ordernya ?" target="_blank"><i class="fa fa-whatsapp"></i> 0813-9253-6241</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-2 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Kategori Menu</h3>
						<ul class="footer-links">
							<?php foreach ($datakategori as $key => $value): ?>
								<li><a href="paketmenu?id=<?= $value['id_kategori']; ?>"><?= $value['nama_kategori'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</div>
				</div>
				<div class="clearfix visible-xs"></div>
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">LOKASI KAMI</h3>
						<a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942" target="_blank" class="btn btn-success btn-block" style=" background: linear-gradient(to bottom, #DF91A0 0%, #DF91A0 100%); border-color: #DF91A0;"><i class="fa fa-map-marker"></i> Klik Disini</a><br>
						<a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942" target="_blank"><img  src="img/mapsaneka.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="bottom-footer" class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<span class="copyright">
						Copyright Roti Aneka &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved 
					</span>
				</div>
			</div>
		</div>
	</div>
</footer>