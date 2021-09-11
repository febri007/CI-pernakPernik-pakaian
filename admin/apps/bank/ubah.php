<?php  
$id_bank = $_GET['id'];
$data = $bank->detail($id_bank);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-credit-card-alt"></i> Ubah Bank</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Bank</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Ubah Bank</span>
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
<div class="col-md-12">
    <a class="btn btn-warning" href="index.php?halaman=bank"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<br><br><br>
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
                                                <label for="">Atas Nama</label>
                                                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Bank</label>
                                                <input type="text" name="bank" class="form-control" value="<?= $data['bank'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Nomor Rekening</label>
                                                <input type="text" name="norek" class="form-control" value="<?= $data['no_rek'] ?>" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="">Foto Bank</label>
                                                        <img src="../upload/img-bank/<?php echo $data['foto_bank'] ?>" alt="">
                                                    </div>
                                                    <div class="col-md-9" style="margin-top: 27px;">
                                                        <input type="file" name="gambar" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-download"></i> Simpan</button>
                                                <a class="btn btn-danger" href="index.php?halaman=bank"></i>Batal</a>
                                            </div>
                                        </form>
                                        <?php  
                                        if (isset($_POST['simpan'])) 
                                        {
                                            $bank->ubah($_POST['nama'],$_POST['bank'],$_POST['norek'],$_FILES['gambar'],$id_bank);
                                            echo "<script>alert('Bank berhasil diubah!');</script>";
                                            echo "<script>location='index.php?halaman=bank';</script>";
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
<br><br><br><br><br><br><br><br><br><br>         
