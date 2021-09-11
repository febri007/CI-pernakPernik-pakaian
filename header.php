<?php  
if (isset($_SESSION['pelanggan'])) 
{
	$id_pelanggan= $_SESSION["pelanggan"]["id_pelanggan"];
	$datapelanggan=$pelanggan->detail($id_pelanggan);
}
$datakeranjang = $pesanan->tampil_keranjang();
$data = $pesanan->totkeranjang();
?>
<style>
.navbar-nav>.user-menu .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px
}

.keranjangatas {
    margin-top: 50px;
    margin-bottom: 50px;
}

.cart-dropdown {
    box-shadow: 0 4px 8px 0 rgba(10, 40, 0.2, 0.2);
}
</style>
<header class="hidden-print">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="">Ikuti kami di</a> </li>
                <li><a href="https://api.whatsapp.com/send?phone=6281392536241&amp;text=Hallo%20admin,%20Saya%20ingin%20memesan%20catering.%20Bagaimana%20cara%20ordernya ?"
                        target="blank"><i class="fa fa-whatsapp"></i></a></li>
                <li><a href="https://www.instagram.com/roti_aneka1/" target="blank"><i class="fa fa-instagram"></i></a>
                </li>
                <li><a href="https://www.google.com/maps/place/Roti+Aneka+1/@-7.7883536,110.275747,19z/data=!3m1!4b1!4m5!3m4!1s0x0:0x2a403f1f5ffa491c!8m2!3d-7.7883536!4d110.2762942"
                        target="blank"><i class="fa fa-map-marker"></i></a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="hubungikami"><i class="fa fa-phone "></i> Hubungi Kami</a></li>
                <li><a href="bantuan"><i class="fa fa-question-circle-o "></i> Bantuan</a></li>
            </ul>
        </div>
    </div>
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="./" class="logo">
                            <img src="./img/anekanew.png" width="100" height="100" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="header-search">
                        <form method="get" action="pencarian">
                            <input class="input" placeholder="Cari menu di sini . . ." name="k" required="">
                            <button class="search-btn"> <i class="fa fa-search"> </i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-2 clearfix">
                    <div class="header-ctn">
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Keranjang</span>
                                <?php if (empty($data)): ?>
                                <?php else: ?>
                                <span class="qty"><?= $data ?>
                                </span>
                                <?php endif ?>
                            </a>
                            <div class="cart-dropdown">
                                <?php if (empty($datakeranjang)): ?>
                                <div class="keranjangatas">
                                    <center>
                                        <img width="80" src="<?= $base_url; ?>img/shopping.png" alt=""><br>
                                        <p>Belum ada pesanan</p>
                                    </center>
                                </div>
                                <?php else: ?>

                                <div class="cart-list">
                                    <?php $total=0; ?>
                                    <?php $jml=0; ?>
                                    <?php foreach ($datakeranjang as $key => $value): ?>
                                    <?php $total+=$value['subharga']; ?>
                                    <?php $jml+=$value['jumlah']; ?>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="admin/upload/img-menu/<?= $value['gambar_menu'] ?>" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#"><?= $value['nama_menu'] ?></a></h3>
                                            <h4 class="product-price"><span
                                                    class="qty"><?php echo $value['jumlah']; ?>x</span>Rp.
                                                <?= number_format($value['harga_menu']); ?></h4>
                                        </div>
                                        <a href="<?php echo $base_url; ?>hapuskeranjang.php?id=<?php echo $value['id_menu']; ?>"
                                            class="delete"><i class="fa fa-close"></i></a>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                                <div class="cart-summary">
                                    <small><small><?= $jml; ?> (Item)</small></small>
                                    <h5>SUBTOTAL: Rp. <?php echo number_format($total) ?></h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="keranjang">View Cart <i class="fa fa-shopping-cart"></i></a>
                                    <a href="checkout">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav id="navigation" class="hidden-print">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li><a href="<?php echo $base_url; ?>">Beranda</a></li>
                <li><a href="<?php echo $base_url; ?>menu">Menu</a></li>
                <li><a href="<?php echo $base_url; ?>daftarharga">Daftar Harga</a></li>
                <li><a href="<?php echo $base_url; ?>testimoni">Testimoni</a></li>
                <li><a href="<?php echo $base_url; ?>tentang">Tentang</a></li>
            </ul>
            <ul class="main-nav nav navbar-nav navbar-right" style="margin-right: 3px;">
                <?php if (isset($_SESSION['pelanggan'])): ?>
                <li class="dropdown user user-menu" style=" z-index: 10;"><a href="" class="not-active">
                        <?php if(empty($datapelanggan['foto'])): ?>
                        <img src="img/user.png" class="user-image" alt="User Image">
                        <?php else: ?>
                        <img src="img-pelanggan/<?php echo $datapelanggan["foto"]; ?>" class="user-image"
                            alt="User Image">
                        <?php endif ?>
                        <?php echo $datapelanggan["nama"]; ?></a>
                    <ul class="dropdown-content">
                        <li><a href="<?php echo $base_url; ?>pelanggan"> Akun Saya</a></li>
                        <li><a href="<?php echo $base_url; ?>pelanggan.php?page=pesanan"> Pesanan Saya</a></li>
                        <li><a href="<?php echo $base_url; ?>logout" style="color: #DD8C9B;"><i
                                    class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
                <?php endif ?>
                <?php if (!isset($_SESSION['pelanggan'])): ?>
                <li><a href="<?php echo $base_url; ?>login"><i class="fa fa-sign-in"></i> Masuk</a></li>
                <li><a href="<?php echo $base_url; ?>daftar"><i class="fa fa-user-plus"></i> Daftar</a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>