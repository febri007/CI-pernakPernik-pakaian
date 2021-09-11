<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-list"></i> Tambah Kategori</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Kategori</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Tambah Kategori</span>
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
    <a href="index.php?halaman=kategori" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
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
                                        <form class="row" method="post" enctype="multipart/form-data">
                                            <div class="form-group col-md-6">
                                                <label for="">Nama Kategori</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" required="">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Gambar</label>
                                                <input type="file" name="gambar" class="form-control" required="">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="">Uraian</label>
                                                <textarea name="uraian" class="form-control" placeholder="Uraian Kategori"></textarea>
                                            </div>
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-download"></i> Simpan</button>
                                                <button class="btn btn-info" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                            </div>
                                        </form>
                                        <?php  
                                        if (isset($_POST['simpan'])) 
                                        {
                                            $hasil = $kategori->tambah($_POST['nama'],$_FILES['gambar'],$_POST['uraian']);
                                            if ($hasil=="sukses") 
                                            {
                                                echo "<script>alert('Kategori berhasil disimpan!');</script>";
                                                echo "<script>location='index.php?halaman=kategori';</script>";
                                            }
                                            else
                                            {
                                                echo "<script>alert('Kategori gagal disimpan, nama kategori sudah terdaftar pada sistem!');</script>";
                                                echo "<script>location='index.php?halaman=kategori';</script>";
                                            }
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
