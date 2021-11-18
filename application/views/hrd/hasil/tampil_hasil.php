    <!-- <?php //var_dump($pengurus);?> -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <div class="alert bg-content" role="alert">
          <i class="fas fa-cogs"></i> Hasil Perhitungan Penilaian
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
              <div>
                  <button onClick="refreshPage();"class="btn btn-success"><i class="fas fa-sync-alt" ></i>Hitung Ulang Nilai</button>
                  <script type="text/javascript">
                    function refreshPage()
                    {
                        window.location.reload();
                        alert("Data Nilai Perhitungan Telah Berhasil Diperharui");
                    }
                  </script>
              </div>
                 <!-- single button refresh-->
                <!-- <div>
                  <button onClick="window.location.reload();" class="btn btn-success"><i class="fas fa-sync-alt"></i> 
                    Hitung Ulang Nilai
                  </button>
              </div> -->
              <br>
              <div class="card mb-4 py-3 border-left-danger">
                <div class="card-body">
                  <h4><i class="far fa-edit"></i> <b >Hasil Perhitungan Penilaian</b></h4>
                  <div class="garis" style="width: 100%; margin-bottom: 2%;"></div>
                </div>

                <div class="row">
                  <!-- Begin Page Content -->
                  <div class="container-fluid">
                  <ul class="tabs">
                      <li class="labels">
                          <label for="tab1" id="label1">Data Kriteria</label>
                          <label for="tab2" id="label2">Data Nilai Pegawai</label>
                          <label for="tab3" id="label3">Tabel Pembobotan</label>
                          <label for="tab4" id="label4">Tabel Normalisasi</label>
                          <label for="tab5" id="label5">Tabel Hasil Akhir</label>
                      </li>
                      <li>
                          <input type="radio" checked name="tabs" id="tab1">
                          <div id="tab-content1" class="tab-content">
                              <!-- Your Content Here -->
                              <div class="card shadow mb-4"> 
                                  <br>
                                  <center><h3>Data Kriteria</h3></center>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-bordered"  width="100%" cellspacing="0.5">
                                        <thead>
                                          <tr style="font-size: 12px; text-align: center;">
                                            <th>No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Bobot</th>
                                            <th>Keterangan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $no=1;
                                            foreach ($kriteria as $sts) :
                                          ?> 
                                          <tr style="font-size: 12px; text-align:center;">
                                            <td><?php echo $no++; ?></td>
                                            <td style="text-align: left"><?php echo $sts->nama_kriteria; ?></td>
                                            <td><?php echo $sts->bobot; ?></td>
                                            <td><?php echo $sts->keterangan; ?></td>
                                          </tr> 
                                        <?php endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                            </div>
                      </li>
                      <li>
                          <input type="radio" name="tabs" id="tab2">
                          <div id="tab-content2" class="tab-content">
                              <!-- Your Content Here -->
                              <div class="card shadow mb-4"> 
                                  <br>
                                  <center><h3>Data Nilai Pegawai</h3></center>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-bordered"  width="100%" cellspacing="0.5">
                                        <thead>
                                          <tr style="font-size: 12px; text-align: center;">
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Subbidang</th>
                                            <th>Kesetiaan</th>
                                            <th>Prestasi Kerja</th>
                                            <th>Tanggung Jawab</th>
                                            <th>Ketaatan</th>
                                            <th>Kejujuran</th>
                                            <th>Kerjasama</th>
                                            <th>Prakarsa</th>
                                            <th>Kepimpinan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $no=1;
                                            foreach ($nilai as $sts) :
                                          ?> 
                                          <tr style="font-size: 12px; text-align:center;">
                                            <td><?php echo $no++; ?></td>
                                            <td style="text-align: left"><?php echo $sts->nama_pegawai; ?></td>
                                            <td style="text-align: left"><?php echo $sts->nama_subbidang; ?></td>
                                            <td><?php echo $sts->C1; ?></td>
                                            <td><?php echo $sts->C2; ?></td>
                                            <td><?php echo $sts->C3; ?></td>
                                            <td><?php echo $sts->C4; ?></td>
                                            <td><?php echo $sts->C5; ?></td>
                                            <td><?php echo $sts->C6; ?></td>
                                            <td><?php echo $sts->C7; ?></td>
                                            <td><?php echo $sts->C8; ?></td>
                                          </tr> 
                                        <?php endforeach; ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div> 
                          </div>
                      </li>
                      <li>
                          <input type="radio" name="tabs" id="tab3">  
                          <div id="tab-content3" class="tab-content">
                              <!-- Your Content Here -->
                              <div class="card shadow mb-4"> 
                                  <br>
                                  <center><h3>Tabel Pembobotan</h3></center>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-bordered" width="100%" cellspacing="0.5">
                                        <thead>
                                          <tr style="font-size: 12px; text-align: center;">
                                            <th>No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Subbidang</th>
                                            <th>Kesetiaan</th>
                                            <th>Prestasi Kerja</th>
                                            <th>Tanggung Jawab</th>
                                            <th>Ketaatan</th>
                                            <th>Kejujuran</th>
                                            <th>Kerjasama</th>
                                            <th>Prakarsa</th>
                                            <th>Kepimpinan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $no=1;
                                            foreach ($bobot as $sts) :
                                          ?> 
                                          <tr style="font-size: 12px; text-align:center;">
                                            <td><?php echo $no++; ?></td>
                                            <td style="text-align: left"><?php echo $sts[8]; ?></td>
                                            <td style="text-align: left"><?php echo $sts[12]; ?></td>
                                            <td><?php echo $sts[0]; ?></td>
                                            <td><?php echo $sts[1]; ?></td>
                                            <td><?php echo $sts[2]; ?></td>
                                            <td><?php echo $sts[3]; ?></td>
                                            <td><?php echo $sts[4]; ?></td>
                                            <td><?php echo $sts[5]; ?></td>
                                            <td><?php echo $sts[6]; ?></td>
                                            <td><?php echo $sts[7]; ?></td>
                                          </tr> 
                                        <?php endforeach; ?>
                                        </tbody> 
                                      </table>
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </li>
                      <li>
                          <input type="radio" name="tabs" id="tab4">  
                          <div id="tab-content4" class="tab-content">
                              <!-- Your Content Here -->
                              <div class="card shadow mb-4"> 
                                  <br>
                                  <center><h3>Tabel Normalisasi</h3></center>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-bordered" width="100%" cellspacing="0.5">
                                        <thead>
                                          <tr style="font-size: 12px; text-align: center;">
                                            <th >No</th>
                                            <th>Nama Pegawai</th>
                                            <th>Subbidang</th>
                                            <th>Kesetiaan</th>
                                            <th>Prestasi Kerja</th>
                                            <th>Tanggung Jawab</th>
                                            <th>Ketaatan</th>
                                            <th>Kejujuran</th>
                                            <th>Kerjasama</th>
                                            <th>Prakarsa</th>
                                            <th>Kepimpinan</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $no=1;
                                            foreach ($norm as $sts) :
                                          ?> 
                                          <tr style="font-size: 12px; text-align:center;">
                                            <td><?php echo $no++; ?></td>
                                            <td style="text-align: left"><?php echo $sts[0]; ?></td>
                                            <td style="text-align: left"><?php echo $sts[4]; ?></td>
                                            <td><?php echo $sts[5]; ?></td>
                                            <td><?php echo $sts[6]; ?></td>
                                            <td><?php echo $sts[7]; ?></td>
                                            <td><?php echo $sts[8]; ?></td>
                                            <td><?php echo $sts[9]; ?></td>
                                            <td><?php echo $sts[10]; ?></td>
                                            <td><?php echo $sts[11]; ?></td>
                                            <td><?php echo $sts[12]; ?></td>
                                          </tr> 
                                        <?php endforeach; ?>
                                        </tbody> 
                                      </table>
                                    </div>
                                  </div>
                                </div>  
                          </div>
                      </li>
                      <li>
                          <input type="radio" name="tabs" id="tab5">  
                          <div id="tab-content5" class="tab-content">
                              <!-- Your Content Here -->
                              <div class="card shadow mb-4"> 
                                  <br>
                                  <center><h3>Tabel Hasil Akhir</h3></center>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-bordered" width="100%" cellspacing="0.5">
                                        <thead>
                                          <tr style="font-size: 12px; text-align: center;">
                                            <th width="5%">No</th>
                                            <th>Nama Karyawan</th>
                                            <th>Subbidang</th>
                                            <th>Nilai Akhir</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php 
                                            $no=1;
                                            foreach ($wr as $sts) :
                                          ?> 
                                          <tr style="font-size: 12px; text-align:center;">
                                            <td><?php echo $no++; ?></td>
                                            <td style="text-align: left"><?php echo $sts[0]; ?></td>
                                            <td style="text-align: left"><?php echo $sts[4]; ?></td>
                                            <td><?php echo $sts[5]; ?></td>
                                          </tr> 
                                        <?php endforeach; ?>
                                        </tbody> 
                                      </table>
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </li>
                  </ul> 
                 <!-- Coba -->
                  <?php echo '<pre>'; ?>
                  <?php print_r($wr)?>
                  <?php echo '<pre>'; ?>

                 <!-- End Coba -->
                  </div>

                  <!-- End Container Fluid -->
                  </div>
                  <!-- End Nilai -->
                 
                <!-- Nilai -->
                
                </div>
              </div>
            </div>
        </div>

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->

   </div>
    <!-- End of Content Wrapper -->
      
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <img src="<?php echo base_url('assets/img/out.png')?>" width="40%">
            <h3 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h3>

            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
            <a class="btn btn-primary" href="<?php echo base_url('auth/logout') ?>">Keluar</a>
          </div>
        </div>
      </div>
    </div>