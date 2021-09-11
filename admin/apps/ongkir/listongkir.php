<?php 
$id_ongkirket = $_GET['id'];
$data = $ongkir->tampillistongkir($id_ongkirket);
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-truck"></i> Ongkir</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Ongkir</span>
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
<div class="col-md-12">
    <a href="index.php?halaman=ongkir" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
</div><br><br><br>
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                           <button type="button" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i>
                            Tambah
                        </button><br><br><br>
                        <table  id="example" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value): ?>
                                    <tr>
                                        <td width="5%"><?= $key+1 ?></td>
                                        <td><?= $value['kabupaten'] ?></td>
                                        <td width="25%">
                                            <a href="index.php?halaman=ongkirlist&id=<?= $value['id_kabupaten'] ?>&id_ongkirket=<?= $value['id_ongkirket'] ?>" class="btn btn-success"><i class="fa fa-truck"></i> Ongkir</a>
                                            <a href="#" class="ubah-ongkir btn btn-warning as" data-toggle="modal" data-id="<?= $value['id_kabupaten'] ?>"><i class="fa fa-edit"></i> Ubah</a>
                                            <a href="index.php?halaman=hapusongkir&id=<?= $value['id_kabupaten'] ?>&id_ongkirket=<?= $value['id_ongkirket'] ?>" class="btn btn-danger as" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-titl text-center">Tambah Kabupaten</h3>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="">Nama Kabupaten</label>
                                <input type="text" class="form-control" name="kabupaten" placeholder="Nama Kabupaten">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button name="simpan" class="btn btn-primary" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);"><i class="fa fa-download"></i> Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </center>
                        </div>
                    </form>
                    <?php  

                    if (isset($_POST['simpan'])) 
                    {
                        $hasil = $ongkir->simpan($_POST['kabupaten'],$id_ongkirket);
                        if ($hasil=="sukses") 
                        {
                            echo "<script>alert('Kabupaten berhasil ditambahkah');</script>";
                            echo "<script>location='index.php?halaman=listongkir&id=".$id_ongkirket."';</script>";
                        }
                        else
                        {
                         echo "<script>alert('Ongkos kirim gagal ditambahkah, Nama kota yang anda masukan telah terdaftar pada sistem!');</script>";
                         echo "<script>location='index.php?halaman=listongkir&id=".$id_ongkirket."';</script>";
                     }

                 }
                 ?>
             </div>
         </div>
     </div>
 </div>
 <div class="modal fade ongkir-ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="margin-top: 135px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-titl text-center">Ubah Kabupaten</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_kabupaten" required="">
                    </div>
                    <div class="form-group">
                        <label for=""> Nama Kabupaten</label>
                        <input type="text" class="form-control" name="kabupaten" required="">
                    </div>

                    <div class="modal-footer">
                        <center>
                            <button style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);" class="btn btn-primary" name="ubah"> Ubah</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-color: #3eac47;">Close</button>
                        </center>
                    </div>
                </form>
                <?php 
                if (isset($_POST["ubah"])) 
                {
                    $ongkir->ubah($_POST["id_kabupaten"],$_POST["kabupaten"]);
                    echo "<script>alert('Kabupaten berhasil diubah');</script>";
                    echo "<script>location='index.php?halaman=listongkir&id=".$id_ongkirket."';</script>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 150px;"></div>