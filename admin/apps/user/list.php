<?php  
$datauser = $admin->tampil();
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-users"></i> Manajemen User</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">User</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Manajemen User</span>
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
                            <a href="index.php?halaman=tambahuser" class="btn btn-primary" style="float: left; background: #3EAC47; border-color: #3EAC47;"><i class="fa fa-plus"></i> Tambah User</a><br><br><br>
                            <table  id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Hak Akses</th>
                                        <th>Foto</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($datauser as $key => $value): ?>
                                        <tr>
                                            <td><?= $key+1 ?></td>
                                            <td><?= $value['nama'] ?></td>
                                            <td><?= $value['username'] ?></td>
                                            <td><?= $value['email'] ?></td>
                                            <td>
                                                <?php if ($value['hak_akses']=="manager"): ?>
                                                    Pemilik
                                                    <?php else: ?>
                                                        Admin
                                                    <?php endif ?>
                                                </td>
                                                <td>
                                                    <?php if (empty($value['foto'])): ?>
                                                        <img width="80" src="../upload/img-user/user.png" alt="">
                                                        <?php else: ?>
                                                        <img width="80" src="../upload/img-user/<?php echo $value['foto'] ?>" alt="">
                                                    <?php endif ?>
                                                </td>
                                                <td width="20%">
                                                    <?php if ($value['hak_akses'] == "manager"): ?>
                                                        <a href="index.php?halaman=ubahuser&id=<?= $value['id_user'] ?>" class="btn btn-info btn-sm disabled as" style="background: #3EAC47; border-color: #3EAC47;"><i class="fa fa-info-circle"></i> No Acction</a>
                                                        <?php else: ?>
                                                            <a href="index.php?halaman=ubahuser&id=<?= $value['id_admin'] ?>" class="btn btn-warning btn-sm as"><i class="fa fa-edit"></i> Ubah</a>
                                                            <a href="index.php?halaman=hapususer&id=<?= $value['id_admin'] ?>" class="btn btn-danger btn-sm as" onclick="return confirm('Apakah anda yakin menghapus data user ini?')"><i class="fa fa-trash"></i> Hapus</a>
                                                        <?php endif ?>
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
<br><br><br><br><br>