<?php  
$id_menu = $_GET['id'];
$data= $menu->detail($id_menu);
$datagambar= $menu->gambar($id_menu);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-tags"></i> Gambar Menu : <?= $data['nama_menu'] ?></h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Gambar Menu <?= $data['nama_menu'] ?></span>
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

<div class="col-lg-12">
    <a href="index.php?halaman=menu" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div><br><br><br>
<!-- Breadcome End-->
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                          <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <di class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Judul Gambar</label>
                                      <input type="text" class="form-control" name="judul" placeholder="Judul Gambar" required="">
                                  </div>
                              </di>
                              <di class="col-md-6">
                                <div class="form-group">
                                  <label for="">Unggah Gambar</label>
                                  <input type="file" class="form-control" name="gambar" required="">
                              </div>
                          </di>
                      </div>
                      <button class="btn btn-primary" name="simpan"><i class="fa fa-upload"></i> Simpan & Unggah Gambar</button>
                      <button class="btn btn-danger" type="reset"><i class="fa fa-times"></i> Reset</button>
                  </form>
                  <?php  
                  if (isset($_POST['simpan'])) 
                  {
                      $menu->simpangambar($_POST['judul'],$_FILES['gambar'],$id_menu);
                      echo "<script>alert('Gambar menu berhasil disimpan!');</script>";
                      echo "<script>location='index.php?halaman=gambarmenu&id=".$id_menu."';</script>";
                  }
                  ?>
                  <br><br><br>

                  <table  id="example" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Gambar</th>
                            <th>Gambar</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                       <tr>
                        <td width="7%">-</td>
                        <td><?= $data['nama_menu'] ?></td>
                        <td width="10%"><img width="80" src="../upload/img-menu/<?= $data['gambar_menu'] ?>" alt=""></td>
                        <td width="20%"><button class="btn btn-default disabled"> No Acction</button>
                        </td>
                    </tr>
                    <?php foreach ($datagambar as $key => $value): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $value['judul_gambar'] ?></td>
                            <td><img width="80" src="../upload/img-menu/<?= $value['gambar'] ?>" alt=""></td>
                            <td>
                                <a href="index.php?halaman=ubahgambar&id=<?= $value['id_gambar'] ?>&id_menu=<?= $value['id_menu'] ?>" class="btn btn-warning btn-xs as"><i class="fa fa-edit"></i> Ubah</a>
                                <a href="index.php?halaman=hapusgambar&id=<?= $value['id_menu'] ?>" class="btn btn-danger btn-xs as" onclick="return confirm('Apakah anda yakin menghapus produk ini ?')"><i class="fa fa-trash"></i> Hapus</a>
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