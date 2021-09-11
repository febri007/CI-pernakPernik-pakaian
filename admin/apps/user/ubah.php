<?php  

$id_admin = $_GET['id'];
$detail = $admin->ambil($id_admin);

?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-user-plus"></i> Ubah User</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Manajemen User</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Ubah User</span>
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
                                        <form class="row" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Nama</label>
                                                <input class="form-control" type="text" name="nama" value="<?= $detail['nama'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Username</label>
                                                <input class="form-control" type="text" name="username" value="<?= $detail['username'] ?>" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="email" name="email" value="<?= $detail['email'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Jenis Kelamin</label>
                                                <select name="jk" id="" class="form-control">
                                                    <option value="Laki-Laki" <?php if ($detail['jk']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php if ($detail['jk']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Alamat</label>
                                                <textarea name="alamat" id="" class="form-control"><?php echo $detail['alamat'] ?></textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <?php if (empty($detail['foto'])): ?>
                                                            <img src="../upload/img-user/user.png" alt="" width="80">
                                                            <?php else: ?>
                                                               <img src="../upload/img-user/<?= $detail['foto'] ?>" alt="" width="80">
                                                           <?php endif ?>
                                                       </div>
                                                       <div class="col-md-10">
                                                          <label class="control-label">Foto</label>
                                                          <input class="form-control" type="file" name="foto">
                                                      </div>
                                                  </div>

                                              </div>
                                              <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style="background-color: #3EAC47; border-color: #3EAC47;"><i class="fa fa-edit"></i> Ubah</button>
                                                <a class="btn btn-danger" href="index.php?halaman=user"><i class="fa fa-times"></i> Batal</a>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan']))
                                        {
                                            $admin->ubah($_POST['nama'],$_POST['username'],$_POST['email'],$_POST['jk'],$_POST['alamat'],$_FILES['foto'],$id_admin);
                                            echo "<script>alert('User berhasil diubah');</script>";
                                            echo "<script>location='index.php?halaman=user'</script>";
                                        }
                                        ?>
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
<br><br><br>
