<?php
$data = $admin->ambil($id_admin);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-user"></i> Profil</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Profil</span>
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
                                                <input class="form-control" type="text" name="nama" value="<?= $data['nama'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Username</label>
                                                <input class="form-control" type="text" name="username" value="<?= $data['username'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="text" name="email" value="<?= $data['email'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Jenis Kelamin</label>
                                                <select name="jk" id="" class="form-control">
                                                    <option value="Laki-Laki" <?php if ($data['jk']=="Laki-Laki") {echo "selected";} ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php if ($data['jk']=="Perempuan") {echo "selected";} ?>>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                       <label class="control-label">Upload file</label>
                                                       <img src="../upload/img-user/<?php echo $data['foto'] ?>" alt="" class=" img-responsive" width="100" >
                                                   </div>
                                                   <div class="col-md-9" style="margin-top: 23px;">  
                                                    <input class="form-control" type="file" name="file"></div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);" name="simpan"><i class="fa fa-edit"></i> Ubah Profil</button>
                                                <a href="./" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                                            </div>
                                        </form>
                                        <?php  
                                        if (isset($_POST['simpan'])) 
                                        {
                                            $admin->ubahprofil($_POST['nama'],$_POST['username'],$_POST['email'],$_POST['jk'],$_FILES['file'],$id_admin);
                                            echo "<script>alert('Profil berhasil diubah!');</script>";
                                            echo "<script>location='index.php?halaman=profil';</script>";
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
<br><br><br><br><br><br>