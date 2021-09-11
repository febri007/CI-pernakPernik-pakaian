
<div class="breadcome-area mg-b-30 small-dn">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="breadcome-list shadow-reset">
          <div class="row">
            <div class="col-lg-6">
              <div class="breadcome-heading">
                <h1><i class="fa fa-print"></i> Laporan</h1>
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="breadcome-menu">
                <li><a href="#"><i class="fa fa-home"></i></a> <span class="bread-slash">/</span>
                </li>
                <li><span class="bread-blod">Laporan</span>
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
                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active" style="margin-top: -25px;">
                        <br><br>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h3>Laporan Transaksi</h3>
                                <hr style="border-color: black">
                                <!-- <form method="GET" action="laporan/pertanggal.php" target="blank">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label>Pertanggal</label><br>
                                        <div class="col-md-6" style="margin-left: -15px;">
                                          <input type="date" name="dari" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                          <input type="date" name="sampai" class="form-control">
                                       </div>
                                     </div>
                                     <br><br>
                                     <div class="form-group">
                                      <button class="btn btn-primary" style="background: #40b149; border-color: #40b149;" type="submit" style="float: left;"><i class="fa fa-print"></i> Cetak</button>
                                    </div>
                                  </div>
                                </div>
                              </form> -->
                              <form method="GET" action="laporan/perbulan.php" target="blank">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Perbulan</label><br>
                                      <div class="col-md-6" style="margin-left: -15px;">
                                       <select name="bulan" id="" class="form-control">
                                        <option value="">- Pilih Bulan -</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">april</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                      </select>
                                    </div>
                                    <div class="col-md-6">
                                     <select name="tahun" class="form-control">
                                      <option value="">- Pilih Tahun -</option>
                                      <?php  
                                      $y = date('Y');
                                      for ($i=2020; $i <=$y+10; $i++) { 
                                        echo "<option value='$i'>$i</option>";
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>
                                <br><br>
                                <div class="form-group">
                                  <button class="btn btn-primary" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);" type="submit" style="float: left;"><i class="fa fa-print"></i> Cetak</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <!-- <form method="GET" action="laporan/pertahun.php" target="blank">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Pertahun</label><br>
                                  <div class="col-md-6" style="margin-left: -15px;">
                                   <select name="tahun" class="form-control">
                                    <option value="">- Pilih Tahun -</option>
                                    <?php  
                                    $y = date('Y');
                                    for ($i=2020; $i <=$y+10; $i++) { 
                                      echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
                                  </select>
                                </div>
                              </div>
                              <br><br>
                              <div class="form-group">
                                <button class="btn btn-primary" style="background: #40b149; border-color: #40b149;" type="submit" style="float: left;"><i class="fa fa-print"></i> Cetak</button>
                              </div>
                            </div>
                          </div>
                        </form> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3>Laporan Menu Terlaris</h3>
                        <hr style="border-color: black">
                        <form method="GET" action="laporan/terlaris.php" target="blank">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <button class="btn btn-primary btn-block" style=" background: linear-gradient(to bottom, #102593 0%, #123BB5 100%);" type="submit" style="float: left;"><i class="fa fa-print"></i> Cetak Menu Terlaris</button>
                              </div>
                            </div>
                          </div>
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
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<br><br><br><br><br><br><br>
