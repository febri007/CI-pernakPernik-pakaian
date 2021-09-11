<?php  
$data= $menu->tampil();
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1></i> Menu</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Menu</span>
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
<!-- Breadcome End-->
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <a href="index.php?halaman=tambahmenu" class="btn btn-primary" style="float: left;  background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);><i class="fa fa-plus"></i> Tambah</a><br><br><br>
                            <table  id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Nama Menu</th>
                                        <th>Harga</th>
                                        <th>Gambar</th>
                                        <th>Views</th>
                                        <th>Terjual</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $value['nama_kategori'] ?></td>
                                            <td><?= $value['nama_menu'] ?>  </td>
                                            <td>Rp. <?= number_format($value['harga_menu']) ?></td>
                                            <td><img width="80" src="../upload/img-menu/<?= $value['gambar_menu'] ?>" alt=""></td>
                                            <td><i class="fa fa-eye"></i> <?= $value['views_menu'] ?></td>
                                            <td><?= $value['terjual'] ?>  </td>
                                            <td>
                                                <a href="index.php?halaman=gambarmenu&id=<?= $value['id_menu'] ?>" class="btn btn-info btn-xs as"><i class="fa fa-image"></i> Gambar</a>
                                                <a href="index.php?halaman=detailmenu&id=<?= $value['id_menu'] ?>" class="btn btn-success btn-xs as"><i class="fa fa-external-link "></i> Detail</a>
                                                <a href="index.php?halaman=ubahmenu&id=<?= $value['id_menu'] ?>" class="btn btn-warning btn-xs as"><i class="fa fa-edit"></i> Ubah</a>
                                                <a href="index.php?halaman=hapusmenu&id=<?= $value['id_menu'] ?>" class="btn btn-danger btn-xs as" onclick="return confirm('Apakah anda yakin menghapus menu ini ?')"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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