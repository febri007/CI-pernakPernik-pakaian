<?php  
include '../../config/class.php';
include '../../config/fungsi.php';
if (!isset($_SESSION["admin"])) 
{
  echo "<script>alert('anda harus login');</script>";
  echo "<script>location='.././';</script>";
}
else
{
  $dataadmin = $_SESSION['admin'];
  $id_admin = $dataadmin['id_admin'];
}
$datakonfigurasi = $konfigurasi->ambil();
$data =  $admin->ambil($id_admin);
?>
<!doctype html>
<html class="no-js" lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $datakonfigurasi['nama_instansi'] ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../upload/img-konfigurasi/<?= $datakonfigurasi['logo'] ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/jvectormap/jquery-jvectormap-2.0.3.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/datetimepicker.css">
    <link rel="stylesheet" href="css/bootstrap-editable.css">
    <link rel="stylesheet" href="css/x-editor-style.css">
    <link rel="stylesheet" href="css/c3.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css
    ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<style>
    .a
    {
        margin-bottom: 285px;
    }
    .count
    {

    }
</style>
<body class="materialdesign">
    <div class="wrapper-pro">
        <div class="left-sidebar-pro">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <a href="#"><img src="../upload/img-user/<?= $data['foto'] ?>" alt="" />
                    </a>
                    <h3><?= $data['nama'] ?></h3>
                    <?php if ($data['hak_akses']=='admin'): ?>
                        <p>Administrator</p>
                        <?php elseif ($data['hak_akses']=='manager'): ?>
                            <p>Pemilik</p>
                        <?php endif ?>
                        <strong>MC+</strong>
                    </div>
                    <div class="left-custom-menu-adp-wrap">
                        <ul class="nav navbar-nav left-sidebar-menu-pro">
                           <li class="nav-item">
                               <a href="./" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Beranda</span></a>
                           </li>
                           <?php if ($data['hak_akses']=="admin"): ?>
                               <li class="nav-item">
                                   <a href="index.php?halaman=kategori" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-list"></i> <span class="mini-dn">Kategori</span></a>
                               </li>
                               <li class="nav-item">
                                   <a href="index.php?halaman=menu" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-tags"></i> <span class="mini-dn">Menu</span></a>
                               </li>
                               <li class="nav-item">
                                   <a href="index.php?halaman=pesanan" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-shopping-cart"></i> <span class="mini-dn">Pesanan</span><span class="count pull-right label label-success"></span></a>

                               </li>
                               <li class="nav-item">
                                   <a href="index.php?halaman=pelanggan" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users"></i> <span class="mini-dn">Pelanggan</span></a>
                               </li>
                               <li class="nav-item">
                                   <a href="index.php?halaman=bank" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-credit-card-alt"></i> <span class="mini-dn">Bank</span></a>
                               </li>
                               <li class="nav-item">
                                <a href="index.php?halaman=laporan" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-print"></i> <span class="mini-dn">Laporan</span></a>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-gear"></i> <span class="mini-dn">Pengaturan</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                                    <a href="index.php?halaman=konfigurasi" class="dropdown-item">Konfigurasi</a>
                                    <a href="index.php?halaman=ongkir" class="dropdown-item">Ongkir</a>
                                </div>
                            </li>
                            <?php elseif ($data['hak_akses']=="manager"): ?>
                                <li class="nav-item">
                                    <a href="index.php?halaman=user" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-users"></i> <span class="mini-dn">Manajemen User</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?halaman=laporan" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-print"></i> <span class="mini-dn">Laporan</span></a>
                                </li>
                            <?php endif ?>
                            <li class="nav-item">
                               <a href="logout.php" role="button" aria-expanded="false" class="nav-link dropdown-toggle" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><i class="fa big-icon fa-sign-out"></i> <span class="mini-dn">Logout</span></a>
                           </li>
                       </ul>
                   </div>
               </nav>
           </div>
           <!-- Header top area start-->
           <div class="content-inner-all">
            <div class="header-top-area">
                <div class="fixed-header-top">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
                                <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <div class="admin-logo logo-wrap-pro">
                                    <a href="#"><img src="img/logo/log.png" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
                                <div class="header-top-menu tabl-d-n">

                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                <span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
                                                <span class="admin-name"><?= $data['nama'] ?></span>
                                                <span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
                                            </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
                                                <li><a href="index.php?halaman=profil"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>Profil</a>
                                                </li>
                                            </li>
                                            <li><a href="index.php?halaman=ubahpassword"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Ubah Password</a>
                                            </li>
                                            <li><a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header top area end-->
        <!-- Breadcome start-->
        <!-- Breadcome End-->
        <!-- Mobile Menu start -->
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <ul class="mobile-menu-nav">
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a href="dashboard.html">Dashboard v.1</a>
                                            </li>
                                            <li><a href="dashboard-2.html">Dashboard v.2</a>
                                            </li>
                                            <li><a href="analytics.html">Analytics</a>
                                            </li>
                                            <li><a href="widgets.html">Widgets</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="demo" class="collapse dropdown-header-top">
                                            <li><a href="inbox.html">Inbox</a>
                                            </li>
                                            <li><a href="view-mail.html">View Mail</a>
                                            </li>
                                            <li><a href="compose-mail.html">Compose Mail</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#others" href="#">Miscellaneous <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="others" class="collapse dropdown-header-top">
                                            <li><a href="profile.html">Profile</a>
                                            </li>
                                            <li><a href="contact-client.html">Contact Client</a>
                                            </li>
                                            <li><a href="contact-client-v.1.html">Contact Client v.1</a>
                                            </li>
                                            <li><a href="project-list.html">Project List</a>
                                            </li>
                                            <li><a href="project-details.html">Project Details</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                            <li><a href="google-map.html">Google Map</a>
                                            </li>
                                            <li><a href="data-maps.html">Data Maps</a>
                                            </li>
                                            <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                            </li>
                                            <li><a href="x-editable.html">X-Editable</a>
                                            </li>
                                            <li><a href="code-editor.html">Code Editor</a>
                                            </li>
                                            <li><a href="tree-view.html">Tree View</a>
                                            </li>
                                            <li><a href="preloader.html">Preloader</a>
                                            </li>
                                            <li><a href="images-cropper.html">Images Cropper</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Chartsmob" class="collapse dropdown-header-top">
                                            <li><a href="bar-charts.html">Bar Charts</a>
                                            </li>
                                            <li><a href="line-charts.html">Line Charts</a>
                                            </li>
                                            <li><a href="area-charts.html">Area Charts</a>
                                            </li>
                                            <li><a href="rounded-chart.html">Rounded Charts</a>
                                            </li>
                                            <li><a href="c3.html">C3 Charts</a>
                                            </li>
                                            <li><a href="sparkline.html">Sparkline Charts</a>
                                            </li>
                                            <li><a href="peity.html">Peity Charts</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Tablesmob" class="collapse dropdown-header-top">
                                            <li><a href="static-table.html">Static Table</a>
                                            </li>
                                            <li><a href="data-table.html">Data Table</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="formsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a>
                                            </li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                            </li>
                                            <li><a href="password-meter.html">Password Meter</a>
                                            </li>
                                            <li><a href="multi-upload.html">Multi Upload</a>
                                            </li>
                                            <li><a href="tinymc.html">Text Editor</a>
                                            </li>
                                            <li><a href="dual-list-box.html">Dual List Box</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                            <li><a href="basic-form-element.html">Basic Form Elements</a>
                                            </li>
                                            <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                            </li>
                                            <li><a href="password-meter.html">Password Meter</a>
                                            </li>
                                            <li><a href="multi-upload.html">Multi Upload</a>
                                            </li>
                                            <li><a href="tinymc.html">Text Editor</a>
                                            </li>
                                            <li><a href="dual-list-box.html">Dual List Box</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
                                        <ul id="Pagemob" class="collapse dropdown-header-top">
                                            <li><a href="login.html">Login</a>
                                            </li>
                                            <li><a href="register.html">Register</a>
                                            </li>
                                            <li><a href="captcha.html">Captcha</a>
                                            </li>
                                            <li><a href="checkout.html">Checkout</a>
                                            </li>
                                            <li><a href="contact.html">Contacts</a>
                                            </li>
                                            <li><a href="review.html">Review</a>
                                            </li>
                                            <li><a href="order.html">Order</a>
                                            </li>
                                            <li><a href="comment.html">Comment</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  
        if (!isset($_GET['halaman'])) 
        {
           include 'home.php';
       }
       else
       {
        if ($_GET['halaman']=="konfigurasi") 
        {
            include 'konfigurasi/list.php';
        }
        elseif ($_GET['halaman']=="kategori") 
        {
            include 'kategori/list.php';
        }
        elseif ($_GET['halaman']=="tambahkategori") 
        {
            include 'kategori/tambah.php';
        }
        elseif ($_GET['halaman']=="ubahkategori") 
        {
            include 'kategori/ubah.php';
        }
        elseif ($_GET['halaman']=="hapuskategori") 
        {
            include 'kategori/hapus.php';
        }
        elseif ($_GET['halaman']=="subkategori1") 
        {
            include 'subkategori1/list.php';
        }
        elseif ($_GET['halaman']=="menu") 
        {
            include 'menu/list.php';
        }
        elseif ($_GET['halaman']=="tambahmenu") 
        {
            include 'menu/tambah.php';
        }
        elseif ($_GET['halaman']=="ubahmenu") 
        {
            include 'menu/ubah.php';
        }
        elseif ($_GET['halaman']=="hapusmenu") 
        {
            include 'menu/hapus.php';
        }
        elseif ($_GET['halaman']=="detailmenu") 
        {
            include 'menu/detail.php';
        }
        elseif ($_GET['halaman']=="gambarmenu") 
        {
            include 'menu/gambar.php';
        }
        elseif ($_GET['halaman']=="hapusgambar") 
        {
            include 'menu/hapusgambar.php';
        }
        elseif ($_GET['halaman']=="ubahgambar") 
        {
            include 'menu/ubahgambar.php';
        }
        elseif ($_GET['halaman']=="pelanggan") 
        {
            include 'pelanggan/list.php';
        }
        elseif ($_GET['halaman']=="hapuspelanggan") 
        {
            include 'pelanggan/hapus.php';
        }
        elseif ($_GET['halaman']=="profil") 
        {
            include 'profil/list.php';
        }
        elseif ($_GET['halaman']=="ubahpassword") 
        {
            include 'profil/ubahpassword.php';
        }
        elseif ($_GET['halaman']=="transaksi") 
        {
            include 'transaksi/list.php';
        }
        elseif ($_GET['halaman']=="tambahtransaksi") 
        {
            include 'transaksi/tambah.php';
        }
        elseif ($_GET['halaman']=="detailtransaksi") 
        {
            include 'transaksi/detail.php';
        }
        elseif ($_GET['halaman']=="bank") 
        {
            include 'bank/list.php';
        }
        elseif ($_GET['halaman']=="ubahbank") 
        {
            include 'bank/ubah.php';
        }
        elseif ($_GET['halaman']=="tambahbank") 
        {
            include 'bank/tambah.php';
        }
        elseif ($_GET['halaman']=="hapusbank") 
        {
            include 'bank/hapus.php';
        }
        elseif ($_GET['halaman']=="pesanan") 
        {
            include 'pesanan/list.php';
        }
        elseif ($_GET['halaman']=="detailpesanan") 
        {
            include 'pesanan/detail.php';
        }
        elseif ($_GET['halaman']=="pembayaran") 
        {
            include 'pesanan/pembayaran.php';
        }
        elseif ($_GET['halaman']=="terimapembayaran") 
        {
            include 'pesanan/terima.php';
        }
        elseif ($_GET['halaman']=="terimapembayaran2") 
        {
            include 'pesanan/terima2.php';
        }
        elseif ($_GET['halaman']=="tolakpembayaran") 
        {
            include 'pesanan/tolak.php';
        }
        elseif ($_GET['halaman']=="ongkir") 
        {
            include 'ongkir/list.php';
        }
        elseif ($_GET['halaman']=="ongkirlist") 
        {
            include 'ongkir/ongkir.php';
        }
        elseif ($_GET['halaman']=="listongkir") 
        {
            include 'ongkir/listongkir.php';
        }
        elseif ($_GET['halaman']=="hapusongkir") 
        {
            include 'ongkir/hapus.php';
        }
         elseif ($_GET['halaman']=="hapusongkirlist") 
        {
            include 'ongkir/hapuslist.php';
        }
        elseif ($_GET['halaman']=="konfirmasi") 
        {
            include 'pesanan/konfirmasi.php';
        }
        elseif ($_GET['halaman']=="laporan") 
        {
            include 'laporan/list.php';
        }
        elseif ($_GET['halaman']=="user") 
        {
            include 'user/list.php';
        }
        elseif ($_GET['halaman']=="tambahuser") 
        {
            include 'user/tambah.php';
        }
        elseif ($_GET['halaman']=="ubahuser") 
        {
            include 'user/ubah.php';
        }
        elseif ($_GET['halaman']=="hapususer") 
        {
            include 'user/hapus.php';
        }
    }
    ?>

