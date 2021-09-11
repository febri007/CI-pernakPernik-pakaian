<?php 
include 'config/class.php'; 
$keyword=$_GET["k"];
$page = (isset($_GET['page']))? $_GET['page'] : 1;
$batas=18;
if (isset($_GET["page"]) AND !empty($_GET["page"])) 
{
    $posisi = ($_GET["page"]-1)*$batas;
}
else
{
    $posisi = 0;
    $_GET["page"]= 1;
}
$hasilcari=$menu->carimenu($keyword,$posisi,$batas);
$datakonfigurasi = $konfigurasi->ambil();
$dataprodukterbaru = $menu->menuterbaru();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $datakonfigurasi['nama_instansi'] ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="admin/upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <style>
        .gambarnew
        {
            width: 100%;
            height: 280px;
        }
        .breadcrumb
        {
            margin-top: 20px;
        }
        .panel-body
        {
            box-shadow: 0 4px 8px 0 rgba(0.2, 0.2, 0.2, 0.2);
            margin-top: 20px;
        }
        .gambar
        {
            width: 100%;
            height: 190px;
        }
        .page
        {
            margin-top: 20px;
        </style>
    </head>
    <body>

        <?php include 'header.php'; ?>

        <section class="page blogpage-right blog">
            <div class="container">
                <div class="row">
                    <div class="blogpage-inner clearfix">
                        <div class="col-md-12">
                        <!-- <div class="alert alert-dark" style="background: #E8E8E8;">
                            <h4 style="color: #202020;">Hasil Pencarian : <?php echo $keyword ?> </h4>
                        </div> -->
                        <?php if (empty($hasilcari)): ?>
                            <center>
                                <div class="page" >
                                    <div class="error404-page">
                                        <div class="error-page">
                                            <div class="container">
                                                <div class="amplebiz-errorpage">
                                                    <center><img width="80" src="img/tv.png" alt=""></center>
                                                    <em>Oops, produk tidak ditemukan :(</em>
                                                    <p>Hasil pencarian untuk "<?= $keyword;?>" tidak ditemukan</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </center>
                            <?php else: ?>
                                <div class="alert alert-info" style="background-color: #E8E8E8; border-color: #E8E8E8; color: #202020; font-size: 15px;"> Hasil Pencarian : <strong>"<?= $keyword; ?>"</strong></div>
                            <?php endif ?>
                            <?php foreach ($hasilcari as $key => $value): ?>
                                <div class="col-md-2 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <a href="detail?id=<?= $value['id_menu']; ?>"><img class="gambarpro" src="admin/upload/img-menu/<?= $value['gambar_menu']; ?>" alt=""></a>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category"><?= $value['nama_kategori']; ?></p>
                                            <h3 class="product-name"><a href="detail?id=<?= $value['id_menu'] ?>"><?= $value['nama_menu']; ?></a></h3>
                                            <h4 class="product-price">Rp. <?= number_format($value['harga_menu']); ?></h4>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="detail?id=<?= $value['id_menu']; ?>"  class="add-to-cart-btn-cari"><i class="fa fa-eye"></i> Detail</a>
                                        </div>
                                    </div>
                                </div>
                                <?php  
                                $nomor=$key+1;
                                if (($key+1)%6==0) {
                                    echo "<div class='clearfix'></div>";
                                }
                                ?>
                            <?php endforeach ?>
                        </div>
                        <?php if (empty($hasilcari)): ?>

                            <?php else: ?>
                                <div class="store-filter clearfix">
                                    <ul class="store-pagination">
                                        <?php
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                    ?>
                    <li><a class="disabled">First</a></li>
                    <li><a class="disabled"><i class="fa fa-angle-double-left"></i></a></li>
                    <?php
                }else{ // Jika page bukan page ke 1
                    $link_prev = ($page > 1)? $page - 1 : 1;
                    ?>
                    <li><a href="pencarian?k=<?= $keyword; ?>&page=1">First</a></li>
                    <li><a href="pencarian?k=<?= $keyword; ?>&page=<?php echo $link_prev; ?>"><i class="fa fa-angle-double-left"></i></a></li>
                    <?php
                }
                ?>
                <?php 
                $keyword=$_GET["k"];
                $total = $menu->semuamenucari($keyword);
                $banyakpage=ceil($total/$batas);
                $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                $end_number = ($page < ($banyakpage - $jumlah_number))? $page + $jumlah_number : $banyakpage;
                for($i = $start_number; $i <= $end_number; $i++){
                    $link_active = ($page == $i)? ' class="active"' : '';
                    ?>
                    <li<?php echo $link_active; ?>><a href="pencarian?k=<?= $keyword ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                }
                ?>
                
                <!-- LINK NEXT AND LAST -->
                <?php
                // Jika page sama dengan jumlah page, maka disable link NEXT nya
                // Artinya page tersebut adalah page terakhir 
                if($page == $banyakpage){ // Jika page terakhir
                    ?>
                    <li><a class="disabled"><i class="fa fa-angle-double-right"></i></a></li>
                    <li><a class="disabled">Last</li>
                        <?php
                }else{ // Jika Bukan page terakhir
                    $link_next = ($page < $banyakpage)? $page + 1 : $banyakpage;
                    ?>
                    <li><a href="pencarian?keyword=<?= $keyword; ?>&page=<?php echo $link_next; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                    <li><a href="pencarian?keyword=<?= $keyword; ?>&page=<?php echo $banyakpage; ?>">Last</a></li>
                    <?php
                }
                ?>
            </ul>
        </div> 
    <?php endif ?> 
</div>
</div>
</div>
</section>
<div class="container">
    <hr>
</div>
<?php include 'produkterbaru.php'; ?>

<?php include 'whatsapp.php'; ?>

<?php include 'footer.php'; ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/tawkto.js"></script>
</body>
</html>
