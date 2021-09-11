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
                                <h1><i class="fa fa-gear"></i> Ubah Password</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="#">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Ubah Password</span>
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
                                        <div class="alert alert-danger"><i class="fa fa-info-circle"></i> Mohon untuk tidak memberitahukan password anda kepada siapapun!</div>
                                        <hr>
                                        <?php  
                                        if (isset($_POST['ubahpassword'])) 
                                        {
                                            $username = $data['username'];
                                            $id_admin = $data['id_admin'];
                                            $lama = $_POST['lama'];
                                            $baru = $_POST['baru'];
                                            $enpass = sha1($baru);
                                            $konfirmasi = $_POST['konfirmasi'];
                                            $password_lama = sha1($lama);
                                            $query = "SELECT * FROM admin WHERE username='$username' AND password='$password_lama'";
                                            $sql = mysqli_query($mysqli,$query);
                                            $hasil = mysqli_num_rows($sql);
                                            if ($hasil > 0) 
                                            {
                                                if (strlen($baru) >= 8) 
                                                {
                                                    if ($baru != $konfirmasi) 
                                                    {
                                                        echo "<div class='alert alert-danger'>Konfirmasi password salah, silahkan masukan konfirmasi password dengan benar!</div>";
                                                    }
                                                    else
                                                    {
                                                        $query = "UPDATE admin SET password='$enpass' WHERE id_admin='$id_admin'";
                                                        $sql = mysqli_query($mysqli,$query);
                                                        if ($sql) 
                                                        {
                                                            echo "<div class='alert alert-success'>Password berhasil di ubah!</div>";
                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                 echo "<div class='alert alert-danger'>Password tidak boleh kurang dari 8 karakter.</div>";
                                             }
                                         }
                                         else
                                         {
                                            echo "<div class='alert alert-danger'>Password lama anda salah, silahkan masukan password lama anda dengan benar!</div>";
                                        }
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="">Password Lama</label>
                                            <input type="password" class="form-control" placeholder="Masukan password lama" name="lama" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="password" class="form-control" placeholder="Masukan password baru" name="baru" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfirmasi Password</label>
                                            <input type="password" class="form-control" placeholder="Masukan konfirmasi password" name="konfirmasi" required="">
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary" name="ubahpassword" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-edit" ></i> Ubah Password</button>
                                        <button class="btn btn-info" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                        <a href="./" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                                    </form>
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
