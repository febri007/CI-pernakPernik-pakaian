<?php  
$kategori = $kategori->tampil();
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-tags"></i> Tambah Menu</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home"><i class="fa fa-home"></i></a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="index.php?halaman=menu">Menu</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Tambah Menu</span>
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
    <a href="index.php?halaman=menu" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div><br><br><br>
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
                                                <label class="control-label">Kategori</label>
                                                <select class="form-control" name="id_kategori" required="">
                                                    <option value="">- Pilih Kategori -</option>
                                                    <?php foreach ($kategori as $key => $value): ?>
                                                        <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Nama Menu</label>
                                                <input class="form-control" type="text" name="nama" placeholder="Nama Menu" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Harga Menu</label>
                                                <input class="form-control" type="text" name="harga" placeholder="Nama Menu" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Gambar Menu</label>
                                                <input type="file" class="form-control" name="gambar" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Deskripsi Menu</label>
                                                <textarea name="deskripsi" id="theeditor" class="form-control" placeholder="Deskripsi Menu" required=""></textarea>
                                            </div>
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-download"></i> Simpan</button>
                                                <button class="btn btn-info" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                            </div>
                                        </form>
                                        <?php  
                                        if (isset($_POST['simpan'])) 
                                        {
                                            $menu->tambah($_POST['id_kategori'],$_POST['nama'],$_POST['harga'],$_POST['deskripsi'],$_FILES['gambar']);
                                            echo "<script>alert('Menu berhasil disimpan!');</script>";
                                            echo "<script>location='index.php?halaman=menu';</script>";
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
</div>
</div>
<br><br><br><br><br><br>
