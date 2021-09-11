
<?php    
$data = $konfigurasi->ambil();
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-gear"></i> Konfigurasi</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Konfigurasi</span>
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
                                                <label class="control-label">Nama Instansi</label>
                                                <input class="form-control" type="text" name="nama_instansi" value="<?= $data['nama_instansi'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Nama Web</label>
                                                <input class="form-control" type="text" name="nama_web" value="<?= $data['nama_web'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Nama Pemilik</label>
                                                <input class="form-control" type="text" name="nama_pemilik" value="<?= $data['pemilik'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Alamat</label>
                                                <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email Instansi</label>
                                                <input class="form-control" type="email" name="email" value="<?= $data['email'] ?>">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                <div class="col-md-3">
                                                <img width="80" src="../upload/img-konfigurasi/<?= $data['logo'] ?>" alt="tidak ada">
                                                </div>
                                                <div class="col-md-9">
                                                <label class="control-label">Logo Instansi</label>
                                                    <input type="file" class="form-control" name="logo">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-download"></i> Simpan</button>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan']))
                                        {
                                            $konfigurasi->ubah($_POST['nama_instansi'],$_POST['nama_web'],$_POST['nama_pemilik'],$_POST['alamat'],$_POST['email'],$_FILES['logo']);
                                            echo "<script>alert('Konfigurasi berhasil di ubah');</script>";
                                            echo "<script>location='index.php?halaman=konfigurasi'</script>";
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
