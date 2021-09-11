<?php
$id_menu = $_GET['id'];
$data = $menu->detail($id_menu);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-cube"></i> Detail Menu</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Menu</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Detail Menu</span>
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
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list basic-res-b-30 shadow-reset">
                    <div class="sparkline8-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                    <div class="basic-login-inner">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td width="15%"><b>Kategori</b></td>
                                                        <td>:</td>
                                                        <td width="85%"><?= $data['nama_kategori'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"><b>Nama Produk</b></td>
                                                        <td>:</td>
                                                        <td width="85%"><?= $data['nama_menu'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"><b>Harga Produk</b></td>
                                                        <td>:</td>
                                                        <td width="85%">Rp. <?= number_format($data['harga_menu']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"><b>Deskripsi Produk</b></td>
                                                        <td>:</td>
                                                        <td width="85%"><?= $data['deskripsi_menu'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"><b>Views Produk</b></td>
                                                        <td>:</td>
                                                        <td width="85%"><?= $data['views_menu'] ?> dilihat</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="15%"><b>Terjual</b></td>
                                                        <td>:</td>
                                                        <td width="85%"> <?= $data['terjual'] ?> terjual</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="../upload/img-menu/<?php echo $data['gambar_menu'] ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<br><br><br><br><br><br>
