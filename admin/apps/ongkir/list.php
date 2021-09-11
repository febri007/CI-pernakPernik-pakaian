<?php  
$data= $ongkir->tampil();
?>
<div class="breadcome-area mg-b-30 small-dn">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcome-list shadow-reset">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="breadcome-heading">
                                <h1><i class="fa fa-truck "></i> Keterangan Ongkir</h1>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="breadcome-menu">
                                <li><a href="index.php?halaman=home">Beranda</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Keterangan Ongkir</span>
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
<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline13-list shadow-reset">

                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table  id="example" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value): ?>
                                        <tr>
                                            <td width="5%"><?= $key+1 ?></td>
                                            <td><?= $value['keterangan'] ?></td>
                                            <td width="20%">
                                                <?php if ($value['keterangan']=="Diambil"): ?>
                                                    <a href="index.php?halaman=ubahbank&id=<?= $value['id_bank'] ?>" class="btn btn-default as disabled" style="background-color:#102593 ;"><i class="fa fa-info-circle"></i> No Action</a>
                                                    <?php elseif ($value['keterangan']=="Diantar"): ?>
                                                     <a href="index.php?halaman=listongkir&id=<?= $value['id_ongkirket'] ?>" class="btn btn-warning as"><i class="fa fa-truck"></i> Ongkir</a>
                                                 <?php endif ?>

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
<div style="margin-top: 155px;"></div>