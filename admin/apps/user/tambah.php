
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-user-plus"></i> Tambah User</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">User</a> <span class="bread-slash">/</span>
                                </li>
                                <li><a href="#">Manajemen User</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Tambah User</span>
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
                                                <input class="form-control" type="text" name="nama" placeholder="Nama" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Username</label>
                                                <input class="form-control" type="text" name="username" placeholder="Username" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Jenis Kelamin</label>
                                                <select name="jk" id="" class="form-control">
                                                    <option value="">- Pilih Jenis Kelamin -</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Alamat</label>
                                                <textarea name="alamat" id="" class="form-control" placeholder="Alamat"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Foto</label>
                                                <input class="form-control" type="file" name="foto">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Pilih Hak Akses</label>
                                                <select name="hak_akses" id="" class="form-control">
                                                    <option value="">- Pilih tipe  user -</option>
                                                    <option value="manager">Pemilik</option>
                                                    <option value="admin">Karyawan</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-12"><hr>
                                                <button class="btn btn-primary" name="simpan" style="background-color: #3EAC47; border-color: #3EAC47;"><i class="fa fa-download"></i>Simpan</button>
                                                <a class="btn btn-danger" href="index.php?halaman=user"><i class="fa fa-times"></i> Batal</a>
                                            </div>
                                        </form>
                                        <?php
                                        if (isset($_POST['simpan']))
                                        {
                                            $hasil  = $admin->tambah($_POST['nama'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['jk'],$_POST['alamat'],$_FILES['foto'],$_POST['hak_akses']);
                                            if ($hasil=="sukses")
                                            {
                                               echo "<script>alert('User berhasil ditambahkan');</script>";
                                               echo "<script>location='index.php?halaman=user'</script>";
                                           }
                                           else
                                           {
                                            echo "<script>alert('User gagal ditambahkan, username atau email sudah terdaftar pada sistem!');</script>";
                                             echo "<script>location='index.php?halaman=tambahuser'</script>";
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
<br><br><br>