</div>
</div>
<!-- Footer Start-->
<div class="footer-copyright-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copy-right">
                    <p>Copyright &#169; 2020 Roti Aneka All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End-->
<!-- Chat Box Start-->
<script src="js/vendor/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-chained.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="js/jquery.meanmenu.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/wow/wow.min.js"></script>
<script src="js/skycons/skycons.min.js"></script>
<script src="js/skycons/skycons.active.js"></script>
<script src="js/counterup/jquery.counterup.min.js"></script>
<script src="js/counterup/waypoints.min.js"></script>
<script src="js/counterup/counterup-active.js"></script>
<script src="js/peity/jquery.peity.min.js"></script>
<script src="js/peity/peity-active.js"></script>
<script src="js/sparkline/jquery.sparkline.min.js"></script>
<script src="js/sparkline/sparkline-active.js"></script>
<script src="js/rounded-counter/jquery.countdown.min.js"></script>
<script src="js/rounded-counter/jquery.knob.js"></script>
<script src="js/rounded-counter/jquery.appear.js"></script>
<script src="js/rounded-counter/knob-active.js"></script>
<script src="js/data-table/bootstrap-table.js"></script>
<script src="js/data-table/tableExport.js"></script>
<script src="js/data-table/data-table-active.js"></script>
<script src="js/data-table/bootstrap-table-editable.js"></script>
<script src="js/data-table/bootstrap-editable.js"></script>
<script src="js/data-table/bootstrap-table-resizable.js"></script>
<script src="js/data-table/colResizable-1.5.source.js"></script>
<script src="js/data-table/bootstrap-table-export.js"></script>
<script src="js/jquery.mockjax.js"></script>
<script src="js/mock-active.js"></script>
<script src="js/select2.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
<script src="js/bootstrap-editable.js"></script>
<script src="js/xediable-active.js"></script>
<script src="js/chat-active/jquery.chat.js"></script>
<script src="js/todo/jquery.todo.js"></script>
<script src="js/main.js"></script>
<script src="../ckeditor/ckeditor.js"></script>
<script >
  $(document).ready(function() {
    var table = $('#example').DataTable( {
      rowReorder: {
        selector: 'td:nth-child(2)'
    },
    responsive: true
} );
} );
</script>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script>
    $(document).ready(function() {
        $("#sub").chained("#kategori");
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.konfirmasi').on('click', function () {
            var id_pesanan = $(this).data("id");
            $.ajax({
                url:"api/konfirmasi.php",
                data:{id_pesanan:id_pesanan},
                method:"POST",
                dataType:'json',
                success:function(hasil){
                    $(".konfirmasi-pesanan").modal();
                    $("input[name=id_pesanan]").val(hasil.id_pesanan);
                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ubah-ongkir').on('click', function () {
            var id_kabupaten = $(this).data("id");
            $.ajax({
                url:"api/ongkir.php",
                data:{id_kabupaten:id_kabupaten},
                method:"POST",
                dataType:'json',
                success:function(hasil){
                    $(".ongkir-ubah").modal();
                    $("input[name=id_kabupaten]").val(hasil.id_kabupaten);
                    $("input[name=kabupaten]").val(hasil.kabupaten);
                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.ubah-ongkir-list').on('click', function () {
            var id_ongkir = $(this).data("id");
            $.ajax({
                url:"api/editongkir.php",
                data:{id_ongkir:id_ongkir},
                method:"POST",
                dataType:'json',
                success:function(hasil){
                    $(".ongkir-ubah-list").modal();
                    $("input[name=id_ongkir]").val(hasil.id_ongkir);
                    $("input[name=kecamatan]").val(hasil.kecamatan);
                    $("input[name=ongkos_kirim]").val(hasil.ongkos_kirim);
                }
            })
        });
    });
</script>
<script>
    CKEDITOR.replace("theeditor");
</script>
<script>
    $(document).ready(function() {
        selesai();
    });

    function selesai() {
        setTimeout(function() {
          update();
          selesai();
      }, 200);
    }

    function update() {
        $.getJSON("pesanan/totpesanan.php", function(data) {
          $(".count").empty();
          $.each(data.result, function() {
            var hasil = this['totpesanan']
            if (hasil > 0) 
            {
              $('.count').html(hasil);
          }
      });
      });
    }

</script>
</body>
</html>