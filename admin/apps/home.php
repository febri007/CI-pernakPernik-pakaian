<?php  
$data = $konfigurasi->ambil();
$totadmin = $admin->totadmin();
$totpelanggan = $pelanggan->totpelanggan();
$totpesanan = $pesanan->totpesanan();
$totpesananterbaru = $pesanan->totpesananterbaru();
?>
<div class="breadcome-area mg-b-30 des-none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list map-mg-t-40-gl shadow-reset">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcome-heading">
                                <h1>Home</h1>
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
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1>Beranda</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><i class="fa fa-home"></i> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Beranda</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="author-progress-pro-area mg-t-30 mg-b-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="single-skill shadow-reset" style="background-color: #28ABE3;">
                    <div class="row">
                        <div class="col-lg-5">
                           <i class="fa fa-users fa-5x" style="margin-top: 8px; color: #fff;"></i>
                       </div>
                       <div class="col-lg-7">
                        <div class="progress-circular1">
                            <h2><?=  $totpelanggan ?></h2>
                            <p>Pelanggan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="single-skill widget-ov-mg-t-30 shadow-reset" style="background-color: #72BF48;">
                <div class="row">
                    <div class="col-lg-5">
                        <i class="fa fa-user fa-5x" style="margin-top: 8px; color: #fff;"></i>
                    </div>
                    <div class="col-lg-7">
                        <div class="progress-circular2">
                            <h2><?= $totadmin ?></h2>
                            <p>Pengguna</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="single-skill widget-ov-mg-t-30 widget-ov-mg-t-n-30 shadow-reset" style="background-color: #FA6900;">
                <div class="row">
                 <div class="col-lg-5">
                    <i class="fa fa-shopping-cart  fa-5x" style="margin-top: 8px; color: #fff;"></i>
                </div>
                <div class="col-lg-7">
                    <div class="progress-circular3">
                        <h2><?= $totpesananterbaru ?></h2>
                        <p>Pesanan Terbaru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="single-skill shadow-reset" style="background-color: #f9a825;">
            <div class="row">
                <div class="col-lg-5">
                   <i class="fa fa-shopping-cart fa-5x" style="margin-top: 8px; color: #fff;"></i>
               </div>
               <div class="col-lg-7">
                <div class="progress-circular1">
                    <h2><?= $totpesanan ?></h2>
                    <p>Total Pesanan</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="admin-activity-permission-area" >
    <div class="container-fluid" >
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <div class="author-permissio-wrap shadow-reset">
                    <div class="author-per-img">
                        <a href="#"><img src="../upload/img-konfigurasi/<?= $data['logo'] ?>" alt="" />
                        </a>
                        <div class="author-per-content" ><br>
                            <h1 style="margin-top: -17px;"><?= $data['nama_instansi'] ?></h1>
                            <p style="margin-left: 3px;"><?= $data['alamat'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcome-heading">
                             <h1>Selamat Datang <?= $dataadmin['nama'] ?></h1>
                             <h4>Anda login sebagai Administrator. Anda memiliki akses penuh terhadap sistem.</h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>